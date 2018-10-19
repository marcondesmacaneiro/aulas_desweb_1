CREATE TABLE `pessoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `primeiro_nome` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `segundo_nome` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci ,
  `cidade` varchar(50) COLLATE utf8mb4_unicode_ci ,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci ,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `pessoa`
 ADD PRIMARY KEY (`id`);
ALTER TABLE `pessoa`
 MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;
