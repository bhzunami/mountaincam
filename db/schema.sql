SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mountaincam` ;
CREATE SCHEMA IF NOT EXISTS `mountaincam` DEFAULT CHARACTER SET utf8 ;
USE `mountaincam` ;
GRANT ALL PRIVILEGES ON mountaincam.* TO 'mountaincam'@'%' IDENTIFIED BY 'mountain' WITH GRANT OPTION;

-- -----------------------------------------------------
-- Table `mountaincam`.`Category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mountaincam`.`Category` ;

CREATE  TABLE IF NOT EXISTS `mountaincam`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `mountaincam`.`Images`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mountaincam`.`Images` ;

CREATE  TABLE IF NOT EXISTS `mountaincam`.`Images` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `pfad` VARCHAR(45) NOT NULL ,
  `date` TIMESTAMP NOT NULL ,
  `Category_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Images_Category` (`Category_id` ASC) ,
  CONSTRAINT `fk_Images_Category`
    FOREIGN KEY (`Category_id` )
    REFERENCES `mountaincam`.`Category` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mountaincam`.`Category`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `mountaincam`;
INSERT INTO `mountaincam`.`Category` (`id`, `name`) VALUES (1, 'morgen');
INSERT INTO `mountaincam`.`Category` (`id`, `name`) VALUES (2, 'mittag');
INSERT INTO `mountaincam`.`Category` (`id`, `name`) VALUES (3, 'abend');

COMMIT;
