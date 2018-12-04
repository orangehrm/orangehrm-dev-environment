<?php


class DevEnvironmentCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->comment("Cloning project into /var/www/html");
        $I->runShellCommand("docker exec dev_web_56 git clone https://github.com/Nipuna-Sankalpa/php-simple.git /var/www/html/php-simple");
        $I->runShellCommand('docker exec dev_web_56 chmod 777 -R /var/www/html');
    }

    public function _after(AcceptanceTester $I)
    {
        $I->comment("remove the project directory from /var/www/html");
        $I->runShellCommand('docker exec dev_web_56 rm -rf /var/www/html/php-simple');
    }

    public function devWebTest(AcceptanceTester $I){
        $I->wantTo("verify dev environment is working properly with a php application");
        $I->runShellCommand("docker exec dev_web_56 bash /etc/mysql/db-check.sh");
//        $I->runShellCommand("docker exec dev_web_56 php /var/www/html/php-simple/app.php");
        $I->canSeeInShellOutput("connection!!!");
        $I->cantSeeInShellOutput("false");
    }
}
