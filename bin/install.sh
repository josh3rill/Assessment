
#!/bin/bash
clear


echo "DELETING DATABASE"

php bin/console doctrine:database:drop --if-exists --force

echo "CREATING DATABASE"

php bin/console doctrine:database:create --if-not-exists

echo "CREATING DATABASE SCHEMA"

php bin/console doctrine:schema:update --force --dump-sql



echo "DELETING DATABASE TEST_DB"


bbb
php bin/console --env=test doctrine:database:drop --if-exists --force

echo "CREATING DATABASE TEST_DB"

php bin/console --env=test doctrine:database:create --if-not-exists

echo "CREATING DATABASE SCHEMA TEST_DB"

php bin/console --env=test doctrine:schema:update --force --dump-sql




echo "LOADING FIXTURES"

echo "Y" | php bin/console doctrine:fixtures:load --env=test

echo "INSTALLATION FINISHED"
