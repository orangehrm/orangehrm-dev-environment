<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 22/1/18
 * Time: 5:06 PM
 */

class VirtualDevEnvironmentIndexCest
{
    public function installationForDev56(AcceptanceTester $I)
    {
        $I->comment("Create projects into test and opensource ");
        $I->runShellCommand("docker exec dev_web_56 bash -c 'mkdir -p /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && cd /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && echo NewTestDirectory > index.html'");
        $I->runShellCommand('docker exec dev_web_56 bash -c "mkdir -p /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && cd /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && echo NewOsDirectory > index.html" ');
        $I->runShellCommand('docker exec dev_web_56 bash -c "echo 127.0.0.1 index-test.orangehrmdev.com >> /etc/hosts"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "echo 127.0.0.1 index-os.orangehrmdev.com >> /etc/hosts"');

    }

    public function installationForDev70(AcceptanceTester $I)
    {
        $I->comment("Create projects into test and opensource ");
        $I->runShellCommand("docker exec dev_web_70 bash -c 'mkdir -p /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && cd /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && echo NewTestDirectory > index.html'");
        $I->runShellCommand('docker exec dev_web_70 bash -c "mkdir -p /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && cd /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && echo NewOsDirector > index.html" ');
        $I->runShellCommand('docker exec dev_web_70 bash -c "echo 127.0.0.1 index-test.orangehrmdev.com >> /etc/hosts"');
        $I->runShellCommand('docker exec dev_web_70 bash -c "echo 127.0.0.1 index-os.orangehrmdev.com >> /etc/hosts"');
    }

    public function installationForDev71(AcceptanceTester $I)
    {
        $I->comment("Create projects into test and opensource ");
        $I->runShellCommand("docker exec dev_web_71 bash -c 'mkdir -p /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && cd /var/www/html/OHRMStandalone/test/index-test.orangehrmdev.com/symfony/web && echo NewTestDirectory > index.html'");
        $I->runShellCommand('docker exec dev_web_71 bash -c "mkdir -p /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && cd /var/www/html/OHRMStandalone/opensource/index-os.orangehrmdev.com && echo NewOsDirector > index.html" ');
        $I->runShellCommand('docker exec dev_web_71 bash -c "echo 127.0.0.1 index-test.orangehrmdev.com >> /etc/hosts"');
        $I->runShellCommand('docker exec dev_web_71 bash -c "echo 127.0.0.1 index-os.orangehrmdev.com >> /etc/hosts"');

    }


    public function checkTheDevelopmentEnvironment(AcceptanceTester $I)
    {
        $I->comment("Check the new development environment 56");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v -k -i https://index-test.orangehrmdev.com"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v -k -i https://index-os.orangehrmdev.com"');
    }

    public function checkTheDevelopmentEnvironmentForDev70(AcceptanceTester $I)
    {
        $I->comment("Check the new development environment 70");

        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v -k -i https://index-test.orangehrmdev.com"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "curl -v -k -i https://index-os.orangehrmdev.com"');

    }

    public function checkTheDevelopmentEnvironmentForDev71(AcceptanceTester $I)
    {
        $I->comment("Check the new development environment 71");

        $I->runShellCommand('docker exec dev_web_71 bash -c "curl -v -k -i https://index-test.orangehrmdev.com"');
        $I->runShellCommand('docker exec dev_web_71 bash -c "curl -v -k -i https://index-os.orangehrmdev.com"');

    }

    public function upto(AcceptanceTester $I){}
}