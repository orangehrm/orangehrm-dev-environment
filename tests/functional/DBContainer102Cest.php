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
        $I->runShellCommand("docker exec dev_mariadb_102 ping db102 -c 1");
        $I->seeInShellOutput('64 bytes from 10.5.0.7: icmp_seq=0 ttl=64');
    }

}
