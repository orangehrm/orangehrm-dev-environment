<?php


class WebContainer56Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkConnectionWithOpenldap(FunctionalTester $I){
        $I->wantTo("verify openldap container is linked with php 5.6 container properly");
        $I->runShellCommand("docker exec dev_web_56 ping openldap -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }
    public function checkConnectionWithDB55(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with php 5.6 container properly");
        $I->runShellCommand("docker exec dev_web_56 ping db55 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB57(FunctionalTester $I){
        $I->wantTo("verify mysql 5.7 container is linked with php 5.6 container properly");
        $I->runShellCommand("docker exec dev_web_56 ping db57 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB102(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.1 container is linked with php 5.6 container properly");
        $I->runShellCommand("docker exec dev_web_56 ping db102 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB11(FunctionalTester $I){
        $I->wantTo("verify Oracle 11.2 container is linked with php 5.6 container properly");
        $I->runShellCommand("docker exec dev_web_56 ping db11 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }
}
