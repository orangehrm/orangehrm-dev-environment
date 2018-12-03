<?php


class DBContainerCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify mysql 10.2 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(UnitTester $I){
        $I->wantTo("verify mysql 10.2 service is up and running");
        $I->runShellCommand("ping -c 30 localhost");
        $I->runShellCommand("docker exec dev_mysql mysqladmin -uroot -p1234 status");
        $I->seeInShellOutput("Uptime");
    }


}
