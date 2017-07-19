CREATE TABLE IF NOT EXISTS `register`.`user` ( 
`username` VARCHAR(50) NOT NULL , 
`password` VARCHAR(12) NOT NULL , 
`email` VARCHAR(50) NOT NULL , 
`id` INT(10) NULL , 
PRIMARY KEY (`id`)) 
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `register`.`data` (
 `uname` VARCHAR(50) NOT NULL , 
`uid` INT(12) NOT NULL , 
`name` VARCHAR(50) NOT NULL , 
`Pnumber` VARCHAR(20) NOT NULL , 
`Uemail` VARCHAR(50) NOT NULL , 
`up` INT(5) NOT NULL , 
`del` INT(5) NOT NULL ) 
ENGINE = InnoDB;




