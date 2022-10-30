CREATE TABLE `todolistdb`.`todolist_tb` (
    `id` INT NOT NULL AUTO_INCREMENT COMMENT 'L\'id qui sera automatique' , 
    `title` VARCHAR(400) NOT NULL COMMENT 'le titre du todo' , 
    `desc` TEXT NOT NULL COMMENT 'La description ' , 
    `event_status` INT(10) NOT NULL COMMENT 'Status' , 
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP