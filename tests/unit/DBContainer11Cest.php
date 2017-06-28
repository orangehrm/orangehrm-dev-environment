<?php


class DBContainer11Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerRunning(UnitTester $I){
        $I->wantTo("verify Oracle 11.2 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_oracle_11");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(UnitTester $I){
        $I->wantTo("verify Oracle service is up and running");
        $I->runShellCommand("ping -c 30 localhost");
        $I->runShellCommand("docker exec dev_oracle_11 ps aux | grep pmon");
        $I->seeInShellOutput("xe_pmon_XE");
    }


}
