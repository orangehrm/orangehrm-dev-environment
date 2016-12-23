<?php


class PhpmyadminContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function ContainerTest(AcceptanceTester $I){
        $I->wantTo("verify phpmyadmin container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_phpmyadmin");
        $I->seeInShellOutput("true");
    }

    public function mysqlServerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }
}
