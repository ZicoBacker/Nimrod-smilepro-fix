CREATE PROCEDURE create_cache_table()
BEGIN
    CREATE TABLE IF NOT EXISTS `cache` (
        `key` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
        `value` mediumtext COLLATE utf8mb3_unicode_ci NOT NULL,
        `expiration` int NOT NULL,
        PRIMARY KEY (`key`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END