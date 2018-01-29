<?php
/**
 * Created by PhpStorm.
 * User: yelloflash
 * Date: 11/29/17
 * Time: 5:27 PM
 */

class VirtualOsEnvironmentCest
{
    public function installApp(AcceptanceTester $I)
    {
        $I->comment("Cloning project into /var/www/html/OHRMStandalone/opensource");
        $I->runShellCommand('docker exec dev_web_56 bash -c "cd /var/www/html/OHRMStandalone/opensource/ && mkdir -p orangehrm-os.orangehrmdev.com && cd orangehrm-os.orangehrmdev.com && echo test > index.html"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "echo 127.0.0.1 orangehrm-os.orangehrmdev.com >> /etc/hosts && cat /etc/hosts"');
    }

    public function checkHeaders(AcceptanceTester $I)
    {
        $I->comment("Verify Header values");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v -i -k https://orangehrm-os.orangehrmdev.com"');
        $I->seeInShellOutput("Content-Security-Policy: default-src 'self' *.projects-abroad.net native.testing.equest.com www.youtube.com sandbox.e-signlive.com player.vimeo.com fonts.googleapis.com fonts.gstatic.com 'unsafe-inline' 'unsafe-eval' data: blob:;img-src * 'self' data: blob: ;font-src 'self' fonts.gstatic.com sandbox.e-signlive.com data:");
        $I->seeInShellOutput("X-XSS-Protection: 1; mode=block");
        $I->seeInShellOutput("X-Content-Type-Options: nosniff");
        $I->seeInShellOutput("X-Frame-Options: SAMEORIGIN");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k https://orangehrm-os.orangehrmdev.com"');
        $I->seeInShellOutput("test");

    }

}