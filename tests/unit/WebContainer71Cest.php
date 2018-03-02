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
        $I->seeInShellOutput('PHP 7.1');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web_71 service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 apt list --installed | grep cron");
        $I->seeInShellOutput('cron/now 3.0');
    }

    public function checkMemcacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web_56 service supervisor status");
        $I->seeInShellOutput('supervisord is running');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 phpunit --version");
        $I->seeInShellOutput('PHPUnit 5.7.21');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 git --version");
        $I->seeInShellOutput('git version 2.1.4');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 curl --version");
        $I->seeInShellOutput('curl 7.38');
    }

    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 node -v");
        $I->seeInShellOutput('v4');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 npm --version");
        $I->seeInShellOutput("2");
    }

    public function checkNodemonInstallation(UnitTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web_71 nodemon");
        $I->seeInShellOutput('Usage: nodemon');
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
