<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322193105 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_skill (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, category_skill_id INT DEFAULT NULL, label VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_5E3DE477E2FF4539 (category_skill_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE477E2FF4539 FOREIGN KEY (category_skill_id) REFERENCES category_skill (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE477E2FF4539');
        $this->addSql('DROP TABLE category_skill');
        $this->addSql('DROP TABLE skill');
        $this->addSql('ALTER TABLE ch_cookieconsent_log CHANGE ip_address ip_address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_consent_key cookie_consent_key VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_name cookie_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_value cookie_value VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navbar_menu CHANGE item item VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE textreplace textreplace VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
