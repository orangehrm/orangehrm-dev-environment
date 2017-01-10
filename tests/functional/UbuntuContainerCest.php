<?php


class UbuntuContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }


  public function ContainerTest(AcceptanceTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web");
        $I->seeInShellOutput("true");
    }

    public function apacheInstalledTest(AcceptanceTester $I){
        $I->wantTo("verify apache is installed in the container");
        $I->runShellCommand("docker exec dev_web apache2 -v");
        $I->seeInShellOutput('Server version: Apache/2.4.10');
    }

    public function apacheRunningTest(AcceptanceTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function cronTest(AcceptanceTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep cron");
        $I->seeInShellOutput('cron/now 3.0');
    }

    public function mysqlClientTest(AcceptanceTester $I){
        $I->wantTo("verify mysql-client is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep mysql-client");
        $I->seeInShellOutput('mysql-client/now 5.5');
    }

    public function libreOfficeTest(AcceptanceTester $I){
        $I->wantTo("verify LibreOffice is installed in the container");
        $I->runShellCommand("docker exec dev_web libreoffice --version");
        $I->seeInShellOutput('LibreOffice 4.3.3.2');
    }

    public function propplerUtilTest(AcceptanceTester $I){
        $I->wantTo("verify poppler-util is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep poppler-util");
        $I->seeInShellOutput('poppler-util');
    }

    public function zipTest(AcceptanceTester $I){
        $I->wantTo("verify zip library is installed in the container");
        $I->runShellCommand("docker exec dev_web zip -v");
        $I->seeInShellOutput('Zip 3');
    }

    public function unzipTest(AcceptanceTester $I){
        $I->wantTo("verify UnZip library is installed in the container");
        $I->runShellCommand("docker exec dev_web unzip -v");
        $I->seeInShellOutput('UnZip 6');
    }

    public function phpunitTest(AcceptanceTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web phpunit --version");
        $I->seeInShellOutput('PHPUnit 4.2.6');
    }

    public function gitTest(AcceptanceTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web git --version");
        $I->seeInShellOutput('git version 2.1.4');
    }

    public function curlTest(AcceptanceTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web curl --version");
        $I->seeInShellOutput('curl 7.38');
    }

    public function phpTest(AcceptanceTester $I){
        $I->wantTo("verify php 5.5 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 5.5');
    }

    public function nodeTest(AcceptanceTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web node -v");
        $I->seeInShellOutput('v4');
    }

    public function npmTest(AcceptanceTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web npm --version");
        $I->seeInShellOutput("2");
    }

    public function nodemonTest(AcceptanceTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web nodemon");
        $I->seeInShellOutput('Usage: nodemon');
    }

    public function bowerTest(AcceptanceTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web bower --version");
        $I->seeInShellOutput('1');
    }

    public function phpModuleTest(AcceptanceTester $I){
            $I->wantTo("verify required php modules are available");
            $I->runShellCommand("docker exec dev_web php -m");
            $I->seeInShellOutput('bcmath');
            $I->seeInShellOutput('calendar');
            $I->seeInShellOutput('Core');
            $I->seeInShellOutput('ctype');
            $I->seeInShellOutput('curl');
            $I->seeInShellOutput('date');
            $I->seeInShellOutput('dom');
            $I->seeInShellOutput('ereg');
            $I->seeInShellOutput('exif');
            $I->seeInShellOutput('fileinfo');
            $I->seeInShellOutput('filter');
            $I->seeInShellOutput('gd');
            $I->seeInShellOutput('gettext');
            $I->seeInShellOutput('hash');
            $I->seeInShellOutput('iconv');
            $I->seeInShellOutput('json');
            $I->seeInShellOutput('ldap');
            $I->seeInShellOutput('libxml');
            $I->seeInShellOutput('mbstring');
            $I->seeInShellOutput('mysql');
            $I->seeInShellOutput('mysqli');
            $I->seeInShellOutput('mysqlnd');
            $I->seeInShellOutput('PDO');
            $I->seeInShellOutput('pdo_mysql');
            $I->seeInShellOutput('pdo_sqlite');
            $I->seeInShellOutput('Phar');
            $I->seeInShellOutput('posix');
            $I->seeInShellOutput('readline');
            $I->seeInShellOutput('Reflection');
            $I->seeInShellOutput('session');
            $I->seeInShellOutput('SimpleXML');
            $I->seeInShellOutput('xdebug');
            $I->seeInShellOutput('xml');
            $I->seeInShellOutput('zip');
            $I->seeInShellOutput('zlib');
    }

    public function mysqlServerTest(AcceptanceTester $I){
            $I->wantTo("verify mysql container is linked with ubuntu container properly");
            $I->runShellCommand("docker exec dev_web ping db -c 2");
            $I->seeInShellOutput('2 packets transmitted, 2 packets received');
    }

}
