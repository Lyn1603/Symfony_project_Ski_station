<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326142921 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pistes ADD CONSTRAINT FK_D536C9C427C2E161 FOREIGN KEY (station_id_id) REFERENCES stations (id)');
        $this->addSql('CREATE INDEX IDX_D536C9C427C2E161 ON pistes (station_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pistes DROP FOREIGN KEY FK_D536C9C427C2E161');
        $this->addSql('DROP INDEX IDX_D536C9C427C2E161 ON pistes');
    }
}
