<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323153416 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE private_message (id INT AUTO_INCREMENT NOT NULL, from_user_id INT NOT NULL, to_user_id INT NOT NULL, title VARCHAR(75) NOT NULL, content VARCHAR(20000) NOT NULL, sent_date_time DATETIME NOT NULL, is_opened TINYINT(1) NOT NULL, INDEX IDX_4744FC9B2130303A (from_user_id), INDEX IDX_4744FC9B29F6EE60 (to_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE private_message ADD CONSTRAINT FK_4744FC9B2130303A FOREIGN KEY (from_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE private_message ADD CONSTRAINT FK_4744FC9B29F6EE60 FOREIGN KEY (to_user_id) REFERENCES users (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE private_message');
    }
}
