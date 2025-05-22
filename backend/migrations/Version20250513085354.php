<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250513085354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE contextos (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE hoteles (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, direction VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE huespedes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(9) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE idiomas (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(2) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE incidencias (id INT AUTO_INCREMENT NOT NULL, place VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(15) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE plantillas (id INT AUTO_INCREMENT NOT NULL, idcontext_id INT NOT NULL, code VARCHAR(255) NOT NULL, data LONGTEXT DEFAULT NULL, INDEX IDX_E91A52B7A6A9DCF5 (idcontext_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE reservas (id INT AUTO_INCREMENT NOT NULL, huesped_id INT NOT NULL, check_in_date DATE NOT NULL, check_out_date DATE NOT NULL, room_type VARCHAR(255) NOT NULL, INDEX IDX_AA1DAB01A9B1478B (huesped_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE usuarios (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, surname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE variables (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE contextos_variables (variables_id INT NOT NULL, contextos_id INT NOT NULL, INDEX IDX_F3E9DA3CED82107C (variables_id), INDEX IDX_F3E9DA3CA98330FB (contextos_id), PRIMARY KEY(variables_id, contextos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', available_at DATETIME NOT NULL COMMENT '(DC2Type:datetime_immutable)', delivered_at DATETIME DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE plantillas ADD CONSTRAINT FK_E91A52B7A6A9DCF5 FOREIGN KEY (idcontext_id) REFERENCES contextos (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservas ADD CONSTRAINT FK_AA1DAB01A9B1478B FOREIGN KEY (huesped_id) REFERENCES huespedes (id)
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contextos_variables ADD CONSTRAINT FK_F3E9DA3CED82107C FOREIGN KEY (variables_id) REFERENCES variables (id) ON DELETE CASCADE
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contextos_variables ADD CONSTRAINT FK_F3E9DA3CA98330FB FOREIGN KEY (contextos_id) REFERENCES contextos (id) ON DELETE CASCADE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE plantillas DROP FOREIGN KEY FK_E91A52B7A6A9DCF5
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE reservas DROP FOREIGN KEY FK_AA1DAB01A9B1478B
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contextos_variables DROP FOREIGN KEY FK_F3E9DA3CED82107C
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE contextos_variables DROP FOREIGN KEY FK_F3E9DA3CA98330FB
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE contextos
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE hoteles
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE huespedes
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE idiomas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE incidencias
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE plantillas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE reservas
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE usuarios
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE variables
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE contextos_variables
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE messenger_messages
        SQL);
    }
}
