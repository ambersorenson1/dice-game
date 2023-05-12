<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512170810 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE roll_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE round_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game (game_id INT NOT NULL, player_one_id INT NOT NULL, player_two_id INT NOT NULL, player_one_score VARCHAR(500) DEFAULT NULL, player_two_score VARCHAR(500) DEFAULT NULL, PRIMARY KEY(game_id))');
        $this->addSql('CREATE TABLE roll (roll_id INT NOT NULL, round_id INT NOT NULL, value VARCHAR(6) DEFAULT NULL, PRIMARY KEY(roll_id))');
        $this->addSql('CREATE INDEX IDX_roll_round_id ON roll (round_id)');
        $this->addSql('CREATE TABLE round (round_id INT NOT NULL, game_id INT NOT NULL, player_one_score VARCHAR(500) DEFAULT NULL, player_two_score VARCHAR(500) DEFAULT NULL, roll_id INT NOT NULL, PRIMARY KEY(round_id))');
        $this->addSql('CREATE INDEX IDX_round_game_id ON round (game_id)');
        $this->addSql('ALTER TABLE roll ADD CONSTRAINT FK_roll_round FOREIGN KEY (round_id) REFERENCES round (round_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE round ADD CONSTRAINT FK_round_game FOREIGN KEY (game_id) REFERENCES game (game_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE player ADD game_id INT NOT NULL');
        $this->addSql('ALTER TABLE player ADD CONSTRAINT FK_player_game FOREIGN KEY (game_id) REFERENCES game (game_id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_player_game_id ON player (game_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE player DROP CONSTRAINT FK_98197A65E48FD905');
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE roll_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE round_id_seq CASCADE');
        $this->addSql('ALTER TABLE roll DROP CONSTRAINT FK_2EB532CEA6005CA0');
        $this->addSql('ALTER TABLE round DROP CONSTRAINT FK_C5EEEA34E48FD905');
        $this->addSql('DROP TABLE game');
        $this->addSql('DROP TABLE roll');
        $this->addSql('DROP TABLE round');
        $this->addSql('DROP INDEX IDX_98197A65E48FD905');
        $this->addSql('ALTER TABLE player DROP game_id');
    }
}
