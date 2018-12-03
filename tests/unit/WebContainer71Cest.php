<?php


class WebContainer71Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }


    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web_71");
        $I->seeInShellOutput("true");
    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 7.1 is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 php --version");
        $I->seeInShellOutput('7.1.23');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web_71 service httpd status");
        $I->seeInShellOutput('active (running)');
    }

    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 yum list installed | grep cron");
        $I->seeInShellOutput('crontabs.noarch');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 phpunit --version");
        $I->seeInShellOutput('PHPUnit 5.7.21');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 git --version");
        $I->seeInShellOutput('git version 1.8.3.1');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 curl --version");
        $I->seeInShellOutput('7.29.0');
    }

    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 node -v");
        $I->seeInShellOutput('v6.14.4');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 npm --version");
        $I->seeInShellOutput("3.10.10");
    }

    public function checkNodemonInstallation(UnitTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 nodemon -v");
        $I->seeInShellOutput('1.18.6');
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 bower --version");
        $I->seeInShellOutput('1');
    }

    public function checkAstExtention(UnitTester $I){
        $I->wantTo("verify ast extention");
        $I->runShellCommand("docker exec dev_web_71 bash -c 'php -m | grep ast'");
        $I->seeInShellOutput('ast');
    }

    public function checkPhanExtention(UnitTester $I){
        $I->wantTo('Verify the phan');
        $I->runShellCommand("docker exec dev_web_71 bash -c 'phan -v | grep Phan'");
        $I->seeInShellOutput('Phan');
    }

    public function checkStatsPHPmodule(UnitTester $I){
        $I->wantTo("verify stats module");
        $I->runShellCommand("docker exec dev_web_71 bash -c 'php -m | grep stats'");
        $I->seeInShellOutput('stats');
    }

}
