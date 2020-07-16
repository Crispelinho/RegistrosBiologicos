-- MySQL Script generated by MySQL Workbench
-- Wed Jul 15 19:14:39 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema REGISTROS_BIOLOGICOSBD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema REGISTROS_BIOLOGICOSBD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `REGISTROS_BIOLOGICOSBD` DEFAULT CHARACTER SET utf8 ;
USE `REGISTROS_BIOLOGICOSBD` ;

-- -----------------------------------------------------
-- Table `REGISTROS_BIOLOGICOSBD`.`Proyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `REGISTROS_BIOLOGICOSBD`.`Proyecto` ;

CREATE TABLE IF NOT EXISTS `REGISTROS_BIOLOGICOSBD`.`Proyecto` (
  `idProyecto` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idProyecto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `REGISTROS_BIOLOGICOSBD`.`Ecoregion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `REGISTROS_BIOLOGICOSBD`.`Ecoregion` ;

CREATE TABLE IF NOT EXISTS `REGISTROS_BIOLOGICOSBD`.`Ecoregion` (
  `idEcoregion` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`idEcoregion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `REGISTROS_BIOLOGICOSBD`.`Registro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `REGISTROS_BIOLOGICOSBD`.`Registro` ;

CREATE TABLE IF NOT EXISTS `REGISTROS_BIOLOGICOSBD`.`Registro` (
  `idRegistro` INT NOT NULL,
  `especie` VARCHAR(45) NULL,
  `familia` VARCHAR(45) NULL,
  `nombre_comun` VARCHAR(45) NULL,
  `base_registro` ENUM("observacionHumana", "especimen") NULL,
  `identificador` VARCHAR(45) NULL,
  `ano` VARCHAR(45) NULL,
  `identificacion` VARCHAR(45) NULL,
  `departamento` VARCHAR(45) NULL,
  `municipio` VARCHAR(45) NULL,
  `localidad` VARCHAR(45) NULL,
  `latitud` VARCHAR(45) NULL,
  `longitud` VARCHAR(45) NULL,
  `autor` VARCHAR(45) NULL,
  `fecha` VARCHAR(45) NULL,
  `captura` VARCHAR(45) NULL,
  `idProyecto` INT NOT NULL,
  `idEcoregion` INT NOT NULL,
  `fechaCreacion` DATETIME NULL,
  `fechaActualizacion` DATETIME NULL,
  PRIMARY KEY (`idRegistro`),
  CONSTRAINT `fk_Registro_Proyecto`
    FOREIGN KEY (`idProyecto`)
    REFERENCES `REGISTROS_BIOLOGICOSBD`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Registro_Ecoregion`
    FOREIGN KEY (`idEcoregion`)
    REFERENCES `REGISTROS_BIOLOGICOSBD`.`Ecoregion` (`idEcoregion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
