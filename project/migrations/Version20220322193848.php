<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220322193848 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE skill ADD ordre SMALLINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_skill CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ch_cookieconsent_log CHANGE ip_address ip_address VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_consent_key cookie_consent_key VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_name cookie_name VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE cookie_value cookie_value VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE navbar_menu CHANGE item item VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE textreplace textreplace VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE skill DROP ordre, CHANGE label label VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
