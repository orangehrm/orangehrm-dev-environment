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
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web_rhel");
        $I->seeInShellOutput("true");
    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 7.4 is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel php --version");
        $I->seeInShellOutput('PHP 7.4');
    }

    public function checkXdebugVersion(AcceptanceTester $I){
        $I->wantTo("verify xdebug is installed in the image");
        $I->runShellCommand("docker exec dev_web_rhel bash -c 'dnf info php-pecl-xdebug | grep Version'");
        $I->seeInShellOutput('Version');
        $I->seeInShellOutput('2');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web_rhel systemctl status httpd");
        $I->seeInShellOutput('active (running)');
    }


    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is up and running in the container");
        $I->runShellCommand("docker exec dev_web_rhel systemctl status crond");
        $I->seeInShellOutput('active (running)');
    }

    // public function checkMemcacheServiceIsRunning(UnitTester $I){
    //     $I->wantTo("verify memcache is up and running in the container");
    //     $I->runShellCommand("docker exec dev_web_rhel systemctl status memcached");
    //     $I->seeInShellOutput('active (running)');
    // }

    public function checkPHPUnit3Version(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel phpunit3 --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel phpunit --version");
        $I->seeInShellOutput('PHPUnit 5.7.21');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel git --version");
        $I->seeInShellOutput('git version 2');
    }
    public function checkSVNInstallation(UnitTester $I){
        $I->wantTo("verify svn is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel svn --version");
        $I->seeInShellOutput('version 1');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel curl --version");
        $I->seeInShellOutput('curl 7');
    }

    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v6 is installed in the container");
        $I->runShellCommand('docker exec dev_web_rhel bash -c "export PATH=$PATH:/root/.nvm/versions/node/v6.17.1/bin && node -v" ');
        $I->seeInShellOutput('v6');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand('docker exec dev_web_rhel bash -c "export PATH=$PATH:/root/.nvm/versions/node/v6.17.1/bin && npm -version" ');
        $I->seeInShellOutput("3.10.10");
    }

    public function checkSendMailVersion(UnitTester $I){
        $I->wantTo("verify sendmail is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel rpm -qa | grep -i sendmail");
        $I->seeInShellOutput("sendmail-8");
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand('docker exec dev_web_rhel bash -c "export PATH=$PATH:/root/.nvm/versions/node/v6.17.1/bin && bower --version" ');
        $I->seeInShellOutput('1');
    }

    public function checkInfectionFrameworkInstallation(UnitTester $I){
        $I->wantTo("verify infection framework is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel infection --version");
        $I->seeInShellOutput('0.13.0');
    }

    public function checkOslonDBInstallation(UnitTester $I){
        $I->wantTo("verify Oslon DB is installed in the container");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep -i timezone");
        $I->seeInShellOutput('Timezone Database Version => 2024');
    }

}
