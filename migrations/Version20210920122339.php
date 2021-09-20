<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920122339 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category ADD slug VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C27F5416E');
        $this->addSql('DROP INDEX IDX_9474526C27F5416E ON comment');
        $this->addSql('ALTER TABLE comment DROP active, CHANGE blogpost_id action_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D32F035 FOREIGN KEY (action_id) REFERENCES action (id)');
        $this->addSql('CREATE INDEX IDX_9474526C9D32F035 ON comment (action_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP slug');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D32F035');
        $this->addSql('DROP INDEX IDX_9474526C9D32F035 ON comment');
        $this->addSql('ALTER TABLE comment ADD active TINYINT(1) NOT NULL, CHANGE action_id blogpost_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C27F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9474526C27F5416E ON comment (blogpost_id)');
    }
}
