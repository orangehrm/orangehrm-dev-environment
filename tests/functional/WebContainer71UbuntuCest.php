<?php
/**
 * Created by PhpStorm.
 * User: yelloflash
 * Date: 12/3/18
 * Time: 6:53 PM
 */

namespace tests\functional;


class WebContainer71UbuntuCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkConnectionWithOpenldap(FunctionalTester $I){
        $I->wantTo("verify open ldap container is linked with php 7.1 ubuntu container properly");
        $I->runShellCommand("docker exec dev_ubuntu_web_71 ping openldap -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function checkConnectionWithDB102(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.2 container is linked with php 7.1 container properly");
        $I->runShellCommand("docker exec dev_ubuntu_web_71 ping db102 -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

}