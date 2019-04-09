<?php


class WebContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }


    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify nginx container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_nginx");
        $I->seeInShellOutput("true");
    }

}
