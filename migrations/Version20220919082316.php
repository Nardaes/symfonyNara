<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919082316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user ADD actif TINYINT(1) NOT NULL, ADD annee_naissance INT NOT NULL, ADD photo_de_profil VARCHAR(255) DEFAULT NULL, ADD bio_user VARCHAR(255) DEFAULT NULL, ADD nombre_abonnee INT NOT NULL, ADD nombre_abonnement INT NOT NULL, ADD notif_active TINYINT(1) NOT NULL, ADD pays_pref VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP actif, DROP annee_naissance, DROP photo_de_profil, DROP bio_user, DROP nombre_abonnee, DROP nombre_abonnement, DROP notif_active, DROP pays_pref');
    }
}
