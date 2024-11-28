CREATE PROCEDURE IF NOT EXISTS create_contact_table()
BEGIN
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `street_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `house_number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `addition` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_patient_id_foreign` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END