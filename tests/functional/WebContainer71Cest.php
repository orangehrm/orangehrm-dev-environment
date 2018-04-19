<?php


class WebContainer71Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkConnectionWithOpenldap(FunctionalTester $I){
        $I->wantTo("verify open ldap container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping openldap -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB55(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db55 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB57(FunctionalTester $I){
        $I->wantTo("verify mysql 5.7 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db57 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB102(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.2 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db102 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function kernalSHMValue(AcceptanceTester $I)
    {
        $I->comment("Checking the shmmax value");
        $I->runShellCommand('docker exec dev_web_71 bash -c "cat /proc/sys/kernel/shmmax"');
        $I->seeInShellOutput('67371264');
    }
}
