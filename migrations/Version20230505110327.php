<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230505110327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE favory (id INT AUTO_INCREMENT NOT NULL, fav_user_id INT NOT NULL, fav_poste_id INT NOT NULL, INDEX IDX_F232B2A8D87ED507 (fav_user_id), INDEX IDX_F232B2A8BEEEB2E8 (fav_poste_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favory ADD CONSTRAINT FK_F232B2A8D87ED507 FOREIGN KEY (fav_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE favory ADD CONSTRAINT FK_F232B2A8BEEEB2E8 FOREIGN KEY (fav_poste_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FABC63E6956');
        $this->addSql('DROP INDEX IDX_7C890FABC63E6956 ON poste');
        $this->addSql('ALTER TABLE poste DROP user_who_fav_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favory DROP FOREIGN KEY FK_F232B2A8D87ED507');
        $this->addSql('ALTER TABLE favory DROP FOREIGN KEY FK_F232B2A8BEEEB2E8');
        $this->addSql('DROP TABLE favory');
        $this->addSql('ALTER TABLE poste ADD user_who_fav_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FABC63E6956 FOREIGN KEY (user_who_fav_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7C890FABC63E6956 ON poste (user_who_fav_id)');
    }
}
