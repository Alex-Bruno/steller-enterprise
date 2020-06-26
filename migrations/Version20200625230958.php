<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625230958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE requests (id INT AUTO_INCREMENT NOT NULL, created_by_id INT DEFAULT NULL, route VARCHAR(255) NOT NULL, method VARCHAR(255) NOT NULL, controller VARCHAR(255) NOT NULL, route_params LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', firewall_context VARCHAR(255) NOT NULL, access_control_atributes LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', paramters LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', query LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', remote_addr VARCHAR(255) NOT NULL, files LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', content LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', created DATETIME NOT NULL, updated DATETIME NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_7B85D651B03A8386 (created_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE requests ADD CONSTRAINT FK_7B85D651B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE requests');
    }
}
