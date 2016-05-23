# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database creation script                        #
# Created on:            2016-05-23 22:29                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Tables                                                                 #
# ---------------------------------------------------------------------- #

# ---------------------------------------------------------------------- #
# Add table "TR0050"                                                     #
# ---------------------------------------------------------------------- #

CREATE TABLE `TR0050` (
    `id` VARCHAR(100) NOT NULL,
    `mst001_id` VARCHAR(100) NOT NULL,
    `ask_date` DATE,
    `mst002_id` VARCHAR(100) NOT NULL,
    `mst003_id` VARCHAR(100) NOT NULL,
    `departure_date` DATE,
    `days` INTEGER(5),
    `pax` INTEGER(5) NOT NULL,
    `updated_at` TIMESTAMP NOT NULL,
    `created_at` TIMESTAMP NOT NULL,
    CONSTRAINT `PK_TR0050` PRIMARY KEY (`id`),
    CONSTRAINT `TUC_TR0050_1` UNIQUE (`mst001_id`, `ask_date`, `mst003_id`, `mst002_id`)
)
ENGINE=InnoDB;;

# ---------------------------------------------------------------------- #
# Foreign key constraints                                                #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0050` ADD CONSTRAINT `MST001_TR0050` 
    FOREIGN KEY (`mst001_id`) REFERENCES `MST001` (`id`);

ALTER TABLE `TR0050` ADD CONSTRAINT `MST002_TR0050` 
    FOREIGN KEY (`mst002_id`) REFERENCES `MST002` (`id`);

ALTER TABLE `TR0050` ADD CONSTRAINT `MST003_TR0050` 
    FOREIGN KEY (`mst003_id`) REFERENCES `MST003` (`id`);
