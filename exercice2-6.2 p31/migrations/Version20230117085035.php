<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230117085035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE personne_livre (personne_id INT NOT NULL, livre_id INT NOT NULL, INDEX IDX_B8825EF0A21BD112 (personne_id), INDEX IDX_B8825EF037D925CB (livre_id), PRIMARY KEY(personne_id, livre_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE personne_livre ADD CONSTRAINT FK_B8825EF0A21BD112 FOREIGN KEY (personne_id) REFERENCES personne (id)');
        $this->addSql('ALTER TABLE personne_livre ADD CONSTRAINT FK_B8825EF037D925CB FOREIGN KEY (livre_id) REFERENCES livre (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE personne_livre DROP FOREIGN KEY FK_B8825EF0A21BD112');
        $this->addSql('ALTER TABLE personne_livre DROP FOREIGN KEY FK_B8825EF037D925CB');
        $this->addSql('DROP TABLE personne_livre');
    }
}
