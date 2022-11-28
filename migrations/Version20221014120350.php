<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221014120350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, description_poste VARCHAR(255) NOT NULL, date_poste DATE NOT NULL, status_poste VARCHAR(50) NOT NULL, nombre_reponse INT NOT NULL, image_poste VARCHAR(255) DEFAULT NULL, INDEX IDX_7C890FABA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, annee_naissance INT NOT NULL, photo_de_profil VARCHAR(255) DEFAULT NULL, bio_user VARCHAR(255) DEFAULT NULL, nombre_abonnee INT NOT NULL, nombre_abonnement INT NOT NULL, notif_active TINYINT(1) NOT NULL, pays_pref VARCHAR(255) DEFAULT NULL, pseudo VARCHAR(255) NOT NULL, actif TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        // $this->addSql('ALTER TABLE poste ADD CONSTRAINT FK_7C890FABA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');

        $this->addSql("
        
        INSERT INTO `user` (`id`, `email`, `roles`, `password`, `actif`, `annee_naissance`, `photo_de_profil`, `bio_user`, `nombre_abonnee`, `nombre_abonnement`, `notif_active`, `pays_pref`, `pseudo`) VALUES
        (1, 'faxas.orz@gmail.com', '[\"ROLE_ADMIN\"]', '\$2y\$13\$1EUDLTfvgwozuO22uwGxp.UW0hUj8KdylwCdQ1cYkC5u.MiJhp2cS', 0, 0, NULL, NULL, 0, 0, 0, NULL, ''),
        (3, 'jean@gmail.com', '[\"ROLE_ADMIN\"]', '\$2y\$13\$121MJ15AeaVumkr76ZX.rueS5TBMjfsh4uk6uLPdf8I1FaLacoWEW', 0, 0, 'image/profil/jean.jfif', NULL, 0, 0, 0, NULL, 'JeanAdmin'),
        (4, 'wolvagen@gmail.com', '[]', '\$2y\$13\$2dJbWkeankKviyShYmEvAOn3Jp7slQ/3yyCEF6hPnfWmob3WEY0wG', 0, 0, NULL, NULL, 0, 0, 0, NULL, ''),
        (6, 'jeanjean@gmail.com', '[]', '\$2y\$13\$FaJNEQBTk6nOBrglm7GpRe33Jhq9Sws7.XaOctHNsk66Gv3.lxTOy', 0, 2002, NULL, NULL, 0, 0, 0, NULL, 'ouioui'),
        (7, 'yaya@gmail.com', '[]', '\$2y\$13\$l03jk0YxHMKjaM6aYpCQIe46Ln5AEU/Bhf4fzkAVZqFfq81HO4aBG', 0, 2002, 'image/profil/yaya.jfif', NULL, 0, 0, 0, NULL, 'yaya');
        
        ");

        $this->addSql("
        
        INSERT INTO poste (id, description_poste, date_poste, status_poste, nombre_reponse, image_poste, user_id) VALUES
        (1, 'salut les gens comment ca va ?', '2022-10-13', 'Auteur', 0, 'image/poste/didier.jfif', 3),
        (2, 'oui c\'est vrai j\'ai casser la porte du lycée', '2022-10-13', 'Auteur', 1, NULL, 7),
        (3, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (4, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (5, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (6, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (7, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (8, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (9, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (10, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (11, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (12, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (13, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (14, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (15, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (16, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (17, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (18, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (19, 'salut les gens comment ca va ?', '2022-10-13', 'Auteur', 0, 'image/poste/didier.jfif', 3),
        (20, 'oui c\'est vrai j\'ai casser la porte du lycée', '2022-10-13', 'Auteur', 1, NULL, 7),
        (21, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (22, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (23, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (24, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (25, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (26, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (27, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (28, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (29, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (30, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (31, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (32, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (33, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (34, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (35, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3),
        (36, 'je suis le développeur est je fais un test de poste', '2022-10-14', 'Auteur', 0, NULL, 3)
            
        
        ");

        
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE poste DROP FOREIGN KEY FK_7C890FABA76ED395');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
