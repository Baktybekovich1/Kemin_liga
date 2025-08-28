<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250925104047 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE division (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE player (id SERIAL NOT NULL, team_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) DEFAULT NULL, inn VARCHAR(255) DEFAULT NULL, img TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_98197A65296CD8AE ON player (team_id)');
        $this->addSql('CREATE TABLE team (id SERIAL NOT NULL, division_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, logo TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C4E0A61F41859289 ON team (division_id)');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F41859289 FOREIGN KEY (division_id) REFERENCES division (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A65296CD8AE');
        $this->addSql('ALTER TABLE team DROP CONSTRAINT FK_C4E0A61F41859289');
        $this->addSql('DROP TABLE division');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE team');
    }
}
