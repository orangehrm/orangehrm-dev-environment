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
        $I->runShellCommand('docker exec dev_web_56 bash -c "mkdir -p /var/www/html/OHRMStandalone/opensource/orangehrm-os.orangehrm.com && echo test > /var/www/html/OHRMStandalone/opensource/orangehrm-os.orangehrm.com/index.html"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "echo 127.0.0.1    orangehrm-os.orangehrm.com >> /etc/hosts"');
    }

    public function checkHeaders(AcceptanceTester $I)
    {
        $I->comment("Verify Header values");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v https://orangehrm-os.orangehrm.com"');
//        $I->seeInShellOutput("Content-Security-Policy: default-src 'self' *.projects-abroad.net native.testing.equest.com www.youtube.com sandbox.e-signlive.com player.vimeo.com fonts.googleapis.com fonts.gstatic.com 'unsafe-inline' 'unsafe-eval';img-src * 'self' data: blob: ;font-src 'self' fonts.gstatic.com sandbox.e-signlive.com data:");
//        $I->seeInShellOutput("X-XSS-Protection: 1; mode=block");
//        $I->seeInShellOutput("X-Content-Type-Options: nosniff");
//        $I->seeInShellOutput("X-Frame-Options: SAMEORIGIN");
//
//        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -k https://orangehrm-os.orangehrm.com"');
//        $I->seeInShellOutput("test");

        $I->runShellCommand('docker exec dev_web_56 bash -c "cat /etc/hosts"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "ls /etc/httpd/sites-enabled/"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "cat /etc/httpd/sites-enabled/os.conf"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "service httpd restart"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "service httpd status -l"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "ls /var/log/httpd/OHRMStandalone"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "cd /var/log/httpd/OHRMStandalone/opensource/ && cat %0-error.log && cat %0-access.log"');
    }

}