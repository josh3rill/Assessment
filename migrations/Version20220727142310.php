<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220727142310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log_entires ADD service_names VARCHAR(255) NOT NULL, ADD start_date VARCHAR(255) NOT NULL, ADD status_code VARCHAR(255) NOT NULL, DROP service_name, DROP date, DROP request_status');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log_entires ADD service_name VARCHAR(255) NOT NULL, ADD date VARCHAR(255) NOT NULL, ADD request_status VARCHAR(255) NOT NULL, DROP service_names, DROP start_date, DROP status_code');
    }
}
