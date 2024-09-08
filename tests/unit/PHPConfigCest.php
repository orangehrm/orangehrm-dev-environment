<?php

class PHPConfigCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    public function checkPHPConfig_expose_php(UnitTester $I){
        $I->wantTo("verify the config - expose_php = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep expose_php");
        $I->canSeeInShellOutput("expose_php => Off");
    }

    public function checkPHPConfig_enable_dl(UnitTester $I){
        $I->wantTo("verify the config - enable_dl = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep enable_dl");
        $I->canSeeInShellOutput("enable_dl => Off");
    }

    public function checkPHPConfig_allow_url_fopen(UnitTester $I){
        $I->wantTo("verify the config - allow_url_fopen = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep allow_url_fopen");
        $I->canSeeInShellOutput("allow_url_fopen => Off");
    }

    public function checkPHPConfig_allow_url_include(UnitTester $I){
        $I->wantTo("verify the config - allow_url_include = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep allow_url_include");
        $I->canSeeInShellOutput("allow_url_include => Off");
    }

    public function checkPHPConfig_display_errors(UnitTester $I){
        $I->wantTo("verify the config - display_errors = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep display_errors");
        $I->canSeeInShellOutput("display_errors => Off");
    }

    public function checkPHPConfig_post_max_size(UnitTester $I){
        $I->wantTo("verify the config - post_max_size = 50M");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('post_max_size');\"");
        $I->canSeeInShellOutput("50M");
    }

    public function checkPHPConfig_session_cookie_secure(UnitTester $I){
        $I->wantTo("verify the config - session.cookie_secure = 1");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('session.cookie_secure');\"");
        $I->canSeeInShellOutput("1");
    }

    public function checkPHPConfig_upload_max_filesize(UnitTester $I){
        $I->wantTo("verify the config - upload_max_filesize = 50M");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('upload_max_filesize');\"");
        $I->canSeeInShellOutput("50M");
    }

    public function checkPHPConfig_memory_limit(UnitTester $I){
        $I->wantTo("verify the config - memory_limit = 2560M");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('memory_limit');\"");
        $I->canSeeInShellOutput("2560M");
    }

    public function checkPHPConfig_max_input_vars(UnitTester $I){
        $I->wantTo("verify the config - max_input_vars = 1500");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('max_input_vars');\"");
        $I->canSeeInShellOutput("1500");
    }

    public function checkPHPConfig_short_open_tag(UnitTester $I){
        $I->wantTo("verify the config - short_open_tag = OFF");
        $I->runShellCommand("docker exec dev_web_rhel php -i | grep short_open_tag");
        $I->canSeeInShellOutput("short_open_tag => Off");
    }

    public function checkPHPConfig_date_timezone(UnitTester $I){
        $I->wantTo("verify the config - date.timezone = Asia/Colombo");
        $I->runShellCommand("docker exec dev_web_rhel php -r \"echo ini_get('date.timezone');\"");
        $I->canSeeInShellOutput("Asia/Colombo");
    }
}