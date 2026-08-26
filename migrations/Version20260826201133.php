<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260826201133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(255) NOT NULL, CHANGE category category VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE transaction RENAME INDEX user_id TO IDX_723705D1A76ED395');
        $this->addSql('ALTER TABLE transaction RENAME INDEX product_id TO IDX_723705D14584665A');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE city city VARCHAR(255) NOT NULL, CHANGE createdAt created_at DATE NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX email TO UNIQ_8D93D649E7927C74');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE product CHANGE name name VARCHAR(100) NOT NULL, CHANGE category category VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE transaction RENAME INDEX idx_723705d1a76ed395 TO user_id');
        $this->addSql('ALTER TABLE transaction RENAME INDEX idx_723705d14584665a TO product_id');
        $this->addSql('ALTER TABLE user CHANGE name name VARCHAR(100) NOT NULL, CHANGE email email VARCHAR(150) NOT NULL, CHANGE city city VARCHAR(50) DEFAULT NULL, CHANGE created_at createdAt DATE NOT NULL');
        $this->addSql('ALTER TABLE user RENAME INDEX uniq_8d93d649e7927c74 TO email');
    }
}
