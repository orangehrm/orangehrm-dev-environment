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


    public function mySqlContainerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql");
        $I->seeInShellOutput("true");
    }

    public function phpmyadminContainerTest(AcceptanceTester $I){
        $I->wantTo("verify phpmyadmin container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_phpmyadmin");
        $I->seeInShellOutput("true");
    }

//    public function phpmyadminLinkTest(AcceptanceTester $I){
//        $I->wantTo("verify that phpmyadmin is linked with mysql container properly");
//        $I->amOnPage("/");
//        $I->fillField('username','root');
//        $I->fillField('password','1234');
//        $I->click('Go');
//        $I->seeInCurrentUrl('/index.php?token');
//    }

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

    public function nodeTest(AcceptanceTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web node -v");
        $I->seeInShellOutput('v4');
    }

    public function mysqlServerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql server container is linked properly");
        $I->runShellCommand("docker exec dev_web ping db -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }
}
