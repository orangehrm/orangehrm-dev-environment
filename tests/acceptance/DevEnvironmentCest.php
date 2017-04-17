<?php


class DevEnvironmentCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->comment("Cloning project into /var/www/html");
        $I->runShellCommand("docker exec dev_web_7 git clone https://github.com/ChanakaR/php-simple.git /var/www/html/php-simple");
        $I->runShellCommand('docker exec dev_web_7 chmod 777 -R /var/www/html');
    }

    public function _after(AcceptanceTester $I)
    {
        $I->comment("remove the project directory from /var/www/html");
        $I->runShellCommand('docker exec dev_web_7 rm -rf /var/www/html/php-simple');
    }

    public function devWebTest(AcceptanceTester $I){
        $I->wantTo("verify dev environment is working properly with a php application");
        $I->runShellCommand("docker exec dev_web_7 php /var/www/html/php-simple/app.php");
        $I->cantSeeInShellOutput("false");
    }
}
