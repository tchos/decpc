<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202061347 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tresoreries_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tresoreries (id INT NOT NULL, circonscription_id INT DEFAULT NULL, libelle_tg VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DE9BD887755DBAE ON tresoreries (circonscription_id)');
        $this->addSql('ALTER TABLE tresoreries ADD CONSTRAINT FK_DE9BD887755DBAE FOREIGN KEY (circonscription_id) REFERENCES circonscriptions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE tresoreries_id_seq CASCADE');
        $this->addSql('ALTER TABLE tresoreries DROP CONSTRAINT FK_DE9BD887755DBAE');
        $this->addSql('DROP TABLE tresoreries');
    }
}
