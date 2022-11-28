<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919060727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notification_poste DROP FOREIGN KEY FK_BA3DEA52A0905086');
        $this->addSql('ALTER TABLE notification_poste DROP FOREIGN KEY FK_BA3DEA52EF1A9D84');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CA1E5D0459');
        $this->addSql('ALTER TABLE notification DROP FOREIGN KEY FK_BF5476CAAE1E969C');
        $this->addSql('DROP TABLE notification_poste');
        $this->addSql('DROP TABLE notification');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE notification_poste (notification_id INT NOT NULL, poste_id INT NOT NULL, INDEX IDX_BA3DEA52A0905086 (poste_id), INDEX IDX_BA3DEA52EF1A9D84 (notification_id), PRIMARY KEY(notification_id, poste_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE notification (id INT AUTO_INCREMENT NOT NULL, poste_notif_id INT NOT NULL, test_id INT DEFAULT NULL, INDEX IDX_BF5476CA1E5D0459 (test_id), UNIQUE INDEX UNIQ_BF5476CAAE1E969C (poste_notif_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE notification_poste ADD CONSTRAINT FK_BA3DEA52A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notification_poste ADD CONSTRAINT FK_BA3DEA52EF1A9D84 FOREIGN KEY (notification_id) REFERENCES notification (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CA1E5D0459 FOREIGN KEY (test_id) REFERENCES notification (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE notification ADD CONSTRAINT FK_BF5476CAAE1E969C FOREIGN KEY (poste_notif_id) REFERENCES poste (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
