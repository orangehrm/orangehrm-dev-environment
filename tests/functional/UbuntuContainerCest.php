<?php


class UbuntuContainerCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function ContainerTest(AcceptanceTester $I){
        $I->wantTo("verify ubuntu container up and running");
        $I->runShellCommand("docker inspect -f {{.State.Running}} dev_web");
        $I->seeInShellOutput("true");
    }

    public function mysqlServerTest(AcceptanceTester $I){
        $I->wantTo("verify mysql container is linked with ubuntu container properly");
        $I->runShellCommand("docker exec dev_web ping db -c 2");
        $I->seeInShellOutput('2 packets transmitted, 2 received');
    }

//    public function mysqlServerMySalAdminTest(AcceptanceTester $I){
//        $I->wantTo("verify mysql container is linked with ubuntu container properly using mysqladmin");
//        $I->runShellCommand("docker exec dev_web mysqladmin -uroot -p1234 ping");
//        $I->seeInShellOutput('alive');
//    }

    public function apacheInstalledTest(AcceptanceTester $I){
        $I->wantTo("verify apache is installed in the container");
        $I->runShellCommand("docker exec dev_web apache2 -v");
        $I->seeInShellOutput('Server version: Apache/2.4.7');
    }

    public function apacheRunningTest(AcceptanceTester $I){
        $I->wantTo("verify apache is up and running in the container");
        $I->runShellCommand("docker exec dev_web service apache2 status");
        $I->seeInShellOutput('apache2 is running');
    }

    public function cronTest(AcceptanceTester $I){
        $I->wantTo("verify cron is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep cron");
        $I->seeInShellOutput('cron/now 3.0');
    }

    public function mysqlClientTest(AcceptanceTester $I){
        $I->wantTo("verify mysql-client is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep mysql-client");
        $I->seeInShellOutput('mysql-client/now 5.5');
    }

    public function libreOfficeTest(AcceptanceTester $I){
        $I->wantTo("verify LibreOffice is installed in the container");
        $I->runShellCommand("docker exec dev_web libreoffice --version");
        $I->seeInShellOutput('LibreOffice 4.2');
    }

    public function libpng12Test(AcceptanceTester $I){
        $I->wantTo("verify libpng12-dev is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed");
        $I->seeInShellOutput('libpng12-dev');
    }

    public function propplerUtilTest(AcceptanceTester $I){
        $I->wantTo("verify poppler-util is installed in the container");
        $I->runShellCommand("docker exec dev_web apt list --installed | grep poppler-util");
        $I->seeInShellOutput('poppler-util');
    }

    public function zipTest(AcceptanceTester $I){
        $I->wantTo("verify zip library is installed in the container");
        $I->runShellCommand("docker exec dev_web zip -v");
        $I->seeInShellOutput('Zip 3');
    }

    public function unzipTest(AcceptanceTester $I){
        $I->wantTo("verify UnZip library is installed in the container");
        $I->runShellCommand("docker exec dev_web unzip -v");
        $I->seeInShellOutput('UnZip 6');
    }

    public function phpunitTest(AcceptanceTester $I){
        $I->wantTo("verify phpunit library is installed in the container");
        $I->runShellCommand("docker exec dev_web phpunit --version");
        $I->seeInShellOutput('PHPUnit 3');
    }

    public function gitTest(AcceptanceTester $I){
        $I->wantTo("verify git is installed in the container");
        $I->runShellCommand("docker exec dev_web git --version");
        $I->seeInShellOutput('git version 1');
    }

    public function curlTest(AcceptanceTester $I){
        $I->wantTo("verify curl is installed in the container");
        $I->runShellCommand("docker exec dev_web curl --version");
        $I->seeInShellOutput('curl 7.35');
    }

    public function phpTest(AcceptanceTester $I){
        $I->wantTo("verify php 5.5 is installed in the container");
        $I->runShellCommand("docker exec dev_web php --version");
        $I->seeInShellOutput('PHP 5.5.9');
    }

    public function nodeTest(AcceptanceTester $I){
        $I->wantTo("verify node v4 is installed in the container");
        $I->runShellCommand("docker exec dev_web node -v");
        $I->seeInShellOutput('v4');
    }

    public function npmTest(AcceptanceTester $I){
        $I->wantTo("verify npm is installed in the container");
        $I->runShellCommand("docker exec dev_web npm --version");
        $I->seeInShellOutput("2");
    }

    public function nodemonTest(AcceptanceTester $I){
        $I->wantTo("verify nodemon is installed in the container");
        $I->runShellCommand("docker exec dev_web nodemon");
        $I->seeInShellOutput('Usage: nodemon');
    }

    public function bowerTest(AcceptanceTester $I){
        $I->wantTo("verify bower is installed in the container");
        $I->runShellCommand("docker exec dev_web bower --version");
        $I->seeInShellOutput('1');
    }

    public function phpXdebugTest(AcceptanceTester $I){
        $I->wantTo("verify xdebug php extension is available in the container");
        $I->runShellCommand("docker exec dev_web php -m");
        $I->seeInShellOutput('xdebug');
    }

    public function phpApcuTest(AcceptanceTester $I){
        $I->wantTo("verify apcu php extension is installed in the container");
        $I->runShellCommand("docker exec dev_web php -m");
        $I->seeInShellOutput('apcu');
    }

    public function phpJsonTest(AcceptanceTester $I){
        $I->wantTo("verify json php extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-json");
        $I->seeInShellOutput('php5-json');
    }

    public function phpMemcacheTest(AcceptanceTester $I){
        $I->wantTo("verify php5-memcache extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-memcache");
        $I->seeInShellOutput('php5-memcache');
    }

    public function phpMemcachedTest(AcceptanceTester $I){
        $I->wantTo("verify php5-memcached extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-memcached");
        $I->seeInShellOutput('php5-memcached');
    }

    public function phpMysqlTest(AcceptanceTester $I){
        $I->wantTo("verify php-mysql extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-mysql");
        $I->seeInShellOutput('php5-mysql');
    }

    public function phpMysqliTest(AcceptanceTester $I){
        $I->wantTo("verify php-mysqli extension is installed in the container");
        $I->runShellCommand("docker exec dev_web php -m");
        $I->seeInShellOutput('mysqli');
    }


    public function phpPgsqlTest(AcceptanceTester $I){
        $I->wantTo("verify php5-pgsql extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-pgsql");
        $I->seeInShellOutput('php5-pgsql');
    }

    public function phpMongoTest(AcceptanceTester $I){
        $I->wantTo("verify php5-mongo extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-mongo");
        $I->seeInShellOutput('php5-mongo');
    }

    public function phpSqliteTest(AcceptanceTester $I){
        $I->wantTo("verify php5-sqlite extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-sqlite");
        $I->seeInShellOutput('php5-sqlite');
    }

    public function phpSybaseTest(AcceptanceTester $I){
        $I->wantTo("verify php5-sybase extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-sybase");
        $I->seeInShellOutput('php5-sybase');
    }

    public function phpInterbaseTest(AcceptanceTester $I){
        $I->wantTo("verify php5-interbase extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-interbase");
        $I->seeInShellOutput('php5-interbase');
    }

    public function phpAdodbTest(AcceptanceTester $I){
        $I->wantTo("verify php5-adodb extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-adodb");
        $I->seeInShellOutput('php5-adodb');
    }

    public function phpOdbcTest(AcceptanceTester $I){
        $I->wantTo("verify php5-odbc extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-odbc");
        $I->seeInShellOutput('php5-odbc');
    }

    public function phpGearmanTest(AcceptanceTester $I){
        $I->wantTo("verify php5-gearman extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-gearman");
        $I->seeInShellOutput('php5-gearman');
    }

    public function phpMcryptTest(AcceptanceTester $I){
        $I->wantTo("verify php5-mcrypt extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-mcrypt");
        $I->seeInShellOutput('php5-mcrypt');
    }

    public function phpLdapTest(AcceptanceTester $I){
        $I->wantTo("verify php5-ldap extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-ldap");
        $I->seeInShellOutput('php5-ldap');
    }

    public function phpGmpTest(AcceptanceTester $I){
        $I->wantTo("verify php5-gmp extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-gmp");
        $I->seeInShellOutput('php5-gmp');
    }

    public function phpIntlTest(AcceptanceTester $I){
        $I->wantTo("verify php5-intl extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-intl");
        $I->seeInShellOutput('php5-intl');
    }

    public function phpGeoipTest(AcceptanceTester $I){
        $I->wantTo("verify php5-geoip extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-geoip");
        $I->seeInShellOutput('php5-geoip');
    }

    public function phpImagickTest(AcceptanceTester $I){
        $I->wantTo("verify php5-imagick extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-imagick");
        $I->seeInShellOutput('php5-imagick');
    }

    public function phpGdTest(AcceptanceTester $I){
        $I->wantTo("verify php5-gd extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-gd");
        $I->seeInShellOutput('php5-gd');
    }

    public function phpExactImageTest(AcceptanceTester $I){
        $I->wantTo("verify php5-exactimage extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-exactimage");
        $I->seeInShellOutput('php5-exactimage');
    }

    public function phpImapTest(AcceptanceTester $I){
        $I->wantTo("verify php5-imap extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-imap");
        $I->seeInShellOutput('php5-imap');
    }

    public function phpCurlTest(AcceptanceTester $I){
        $I->wantTo("verify php5-curl extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-curl");
        $I->seeInShellOutput('php5-curl');
    }

    public function phpGdcmTest(AcceptanceTester $I){
        $I->wantTo("verify php5-gdcm extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-gdcm");
        $I->seeInShellOutput('php5-gdcm');
    }

    public function phpVtkgdcmTest(AcceptanceTester $I){
        $I->wantTo("verify php5-vtkgdcm extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-vtkgdcm");
        $I->seeInShellOutput('php5-vtkgdcm');
    }

    public function phpGnupgTest(AcceptanceTester $I){
        $I->wantTo("verify php5-gnupg extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-gnupg");
        $I->seeInShellOutput('php5-gnupg');
    }

    public function phpLibrdfTest(AcceptanceTester $I){
        $I->wantTo("verify php5-librdf extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-librdf");
        $I->seeInShellOutput('php5-librdf');
    }

    public function phpMapscriptTest(AcceptanceTester $I){
        $I->wantTo("verify php5-mapscript extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-mapscript");
        $I->seeInShellOutput('php5-mapscript');
    }

    public function phpMidgardTest(AcceptanceTester $I){
        $I->wantTo("verify php5-midgard2 extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-midgard2");
        $I->seeInShellOutput('php5-midgard2');
    }

    public function phpMsgpackTest(AcceptanceTester $I){
        $I->wantTo("verify php5-msgpack extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-msgpack");
        $I->seeInShellOutput('php5-msgpack');
    }

    public function phpOauthTest(AcceptanceTester $I){
        $I->wantTo("verify php5-oauth extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-oauth");
        $I->seeInShellOutput('php5-oauth');
    }

    public function phpPinbaTest(AcceptanceTester $I){
        $I->wantTo("verify php5-pinba extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-pinba");
        $I->seeInShellOutput('php5-pinba');
    }

    public function phpRadiusTest(AcceptanceTester $I){
        $I->wantTo("verify php5-radius extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-radius");
        $I->seeInShellOutput('php5-radius');
    }

    public function phpRedisTest(AcceptanceTester $I){
        $I->wantTo("verify php5-redis extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-redis");
        $I->seeInShellOutput('php5-redis');
    }

    public function phpRemctlTest(AcceptanceTester $I){
        $I->wantTo("verify php5-remctl extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-remctl");
        $I->seeInShellOutput('php5-remctl');
    }

    public function phpSaslTest(AcceptanceTester $I){
        $I->wantTo("verify php5-sasl extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-sasl");
        $I->seeInShellOutput('php5-sasl');
    }

    public function phpStompTest(AcceptanceTester $I){
        $I->wantTo("verify php5-stomp extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-stomp");
        $I->seeInShellOutput('php5-stomp');
    }

    public function phpSvnTest(AcceptanceTester $I){
        $I->wantTo("verify php5-svn extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-svn");
        $I->seeInShellOutput('php5-svn');
    }

    public function phpTokyoTyrantTest(AcceptanceTester $I){
        $I->wantTo("verify php5-tokyo-tyrant extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-tokyo-tyrant");
        $I->seeInShellOutput('php5-tokyo-tyrant');
    }

    public function phpRrdTest(AcceptanceTester $I){
        $I->wantTo("verify php5-rrd extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-rrd");
        $I->seeInShellOutput('php5-rrd');
    }

    public function phpPsTest(AcceptanceTester $I){
        $I->wantTo("verify php5-ps extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-ps");
        $I->seeInShellOutput('php5-ps');
    }

    public function phpMingTest(AcceptanceTester $I){
        $I->wantTo("verify php5-ming extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-ming");
        $I->seeInShellOutput('php5-ming');
    }

    public function phpLassoTest(AcceptanceTester $I){
        $I->wantTo("verify php5-lasso extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-lasso");
        $I->seeInShellOutput('php5-lasso');
    }

    public function phpEnchantTest(AcceptanceTester $I){
        $I->wantTo("verify php5-enchant extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-enchant");
        $I->seeInShellOutput('php5-enchant');
    }

    public function phpXslTest(AcceptanceTester $I){
        $I->wantTo("verify php5-xsl extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-xsl");
        $I->seeInShellOutput('php5-xsl');
    }

    public function phpXmlrpcTest(AcceptanceTester $I){
        $I->wantTo("verify php5-xmlrpc extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-xmlrpc");
        $I->seeInShellOutput('php5-xmlrpc');
    }

    public function phpTidyTest(AcceptanceTester $I){
        $I->wantTo("verify php5-tidy extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-tidy");
        $I->seeInShellOutput('php5-tidy');
    }

    public function phpRecodeTest(AcceptanceTester $I){
        $I->wantTo("verify php5-recode extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-recode");
        $I->seeInShellOutput('php5-recode');
    }

    public function phpReadlineTest(AcceptanceTester $I){
        $I->wantTo("verify php5-readline extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-readline");
        $I->seeInShellOutput('php5-readline');
    }

    public function phpPspellTest(AcceptanceTester $I){
        $I->wantTo("verify php5-pspell extension is installed in the container");
        $I->runShellCommand("docker exec dev_web dpkg --get-selections | grep -v deinstall | grep php5-pspell");
        $I->seeInShellOutput('php5-pspell');
    }

    public function phpPearTest(AcceptanceTester $I){
        $I->wantTo("verify php5-pear extension is installed in the container");
        $I->runShellCommand("docker exec dev_web pear -V");
        $I->seeInShellOutput('PEAR Version: 1');
    }
}
