<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260120150624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE building (id INT AUTO_INCREMENT NOT NULL, building_name VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, coordinates VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE floor (id INT AUTO_INCREMENT NOT NULL, floor_number INT NOT NULL, building_id INT NOT NULL, INDEX IDX_BE45D62E4D2A7E12 (building_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE floor ADD CONSTRAINT FK_BE45D62E4D2A7E12 FOREIGN KEY (building_id) REFERENCES building (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE floor DROP FOREIGN KEY FK_BE45D62E4D2A7E12');
        $this->addSql('DROP TABLE building');
        $this->addSql('DROP TABLE floor');
    }
}
