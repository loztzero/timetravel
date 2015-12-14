# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2015-12-14 21:26                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST001_TR0040`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST002_TR0040`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST003_TR0040`;

# ---------------------------------------------------------------------- #
# Drop table "TR0040"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0040` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0040_1` ON `TR0040`;

# Drop table #

DROP TABLE `TR0040`;
