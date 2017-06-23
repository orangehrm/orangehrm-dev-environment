<?php


class WebContainer55Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }


    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web_55");
        $I->seeInShellOutput("true");
    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 5.5 is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 php --version");
        $I->seeInShellOutput('PHP 5.5');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web_55 service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 apt list --installed | grep cron");
        $I->seeInShellOutput('cron/now 3.0');
    }

    public function checkMemcacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec uat_web service supervisor status");
        $I->seeInShellOutput('supervisord is running');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 phpunit --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 git --version");
        $I->seeInShellOutput('git version 2.1.4');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 curl --version");
        $I->seeInShellOutput('curl 7.38');
    }


    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 node -v");
        $I->seeInShellOutput('v4');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 npm --version");
        $I->seeInShellOutput("2");
    }

    public function checkNodemonInstallation(UnitTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 nodemon");
        $I->seeInShellOutput('Usage: nodemon');
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web_55 bower --version");
        $I->seeInShellOutput('1');
    }


}
