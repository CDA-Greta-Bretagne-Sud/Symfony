<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117094527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE livre_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE livre (id INT NOT NULL, titre VARCHAR(255) NOT NULL, edition VARCHAR(255) NOT NULL, information VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE personne_livre (personne_id INT NOT NULL, livre_id INT NOT NULL, PRIMARY KEY(personne_id, livre_id))');
        $this->addSql('CREATE INDEX IDX_B8825EF0A21BD112 ON personne_livre (personne_id)');
        $this->addSql('CREATE INDEX IDX_B8825EF037D925CB ON personne_livre (livre_id)');
        $this->addSql('ALTER TABLE personne_livre ADD CONSTRAINT FK_B8825EF0A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE personne_livre ADD CONSTRAINT FK_B8825EF037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE livre_id_seq CASCADE');
        $this->addSql('ALTER TABLE personne_livre DROP CONSTRAINT FK_B8825EF0A21BD112');
        $this->addSql('ALTER TABLE personne_livre DROP CONSTRAINT FK_B8825EF037D925CB');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE personne_livre');
    }
}
