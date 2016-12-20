<?php

class UbuntuContainerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function ContainerTest(AcceptanceTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web");
        $I->seeInShellOutput("true");
    }

    public function phpTest(AcceptanceTester $I){
        $I->wantTo("verify php 5.5 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 5.5.9');
    }
}
