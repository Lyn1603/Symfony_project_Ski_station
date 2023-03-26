<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230326142848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, piste_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image_path VARCHAR(255) NOT NULL, total_stars INT NOT NULL, star_vote_count INT NOT NULL, INDEX IDX_EB95123FC34065BC (piste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FC34065BC FOREIGN KEY (piste_id) REFERENCES pistes (id)');
        $this->addSql('ALTER TABLE pistes ADD station_id_id INT NOT NULL, ADD location VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pistes ADD CONSTRAINT FK_D536C9C427C2E161 FOREIGN KEY (station_id_id) REFERENCES stations (id)');
        $this->addSql('CREATE INDEX IDX_D536C9C427C2E161 ON pistes (station_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FC34065BC');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('ALTER TABLE pistes DROP FOREIGN KEY FK_D536C9C427C2E161');
        $this->addSql('DROP INDEX IDX_D536C9C427C2E161 ON pistes');
        $this->addSql('ALTER TABLE pistes DROP station_id_id, DROP location');
    }
}
