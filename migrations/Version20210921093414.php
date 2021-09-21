<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921093414 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE action_user (action_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_FB726D479D32F035 (action_id), INDEX IDX_FB726D47A76ED395 (user_id), PRIMARY KEY(action_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE action_user ADD CONSTRAINT FK_FB726D479D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE action_user ADD CONSTRAINT FK_FB726D47A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE category_action');
        $this->addSql('DROP TABLE user_action');
        $this->addSql('ALTER TABLE action DROP FOREIGN KEY FK_47CC8C9227F5416E');
        $this->addSql('DROP INDEX IDX_47CC8C9227F5416E ON action');
        $this->addSql('ALTER TABLE action DROP blogpost_id');
        $this->addSql('ALTER TABLE comment ADD author_id INT DEFAULT NULL, DROP author');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CF675F31B FOREIGN KEY (author_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526CF675F31B ON comment (author_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_action (category_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_482446E912469DE2 (category_id), INDEX IDX_482446E99D32F035 (action_id), PRIMARY KEY(category_id, action_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_action (user_id INT NOT NULL, action_id INT NOT NULL, INDEX IDX_229E97AF9D32F035 (action_id), INDEX IDX_229E97AFA76ED395 (user_id), PRIMARY KEY(user_id, action_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_action ADD CONSTRAINT FK_482446E912469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_action ADD CONSTRAINT FK_482446E99D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_action ADD CONSTRAINT FK_229E97AF9D32F035 FOREIGN KEY (action_id) REFERENCES action (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_action ADD CONSTRAINT FK_229E97AFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE action_user');
        $this->addSql('ALTER TABLE action ADD blogpost_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE action ADD CONSTRAINT FK_47CC8C9227F5416E FOREIGN KEY (blogpost_id) REFERENCES blogpost (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_47CC8C9227F5416E ON action (blogpost_id)');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CF675F31B');
        $this->addSql('DROP INDEX IDX_9474526CF675F31B ON comment');
        $this->addSql('ALTER TABLE comment ADD author VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP author_id');
    }
}
