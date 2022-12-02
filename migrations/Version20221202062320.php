<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202062320 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateurs ADD equipe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD noms VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE utilisateurs ADD CONSTRAINT FK_497B315E6D861B89 FOREIGN KEY (equipe_id) REFERENCES equipe (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_497B315E6D861B89 ON utilisateurs (equipe_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE utilisateurs DROP CONSTRAINT FK_497B315E6D861B89');
        $this->addSql('DROP INDEX IDX_497B315E6D861B89');
        $this->addSql('ALTER TABLE utilisateurs DROP equipe_id');
        $this->addSql('ALTER TABLE utilisateurs DROP noms');
    }
}
