-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dev8_trad_music
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `dev8_trad_music` ;

-- -----------------------------------------------------
-- Schema dev8_trad_music
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dev8_trad_music` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci ;
USE `dev8_trad_music` ;

-- -----------------------------------------------------
-- Table `dev8_trad_music`.`musician`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`musician` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NULL,
  `image` VARCHAR(255) NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dev8_trad_music`.`instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`instrument` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `icon` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dev8_trad_music`.`musician_has_instrument`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`musician_has_instrument` (
  `musician_id` BIGINT NOT NULL,
  `instrument_id` BIGINT NOT NULL,
  PRIMARY KEY (`musician_id`, `instrument_id`),
  INDEX `fk_musician_has_instrument_instrument1_idx` (`instrument_id` ASC),
  INDEX `fk_musician_has_instrument_musician_idx` (`musician_id` ASC),
  CONSTRAINT `fk_musician_has_instrument_musician`
    FOREIGN KEY (`musician_id`)
    REFERENCES `dev8_trad_music`.`musician` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_musician_has_instrument_instrument1`
    FOREIGN KEY (`instrument_id`)
    REFERENCES `dev8_trad_music`.`instrument` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dev8_trad_music`.`pub`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`pub` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NULL,
  `zip_code` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dev8_trad_music`.`gig`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`gig` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `date_start` DATETIME NOT NULL,
  `date_end` DATETIME NULL,
  `pub_id` BIGINT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_gig_pub1_idx` (`pub_id` ASC),
  CONSTRAINT `fk_gig_pub1`
    FOREIGN KEY (`pub_id`)
    REFERENCES `dev8_trad_music`.`pub` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dev8_trad_music`.`gig_has_musician`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dev8_trad_music`.`gig_has_musician` (
  `gig_id` BIGINT NOT NULL,
  `musician_id` BIGINT NOT NULL,
  PRIMARY KEY (`gig_id`, `musician_id`),
  INDEX `fk_gig_has_musician_musician1_idx` (`musician_id` ASC),
  INDEX `fk_gig_has_musician_gig1_idx` (`gig_id` ASC),
  CONSTRAINT `fk_gig_has_musician_gig1`
    FOREIGN KEY (`gig_id`)
    REFERENCES `dev8_trad_music`.`gig` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gig_has_musician_musician1`
    FOREIGN KEY (`musician_id`)
    REFERENCES `dev8_trad_music`.`musician` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`musician`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`musician` (`id`, `first_name`, `last_name`, `image`, `email`, `password`) VALUES (1, 'John', 'Doe', NULL, 'john.doe@gmail.com', 'john');
INSERT INTO `dev8_trad_music`.`musician` (`id`, `first_name`, `last_name`, `image`, `email`, `password`) VALUES (2, 'Sean', 'O\'Broin', 'sean-obroin.jpeg', 'sean.obroin@gmail.com', 'sean');
INSERT INTO `dev8_trad_music`.`musician` (`id`, `first_name`, `last_name`, `image`, `email`, `password`) VALUES (3, 'Gavin', 'Pennycook', 'gavin-pennycook.jpg', 'gavin.pennycook@gmail.com', 'gavin');

COMMIT;


-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`instrument`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (1, 'Guitar', 'fa-solid fa-guitar');
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (2, 'Flute', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (3, 'Fiddle', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (4, 'Tin whistle', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (5, 'Banjo', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (6, 'Spoon', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (7, 'Singing', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (8, 'Uilleann pipe', NULL);
INSERT INTO `dev8_trad_music`.`instrument` (`id`, `name`, `icon`) VALUES (9, 'Concertina', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`musician_has_instrument`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (1, 1);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (1, 5);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (2, 2);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (2, 4);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (3, 2);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (3, 4);
INSERT INTO `dev8_trad_music`.`musician_has_instrument` (`musician_id`, `instrument_id`) VALUES (3, 3);

COMMIT;


-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`pub`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`pub` (`id`, `name`, `image`, `address`, `zip_code`, `city`) VALUES (1, 'Temple bar', 'templebar.jpg', '47-48 Temple Bar', 'D02 N725', 'Dublin');
INSERT INTO `dev8_trad_music`.`pub` (`id`, `name`, `image`, `address`, `zip_code`, `city`) VALUES (2, 'O\'Connell\'s', 'oconnell.jpg', '6 Pl. du Parlement de Bretagne', '35000', 'Rennes');
INSERT INTO `dev8_trad_music`.`pub` (`id`, `name`, `image`, `address`, `zip_code`, `city`) VALUES (3, 'The Brazen Head', 'thebrazenhead.jpg', NULL, NULL, NULL);
INSERT INTO `dev8_trad_music`.`pub` (`id`, `name`, `image`, `address`, `zip_code`, `city`) VALUES (4, 'Mulligan\'s', 'mulligans.jpg', NULL, NULL, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`gig`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`gig` (`id`, `date_start`, `date_end`, `pub_id`) VALUES (1, '2022-12-01 20:30:00', '2022-12-01 22:30:00', 1);
INSERT INTO `dev8_trad_music`.`gig` (`id`, `date_start`, `date_end`, `pub_id`) VALUES (2, '2022-12-03 21:00:00', NULL, 2);
INSERT INTO `dev8_trad_music`.`gig` (`id`, `date_start`, `date_end`, `pub_id`) VALUES (3, '2022-12-03 21:00:00', NULL, 3);
INSERT INTO `dev8_trad_music`.`gig` (`id`, `date_start`, `date_end`, `pub_id`) VALUES (4, '2023-01-05 21:15:00', NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `dev8_trad_music`.`gig_has_musician`
-- -----------------------------------------------------
START TRANSACTION;
USE `dev8_trad_music`;
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (1, 2);
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (1, 3);
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (3, 3);
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (4, 1);
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (4, 2);
INSERT INTO `dev8_trad_music`.`gig_has_musician` (`gig_id`, `musician_id`) VALUES (4, 3);

COMMIT;

