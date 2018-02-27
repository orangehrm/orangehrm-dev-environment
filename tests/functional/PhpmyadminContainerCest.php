<?php


class PhpmyadminContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }


    public function checkConnectionWithDB55(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db55 -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }

    public function checkConnectionWithDB57(FunctionalTester $I){
        $I->wantTo("verify mysql 5.7 container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db57 -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }

    public function checkConnectionWithDB102(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.2  container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db102 -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }
}
