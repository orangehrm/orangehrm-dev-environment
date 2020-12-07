<?php


class DevEnvironmentCest
{
    public function _before(AcceptanceTester $I)
    {
        $I->comment("Cloning project into /var/www/html");
        $I->runShellCommand("docker exec dev_web git clone https://github.com/ChanakaR/php-simple.git /var/www/html/php-simple");
        $I->runShellCommand('docker exec dev_web chmod 777 -R /var/www/html');
    }

    public function _after(AcceptanceTester $I)
    {
        $I->comment("remove the project directory from /var/www/html");
        $I->runShellCommand('docker exec dev_web rm -rf /var/www/html/php-simple');
    }

    public function devWebTest(AcceptanceTester $I){
        $I->wantTo("verify dev environment is working properly with a php application");
        $I->runShellCommand("ping -c 30 localhost");
        $I->runShellCommand("docker exec dev_web php /var/www/html/php-simple/app.php");
        $I->cantSeeInShellOutput("false");
    }

    public function oci8Test(AcceptanceTester $I){
        $I->wantTo("verify dev environment is working properly with a php application");
        $I->runShellCommand("docker exec dev_web php -i | grep -i oci");
        $I->seeInShellOutput('OCI8 Version => 2.2.0');
    }
}
