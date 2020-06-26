<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625233223 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requests CHANGE route route VARCHAR(255) DEFAULT NULL, CHANGE method method VARCHAR(255) DEFAULT NULL, CHANGE controller controller VARCHAR(255) DEFAULT NULL, CHANGE route_params route_params LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE firewall_context firewall_context VARCHAR(255) DEFAULT NULL, CHANGE access_control_atributes access_control_atributes LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE paramters paramters LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE query query LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE remote_addr remote_addr VARCHAR(255) DEFAULT NULL, CHANGE files files LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE content content LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', CHANGE route_name route_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE requests CHANGE route route VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE route_name route_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE method method VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE controller controller VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE route_params route_params LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE firewall_context firewall_context VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE access_control_atributes access_control_atributes LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE paramters paramters LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE query query LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE remote_addr remote_addr VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE files files LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE content content LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\'');
    }
}
