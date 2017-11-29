<?php
/**
 * Created by PhpStorm.
 * User: yelloflash
 * Date: 11/29/17
 * Time: 3:26 PM
 */

class VirtualDevEnvironmentCest
{
    public function installApp(AcceptanceTester $I)
    {
        $I->comment("Cloning project into /var/www/html/OHRMStandalone/dev");
        $I->runShellCommand('docker exec dev_web_56 bash -c "mkdir -p OHRMStandalone/dev/orangehrm-dev.orangehrm.com && echo '.'"test html"'.' > index.html"');
        $I->runShellCommand('docker exec dev_web_56 -c "echo '.'"127.0.0.1    orangehrm-dev.orangehrm.com"'.' >> /etc/hosts"');
    }

    public function checkHeaders(AcceptanceTester $I)
    {
        $I->comment("Verify Header values");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k -i https://orangehrm-dev.orangehrm.com | grep Content-Security-Policy"');
        $I->seeInShellOutput("Content-Security-Policy: default-src 'self' *.projects-abroad.net native.testing.equest.com www.youtube.com sandbox.e-signlive.com player.vimeo.com fonts.googleapis.com fonts.gstatic.com 'unsafe-inline' 'unsafe-eval';img-src * 'self' data: blob: ;font-src 'self' fonts.gstatic.com sandbox.e-signlive.com data:");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k -i https://orangehrm-dev.orangehrm.com | grep X-XSS-Protection"');
        $I->seeInShellOutput("X-XSS-Protection: 1; mode=block");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k -i https://orangehrm-dev.orangehrm.com | grep X-Content-Type-Options"');
        $I->seeInShellOutput("X-Content-Type-Options: nosniff");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k -i https://orangehrm-dev.orangehrm.com | grep X-Frame-Options"');
        $I->seeInShellOutput("X-Frame-Options: SAMEORIGIN");
    }

    public function cleanup(AcceptanceTester $I)
    {
        $I->comment("remove the project directory from /var/www/html/OHRMStandalone/dev");
        $I->runShellCommand('docker exec dev_web_56 rm -rf OHRMStandalone/dev/orangehrm-dev.orangehrm.com');

    }

}