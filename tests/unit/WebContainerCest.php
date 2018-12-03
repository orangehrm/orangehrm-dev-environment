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
        $I->wantTo("verify php 7.1 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 7.1');
    }

    public function checkXdebugStatus(UnitTester $I){
        $I->wantTo("verify Xdebug is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('Xdebug v2.6');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        //$I->runShellCommand("ping -c 10 localhost");
        $I->runShellCommand("docker exec dev_web service httpd status");
        $I->seeInShellOutput('active (running)');
    }


    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is up and running in the container");
        $I->runShellCommand("docker exec dev_web service crond status");
        $I->seeInShellOutput('active (running)');
    }

    public function checkPHPUnit3Version(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web phpunit3 --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web phpunit --version");
        $I->seeInShellOutput('PHPUnit 5.7.21');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web git --version");
        $I->seeInShellOutput('git version 2.17.1');
    }
    public function checkSVNInstallation(UnitTester $I){
        $I->wantTo("verify svn is installed in the container");
        $I->runShellCommand("docker exec dev_web svn --version");
        $I->seeInShellOutput('version 1.9.7');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web curl --version");
        $I->seeInShellOutput('curl 7.58.0');
    }

    public function checkNanoInstallation(UnitTester $I){
        $I->wantTo("verify nano is installed in the container");
        $I->runShellCommand("docker exec dev_web nano --version");
        $I->seeInShellOutput('version 2.9.3');
    }


    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v6 is installed in the container");
        $I->runShellCommand("docker exec dev_web node -v");
        $I->seeInShellOutput('v8.10.0');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web npm --version");
        $I->seeInShellOutput("3.5.2");
    }

    public function checkSendMailVersion(UnitTester $I){
        $I->wantTo("verify sendmail is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg -l | grep -i sendmail");
        $I->seeInShellOutput("sendmail");
        $I->seeInShellOutput("sendmail-base");
        $I->seeInShellOutput("sendmail-bin");
        $I->seeInShellOutput("sendmail-cf");
    }

    public function checkNodemonInstallation(UnitTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web which nodemon");
        $I->seeInShellOutput('1.18.7');
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web bower --version");
        $I->seeInShellOutput('1.8.4');
    }


    public function checkAstExtention(UnitTester $I){
        $I->wantTo("verify ast extention");
        $I->runShellCommand("docker exec dev_web bash -c 'php -m | grep ast'");
        $I->seeInShellOutput('ast');
    }

    public function checkPhanExtention(UnitTester $I){
        $I->wantTo('Verify the phan');
        $I->runShellCommand("docker exec dev_web bash -c 'phan -v | grep Phan'");
        $I->seeInShellOutput('Phan 1.1.5');
    }

    public function checkStatsPHPmodule(UnitTester $I){
        $I->wantTo("verify stats module");
        $I->runShellCommand("docker exec dev_web bash -c 'php -m | grep stats'");
        $I->seeInShellOutput('stats');
    }

    public function checkmcryptPHPmodule(UnitTester $I){
        $I->wantTo("verify mcrypt module");
        $I->runShellCommand("docker exec dev_web bash -c 'php -m | grep mcrypt'");
        $I->seeInShellOutput('mcrypt');
    }


}
