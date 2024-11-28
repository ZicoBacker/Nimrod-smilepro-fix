CREATE PROCEDURE IF NOT EXISTS create_patient_table()
BEGIN
CREATE TABLE IF NOT EXISTS `patient` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `person_id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `medical_file` text COLLATE utf8mb3_unicode_ci,
  `is_active` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_person_id_foreign` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END