<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250910134405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books (id SERIAL NOT NULL, nama_buku VARCHAR(255) NOT NULL, genre TEXT DEFAULT NULL, stock INT NOT NULL, author VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN books.genre IS \'(DC2Type:array)\'');
        $this->addSql('CREATE TABLE member (id SERIAL NOT NULL, kta INT NOT NULL, nama VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE transaksi (id SERIAL NOT NULL, id_books INT NOT NULL, id_member INT NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE member');
        $this->addSql('DROP TABLE transaksi');
    }
}
