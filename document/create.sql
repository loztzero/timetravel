# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2016-02-21 23:38                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "TR0010"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `TR0010` (
    `id` VARCHAR(100) NOT NULL,
    `mst001_id` VARCHAR(100) NOT NULL,
    `tour_name` VARCHAR(100) NOT NULL,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `address1` VARCHAR(100) NOT NULL,
    `address2` VARCHAR(100),
    `address3` VARCHAR(100),
    `mst002_id` VARCHAR(100),
    `mst003_id` VARCHAR(100),
    `zip_code` VARCHAR(15),
    `phone_number` VARCHAR(40) NOT NULL,
    `instagram` VARCHAR(100),
    `facebook` VARCHAR(100),
    `twitter` VARCHAR(100),
    `website` VARCHAR(100),
    `logo` VARCHAR(100),
    `view` INTEGER(5) NOT NULL,
    `love` INTEGER(5) NOT NULL,
    `publish_flag` VARCHAR(40),
    `updated_at` TIMESTAMP NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    CONSTRAINT `PK_TR0010` PRIMARY KEY (`id`),
    CONSTRAINT `TUC_TR0010_1` UNIQUE (`mst001_id`)
)
ENGINE=InnoDB;;

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0010` ADD CONSTRAINT `MST001_TR0010` 
    FOREIGN KEY (`mst001_id`) REFERENCES `MST001` (`id`);

ALTER TABLE `TR0010` ADD CONSTRAINT `MST002_TR0010` 
    FOREIGN KEY (`mst002_id`) REFERENCES `MST002` (`id`);

ALTER TABLE `TR0010` ADD CONSTRAINT `MST003_TR0010` 
    FOREIGN KEY (`mst003_id`) REFERENCES `MST003` (`id`);
