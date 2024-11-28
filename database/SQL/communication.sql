CREATE PROCEDURE IF NOT EXISTS create_communication_table()
BEGIN
CREATE TABLE IF NOT EXISTS `communication` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `sent_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `communication_patient_id_foreign` (`patient_id`),
  KEY `communication_employee_id_foreign` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END