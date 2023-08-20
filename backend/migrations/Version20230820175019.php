<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230820175019 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE examen (id INT AUTO_INCREMENT NOT NULL, patient_id INT NOT NULL, laboratoire_id INT NOT NULL, date_examen DATETIME NOT NULL, prescripteur VARCHAR(255) NOT NULL, rc VARCHAR(100) DEFAULT NULL, INDEX IDX_514C8FEC6B899279 (patient_id), INDEX IDX_514C8FEC76E2617B (laboratoire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examen_analyse (id INT AUTO_INCREMENT NOT NULL, analyse_id INT NOT NULL, examen_id INT NOT NULL, INDEX IDX_969B6B5A1EFE06BF (analyse_id), INDEX IDX_969B6B5A5C8659A (examen_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE examen ADD CONSTRAINT FK_514C8FEC6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE examen ADD CONSTRAINT FK_514C8FEC76E2617B FOREIGN KEY (laboratoire_id) REFERENCES laboratoire (id)');
        $this->addSql('ALTER TABLE examen_analyse ADD CONSTRAINT FK_969B6B5A1EFE06BF FOREIGN KEY (analyse_id) REFERENCES analyse (id)');
        $this->addSql('ALTER TABLE examen_analyse ADD CONSTRAINT FK_969B6B5A5C8659A FOREIGN KEY (examen_id) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE resultat ADD examen_id INT NOT NULL');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE25C8659A FOREIGN KEY (examen_id) REFERENCES examen (id)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE25C8659A ON resultat (examen_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE25C8659A');
        $this->addSql('ALTER TABLE examen DROP FOREIGN KEY FK_514C8FEC6B899279');
        $this->addSql('ALTER TABLE examen DROP FOREIGN KEY FK_514C8FEC76E2617B');
        $this->addSql('ALTER TABLE examen_analyse DROP FOREIGN KEY FK_969B6B5A1EFE06BF');
        $this->addSql('ALTER TABLE examen_analyse DROP FOREIGN KEY FK_969B6B5A5C8659A');
        $this->addSql('DROP TABLE examen');
        $this->addSql('DROP TABLE examen_analyse');
        $this->addSql('DROP INDEX IDX_E7DB5DE25C8659A ON resultat');
        $this->addSql('ALTER TABLE resultat DROP examen_id');
    }
}
