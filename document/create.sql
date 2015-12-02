# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2015-12-02 13:20                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "TR0040"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `TR0040` (
    `id` VARCHAR(100) NOT NULL,
    `mst001_id` VARCHAR(100) NOT NULL,
    `line_number` DOUBLE(5,0) NOT NULL,
    `category` VARCHAR(40) NOT NULL,
    `mst002_id` VARCHAR(100) NOT NULL,
    `mst003_id` VARCHAR(100) NOT NULL,
    `currency` VARCHAR(40) NOT NULL,
    `price` VARCHAR(40) NOT NULL,
    `description` VARCHAR(1024) NOT NULL,
    `photo` VARCHAR(100),
    `updated_at` TIMESTAMP NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    CONSTRAINT `PK_TR0040` PRIMARY KEY (`id`),
    CONSTRAINT `TUC_TR0040_1` UNIQUE (`mst001_id`, `line_number`)
)
ENGINE=InnoDB;;

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0040` ADD CONSTRAINT `MST001_TR0040` 
    FOREIGN KEY (`mst001_id`) REFERENCES `MST001` (`id`);

ALTER TABLE `TR0040` ADD CONSTRAINT `MST002_TR0040` 
    FOREIGN KEY (`mst002_id`) REFERENCES `MST002` (`id`);

ALTER TABLE `TR0040` ADD CONSTRAINT `MST003_TR0040` 
    FOREIGN KEY (`mst003_id`) REFERENCES `MST003` (`id`);
