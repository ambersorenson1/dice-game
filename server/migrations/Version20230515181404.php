<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230515181404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE player DROP CONSTRAINT fk_98197a65e48fd905');
        $this->addSql('DROP INDEX idx_98197a65e48fd905');
        $this->addSql('ALTER TABLE player DROP game_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player ADD game_id INT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT fk_98197a65e48fd905 FOREIGN KEY (game_id) REFERENCES game (game_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_98197a65e48fd905 ON player (game_id)');
    }
}
