CREATE PROCEDURE IF NOT EXISTS create_feedback_table()
BEGIN
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `practice_email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `practice_phone` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `feedback_patient_id_foreign` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END