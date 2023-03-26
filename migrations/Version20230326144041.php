<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326144041 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trail ADD station_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trail ADD CONSTRAINT FK_B268858F21BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('CREATE INDEX IDX_B268858F21BDB235 ON trail (station_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trail DROP FOREIGN KEY FK_B268858F21BDB235');
        $this->addSql('DROP INDEX IDX_B268858F21BDB235 ON trail');
        $this->addSql('ALTER TABLE trail DROP station_id');
    }
}
