<?php


class WebContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }


    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web");
        $I->seeInShellOutput("true");
    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 5.6 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 5.6');
    }

    public function checkXdebugStatus(UnitTester $I){
        $I->wantTo("verify Xdebug is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('Xdebug v2.5.5');
    }

    public function checkSuhosinStatus(UnitTester $I){
        $I->wantTo("verify suhosin is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('Suhosin');
    }


    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web service httpd status");
        $I->seeInShellOutput('active (running)');
    }


    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is up and running in the container");
        $I->runShellCommand("docker exec dev_web service crond status");
        $I->seeInShellOutput('active (running)');
    }

    public function checkMemcacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify memcache is up and running in the container");
        $I->runShellCommand("docker exec dev_web service memcached status");
        $I->seeInShellOutput('active (running)');
    }

    public function checkPHPUnit3Version(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web phpunit3 --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web git --version");
        $I->seeInShellOutput('git version 1.8.3');
    }

    public function checkSvnInstallation(UnitTester $I){
        $I->wantTo("verify svn is installed in the container");
        $I->runShellCommand("docker exec dev_web svn --version");
        $I->seeInShellOutput('version 1.9');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web curl --version");
        $I->seeInShellOutput('curl 7.29');
    }

    public function checkNanoInstallation(UnitTester $I){
        $I->wantTo("verify nano is installed in the container");
        $I->runShellCommand("docker exec dev_web nano --version");
        $I->seeInShellOutput('nano version 2.3');
    }

    public function checkXhprofInstallation(UnitTester $I){
        $I->wantTo("verify Xhprof is installed in the container");
        $I->runShellCommand("docker exec dev_web php --ri xhprof");
        $I->seeInShellOutput('xhprof');
    }

    public function checkOci8PHPmodule(UnitTester $I){
        $I->wantTo("verify php module oci8 is installed in the container");
        $I->runShellCommand("docker exec dev_web php -m");
        $I->seeInShellOutput('oci8');
    }
}
