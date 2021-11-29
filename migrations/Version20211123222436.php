<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211123222436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(50) NOT NULL, resp_comm VARCHAR(50) NOT NULL, resp_finan VARCHAR(50) NOT NULL, adr_liv VARCHAR(100) NOT NULL, adr_facture VARCHAR(100) NOT NULL, tel VARCHAR(9) NOT NULL, portable VARCHAR(9) NOT NULL, fax VARCHAR(12) NOT NULL, email VARCHAR(50) NOT NULL, solde_init DOUBLE PRECISION NOT NULL, solde DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE famille (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, id_famille_id INT NOT NULL, libelle VARCHAR(50) NOT NULL, pa DOUBLE PRECISION NOT NULL, pv DOUBLE PRECISION NOT NULL, tva INT NOT NULL, stock INT NOT NULL, stkinit INT NOT NULL, INDEX IDX_29A5EC27322DFB53 (id_famille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27322DFB53 FOREIGN KEY (id_famille_id) REFERENCES famille (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27322DFB53');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE famille');
        $this->addSql('DROP TABLE produit');
    }
}
