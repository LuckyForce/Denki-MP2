CREATE TABLE `u173534db1`.`tu_entry` (
    `id` INT NOT NULL,
    `title` TEXT NULL,
    `description` TEXT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `place` TEXT NULL,
    `priority` INT NULL,
    `danger` INT NULL,
    `status` INT NULL,
    `picture` TEXT NULL,
    `picture_data` BLOB NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;