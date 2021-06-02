-- MySQL Script generated by MySQL Workbench
-- Wed Apr 28 01:13:30 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema vakcinacija
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `vakcinacija` ;

-- -----------------------------------------------------
-- Schema vakcinacija
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vakcinacija` DEFAULT CHARACTER SET utf8 ;
SHOW WARNINGS;
USE `vakcinacija` ;

-- -----------------------------------------------------
-- Table `vakcinacija`.`Mesto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`Mesto` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`Mesto` (
  `idMesta` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(100) NULL DEFAULT NULL,
  `Opis` TEXT NULL DEFAULT NULL,
  `DnevnaKolicina` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idMesta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

INSERT INTO `mesto` (`idMesta`, `Naziv`, `Opis`, `DnevnaKolicina`) VALUES
(1, 'Beograd', NULL, NULL),
(2, 'Smederevo', NULL, NULL),
(3, 'Novi Pazar', NULL, NULL);

-- -----------------------------------------------------
-- Table `vakcinacija`.`TipVakcine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`TipVakcine` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`TipVakcine` (
  `idTipVakcine` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(45) NULL DEFAULT NULL,
  `Opis` LONGTEXT CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '	',
  `VremeDoDrugeVakcinacije` INT NULL DEFAULT NULL,
  `KolicinaVakcinisanih` INT NULL DEFAULT NULL,
  `BrojNezeljenih` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idTipVakcine`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`ZdravstveniRadnici`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`ZdravstveniRadnici` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`ZdravstveniRadnici` (
  `idZdravstveniRadnik` INT NOT NULL,
  `JMBG` VARCHAR(45) NULL DEFAULT NULL,
  `Ime` VARCHAR(45) NULL DEFAULT NULL,
  `Prezime` VARCHAR(45) NULL DEFAULT NULL,
  `Licenca` VARCHAR(45) NULL DEFAULT NULL,
  `TipRadnika` ENUM('Lekar', 'Sestra') NULL DEFAULT NULL,
  `Specijalizacija` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(512) NULL,
  PRIMARY KEY (`idZdravstveniRadnik`),
  UNIQUE INDEX `username_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `zdravstveniradnici` (`idZdravstveniRadnik`, `JMBG`, `Ime`, `Prezime`, `Licenca`, `TipRadnika`, `Specijalizacija`, `email`, `password`) VALUES
(1, '1234567891234', 'Ivana', 'Peric', '22000', 'Sestra', 'Nema', 'ivana@gmail.com', 'ivana123'),
(2, '1234567894321', 'Tamara', 'Jovic', '22444', 'Lekar', 'Opsta medicina', 'tamara@gmail.com', 'tamara123');


SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`Gradjanin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`Gradjanin` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`Gradjanin` (
  `idGradjanin` INT NOT NULL AUTO_INCREMENT,
  `JMBG` CHAR(13) NULL DEFAULT NULL,
  `Ime` VARCHAR(50) NULL DEFAULT NULL,
  `Prezime` VARCHAR(50) NULL DEFAULT NULL,
  `BrojTelefona` VARCHAR(45) NULL DEFAULT NULL,
  `Adresa` VARCHAR(150) NULL DEFAULT NULL,
  `Prijava` TINYINT(1) NULL DEFAULT NULL,
  `IdTipVakcine` INT NULL DEFAULT NULL,
  `StatusPrijave` ENUM('Nije Zakazan', 'Zakazan') NULL DEFAULT NULL,
  `TerminT1` TINYINT(1) NULL DEFAULT NULL,
  `DatumT1` DATETIME NULL DEFAULT NULL,
  `StatusT1` ENUM('Uspesno', 'Neuspesno') NULL DEFAULT NULL,
  `TerminT2` TINYINT(1) NULL DEFAULT NULL,
  `DatumT2` DATETIME NULL DEFAULT NULL,
  `StatusT2` ENUM('Uspesno', 'Neuspesno') NULL DEFAULT NULL,
  `IdSestraT1` INT NULL DEFAULT NULL,
  `IdSestraT2` INT NULL DEFAULT NULL,
  `IdMesta` INT NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL,
  `password` VARCHAR(512) NULL,
  PRIMARY KEY (`idGradjanin`),
  INDEX `fk_Gradjanin_TipVakcine_idx` (`IdTipVakcine` ASC) VISIBLE,
  INDEX `fk_Gradjanin_ZdravstveniRadnici1_idx` (`IdSestraT1` ASC) VISIBLE,
  INDEX `fk_Gradjanin_ZdravstveniRadnici2_idx` (`IdSestraT2` ASC) VISIBLE,
  INDEX `fk_Gradjanin_Mesto1_idx` (`IdMesta` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  CONSTRAINT `fk_Gradjanin_Mesto1`
    FOREIGN KEY (`IdMesta`)
    REFERENCES `vakcinacija`.`Mesto` (`idMesta`),
  CONSTRAINT `fk_Gradjanin_TipVakcine`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`TipVakcine` (`idTipVakcine`),
  CONSTRAINT `fk_Gradjanin_ZdravstveniRadnici1`
    FOREIGN KEY (`IdSestraT1`)
    REFERENCES `vakcinacija`.`ZdravstveniRadnici` (`idZdravstveniRadnik`),
  CONSTRAINT `fk_Gradjanin_ZdravstveniRadnici2`
    FOREIGN KEY (`IdSestraT2`)
    REFERENCES `vakcinacija`.`ZdravstveniRadnici` (`idZdravstveniRadnik`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

INSERT INTO `gradjanin` (`idGradjanin`, `JMBG`, `Ime`, `Prezime`, `BrojTelefona`, `Adresa`, `Prijava`, `IdTipVakcine`, `StatusPrijave`, `TerminT1`, `DatumT1`, `StatusT1`, `TerminT2`, `DatumT2`, `StatusT2`, `IdSestraT1`, `IdSestraT2`, `IdMesta`, `email`, `password`) VALUES
(1, '2903001783953', 'Amar', 'Celic', '0611231236', 'Stevana Nemanje 5', 1, NULL, 'Nije Zakazan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'amarcelic@gmail.com', 'amarcelic'),
(2, '1406999783953', 'Nedim', 'Jukic', '0616090711', 'Dubrovacka 406', NULL, NULL, 'Nije Zakazan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'nedim1jukic@gmail.com', 'nedim123');

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`IzvestajLekara`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`IzvestajLekara` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`IzvestajLekara` (
  `idIzvestaja` INT NOT NULL,
  `IdGradjanin` INT NOT NULL,
  `Diagnoza` LONGTEXT NULL DEFAULT NULL,
  `IdTipVakcine` INT NOT NULL,
  PRIMARY KEY (`idIzvestaja`),
  INDEX `fk_IzvestajLekara_Gradjanin1_idx` (`IdGradjanin` ASC) VISIBLE,
  INDEX `fk_IzvestajLekara_TipVakcine1_idx` (`IdTipVakcine` ASC) VISIBLE,
  CONSTRAINT `fk_IzvestajLekara_Gradjanin1`
    FOREIGN KEY (`IdGradjanin`)
    REFERENCES `vakcinacija`.`Gradjanin` (`idGradjanin`),
  CONSTRAINT `fk_IzvestajLekara_TipVakcine1`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`TipVakcine` (`idTipVakcine`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`NezeljeneReakcije`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`NezeljeneReakcije` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`NezeljeneReakcije` (
  `idNezeljeneReakcije` INT NOT NULL,
  `Naziv` VARCHAR(45) NULL DEFAULT NULL,
  `Opis` LONGTEXT NULL DEFAULT NULL,
  PRIMARY KEY (`idNezeljeneReakcije`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`IzvestajLekaraImaNezeljeneReakcije`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`IzvestajLekaraImaNezeljeneReakcije` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`IzvestajLekaraImaNezeljeneReakcije` (
  `IzvestajLekara_idIzvestaja` INT NOT NULL,
  `NezeljeneReakcije_idNezeljeneReakcije` INT NOT NULL,
  PRIMARY KEY (`IzvestajLekara_idIzvestaja`, `NezeljeneReakcije_idNezeljeneReakcije`),
  INDEX `fk_IzvestajLekara_has_NezeljeneReakcije_NezeljeneReakcije1_idx` (`NezeljeneReakcije_idNezeljeneReakcije` ASC) VISIBLE,
  INDEX `fk_IzvestajLekara_has_NezeljeneReakcije_IzvestajLekara1_idx` (`IzvestajLekara_idIzvestaja` ASC) VISIBLE,
  CONSTRAINT `fk_IzvestajLekara_has_NezeljeneReakcije_IzvestajLekara1`
    FOREIGN KEY (`IzvestajLekara_idIzvestaja`)
    REFERENCES `vakcinacija`.`IzvestajLekara` (`idIzvestaja`),
  CONSTRAINT `fk_IzvestajLekara_has_NezeljeneReakcije_NezeljeneReakcije1`
    FOREIGN KEY (`NezeljeneReakcije_idNezeljeneReakcije`)
    REFERENCES `vakcinacija`.`NezeljeneReakcije` (`idNezeljeneReakcije`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`MestoRezervisanoPoDanu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`MestoRezervisanoPoDanu` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`MestoRezervisanoPoDanu` (
  `idMestoRezervisanoPoDanu` INT NOT NULL,
  `Datum` DATE NULL DEFAULT NULL,
  `BrojRezervisanih` INT NULL DEFAULT NULL,
  `IdMesta` INT NOT NULL,
  PRIMARY KEY (`idMestoRezervisanoPoDanu`),
  INDEX `fk_MestoRezervisanoPoDanu_Mesto1_idx` (`IdMesta` ASC) VISIBLE,
  CONSTRAINT `fk_MestoRezervisanoPoDanu_Mesto1`
    FOREIGN KEY (`IdMesta`)
    REFERENCES `vakcinacija`.`Mesto` (`idMesta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`PristigleVakcine`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`PristigleVakcine` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`PristigleVakcine` (
  `idPristigleVakcine` INT NOT NULL,
  `RaspolozivaKolicina` INT NULL DEFAULT NULL,
  `RezervisanaKolicina` INT NULL DEFAULT NULL,
  `RokUpotrebe` DATE NULL DEFAULT NULL,
  `IdTipVakcine` INT NOT NULL,
  PRIMARY KEY (`idPristigleVakcine`),
  INDEX `fk_PristigleVakcine_TipVakcine1_idx` (`IdTipVakcine` ASC) VISIBLE,
  CONSTRAINT `fk_PristigleVakcine_TipVakcine1`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`TipVakcine` (`idTipVakcine`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `vakcinacija`.`Admin`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vakcinacija`.`Admin` ;

SHOW WARNINGS;
CREATE TABLE IF NOT EXISTS `vakcinacija`.`Admin` (
  `idAdmin` INT NOT NULL,
  `email` VARCHAR(45) NULL,
  `password` VARCHAR(512) NULL,
  `ime` VARCHAR(45) NULL,
  `prezime` VARCHAR(45) NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB;

INSERT INTO `admin` (`idAdmin`, `email`, `password`, `ime`, `prezime`) VALUES
(1, 'marko@gmail.com', 'marko123', 'Marko', 'Stankovic');

SHOW WARNINGS;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;