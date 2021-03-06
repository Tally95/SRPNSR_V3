-- MySQL Script generated by MySQL Workbench
-- 05/21/18 21:32:04
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bd_sracg
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_sracg
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_sracg` DEFAULT CHARACTER SET latin1 ;
USE `bd_sracg` ;

-- -----------------------------------------------------
-- Table `bd_sracg`.`parque`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`parque` (
  `numParque` INT(11) NOT NULL AUTO_INCREMENT,
  `nomParque` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`numParque`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`patrocinador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`patrocinador` (
  `idPatrocinador` INT(11) NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `correo` VARCHAR(45) NULL DEFAULT NULL,
  `clave` VARCHAR(45) NULL DEFAULT NULL,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `telefono` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idPatrocinador`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`personas` (
  `idPersona` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NULL DEFAULT NULL,
  `precio` INT(11) NULL DEFAULT NULL,
  `cantidad` INT(11) NULL DEFAULT NULL,
  `total` INT(11) NULL DEFAULT NULL,
  `numReservacion` INT(11) NULL DEFAULT NULL,
  `tipoMoneda` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idPersona`))
ENGINE = InnoDB
AUTO_INCREMENT = 445
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`reservacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`reservacion` (
  `numReservacion` INT(11) NOT NULL AUTO_INCREMENT,
  `parqueNacional` VARCHAR(45) NULL DEFAULT NULL,
  `sector` VARCHAR(45) NULL DEFAULT NULL,
  `ingresoPor` VARCHAR(45) NULL DEFAULT NULL,
  `fEntrada` VARCHAR(45) NULL DEFAULT NULL,
  `fSalida` VARCHAR(45) NULL DEFAULT NULL,
  `diaE` INT(11) NULL DEFAULT NULL,
  `mesE` INT(11) NULL DEFAULT NULL,
  `annoE` INT(11) NULL DEFAULT NULL,
  `dias` VARCHAR(45) NULL DEFAULT NULL,
  `tipoVisita` VARCHAR(45) NULL DEFAULT NULL,
  `nombreUsuario` VARCHAR(45) NULL DEFAULT NULL,
  `emailUsuario` VARCHAR(45) NULL DEFAULT NULL,
  `totalColones` INT(11) NULL DEFAULT NULL,
  `totalDolares` INT(11) NULL DEFAULT NULL,
  `estado` VARCHAR(45) NULL DEFAULT NULL,
  `alimentacion` VARCHAR(2) NULL DEFAULT NULL,
  `laboratorio` VARCHAR(2) NULL DEFAULT NULL,
  `lavanderia` VARCHAR(2) NULL DEFAULT NULL,
  `senderos` VARCHAR(2) NULL DEFAULT NULL,
  `charla` VARCHAR(2) NULL DEFAULT NULL,
  `aulaConferencia` VARCHAR(2) NULL DEFAULT NULL,
  PRIMARY KEY (`numReservacion`))
ENGINE = InnoDB
AUTO_INCREMENT = 53
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`sector`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`sector` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `capacidad_diaria` INT(11) NULL DEFAULT NULL,
  `capacidad_acampar` INT(11) NULL DEFAULT NULL,
  `asp` INT(11) NULL DEFAULT NULL,
  `parque` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`tipovisita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`tipovisita` (
  `numTipoVisita` INT(11) NOT NULL AUTO_INCREMENT,
  `nomTipoVisita` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`numTipoVisita`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`tipovisitante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`tipovisitante` (
  `numTipo` INT(11) NOT NULL AUTO_INCREMENT,
  `tipo` VARCHAR(45) NOT NULL,
  `precio` INT(11) NOT NULL,
  `tipoMoneda` VARCHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`numTipo`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bd_sracg`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_sracg`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(20) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `apellido` VARCHAR(40) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `cedula` VARCHAR(25) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `contrasena` VARCHAR(30) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `puesto` VARCHAR(50) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  `email` VARCHAR(30) CHARACTER SET 'utf8' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
