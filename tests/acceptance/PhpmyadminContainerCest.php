<?php


class PhpmyadminContainerCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
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

//    public function phpmyadminLinkTest(AcceptanceTester $I){
//        $I->wantTo("verify that phpmyadmin is linked with mysql container properly");
//        $I->amOnPage("/");
//        $I->fillField('pma_username','root');
//        $I->fillField('pma_password','1234');
//        $I->click('Go');
//        $I->seeInCurrentUrl('/index.php?token');
//    }
}
