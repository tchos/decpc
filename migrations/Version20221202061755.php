<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202061755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE recettes_finances_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE recettes_finances (id INT NOT NULL, tg_id INT DEFAULT NULL, libelle_recette VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_73BDCD69F581628A ON recettes_finances (tg_id)');
        $this->addSql('ALTER TABLE recettes_finances ADD CONSTRAINT FK_73BDCD69F581628A FOREIGN KEY (tg_id) REFERENCES tresoreries (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE recettes_finances_id_seq CASCADE');
        $this->addSql('ALTER TABLE recettes_finances DROP CONSTRAINT FK_73BDCD69F581628A');
        $this->addSql('DROP TABLE recettes_finances');
    }
}
