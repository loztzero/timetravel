# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2016-02-21 23:38                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST001_TR0010`;

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST002_TR0010`;

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST003_TR0010`;

# ---------------------------------------------------------------------- #
# Drop table "TR0010"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0010` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0010_1` ON `TR0010`;

# Drop table #

DROP TABLE `TR0010`;
