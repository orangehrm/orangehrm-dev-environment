<?php


class PhpmyadminContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerRunning(UnitTester $I){
        $I->wantTo("verify phpmyadmin container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_phpmyadmin");
        $I->seeInShellOutput("true");
    }


}
