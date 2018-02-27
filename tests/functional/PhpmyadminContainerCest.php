<?php


class PhpmyadminContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }


    public function checkConnectionWithDB(FunctionalTester $I){
        $I->wantTo("verify mysql 5.5 container is linked with phpmyadmin container properly");
        $I->runShellCommand("docker exec dev_phpmyadmin ping db -c 1");
        $I->seeInShellOutput('1 packets transmitted, 1 packets received');
    }

    public function checkAstExtention(FunctionalTester $I){
        $I->wantTo("verify ast extention");
        $I->runShellCommand("docker exec dev_web bash -c 'php -m | grep ast'");
        $I->seeInShellOutput('ast');
    }

    public function checkPhanExtention(FunctionalTester $I){
        $I->wantTo('Verify the phan');
        $I->runShellCommand("docker exec dev_web bash -c 'phan -v | grep Phan'");
        $I->seeInShellOutput('Phan');
    }


}
