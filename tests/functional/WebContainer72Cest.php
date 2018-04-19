<?php
/**
 * Created by PhpStorm.
 * User: administrator
 * Date: 19/4/18
 * Time: 11:57 AM
 */

class WebContainer72Cest
{
    public function kernalSHMValue(AcceptanceTester $I)
    {
        $I->comment("Checking the shmmax value");
        $I->runShellCommand('docker exec dev_web_72 bash -c "cat /proc/sys/kernel/shmmax"');
        $I->seeInShellOutput('67371264');
    }

}