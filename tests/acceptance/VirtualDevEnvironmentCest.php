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
//        $I->comment("Create test project into /var/www/html/OHRMStandalone/dev");
//        $I->runShellCommand("docker exec dev_web_56 bash -c 'mkdir -p /var/www/html/OHRMStandalone/dev/orangehrm-dev.orangehrm.com/symfony/web && cd /var/www/html/OHRMStandalone/dev/orangehrm-dev.orangehrm.com/symfony/web && echo test > index.html'");
//        $I->runShellCommand('docker exec dev_web_56 bash -c "echo 127.0.0.1 orangehrm-dev.orangehrm.com >> /etc/hosts"');
    }

    public function checkHeaders(AcceptanceTester $I)
    {
//        $I->comment("Verify Header values");
//
//        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k -i https://orangehrm-dev.orangehrm.com"');
//        $I->seeInShellOutput("Content-Security-Policy: default-src 'self' *.projects-abroad.net native.testing.equest.com www.youtube.com sandbox.e-signlive.com player.vimeo.com fonts.googleapis.com fonts.gstatic.com 'unsafe-inline' 'unsafe-eval';img-src * 'self' data: blob: ;font-src 'self' fonts.gstatic.com sandbox.e-signlive.com data:");
//        $I->seeInShellOutput("X-XSS-Protection: 1; mode=block");
//        $I->seeInShellOutput("X-Content-Type-Options: nosniff");
//        $I->seeInShellOutput("X-Frame-Options: SAMEORIGIN");
    }


}