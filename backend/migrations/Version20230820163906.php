<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820163906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere_bio ADD analyse_id INT NOT NULL');
        $this->addSql('ALTER TABLE matiere_bio ADD CONSTRAINT FK_D3B0B7FC1EFE06BF FOREIGN KEY (analyse_id) REFERENCES analyse (id)');
        $this->addSql('CREATE INDEX IDX_D3B0B7FC1EFE06BF ON matiere_bio (analyse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere_bio DROP FOREIGN KEY FK_D3B0B7FC1EFE06BF');
        $this->addSql('DROP INDEX IDX_D3B0B7FC1EFE06BF ON matiere_bio');
        $this->addSql('ALTER TABLE matiere_bio DROP analyse_id');
    }
}
