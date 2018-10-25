<?php


class DBContainer102Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function MariaDBTest(FunctionalTester $I){
        $I->wantTo("verify mariadb 10.2  container is working properly");
        $I->runShellCommand("docker exec dev_web_71 ping db102 -c 1");
        $I->seeInShellOutput('64 bytes from dev_mariadb_102.orangehrm-dev-environment_ohrmdevnet (10.5.0.7): icmp_seq=1 ttl=64');
    }

}
