<?php


class MySqlContainerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function mySqlContainerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql");
        $I->seeInShellOutput("true");
    }
}
