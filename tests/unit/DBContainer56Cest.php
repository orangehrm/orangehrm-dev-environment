<?php


class DBContainer56Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify mysql 5.6 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql_56");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(UnitTester $I){
//        $I->wantTo("verify mysql 5.6 service is up and running");
//        $I->runShellCommand("ping -c 30 localhost");
//        $I->runShellCommand("docker exec dev_mysql_56 mysqladmin -uroot -p1234 status");
//        $I->seeInShellOutput("Uptime");
    }

    public function checkMySQLConfigurations(UnitTester $I){
        $I->wantTo("verify my.cnf configuration is loaded");
        $I->runShellCommand("docker exec dev_mysql_56 mysql -uroot -p1234 -e \"show global variables like '%event_scheduler%'\"");
        $I->seeInShellOutput("ON");
        $I->runShellCommand("docker exec dev_mysql_56 mysql -uroot -p1234 -e \"show global variables like '%innodb_log_buffer_size%'\"");
        $I->seeInShellOutput("8388608");
        $I->runShellCommand("docker exec dev_mysql_56 mysql -uroot -p1234 -e \"show global variables like '%innodb_buffer_pool_size%'\"");
        $I->seeInShellOutput("2147483648");
        $I->runShellCommand("docker exec dev_mysql_56 mysql -uroot -p1234 -e \"show global variables like 'max_allowed_packet'\"");
        $I->seeInShellOutput("67108864");
    }

}
