<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210915130851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cd (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero INTEGER NOT NULL, editeur VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE date_exam (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date DATETIME NOT NULL)');
        $this->addSql('CREATE TABLE eleve (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, rue VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, cp VARCHAR(255) NOT NULL, date DATE NOT NULL)');
        $this->addSql('CREATE TABLE note (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, eleve_id INTEGER DEFAULT NULL, seance_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A6CC7B2 ON note (eleve_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14E3797A94 ON note (seance_id)');
        $this->addSql('CREATE TABLE note_exam (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_exam_id INTEGER DEFAULT NULL, eleve_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_98C1B79E6E6A596C ON note_exam (date_exam_id)');
        $this->addSql('CREATE INDEX IDX_98C1B79EA6CC7B2 ON note_exam (eleve_id)');
        $this->addSql('CREATE TABLE ordre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question_id INTEGER DEFAULT NULL, numero_ordre INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_737992C91E27F6BF ON ordre (question_id)');
        $this->addSql('CREATE TABLE question (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, intitule VARCHAR(255) NOT NULL, reponse VARCHAR(255) NOT NULL, difficulte INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, serie_id INTEGER DEFAULT NULL, date DATETIME NOT NULL)');
        $this->addSql('CREATE INDEX IDX_DF7DFD0ED94388BD ON seance (serie_id)');
        $this->addSql('CREATE TABLE serie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, ordre_id INTEGER DEFAULT NULL, cd_id INTEGER DEFAULT NULL, numero INTEGER NOT NULL)');
        $this->addSql('CREATE INDEX IDX_AA3A93349291498C ON serie (ordre_id)');
        $this->addSql('CREATE INDEX IDX_AA3A933435F486F6 ON serie (cd_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE cd');
        $this->addSql('DROP TABLE date_exam');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE note_exam');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE serie');
    }
}
