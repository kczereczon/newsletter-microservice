<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230823054750 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE messenger_messages_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE email_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE email_template_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE email (id INT NOT NULL, email_address_id INT DEFAULT NULL, email_template_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, body TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E7927C7459045DAA ON email (email_address_id)');
        $this->addSql('CREATE INDEX IDX_E7927C74131A730F ON email (email_template_id)');
        $this->addSql('CREATE TABLE email_template (id INT NOT NULL, title VARCHAR(255) NOT NULL, body TEXT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C7459045DAA FOREIGN KEY (email_address_id) REFERENCES email_address (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE email ADD CONSTRAINT FK_E7927C74131A730F FOREIGN KEY (email_template_id) REFERENCES email_template (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE messenger_messages');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE email_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE email_template_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE messenger_messages_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_75ea56e016ba31db ON messenger_messages (delivered_at)');
        $this->addSql('CREATE INDEX idx_75ea56e0e3bd61ce ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX idx_75ea56e0fb7336f0 ON messenger_messages (queue_name)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE email DROP CONSTRAINT FK_E7927C7459045DAA');
        $this->addSql('ALTER TABLE email DROP CONSTRAINT FK_E7927C74131A730F');
        $this->addSql('DROP TABLE email');
        $this->addSql('DROP TABLE email_template');
    }
}
