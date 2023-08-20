<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820162259 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat ADD matiere_bio_id INT NOT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2BA7AC4A4 FOREIGN KEY (matiere_bio_id) REFERENCES matiere_bio (id)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2BA7AC4A4 ON resultat (matiere_bio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2BA7AC4A4');
        $this->addSql('DROP INDEX IDX_E7DB5DE2BA7AC4A4 ON resultat');
        $this->addSql('ALTER TABLE resultat DROP matiere_bio_id');
    }
}
