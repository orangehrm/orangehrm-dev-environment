<?php


class RabbitMQCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkConnectivity(FunctionalTester $I)
    {
        $I->comment("test rabbitmq server");
        $I->runShellCommand('docker exec dev_web_56 bash -c "composer install"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "php send.php"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "php recieve.php"');
        $I->seeInShellOutput('Hello World!');
    }

    public function checkRabbitMQPortStatus(FunctionalTester $I)
    {
        $I->comment("check open status for 5672");
        $I->runShellCommand('nc -zv 10.5.0.10 5672');
        $I->dontSeeInShellOutput('Failed to connect ');
    }

    public function checkRabbitMQSSLPortStatus(FunctionalTester $I)
    {
        $I->comment("check open status for 5671");
        $I->runShellCommand('nc -zv 10.5.0.10 5671');
        $I->dontSeeInShellOutput('Failed to connect ');
    }

    public function checkRabbitMQManagementPortStatus(FunctionalTester $I)
    {
        $I->comment("check open status for 15671");
        $I->runShellCommand('nc -zv 10.5.0.10 15671');
        $I->dontSeeInShellOutput('Failed to connect ');
    }


    public function checkManagementAPI(FunctionalTester $I)
    {
        $I->comment("test management api connection");
        $I->runShellCommand('curl -i -u guest:guest https://10.5.0.10:15671/api/whoami --insecure');
        $I->seeInShellOutput('"name":"guest","tags":"administrator"');
    }


}
