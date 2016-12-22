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

//    public function phpmyadminLinkTest(AcceptanceTester $I){
//        $I->wantTo("verify that phpmyadmin is linked with mysql container properly");
//        $I->amOnPage("/");
//        $I->fillField('pma_username','root');
//        $I->fillField('pma_password','1234');
//        $I->click('Go');
//        $I->seeInCurrentUrl('/index.php?token');
//    }
}
