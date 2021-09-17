<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210917160018 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_keyword DROP FOREIGN KEY FK_9D4B3145115D4552');
        $this->addSql('ALTER TABLE comment_keyword DROP FOREIGN KEY FK_A9E0132B115D4552');
        $this->addSql('DROP TABLE category_keyword');
        $this->addSql('DROP TABLE comment_keyword');
        $this->addSql('DROP TABLE keyword');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_keyword (category_id INT NOT NULL, keyword_id INT NOT NULL, INDEX IDX_9D4B3145115D4552 (keyword_id), INDEX IDX_9D4B314512469DE2 (category_id), PRIMARY KEY(category_id, keyword_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE comment_keyword (comment_id INT NOT NULL, keyword_id INT NOT NULL, INDEX IDX_A9E0132B115D4552 (keyword_id), INDEX IDX_A9E0132BF8697D13 (comment_id), PRIMARY KEY(comment_id, keyword_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE keyword (id INT AUTO_INCREMENT NOT NULL, slug VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_keyword ADD CONSTRAINT FK_9D4B3145115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_keyword ADD CONSTRAINT FK_9D4B314512469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_keyword ADD CONSTRAINT FK_A9E0132B115D4552 FOREIGN KEY (keyword_id) REFERENCES keyword (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE comment_keyword ADD CONSTRAINT FK_A9E0132BF8697D13 FOREIGN KEY (comment_id) REFERENCES comment (id) ON UPDATE NO ACTION ON DELETE CASCADE');
    }
}
