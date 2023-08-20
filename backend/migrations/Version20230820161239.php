<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820161239 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE valeur_ref ADD matiere_bio_id INT NOT NULL');
        $this->addSql('ALTER TABLE valeur_ref ADD CONSTRAINT FK_ADB20960BA7AC4A4 FOREIGN KEY (matiere_bio_id) REFERENCES matiere_bio (id)');
        $this->addSql('CREATE INDEX IDX_ADB20960BA7AC4A4 ON valeur_ref (matiere_bio_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE valeur_ref DROP FOREIGN KEY FK_ADB20960BA7AC4A4');
        $this->addSql('DROP INDEX IDX_ADB20960BA7AC4A4 ON valeur_ref');
        $this->addSql('ALTER TABLE valeur_ref DROP matiere_bio_id');
    }
}
