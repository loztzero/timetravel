# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2016-04-11 22:20                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST001_TR0050`;

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST002_TR0050`;

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST003_TR0050`;

# ---------------------------------------------------------------------- #
# Drop table "TR0050"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0050` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0050_1` ON `TR0050`;

# Drop table #

DROP TABLE `TR0050`;
