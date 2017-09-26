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
        $I->seeInShellOutput('2 packets transmitted, 2 packets received');
    }

    public function checkConnectionWithDB55(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db55 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 packets received');
    }

    public function checkConnectionWithDB57(FunctionalTester $I){
        $I->wantTo("verify mysql 5.7 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db57 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 packets received');
    }

    public function checkConnectionWithDB101(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.1 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_web_71 ping db101 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 packets received');
    }
}
