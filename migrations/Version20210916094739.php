<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210916094739 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CFBDFA14E3797A94');
        $this->addSql('DROP INDEX IDX_CFBDFA14A6CC7B2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__note AS SELECT id, eleve_id, seance_id, note FROM note');
        $this->addSql('DROP TABLE note');
        $this->addSql('CREATE TABLE note (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, eleve_id INTEGER DEFAULT NULL, seance_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL, CONSTRAINT FK_CFBDFA14A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_CFBDFA14E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO note (id, eleve_id, seance_id, note) SELECT id, eleve_id, seance_id, note FROM __temp__note');
        $this->addSql('DROP TABLE __temp__note');
        $this->addSql('CREATE INDEX IDX_CFBDFA14E3797A94 ON note (seance_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A6CC7B2 ON note (eleve_id)');
        $this->addSql('DROP INDEX IDX_98C1B79EA6CC7B2');
        $this->addSql('DROP INDEX IDX_98C1B79E6E6A596C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__note_exam AS SELECT id, date_exam_id, eleve_id, note FROM note_exam');
        $this->addSql('DROP TABLE note_exam');
        $this->addSql('CREATE TABLE note_exam (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_exam_id INTEGER DEFAULT NULL, eleve_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL, CONSTRAINT FK_98C1B79E6E6A596C FOREIGN KEY (date_exam_id) REFERENCES date_exam (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_98C1B79EA6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO note_exam (id, date_exam_id, eleve_id, note) SELECT id, date_exam_id, eleve_id, note FROM __temp__note_exam');
        $this->addSql('DROP TABLE __temp__note_exam');
        $this->addSql('CREATE INDEX IDX_98C1B79EA6CC7B2 ON note_exam (eleve_id)');
        $this->addSql('CREATE INDEX IDX_98C1B79E6E6A596C ON note_exam (date_exam_id)');
        $this->addSql('DROP INDEX IDX_737992C91E27F6BF');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ordre AS SELECT id, question_id, numero_ordre FROM ordre');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('CREATE TABLE ordre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question_id INTEGER DEFAULT NULL, serie_id INTEGER DEFAULT NULL, numero_ordre INTEGER NOT NULL, CONSTRAINT FK_737992C91E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_737992C9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO ordre (id, question_id, numero_ordre) SELECT id, question_id, numero_ordre FROM __temp__ordre');
        $this->addSql('DROP TABLE __temp__ordre');
        $this->addSql('CREATE INDEX IDX_737992C91E27F6BF ON ordre (question_id)');
        $this->addSql('CREATE INDEX IDX_737992C9D94388BD ON ordre (serie_id)');
        $this->addSql('DROP INDEX IDX_DF7DFD0ED94388BD');
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, serie_id, date FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, serie_id INTEGER DEFAULT NULL, date DATETIME NOT NULL, CONSTRAINT FK_DF7DFD0ED94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO seance (id, serie_id, date) SELECT id, serie_id, date FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0ED94388BD ON seance (serie_id)');
        $this->addSql('DROP INDEX IDX_AA3A933435F486F6');
        $this->addSql('DROP INDEX IDX_AA3A93349291498C');
        $this->addSql('CREATE TEMPORARY TABLE __temp__serie AS SELECT id, cd_id, numero FROM serie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('CREATE TABLE serie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cd_id INTEGER DEFAULT NULL, numero INTEGER NOT NULL, CONSTRAINT FK_AA3A933435F486F6 FOREIGN KEY (cd_id) REFERENCES cd (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO serie (id, cd_id, numero) SELECT id, cd_id, numero FROM __temp__serie');
        $this->addSql('DROP TABLE __temp__serie');
        $this->addSql('CREATE INDEX IDX_AA3A933435F486F6 ON serie (cd_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_CFBDFA14A6CC7B2');
        $this->addSql('DROP INDEX IDX_CFBDFA14E3797A94');
        $this->addSql('CREATE TEMPORARY TABLE __temp__note AS SELECT id, eleve_id, seance_id, note FROM note');
        $this->addSql('DROP TABLE note');
        $this->addSql('CREATE TABLE note (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, eleve_id INTEGER DEFAULT NULL, seance_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO note (id, eleve_id, seance_id, note) SELECT id, eleve_id, seance_id, note FROM __temp__note');
        $this->addSql('DROP TABLE __temp__note');
        $this->addSql('CREATE INDEX IDX_CFBDFA14A6CC7B2 ON note (eleve_id)');
        $this->addSql('CREATE INDEX IDX_CFBDFA14E3797A94 ON note (seance_id)');
        $this->addSql('DROP INDEX IDX_98C1B79E6E6A596C');
        $this->addSql('DROP INDEX IDX_98C1B79EA6CC7B2');
        $this->addSql('CREATE TEMPORARY TABLE __temp__note_exam AS SELECT id, date_exam_id, eleve_id, note FROM note_exam');
        $this->addSql('DROP TABLE note_exam');
        $this->addSql('CREATE TABLE note_exam (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, date_exam_id INTEGER DEFAULT NULL, eleve_id INTEGER DEFAULT NULL, note INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO note_exam (id, date_exam_id, eleve_id, note) SELECT id, date_exam_id, eleve_id, note FROM __temp__note_exam');
        $this->addSql('DROP TABLE __temp__note_exam');
        $this->addSql('CREATE INDEX IDX_98C1B79E6E6A596C ON note_exam (date_exam_id)');
        $this->addSql('CREATE INDEX IDX_98C1B79EA6CC7B2 ON note_exam (eleve_id)');
        $this->addSql('DROP INDEX IDX_737992C91E27F6BF');
        $this->addSql('DROP INDEX IDX_737992C9D94388BD');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ordre AS SELECT id, question_id, numero_ordre FROM ordre');
        $this->addSql('DROP TABLE ordre');
        $this->addSql('CREATE TABLE ordre (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, question_id INTEGER DEFAULT NULL, numero_ordre INTEGER NOT NULL)');
        $this->addSql('INSERT INTO ordre (id, question_id, numero_ordre) SELECT id, question_id, numero_ordre FROM __temp__ordre');
        $this->addSql('DROP TABLE __temp__ordre');
        $this->addSql('CREATE INDEX IDX_737992C91E27F6BF ON ordre (question_id)');
        $this->addSql('DROP INDEX IDX_DF7DFD0ED94388BD');
        $this->addSql('CREATE TEMPORARY TABLE __temp__seance AS SELECT id, serie_id, date FROM seance');
        $this->addSql('DROP TABLE seance');
        $this->addSql('CREATE TABLE seance (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, serie_id INTEGER DEFAULT NULL, date DATETIME NOT NULL)');
        $this->addSql('INSERT INTO seance (id, serie_id, date) SELECT id, serie_id, date FROM __temp__seance');
        $this->addSql('DROP TABLE __temp__seance');
        $this->addSql('CREATE INDEX IDX_DF7DFD0ED94388BD ON seance (serie_id)');
        $this->addSql('DROP INDEX IDX_AA3A933435F486F6');
        $this->addSql('CREATE TEMPORARY TABLE __temp__serie AS SELECT id, cd_id, numero FROM serie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('CREATE TABLE serie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, cd_id INTEGER DEFAULT NULL, numero INTEGER NOT NULL, ordre_id INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO serie (id, cd_id, numero) SELECT id, cd_id, numero FROM __temp__serie');
        $this->addSql('DROP TABLE __temp__serie');
        $this->addSql('CREATE INDEX IDX_AA3A933435F486F6 ON serie (cd_id)');
        $this->addSql('CREATE INDEX IDX_AA3A93349291498C ON serie (ordre_id)');
    }
}
