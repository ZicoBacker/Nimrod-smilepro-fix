CREATE PROCEDURE IF NOT EXISTS create_invoice_table()
BEGIN
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` bigint UNSIGNED NOT NULL,
  `treatment_id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `comment` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_patient_id_foreign` (`patient_id`),
  KEY `invoice_treatment_id_foreign` (`treatment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
END