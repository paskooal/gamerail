-- MySQL Script generated by MySQL Workbench
-- Sun Jun 16 17:34:21 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema gamerail
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema gamerail
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gamerail` DEFAULT CHARACTER SET utf8 ;
USE `gamerail` ;

-- -----------------------------------------------------
-- Table `gamerail`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gamerail`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(45) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `dataNasc` DATE NOT NULL,
  `adminUnlock` INT NULL,
  `foto` BLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `username_UNIQUE` (`username` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gamerail`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gamerail`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `foto` BLOB NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gamerail`.`jogos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gamerail`.`jogos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `vendas` INT NULL,
  `sobre` VARCHAR(500) NULL,
  `dev_id` INT NOT NULL,
  `dist_id` INT NOT NULL,
  `categoria_id` INT NOT NULL,
  `valor` DECIMAL(2) NULL,
  `foto` BLOB NULL,
  PRIMARY KEY (`id`, `dev_id`, `dist_id`, `categoria_id`),
  UNIQUE INDEX `nome_UNIQUE` (`nome` ASC) VISIBLE,
  INDEX `fk_jogos_user1_idx` (`dev_id` ASC) VISIBLE,
  INDEX `fk_jogos_user2_idx` (`dist_id` ASC) VISIBLE,
  INDEX `fk_jogos_categoria1_idx` (`categoria_id` ASC) VISIBLE,
  CONSTRAINT `fk_jogos_user1`
    FOREIGN KEY (`dev_id`)
    REFERENCES `gamerail`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_user2`
    FOREIGN KEY (`dist_id`)
    REFERENCES `gamerail`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `gamerail`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
