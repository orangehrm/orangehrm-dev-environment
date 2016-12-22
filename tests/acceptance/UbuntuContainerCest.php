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

    public function mysqlServerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is linked with ubuntu container properly");
        $I->runShellCommand("docker exec dev_web ping db -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

    public function nodeTest(AcceptanceTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web node -v");
        $I->seeInShellOutput('v4');
    }

    public function npmTest(AcceptanceTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web npm --version");
        $I->seeInShellOutput("2");
    }

    public function nodemonTest(AcceptanceTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web nodemon");
        $I->seeInShellOutput('Usage: nodemon');
    }

    public function bowerTest(AcceptanceTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web bower --version");
        $I->seeInShellOutput('1');
    }

    public function phpTest(AcceptanceTester $I){
        $I->wantTo("verify php 5.5 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 5.5.9');
    }




}
