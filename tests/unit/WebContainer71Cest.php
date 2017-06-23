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
        $I->runShellCommand("docker inspect -f {{.State.Running}} qa_web_71");
        $I->seeInShellOutput("true");
    }

    public function checkApacheInstallation(UnitTester $I){
        $I->wantTo("verify apache is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 apache2 -v");
        $I->seeInShellOutput('Server version: Apache/2.4.10');
    }

    public function checkApacheServiceIsRunning(UnitTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec qa_web_71 service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function checkCronServiceIsRunning(UnitTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 apt list --installed | grep cron");
        $I->seeInShellOutput('cron/now 3.0');
    }

    public function checkMySQLClientInstallation(UnitTester $I){
        $I->wantTo("verify mysql-client is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 apt list --installed | grep mysql-client");
        $I->seeInShellOutput('mysql-client/now 5.5');
    }

    public function checkLibreOfficeInstallation(UnitTester $I){
        $I->wantTo("verify LibreOffice is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 libreoffice --version");
        $I->seeInShellOutput('LibreOffice 4.3.3.2');
    }


    public function checkPopplerUtilInstallation(UnitTester $I){
        $I->wantTo("verify poppler-util is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 apt list --installed | grep poppler-util");
        $I->seeInShellOutput('poppler-util');
    }

    public function checkZipInstallation(UnitTester $I){
        $I->wantTo("verify zip library is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 zip -v");
        $I->seeInShellOutput('Zip 3');
    }

    public function checkUnzipIsInstallation(UnitTester $I){
        $I->wantTo("verify UnZip library is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 unzip -v");
        $I->seeInShellOutput('UnZip 6');
    }

    public function checkPHPUnitVersion(UnitTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 phpunit --version");
        $I->seeInShellOutput('PHPUnit 3.7.28');
    }

    public function checkGitInstallation(UnitTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 git --version");
        $I->seeInShellOutput('git version 2.1.4');
    }

    public function checkCurlInstallation(UnitTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 curl --version");
        $I->seeInShellOutput('curl 7.38');
    }

    public function checkPHPVersion(UnitTester $I){
        $I->wantTo("verify php 7.1 is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 php --version");
        $I->seeInShellOutput('PHP 7.1');
    }

    public function checkNodeVersion(UnitTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 node -v");
        $I->seeInShellOutput('v4');
    }

    public function checkNPMVersion(UnitTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 npm --version");
        $I->seeInShellOutput("2");
    }

    public function checkNodemonInstallation(UnitTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 nodemon");
        $I->seeInShellOutput('Usage: nodemon');
    }

    public function checkBowerVersion(UnitTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec qa_web_71 bower --version");
        $I->seeInShellOutput('1');
    }

    public function checkPHPModules(UnitTester $I){
            $I->wantTo("verify required php modules are available");
            $I->runShellCommand("docker exec qa_web_71 php -m");
            $I->seeInShellOutput('bcmath');
            $I->seeInShellOutput('calendar');
            $I->seeInShellOutput('Core');
            $I->seeInShellOutput('ctype');
            $I->seeInShellOutput('curl');
            $I->seeInShellOutput('date');
            $I->seeInShellOutput('dom');
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
            $I->seeInShellOutput('ssh2');
            $I->seeInShellOutput('xdebug');
            $I->seeInShellOutput('xml');
            $I->seeInShellOutput('zip');
            $I->seeInShellOutput('zlib');
    }

}
