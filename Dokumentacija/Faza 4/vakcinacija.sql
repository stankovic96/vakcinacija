-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema vakcinacija
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema vakcinacija
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `vakcinacija` DEFAULT CHARACTER SET utf8 ;
USE `vakcinacija` ;

-- -----------------------------------------------------
-- Table `vakcinacija`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`admin` (
  `idAdmin` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(512) NULL DEFAULT NULL,
  `ime` VARCHAR(45) NULL DEFAULT NULL,
  `prezime` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idAdmin`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`mesto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`mesto` (
  `idMesta` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(100) NULL DEFAULT NULL,
  `Opis` TEXT NULL DEFAULT NULL,
  `DnevnaKolicina` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idMesta`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`zdravstveniradnici`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`zdravstveniradnici` (
  `idZdravstveniRadnik` INT NOT NULL AUTO_INCREMENT,
  `JMBG` VARCHAR(45) NULL DEFAULT NULL,
  `Ime` VARCHAR(45) NULL DEFAULT NULL,
  `Prezime` VARCHAR(45) NULL DEFAULT NULL,
  `Licenca` VARCHAR(45) NULL DEFAULT NULL,
  `TipRadnika` ENUM('Lekar', 'Sestra') NULL DEFAULT NULL,
  `Specijalizacija` VARCHAR(100) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  `password` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`idZdravstveniRadnik`),
  UNIQUE INDEX `username_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`tipvakcine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`tipvakcine` (
  `idTipVakcine` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(45) NULL DEFAULT NULL,
  `Opis` LONGTEXT CHARACTER SET 'utf8' NULL DEFAULT NULL COMMENT '	',
  `VremeDoDrugeVakcinacije` INT NULL DEFAULT NULL,
  `KolicinaVakcinisanih` INT NULL DEFAULT NULL,
  `BrojNezeljenih` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idTipVakcine`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`gradjanin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`gradjanin` (
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
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `password` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY (`idGradjanin`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_Gradjanin_TipVakcine_idx` (`IdTipVakcine` ASC) VISIBLE,
  INDEX `fk_Gradjanin_Mesto1_idx` (`IdMesta` ASC) VISIBLE,
  INDEX `fk_Gradjanin_Sestra1_idx` (`IdSestraT1` ASC) VISIBLE,
  INDEX `fk_Gradjanin_Sestra2_idx` (`IdSestraT2` ASC) VISIBLE,
  CONSTRAINT `fk_Gradjanin_Mesto1`
    FOREIGN KEY (`IdMesta`)
    REFERENCES `vakcinacija`.`mesto` (`idMesta`),
  CONSTRAINT `fk_Gradjanin_Sestra1`
    FOREIGN KEY (`IdSestraT1`)
    REFERENCES `vakcinacija`.`zdravstveniradnici` (`idZdravstveniRadnik`),
  CONSTRAINT `fk_Gradjanin_Sestra2`
    FOREIGN KEY (`IdSestraT2`)
    REFERENCES `vakcinacija`.`zdravstveniradnici` (`idZdravstveniRadnik`),
  CONSTRAINT `fk_Gradjanin_TipVakcine`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`tipvakcine` (`idTipVakcine`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`izvestajlekara`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`izvestajlekara` (
  `idIzvestaja` INT NOT NULL AUTO_INCREMENT,
  `IdGradjanin` INT NOT NULL,
  `Diagnoza` LONGTEXT NULL DEFAULT NULL,
  `IdTipVakcine` INT NOT NULL,
  `IdLekara` INT NOT NULL,
  PRIMARY KEY (`idIzvestaja`),
  INDEX `fk_IzvestajLekara_Gradjanin1_idx` (`IdGradjanin` ASC) VISIBLE,
  INDEX `fk_IzvestajLekara_TipVakcine1_idx` (`IdTipVakcine` ASC) VISIBLE,
  INDEX `fk_IzvestajLekara_ZdravstevniRadnik_idx` (`IdLekara` ASC) VISIBLE,
  CONSTRAINT `fk_IzvestajLekara_Gradjanin1`
    FOREIGN KEY (`IdGradjanin`)
    REFERENCES `vakcinacija`.`gradjanin` (`idGradjanin`),
  CONSTRAINT `fk_IzvestajLekara_TipVakcine1`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`tipvakcine` (`idTipVakcine`),
  CONSTRAINT `fk_IzvestajLekara_ZdravstevniRadnik`
    FOREIGN KEY (`IdLekara`)
    REFERENCES `vakcinacija`.`zdravstveniradnici` (`idZdravstveniRadnik`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`nezeljenereakcije`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`nezeljenereakcije` (
  `idNezeljeneReakcije` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`idNezeljeneReakcije`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`izvestajlekaraimanezeljenereakcije`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`izvestajlekaraimanezeljenereakcije` (
  `IzvestajLekara_idIzvestaja` INT NOT NULL,
  `NezeljeneReakcije_idNezeljeneReakcije` INT NOT NULL,
  PRIMARY KEY (`IzvestajLekara_idIzvestaja`, `NezeljeneReakcije_idNezeljeneReakcije`),
  INDEX `fk_IzvestajLekara_has_NezeljeneReakcije_NezeljeneReakcije1_idx` (`NezeljeneReakcije_idNezeljeneReakcije` ASC) VISIBLE,
  INDEX `fk_IzvestajLekara_has_NezeljeneReakcije_IzvestajLekara1_idx` (`IzvestajLekara_idIzvestaja` ASC) VISIBLE,
  CONSTRAINT `fk_IzvestajLekara_has_NezeljeneReakcije_IzvestajLekara1`
    FOREIGN KEY (`IzvestajLekara_idIzvestaja`)
    REFERENCES `vakcinacija`.`izvestajlekara` (`idIzvestaja`),
  CONSTRAINT `fk_IzvestajLekara_has_NezeljeneReakcije_NezeljeneReakcije1`
    FOREIGN KEY (`NezeljeneReakcije_idNezeljeneReakcije`)
    REFERENCES `vakcinacija`.`nezeljenereakcije` (`idNezeljeneReakcije`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`mestorezervisanopodanu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`mestorezervisanopodanu` (
  `idMestoRezervisanoPoDanu` INT NOT NULL AUTO_INCREMENT,
  `Datum` DATE NULL DEFAULT NULL,
  `BrojRezervisanih` INT NULL DEFAULT NULL,
  `IdMesta` INT NOT NULL,
  PRIMARY KEY (`idMestoRezervisanoPoDanu`),
  INDEX `fk_MestoRezervisanoPoDanu_Mesto1_idx` (`IdMesta` ASC) VISIBLE,
  CONSTRAINT `fk_MestoRezervisanoPoDanu_Mesto1`
    FOREIGN KEY (`IdMesta`)
    REFERENCES `vakcinacija`.`mesto` (`idMesta`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `vakcinacija`.`pristiglevakcine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `vakcinacija`.`pristiglevakcine` (
  `idPristigleVakcine` INT NOT NULL AUTO_INCREMENT,
  `RaspolozivaKolicina` INT NULL DEFAULT NULL,
  `RezervisanaKolicina` INT NULL DEFAULT NULL,
  `RokUpotrebe` DATE NULL DEFAULT NULL,
  `IdTipVakcine` INT NOT NULL,
  PRIMARY KEY (`idPristigleVakcine`),
  INDEX `fk_PristigleVakcine_TipVakcine1_idx` (`IdTipVakcine` ASC) VISIBLE,
  CONSTRAINT `fk_PristigleVakcine_TipVakcine1`
    FOREIGN KEY (`IdTipVakcine`)
    REFERENCES `vakcinacija`.`tipvakcine` (`idTipVakcine`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
