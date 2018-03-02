<?php


class DBContainer102Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerRunning(UnitTester $I){
        $I->wantTo("verify mariadb 10.2 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mariadb_102");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(UnitTester $I){
        $I->wantTo("verify mariadb 10.2 service is up and running");
        $I->runShellCommand("ping -c 30 localhost");
        $I->runShellCommand("docker exec dev_mariadb_102 mysqladmin -uroot -p1234 status");
        $I->seeInShellOutput("Uptime");
    }

    public function checkMySQLConfigurations(UnitTester $I){
        $I->wantTo("verify my.cnf configuration is loaded");
        $I->runShellCommand("docker exec dev_mariadb_102 mysql -uroot -p1234 -se 'show variables'");
        $I->seeInShellOutput("event_scheduler	ON");
        $I->seeInShellOutput("innodb_log_buffer_size	8388608");
        $I->seeInShellOutput("innodb_buffer_pool_size	2147483648");
        $I->seeInShellOutput("max_allowed_packet	100663296");
    }


}
