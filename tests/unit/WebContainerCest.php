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
        $I->wantTo("verify php 8.3 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 8.3');
    }

    public function checkXdebugStatus(UnitTester $I){
        $I->wantTo("verify Xdebug is installed in the container");
        $I->runShellCommand("docker exec dev_web pecl list | grep xdebug");
        $I->seeInShellOutput('xdebug     3.4.0');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        //$I->runShellCommand("ping -c 10 localhost");
        $I->runShellCommand("docker exec dev_web service apache2 status");
        $I->seeInShellOutput('active');
    }


    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is up and running in the container");
        $I->runShellCommand("docker exec dev_web service cron status");
        $I->seeInShellOutput('active');
    }

    // public function checkMemcacheServiceIsRunning(UnitTester $I){
    //     $I->wantTo("verify memcache is up and running in the container");
    //     $I->runShellCommand("docker exec dev_web ps -U memcache | grep -v grep | grep memcached");
    //     $I->seeInShellOutput('memcached');
    // }


    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web git --version");
        $I->seeInShellOutput('2.43.0');
    }
    public function checkSVNInstallation(UnitTester $I){
        $I->wantTo("verify svn is installed in the container");
        $I->runShellCommand("docker exec dev_web svn --version");
        $I->seeInShellOutput('version 1.14.3');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web curl --version");
        $I->seeInShellOutput('curl 8.5.0');
    }

    public function checkNanoInstallation(UnitTester $I){
        $I->wantTo("verify nano is installed in the container");
        $I->runShellCommand("docker exec dev_web nano --version");
        $I->seeInShellOutput('version 7.2');
    }

    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v6 is installed in the container");
        $I->runShellCommand('docker exec dev_web bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"; node -v\' ');
        $I->seeInShellOutput('v6.17.1');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand('docker exec dev_web bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"; npm -v\' ');
        $I->seeInShellOutput("3.10.10");
    }

    // public function checkSendMailVersion(UnitTester $I){
    //     $I->wantTo("verify sendmail is installed in the container");
    //     $I->runShellCommand("docker exec dev_web sendmail -d0.4 -bv root | grep Version");
    //     $I->seeInShellOutput("Version 8.15.2");
    // }

    public function checkOslonDBInstallation(UnitTester $I){
        $I->wantTo("verify Oslon DB is installed in the container");
        $I->runShellCommand("docker exec dev_web php -i | grep -i timezone");
        $I->seeInShellOutput('Timezone Database Version => 2024.2');
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand('docker exec dev_web bash -c \'export NVM_DIR="/usr/local/nvm"; [ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"; bower -v\' ');
        $I->seeInShellOutput('1');
    }

    public function checkwkhtmltopdfVersion(UnitTester $I){
        $I->wantTo("verify wkhtmltopdf is installed in the container");
        $I->runShellCommand('docker exec dev_web wkhtmltopdf --version');
        $I->seeInShellOutput('wkhtmltopdf 0.12');
    }

    public function checkInfectionFrameworkInstallation(UnitTester $I){
        $I->wantTo("verify infection framework is installed in the container");
        $I->runShellCommand("docker exec dev_web infection --version");
        $I->seeInShellOutput('0.29.0');
    }

}
