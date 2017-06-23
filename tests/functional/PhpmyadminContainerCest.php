<?php


class PhpmyadminContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }


    public function checkConnectionWithDB(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }


}
