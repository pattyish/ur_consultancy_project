-- MySQL Script generated by MySQL Workbench
-- 12/19/20 17:33:40
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ur_consultancy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ur_consultancy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ur_consultancy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ur_consultancy` ;

-- -----------------------------------------------------
-- Table `ur_consultancy`.`user_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`user_type` (
  `user_type_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_type` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`user_type_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`status` (
  `status_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `status_name` VARCHAR(5) NOT NULL COMMENT '',
  PRIMARY KEY (`status_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `user_first_name` VARCHAR(45) NOT NULL COMMENT '',
  `user_last_name` VARCHAR(45) NOT NULL COMMENT '',
  `user_gender` VARCHAR(10) NOT NULL COMMENT '',
  `user_national_id` VARCHAR(20) NOT NULL COMMENT '',
  `user_email` VARCHAR(45) NOT NULL COMMENT '',
  `user_password` VARCHAR(45) NOT NULL COMMENT '',
  `user_status_id` INT NOT NULL DEFAULT 1 COMMENT '',
  `user_type_id` INT NOT NULL COMMENT '',
  `user_profile_image` VARCHAR(45) NOT NULL COMMENT '',
  `user_adder_id` INT NOT NULL COMMENT '',
  `user_last_active` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`)  COMMENT '',
  INDEX `users.status_idx` (`user_status_id` ASC)  COMMENT '',
  INDEX `users.user_type_idx` (`user_type_id` ASC)  COMMENT '',
  INDEX `users.users.adder_idx` (`user_adder_id` ASC)  COMMENT '',
  UNIQUE INDEX `user_national_id_UNIQUE` (`user_national_id` ASC)  COMMENT '',
  UNIQUE INDEX `user_email_UNIQUE` (`user_email` ASC)  COMMENT '',
  CONSTRAINT `users.status`
    FOREIGN KEY (`user_status_id`)
    REFERENCES `ur_consultancy`.`status` (`status_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `users.user_type`
    FOREIGN KEY (`user_type_id`)
    REFERENCES `ur_consultancy`.`user_type` (`user_type_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `users.users.adder`
    FOREIGN KEY (`user_adder_id`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`message_read`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`message_read` (
  `message_read_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `message_read_name` VARCHAR(20) NOT NULL COMMENT '',
  PRIMARY KEY (`message_read_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`message` (
  `message_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `message_content` TEXT NULL COMMENT '',
  `message_file_docs` VARCHAR(45) NULL COMMENT '',
  `message_img` VARCHAR(45) NULL COMMENT '',
  `message_send_date` DATETIME NOT NULL COMMENT '',
  `message_sender_id` INT NOT NULL COMMENT '',
  `message_receiver_id` INT NOT NULL COMMENT '',
  `message_status_id` INT NOT NULL DEFAULT 1 COMMENT '',
  `message_reads` INT NOT NULL DEFAULT 2 COMMENT '',
  PRIMARY KEY (`message_id`)  COMMENT '',
  INDEX `message.users_idx` (`message_sender_id` ASC)  COMMENT '',
  INDEX `message.users.receiver_idx` (`message_receiver_id` ASC)  COMMENT '',
  INDEX `message.status_idx` (`message_status_id` ASC)  COMMENT '',
  INDEX `message.reads_idx` (`message_reads` ASC)  COMMENT '',
  CONSTRAINT `message.users.sender`
    FOREIGN KEY (`message_sender_id`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `message.users.receiver`
    FOREIGN KEY (`message_receiver_id`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `message.status`
    FOREIGN KEY (`message_status_id`)
    REFERENCES `ur_consultancy`.`status` (`status_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `message.reads`
    FOREIGN KEY (`message_reads`)
    REFERENCES `ur_consultancy`.`message_read` (`message_read_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`country`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`country` (
  `country_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `country_name` VARCHAR(60) NOT NULL COMMENT '',
  PRIMARY KEY (`country_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`client`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`client` (
  `client_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `client_name` VARCHAR(60) NOT NULL COMMENT '',
  `client_email` VARCHAR(60) NOT NULL COMMENT '',
  `country_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`client_id`)  COMMENT '',
  UNIQUE INDEX `client_email_UNIQUE` (`client_email` ASC)  COMMENT '',
  INDEX `client.country_idx` (`country_id` ASC)  COMMENT '',
  CONSTRAINT `client.country`
    FOREIGN KEY (`country_id`)
    REFERENCES `ur_consultancy`.`country` (`country_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`consultancy_progress`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`consultancy_progress` (
  `consultancy_progress_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `consultancy_progress_name` VARCHAR(20) NOT NULL COMMENT '',
  PRIMARY KEY (`consultancy_progress_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`consultancy`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`consultancy` (
  `consultancy_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `consultancy_name` TEXT NOT NULL COMMENT '',
  `consultancy_sign_date` DATETIME NOT NULL COMMENT '',
  `consultancy_start_date` DATE NOT NULL COMMENT '',
  `consultancy_end_date` DATE NOT NULL COMMENT '',
  `consultancy_amount` DOUBLE NOT NULL COMMENT '',
  `consultancy_currency` VARCHAR(10) NOT NULL COMMENT '',
  `consultancy_UR_percentage` DOUBLE NOT NULL COMMENT '',
  `consultancy_Tax_percentage` DOUBLE NOT NULL COMMENT '',
  `consultancy_consultants_percentage` DOUBLE NOT NULL COMMENT '',
  `consultancy_client_id` INT NOT NULL COMMENT '',
  `consultancy_progress` INT NOT NULL DEFAULT 2 COMMENT '',
  `consultancy_adder` INT NOT NULL COMMENT '',
  PRIMARY KEY (`consultancy_id`)  COMMENT '',
  INDEX `consultancy.client_idx` (`consultancy_client_id` ASC)  COMMENT '',
  INDEX `consultancy.progress_idx` (`consultancy_progress` ASC)  COMMENT '',
  INDEX `consultancy.users.adder_idx` (`consultancy_adder` ASC)  COMMENT '',
  CONSTRAINT `consultancy.client`
    FOREIGN KEY (`consultancy_client_id`)
    REFERENCES `ur_consultancy`.`client` (`client_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `consultancy.progress`
    FOREIGN KEY (`consultancy_progress`)
    REFERENCES `ur_consultancy`.`consultancy_progress` (`consultancy_progress_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `consultancy.users.adder`
    FOREIGN KEY (`consultancy_adder`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`consultant_contract`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`consultant_contract` (
  `consultant_contract_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `contract_consultancy_id` INT NOT NULL COMMENT '',
  `contract_consultant_id` INT NOT NULL COMMENT '',
  `contract_sign_date` DATETIME NOT NULL COMMENT '',
  `contract_start_date` DATE NOT NULL COMMENT '',
  `contract_end_date` DATE NOT NULL COMMENT '',
  `contract_amount` DOUBLE NOT NULL COMMENT '',
  `contract_assigner_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`consultant_contract_id`)  COMMENT '',
  INDEX `contract.consultancy_idx` (`contract_consultancy_id` ASC)  COMMENT '',
  INDEX `contract.consltant_idx` (`contract_consultant_id` ASC)  COMMENT '',
  INDEX `contract.users.assigner_idx` (`contract_assigner_id` ASC)  COMMENT '',
  CONSTRAINT `contract.consultancy`
    FOREIGN KEY (`contract_consultancy_id`)
    REFERENCES `ur_consultancy`.`consultancy` (`consultancy_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `contract.users.consultant`
    FOREIGN KEY (`contract_consultant_id`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `contract.users.assigner`
    FOREIGN KEY (`contract_assigner_id`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`campus`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`campus` (
  `campus_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `campus_name` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`campus_id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`college`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`college` (
  `college_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `college_name` TEXT NOT NULL COMMENT '',
  `campus_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`college_id`)  COMMENT '',
  INDEX `college.campus_idx` (`campus_id` ASC)  COMMENT '',
  CONSTRAINT `college.campus`
    FOREIGN KEY (`campus_id`)
    REFERENCES `ur_consultancy`.`campus` (`campus_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`school`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`school` (
  `school_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `school_name` TEXT NOT NULL COMMENT '',
  `college_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`school_id`)  COMMENT '',
  INDEX `school.college_idx` (`college_id` ASC)  COMMENT '',
  CONSTRAINT `school.college`
    FOREIGN KEY (`college_id`)
    REFERENCES `ur_consultancy`.`college` (`college_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`department` (
  `department_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `department_name` TEXT NOT NULL COMMENT '',
  `school_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`department_id`)  COMMENT '',
  INDEX `department.school_idx` (`school_id` ASC)  COMMENT '',
  CONSTRAINT `department.school`
    FOREIGN KEY (`school_id`)
    REFERENCES `ur_consultancy`.`school` (`school_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`reset_password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`reset_password` (
  `reset_password_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `reset_password_user` INT NOT NULL COMMENT '',
  `reset_password_date` DATETIME NOT NULL COMMENT '',
  `reset_password_code` VARCHAR(10) NOT NULL COMMENT '',
  PRIMARY KEY (`reset_password_id`)  COMMENT '',
  INDEX `reset_password.users_idx` (`reset_password_user` ASC)  COMMENT '',
  CONSTRAINT `reset_password.users`
    FOREIGN KEY (`reset_password_user`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ur_consultancy`.`block_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ur_consultancy`.`block_user` (
  `block_user_id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `block_user_blocker` INT NOT NULL COMMENT '',
  `block_user_blockee` INT NOT NULL COMMENT '',
  `block_user_date` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`block_user_id`)  COMMENT '',
  INDEX `block.users.blocker_idx` (`block_user_blocker` ASC)  COMMENT '',
  INDEX `block.users.blockee_idx` (`block_user_blockee` ASC)  COMMENT '',
  CONSTRAINT `block.users.blocker`
    FOREIGN KEY (`block_user_blocker`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `block.users.blockee`
    FOREIGN KEY (`block_user_blockee`)
    REFERENCES `ur_consultancy`.`users` (`user_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
