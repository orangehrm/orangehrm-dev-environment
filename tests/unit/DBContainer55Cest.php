<?php


class DBContainer55Cest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkContainerIsRunning(UnitTester $I){
        $I->wantTo("verify mysql 5.5 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_mysql_55");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(UnitTester $I){
        $I->wantTo("verify mysql 5.5 service is up and running");
        $I->runShellCommand("ping -c 60 localhost");
        $I->runShellCommand("docker exec dev_mysql_55 mysqladmin -uroot -p1234 status");
        $I->seeInShellOutput("Uptime");
    }

    public function checkMySQLConfigurations(UnitTester $I){
        $I->wantTo("verify my.cnf configuration is loaded");
        $I->runShellCommand("docker exec dev_mysql_55 mysql -uroot -p1234 -e \"show global variables like '%event_scheduler%'\"");
        $I->seeInShellOutput("ON");
        $I->runShellCommand("docker exec dev_mysql_55 mysql -uroot -p1234 -e \"show global variables like '%innodb_log_buffer_size%'\"");
        $I->seeInShellOutput("8388608");
        $I->runShellCommand("docker exec dev_mysql_55 mysql -uroot -p1234 -e \"show global variables like '%innodb_buffer_pool_size%'\"");
        $I->seeInShellOutput("1073741824");
        $I->runShellCommand("docker exec dev_mysql_55 mysql -uroot -p1234 -e \"show global variables like '%max_allowed_packet%'\"");
        $I->seeInShellOutput("100663296");
    }



}
