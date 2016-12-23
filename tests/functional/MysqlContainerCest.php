<?php


class MysqlContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function mySqlContainerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql");
        $I->seeInShellOutput("true");
    }
}
