<?php


class DBContainer57Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function checkContainerRunning(AcceptanceTester $I){
        $I->wantTo("verify mysql 5.7 container is up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} qa_mysql_57");
        $I->seeInShellOutput("true");
    }

    public function checkMySQLServiceIsRunning(AcceptanceTester $I){
        $I->wantTo("verify mysql 5.7 service is up and running");
        $I->runShellCommand("ping -c 30 localhost");
        $I->runShellCommand("docker exec qa_mysql_55 mysqladmin -uroot -p1234 status");
        $I->seeInShellOutput("Uptime");
    }

    public function checkMySQLConfigurations(AcceptanceTester $I){
        $I->wantTo("verify my.cnf configuration is loaded");
        $I->runShellCommand("docker exec qa_mysql_57 mysql -uroot -p1234 -se 'show variables'");
        $I->seeInShellOutput("event_scheduler	ON");
        $I->seeInShellOutput("innodb_log_buffer_size	8388608");
        $I->seeInShellOutput("innodb_buffer_pool_size	2147483648");
        $I->seeInShellOutput("max_allowed_packet	100663296");
    }


}
