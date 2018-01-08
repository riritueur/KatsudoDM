
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 08 Janvier 2018 à 19:37
-- Version du serveur: 10.1.24-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u178917848_katsu`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `Id_c` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Adresse_c` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Tel_c` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `Email_c` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Id_c`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`Id_c`, `Nom_c`, `Prenom_c`, `Adresse_c`, `Tel_c`, `Email_c`) VALUES
(1, 'Client', '1', '1 Rue du 1, 1ville', '0600000001', '1@un.com'),
(2, 'Client', '2', '2 Rue du 2, 2ville', '0600000002', '2@deux.com'),
(3, 'Client', '3', '3 Rue du 3, 3ville', '0600000003', '3@trois.com');

-- --------------------------------------------------------

--
-- Structure de la table `Facture_Client`
--

CREATE TABLE IF NOT EXISTS `Facture_Client` (
  `id_fac_c` int(11) NOT NULL AUTO_INCREMENT,
  `id_c` int(11) NOT NULL,
  `ref_fac_c` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `date_emi_fac_c` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_rec_fac_c` date NOT NULL,
  `tva` int(1) NOT NULL DEFAULT '1',
  `ref_p_1` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `qte_p_1` int(11) NOT NULL,
  `ref_p_2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_2` int(11) DEFAULT NULL,
  `ref_p_3` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_3` int(11) DEFAULT NULL,
  `ref_p_4` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_4` int(11) DEFAULT NULL,
  `ref_p_5` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_5` int(11) DEFAULT NULL,
  `ref_p_6` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_6` int(11) DEFAULT NULL,
  `ref_p_7` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_7` int(11) DEFAULT NULL,
  `ref_p_8` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_8` int(11) DEFAULT NULL,
  `ref_p_9` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_9` int(11) DEFAULT NULL,
  `ref_p_10` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qte_p_10` int(11) DEFAULT NULL,
  `prix_ht` int(11) NOT NULL,
  `prix_tva` int(11) NOT NULL,
  `prix_ttc` int(11) NOT NULL,
  `paiement` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_fac_c`),
  KEY `id_c` (`id_c`),
  KEY `tva` (`tva`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Contenu de la table `Facture_Client`
--

INSERT INTO `Facture_Client` (`id_fac_c`, `id_c`, `ref_fac_c`, `date_emi_fac_c`, `date_rec_fac_c`, `tva`, `ref_p_1`, `qte_p_1`, `ref_p_2`, `qte_p_2`, `ref_p_3`, `qte_p_3`, `ref_p_4`, `qte_p_4`, `ref_p_5`, `qte_p_5`, `ref_p_6`, `qte_p_6`, `ref_p_7`, `qte_p_7`, `ref_p_8`, `qte_p_8`, `ref_p_9`, `qte_p_9`, `ref_p_10`, `qte_p_10`, `prix_ht`, `prix_tva`, `prix_ttc`, `paiement`) VALUES
(1, 3, 'F-2018-1', '2018-01-05 00:23:08', '2018-02-05', 20, 'HW-XXL', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 20, 120, 0),
(15, 1, 'F-2018-15', '2018-01-07 21:20:30', '2018-02-07', 20, 'SD-L', 55, 'SD-X', 63, 'SGBD-PGSQL', 18, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, '', 0, 41880, 8376, 50256, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Facture_Fournisseur`
--

CREATE TABLE IF NOT EXISTS `Facture_Fournisseur` (
  `id_fac_f` int(11) NOT NULL AUTO_INCREMENT,
  `id_f` int(11) NOT NULL,
  `ref_fac_f` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `desc_fac_f` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_emi_fac_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_rec_fac_f` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `montant_ht_fac_f` int(11) NOT NULL,
  `montant_tva_fac_f` int(11) NOT NULL,
  `montant_ttc_fac_f` int(11) NOT NULL,
  `paiement_fac_f` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_fac_f`),
  KEY `id_f` (`id_f`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `Facture_Fournisseur`
--

INSERT INTO `Facture_Fournisseur` (`id_fac_f`, `id_f`, `ref_fac_f`, `desc_fac_f`, `date_emi_fac_f`, `date_rec_fac_f`, `montant_ht_fac_f`, `montant_tva_fac_f`, `montant_ttc_fac_f`, `paiement_fac_f`) VALUES
(1, 1, 'F201712-KTDDM', 'Facture internet Katsudo DM Décembre 2017', '2018-01-05 01:30:28', '2018-01-31 23:59:59', 2500, 500, 3000, 0),
(2, 2, '67594-12', 'Remplacement matériel informatique Katsudo DM', '2018-01-05 01:32:11', '2018-02-05 02:35:59', 1200, 240, 1440, 0),
(3, 3, '201712-KTM', 'Elec Katsudo dec 2017', '2018-01-05 01:34:06', '2018-01-31 23:59:59', 200, 40, 240, 1),
(11, 9, '201712-1568', 'Papèterie', '2018-01-06 17:40:31', '2018-02-06 23:59:59', 253, 51, 304, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Fournisseur`
--

CREATE TABLE IF NOT EXISTS `Fournisseur` (
  `id_f` int(11) NOT NULL AUTO_INCREMENT,
  `nom_f` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_f` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_f` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel_f` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_f` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_f`),
  FULLTEXT KEY `tel_f` (`tel_f`),
  FULLTEXT KEY `tel_f_2` (`tel_f`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Contenu de la table `Fournisseur`
--

INSERT INTO `Fournisseur` (`id_f`, `nom_f`, `prenom_f`, `adresse_f`, `tel_f`, `email_f`) VALUES
(1, 'Accès', 'Internet', '12 Rue de l''accès Internet, Internet Town', '0612121212', 'accesinternet@internet.com'),
(2, 'Matos', 'Informatique', '42 Avenue du matos informatique, Matos City', '0642424242', 'matosinformatique@matos.com'),
(3, 'Fournisseur', 'Electricité', '196883 Rue de la spoliquance, Electricity', '0600196883', 'fournisseurelectricite@elec.com'),
(4, 'Fournisseur', 'Eau', '19 Rue de l''eau, Eauville', '0606060606', 'eau@eau.com'),
(5, 'Proprio', 'Local', '55 Rue du prélèvement mensuel, Giveme-Your-Money', '0611224422', 'propriolocal@proprio.com'),
(6, 'Syndic', 'Copropriété', '146 Rue du syndic de copropriété, Syndicville', '0635353535', 'syndic@syndic.fr'),
(7, 'Assurance', 'LocalMatosResponsabilité', '07 Allée de l''assurance, Assuranceville', '0645500400', 'onassuretout@assur.fr'),
(8, 'Fournisseur', 'Téléphonique', '24 Boulevard du téléphone, Problème-de-ligne', '0673139401', 'tel@tel.com'),
(9, 'Fournisseur', 'Papeterie', '18 Avenue de la papeterie, Papeterieville', '0622222222', 'papet@papet.com'),
(10, 'Nettoyage', 'Local', '94 Boulevard de la propreté, Nettoyage City', '0633353533', 'propre@propre.com'),
(11, 'Fournisseur', 'Consommables', '56 Rue de la consommation, Consoville', '0600000001', 'conso@conso.com');

-- --------------------------------------------------------

--
-- Structure de la table `Numero_Facture_Client`
--

CREATE TABLE IF NOT EXISTS `Numero_Facture_Client` (
  `id_num` int(11) NOT NULL AUTO_INCREMENT,
  `valeur` int(11) NOT NULL,
  PRIMARY KEY (`id_num`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `Numero_Facture_Client`
--

INSERT INTO `Numero_Facture_Client` (`id_num`, `valeur`) VALUES
(1, 40);

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `ref_p` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `desc_p` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `image_p` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prix_ht` int(11) NOT NULL,
  PRIMARY KEY (`ref_p`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`ref_p`, `desc_p`, `image_p`, `prix_ht`) VALUES
('HW-L', 'Espace web 50Mo', 'http://katsudodm.richard-peres.xyz/produits/hw-l.png', 10),
('HW-X', 'Espace web 100Mo', 'http://katsudodm.richard-peres.xyz/produits/hw-x.png', 20),
('HW-XL', 'Espace web 500Mo', 'http://katsudodm.richard-peres.xyz/produits/hw-xl.png', 50),
('HW-XXL', 'Espace web 1000Mo', 'http://katsudodm.richard-peres.xyz/produits/hw-xxl.png', 100),
('SGBD-MSQL', 'SGBD MySql', 'http://katsudodm.richard-peres.xyz/produits/sgbd-msql.png', 10),
('SGBD-PGSQL', 'SGBD PostGresSQL', 'http://katsudodm.richard-peres.xyz/produits/sgbd-pgsql.png', 10),
('SGBD-O', 'SGBD Oracle', 'http://katsudodm.richard-peres.xyz/produits/sgbd-o.png', 100),
('SD-S', 'Serveur dédié 2 coeurs - 8Go RAM', 'http://katsudodm.richard-peres.xyz/produits/sd-s.png', 200),
('SD-L', 'Serveur dédié 4 coeurs - 32Go RAM', 'http://katsudodm.richard-peres.xyz/produits/sd-l.png', 300),
('SD-X', 'Serveur dédié 8 coeurs - 64Go RAM', 'http://katsudodm.richard-peres.xyz/produits/sd-x.png', 400),
('DD', 'Nom de domaine supplémentaire', 'http://katsudodm.richard-peres.xyz/produits/dd.png', 10);

-- --------------------------------------------------------

--
-- Structure de la table `Salarie`
--

CREATE TABLE IF NOT EXISTS `Salarie` (
  `id_s` int(11) NOT NULL AUTO_INCREMENT,
  `nom_s` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom_s` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adresse_s` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel_s` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_s` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fonction_s` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salaire_net_s` int(11) NOT NULL,
  `salaire_brut_s` int(11) NOT NULL,
  PRIMARY KEY (`id_s`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `Salarie`
--

INSERT INTO `Salarie` (`id_s`, `nom_s`, `prenom_s`, `adresse_s`, `tel_s`, `email_s`, `fonction_s`, `salaire_net_s`, `salaire_brut_s`) VALUES
(1, 'Salarié', '1', '1 Rue du 1, 1ville', '0600000001', '1@un.com', 'Premier', 1, 2),
(2, 'Salarié', '1', '1 Rue du 1, 1ville', '0600000001', '1@un.com', 'Premier', 1, 2),
(3, 'Salarie', '2', '2 Rue du 2, 2ville', '0600000002', '2@deux.com', 'Deuxième', 2, 3),
(4, 'Salarie', '3', '3 Rue du 3, 3ville', '0600000003', '3@trois.com', 'Troisième', 3, 5);

--
-- Déclencheurs `Salarie`
--
DROP TRIGGER IF EXISTS `setsalairebrut`;
DELIMITER //
CREATE TRIGGER `setsalairebrut` BEFORE INSERT ON `Salarie`
 FOR EACH ROW BEGIN
SET NEW.salaire_brut_s = NEW.salaire_net_s * 1.5;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `Taxe`
--

CREATE TABLE IF NOT EXISTS `Taxe` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `type_t` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `montant_t` int(11) NOT NULL,
  `date_emi_t` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_recouv_t` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_t`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Contenu de la table `Taxe`
--

INSERT INTO `Taxe` (`id_t`, `type_t`, `montant_t`, `date_emi_t`, `date_recouv_t`) VALUES
(3, 'Taxe2', 425, '2018-01-03 20:27:42', '2018-01-31 23:59:59'),
(2, 'Taxe1', 180, '2018-01-03 20:31:15', '2018-01-31 23:59:59');

-- --------------------------------------------------------

--
-- Structure de la table `TVA`
--

CREATE TABLE IF NOT EXISTS `TVA` (
  `id_tva` int(11) NOT NULL AUTO_INCREMENT,
  `montant_tva` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`id_tva`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Contenu de la table `TVA`
--

INSERT INTO `TVA` (`id_tva`, `montant_tva`) VALUES
(1, 20);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE IF NOT EXISTS `Utilisateur` (
  `id_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`,`pass_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id_user`, `pass_user`) VALUES
('admine', 'password'),
('erol', 'acundeger');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
