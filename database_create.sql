-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema forgeDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema forgeDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `forgeDB` DEFAULT CHARACTER SET utf8 ;
USE `forgeDB` ;

-- -----------------------------------------------------
-- Table `forgeDB`.`main`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forgeDB`.`main` (
  `mainID` INT NOT NULL,
  `mainName` VARCHAR(45) NULL,
  PRIMARY KEY (`mainID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `forgeDB`.`sub`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forgeDB`.`sub` (
  `mainID` INT NOT NULL,
  `subID` INT NOT NULL,
  `subName` VARCHAR(45) NULL,
  PRIMARY KEY (`subID`),
  INDEX `main_idx` (`mainID` ASC) VISIBLE,
  CONSTRAINT `main`
    FOREIGN KEY (`mainID`)
    REFERENCES `forgeDB`.`main` (`mainID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `forgeDB`.`items`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `forgeDB`.`items` (
  `subID` INT NOT NULL,
  `itemID` INT NOT NULL,
  `itemName` VARCHAR(45) NULL,
  `quantity` INT NULL,
  `price` INT NULL,
  PRIMARY KEY (`itemID`),
  INDEX `sub_idx` (`subID` ASC) VISIBLE,
  CONSTRAINT `sub`
    FOREIGN KEY (`subID`)
    REFERENCES `forgeDB`.`sub` (`subID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `forgeDB`.`main`
-- -----------------------------------------------------
START TRANSACTION;
USE `forgeDB`;
INSERT INTO `forgeDB`.`main` (`mainID`, `mainName`) VALUES (0, 'Men\'s Clothes');
INSERT INTO `forgeDB`.`main` (`mainID`, `mainName`) VALUES (1, 'Women\'s Clothes');
INSERT INTO `forgeDB`.`main` (`mainID`, `mainName`) VALUES (2, 'Accessories');

COMMIT;


-- -----------------------------------------------------
-- Data for table `forgeDB`.`sub`
-- -----------------------------------------------------
START TRANSACTION;
USE `forgeDB`;
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (1, 1, 'Tops');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (1, 2, 'Shorts');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (1, 3, 'Pants');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (1, 4, 'Shoes');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 5, 'Tops');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 6, 'Shorts');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 7, 'Pants');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 8, 'Shoes');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 9, 'Dresses');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (2, 10, 'Skirts');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (3, 11, 'Socks');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (3, 12, 'Hats');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (3, 13, 'Bags');
INSERT INTO `forgeDB`.`sub` (`mainID`, `subID`, `subName`) VALUES (3, 14, 'Jewelry');

COMMIT;


-- -----------------------------------------------------
-- Data for table `forgeDB`.`items`
-- -----------------------------------------------------
START TRANSACTION;
USE `forgeDB`;
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (1, 1, 'Red Short-Sleeve Shirt', 100, 10);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (1, 2, 'Blue Long-Sleeve Sweater', 25, 35);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (2, 3, 'Tan Cargo Shorts', 50, 20);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (2, 4, 'Black Gym Shorts', 50, 12);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (3, 5, 'Blue Jeans', 100, 25);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (3, 6, 'Khakis', 50, 30);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (3, 7, 'Black Slacks', 50, 30);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (4, 8, 'Black Loafers', 25, 40);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (4, 9, 'Grey Slides', 50, 15);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (4, 10, 'Green and White Vintage Sneakers', 25, 70);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (5, 11, 'Black Cropped Top', 50, 20);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (5, 12, 'White Turtleneck', 25, 30);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (5, 13, 'Blue V-Neck Tee', 30, 15);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (6, 14, 'High-Waisted Denim Shorts', 100, 45);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (6, 15, 'Black Denim Mom Shorts', 100, 45);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (7, 16, 'High-Waisted Denim Mom Jeans', 100, 55);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (7, 17, 'Maroon Corduroy Pants', 50, 50);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (7, 18, 'Black Leggings with Pockets', 100, 35);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (8, 19, 'Black Flats', 50, 40);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (8, 20, 'Red Block Heel', 25, 60);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (8, 21, 'Brown Knee-High Boots', 50, 90);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (9, 22, 'Short Floral Sundress', 75, 30);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (9, 23, 'Black Strapless Dress', 50, 25);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (10, 24, 'Floral Midi-Skirt', 50, 30);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (10, 25, 'Short Denim Skirt', 30, 35);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (11, 26, 'Funky Crew Socks (6 pack)', 100, 15);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (11, 27, 'Funky Calf-Length Socks (3 pack)', 100, 15);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (11, 28, 'Funky Leg Warmers', 50, 5);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (12, 29, 'Collegiate Ball Cap', 100, 20);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (12, 30, 'Pastel Bucket Hat', 50, 25);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (13, 31, 'Black Leather Saddlebag', 30, 70);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (13, 32, 'Brown Leather Crossbody', 30, 90);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (13, 33, 'Sleek Black Fanny Pack', 50, 40);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (14, 34, 'Cute Charm Bracelet', 50, 20);
INSERT INTO `forgeDB`.`items` (`subID`, `itemID`, `itemName`, `quantity`, `price`) VALUES (14, 35, 'Enamel Birthstone Stud Earrings', 50, 25);

COMMIT;


