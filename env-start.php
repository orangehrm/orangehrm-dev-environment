<?php

require_once('./utils/climate/autoload.php');

$climate = new League\CLImate\CLImate;

$climate->out('');
$climate->addArt('./utils/banners');
$climate->yellow()->animation('welcome')->speed(100)->enterFrom('bottom');

$climate->br();

$docker_status = shell_exec('service docker status');

if (strpos($docker_status, 'active (running)') !== false) {
    $basicOrCustom  = ['Basic Environment', 'Custom Environment'];
    $inputSelectEnvType    = $climate->radio("Please select the environment you want",$basicOrCustom);
    $environmentTypeSelected = $inputSelectEnvType->prompt();

    if($environmentTypeSelected == "Basic Environment"){
        $fullCommand = "docker-compose up -d";
    }else{
        $CustomOptions  = [
            './custom-compose/web70.yml' => 'PHP 7.0',
            './custom-compose/ubuntuweb71.yml' => 'Ubuntu 18.04 - PHP 7.1',
            './custom-compose/db56.yml' => 'MySQL 5.6',
            './custom-compose/db55.yml' => 'MySQL 5.5',
            './custom-compose/mariadb103.yml' => 'MariaDB 10.3',
        ];
        $inputCustomContainerSelection    = $climate->br()->checkboxes('Please select custom containers you need', $CustomOptions);
        $customContainersSelected = $inputCustomContainerSelection->prompt();
        $climate->br();
        $climate->br();
        if(count($customContainersSelected) > 0){
            $fullCommand = "docker-compose -f docker-compose.yml".generateCustomCommand($customContainersSelected)." up -d";
        }else{
            $fullCommand = "docker-compose up -d";
        }
    }

    $climate->br();
    $climate->br();
    $climate->blue()->out("Starting the Environment ...");
    $climate->br();
    $docker_dev = shell_exec($fullCommand);
    $climate->br();
    $climate->green()->out("SUCCESSFUL!");
}else{
    $climate->error('Please make sure Docker service is running. Run "service docker start"');
}

$climate->br();

function generateCustomCommand($customComposeFiles){
    $command = "";
    foreach ($customComposeFiles as $customComposeFile){
        $command .= " -f ".$customComposeFile;
    }
    return $command;
}