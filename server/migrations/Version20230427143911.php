<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230427143911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE player_player_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE role_role_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE player (player_id INT NOT NULL, role_id INT NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, background_color VARCHAR(255) NOT NULL, foreground_color VARCHAR(255) NOT NULL, PRIMARY KEY(player_id))');
        $this->addSql('CREATE INDEX IDX_98197A65D60322AC ON player (role_id)');
        $this->addSql('CREATE TABLE role (role_id INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(role_id))');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_98197A65D60322AC FOREIGN KEY (role_id) REFERENCES role (role_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE player_player_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE role_role_id_seq CASCADE');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A65D60322AC');
        $this->addSql('DROP TABLE player');
        $this->addSql('DROP TABLE role');
    }
}
