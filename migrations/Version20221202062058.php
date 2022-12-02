<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202062058 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE perceptions_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE perceptions (id INT NOT NULL, recette_finance_id INT DEFAULT NULL, libelle_perception VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_CB731A9722E89F1B ON perceptions (recette_finance_id)');
        $this->addSql('ALTER TABLE perceptions ADD CONSTRAINT FK_CB731A9722E89F1B FOREIGN KEY (recette_finance_id) REFERENCES recettes_finances (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE perceptions_id_seq CASCADE');
        $this->addSql('ALTER TABLE perceptions DROP CONSTRAINT FK_CB731A9722E89F1B');
        $this->addSql('DROP TABLE perceptions');
    }
}
