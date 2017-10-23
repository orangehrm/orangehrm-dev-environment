<?php


class DBContainer55Cest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    public function App(FunctionalTester $I)
    {
        $I->comment("test rabbit mq server");
        $I->runShellCommand('docker exec dev_web_56 bash -c " composer install"');
        $I->runShellCommand('docker exec dev_web_56 bash -c "php send.php"');
        $I->runShellCommand('docker exec phantom_web bash -c "php recieve.php"');
        $I->seeInShellOutput('Hello World!');
    }




}
