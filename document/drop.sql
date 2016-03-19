# ---------------------------------------------------------------------- #
# Script generated with: DeZign for Databases v6.3.2                     #
# Target DBMS:           MySQL 5                                         #
# Project file:          Travel time.dez                                 #
# Project name:                                                          #
# Author:                                                                #
# Script type:           Database drop script                            #
# Created on:            2016-03-19 20:46                                #
# ---------------------------------------------------------------------- #


# ---------------------------------------------------------------------- #
# Drop foreign key constraints                                           #
# ---------------------------------------------------------------------- #

ALTER TABLE `VST001` DROP FOREIGN KEY `MST001_VST001`;

ALTER TABLE `VST001` DROP FOREIGN KEY `MST002_VST001`;

ALTER TABLE `VST001` DROP FOREIGN KEY `MST003_VST001`;

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST001_TR0010`;

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST002_TR0010`;

ALTER TABLE `TR0010` DROP FOREIGN KEY `MST003_TR0010`;

ALTER TABLE `VST010` DROP FOREIGN KEY `TR0010_VST010`;

ALTER TABLE `VST010` DROP FOREIGN KEY `MST001_VST010`;

ALTER TABLE `VST020` DROP FOREIGN KEY `MST001_VST020`;

ALTER TABLE `VST030` DROP FOREIGN KEY `MST001_VST030`;

ALTER TABLE `TR0020` DROP FOREIGN KEY `VST001_TR0020`;

ALTER TABLE `TR0020` DROP FOREIGN KEY `MST001_TR0020`;

ALTER TABLE `TR0030` DROP FOREIGN KEY `MST001_TR0030`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST001_TR0040`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST002_TR0040`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST003_TR0040`;

ALTER TABLE `TR0040` DROP FOREIGN KEY `MST004_TR0040`;

ALTER TABLE `MST003` DROP FOREIGN KEY `MST002_MST003`;

ALTER TABLE `TR0060` DROP FOREIGN KEY `MST001_TR0060`;

ALTER TABLE `TR0060` DROP FOREIGN KEY `MST001_TR00602`;

ALTER TABLE `VST040` DROP FOREIGN KEY `MST001_VST040`;

ALTER TABLE `VST040` DROP FOREIGN KEY `MST001_VST0402`;

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST001_TR0050`;

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST002_TR0050`;

ALTER TABLE `TR0050` DROP FOREIGN KEY `MST003_TR0050`;

# ---------------------------------------------------------------------- #
# Drop table "TR0040"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0040` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0040_1` ON `TR0040`;

# Drop table #

DROP TABLE `TR0040`;

# ---------------------------------------------------------------------- #
# Drop table "TR0020"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0020` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0020_1` ON `TR0020`;

# Drop table #

DROP TABLE `TR0020`;

# ---------------------------------------------------------------------- #
# Drop table "VST010"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `VST010` DROP PRIMARY KEY;

DROP INDEX `TUC_VST010_1` ON `VST010`;

# Drop table #

DROP TABLE `VST010`;

# ---------------------------------------------------------------------- #
# Drop table "TR0010"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0010` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0010_1` ON `TR0010`;

# Drop table #

DROP TABLE `TR0010`;

# ---------------------------------------------------------------------- #
# Drop table "VST001"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `VST001` DROP PRIMARY KEY;

DROP INDEX `TUC_VST001_1` ON `VST001`;

# Drop table #

DROP TABLE `VST001`;

# ---------------------------------------------------------------------- #
# Drop table "TR0050"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0050` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0050_1` ON `TR0050`;

# Drop table #

DROP TABLE `TR0050`;

# ---------------------------------------------------------------------- #
# Drop table "VST040"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `VST040` DROP PRIMARY KEY;

DROP INDEX `TUC_VST040_1` ON `VST040`;

# Drop table #

DROP TABLE `VST040`;

# ---------------------------------------------------------------------- #
# Drop table "TR0060"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0060` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0060_1` ON `TR0060`;

# Drop table #

DROP TABLE `TR0060`;

# ---------------------------------------------------------------------- #
# Drop table "MST004"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `MST004` DROP PRIMARY KEY;

DROP INDEX `TUC_MST004_1` ON `MST004`;

# Drop table #

DROP TABLE `MST004`;

# ---------------------------------------------------------------------- #
# Drop table "MST003"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `MST003` DROP PRIMARY KEY;

DROP INDEX `TUC_MST003_1` ON `MST003`;

# Drop table #

DROP TABLE `MST003`;

# ---------------------------------------------------------------------- #
# Drop table "MST002"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `MST002` DROP PRIMARY KEY;

DROP INDEX `TUC_MST002_1` ON `MST002`;

# Drop table #

DROP TABLE `MST002`;

# ---------------------------------------------------------------------- #
# Drop table "TR0030"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `TR0030` DROP PRIMARY KEY;

DROP INDEX `TUC_TR0030_1` ON `TR0030`;

# Drop table #

DROP TABLE `TR0030`;

# ---------------------------------------------------------------------- #
# Drop table "VST030"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `VST030` DROP PRIMARY KEY;

DROP INDEX `TUC_VST030_1` ON `VST030`;

# Drop table #

DROP TABLE `VST030`;

# ---------------------------------------------------------------------- #
# Drop table "VST020"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `VST020` DROP PRIMARY KEY;

DROP INDEX `TUC_VST020_1` ON `VST020`;

# Drop table #

DROP TABLE `VST020`;

# ---------------------------------------------------------------------- #
# Drop table "MST001"                                                    #
# ---------------------------------------------------------------------- #

# Drop constraints #

ALTER TABLE `MST001` DROP PRIMARY KEY;

DROP INDEX `TUC_MST001_1` ON `MST001`;

# Drop table #

DROP TABLE `MST001`;
