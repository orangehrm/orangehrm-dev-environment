<?php


class DBContainer56Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function MySQL56Test(FunctionalTester $I){
        $I->wantTo("verify mariadb 5.6  container is working properly");
        $I->runShellCommand("docker exec dev_web_71 ping db56 -c 1");
        $I->seeInShellOutput('ttl=64');
    }


}
