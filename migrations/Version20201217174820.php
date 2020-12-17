<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201217174820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE auteur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_55AB140F85E0677 ON auteur (username)');
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE message (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, sujet_id INTEGER DEFAULT NULL, auteur_id INTEGER DEFAULT NULL, contenu CLOB NOT NULL, date_creation DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_B6BD307F7C4D497E ON message (sujet_id)');
        $this->addSql('CREATE INDEX IDX_B6BD307F60BB6FE6 ON message (auteur_id)');
        $this->addSql('CREATE TABLE sujet (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, categorie_id INTEGER DEFAULT NULL, auteur_id INTEGER DEFAULT NULL, nom VARCHAR(255) NOT NULL, date_creation DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_2E13599DBCF5E72D ON sujet (categorie_id)');
        $this->addSql('CREATE INDEX IDX_2E13599D60BB6FE6 ON sujet (auteur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE auteur');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE message');
        $this->addSql('DROP TABLE sujet');
    }
}
