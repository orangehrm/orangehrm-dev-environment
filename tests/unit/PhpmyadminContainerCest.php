<?php


class PhpmyadminContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkContainerRunning(AcceptanceTester $I){
        $I->wantTo("verify phpmyadmin container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} qa_phpmyadmin");
        $I->seeInShellOutput("true");
    }


}
