-- For migration, paste into new local machines
-- 0 for users
-- 1 for admins

CREATE TABLE IF NOT EXISTS users (
    user_level TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
    id INT(11) NOT NULL AUTO_INCREMENT,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    registration_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    PRIMARY KEY (id)
);