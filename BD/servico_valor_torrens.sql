-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 09/08/2024 às 13:34
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `calculadora3r`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico_valor_torrens`
--

DROP TABLE IF EXISTS `servico_valor_torrens`;
CREATE TABLE IF NOT EXISTS `servico_valor_torrens` (
  `id_servico_torrens` int NOT NULL AUTO_INCREMENT,
  `restricao_inicial_torrens` double NOT NULL,
  `restricao_final_torrens` double NOT NULL,
  `emolumento_valor_torrens` double NOT NULL,
  `ferc_valor_torrens` double NOT NULL,
  `fadep_valor_torrens` double NOT NULL,
  `femp_valor_torrens` double NOT NULL,
  `total_valor_torrens` double NOT NULL,
  `codigo_torrens` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_servico_torrens`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `servico_valor_torrens`
--

INSERT INTO `servico_valor_torrens` (`id_servico_torrens`, `restricao_inicial_torrens`, `restricao_final_torrens`, `emolumento_valor_torrens`, `ferc_valor_torrens`, `fadep_valor_torrens`, `femp_valor_torrens`, `total_valor_torrens`, `codigo_torrens`) VALUES
(1, 0, 5417.79, 45.61, 1.36, 1.82, 1.82, 50.61, '16.9.1'),
(2, 5417.8, 7043.13, 56.91, 1.7, 2.27, 2.27, 63.15, '16.9.2'),
(3, 7043.14, 8803.91, 64.75, 1.94, 2.58, 2.58, 71, '16.9.3'),
(4, 8803.92, 11004.89, 80.04, 2.4, 3.2, 3.2, 88.84, '16.9.4'),
(5, 11004.9, 13756.12, 100.7, 3, 4, 4, 111.07, '16.9.5'),
(6, 13756.13, 17195.14, 125.12, 3.75, 5, 5, 138.87, '16.9.6'),
(7, 17195.15, 21493.91, 157.24, 4.71, 6.28, 6.28, 174.51, '16.9.7'),
(8, 21493.92, 26867.38, 196.94, 5.9, 7.87, 7.87, 218.58, '16.9.8'),
(9, 26867.39, 33584.23, 245.37, 7.36, 9.81, 9.81, 272.35, '16.9.9'),
(10, 33584.24, 41980.29, 306.65, 9.19, 12.26, 12.26, 340.36, '16.9.10'),
(11, 41980.3, 52475.34, 383.85, 11.51, 15.35, 15.35, 426.06, '16.9.11'),
(12, 52475.35, 65594.16, 479.69, 14.39, 19.18, 19.18, 532.44, '16.9.12'),
(13, 65594.17, 81992.73, 599.41, 17.98, 23.97, 23.97, 665.33, '16.9.13'),
(14, 81992.74, 102490.9, 748.82, 22.46, 29.95, 29.95, 665.33, '16.9.14'),
(15, 102490.91, 128113.62, 935.86, 28.07, 37.43, 37.43, 1038.79, '16.9.15'),
(16, 128113.63, 160142.01, 1170.3, 35.1, 46.81, 46.81, 1299.02, '16.9.16'),
(17, 160142.02, 200177.52, 1462.56, 43.87, 58.5, 58.5, 1623.43, '16.9.17'),
(18, 200177.53, 250221.91, 1828.82, 54.86, 73.15, 73.15, 2029.98, '16.9.18'),
(19, 250221.92, 312777.38, 2285.25, 68.55, 91.41, 91.41, 2536.62, '16.9.19'),
(20, 312777.39, 390971.73, 2857.04, 85.71, 114.28, 114.28, 3171.31, '16.9.20'),
(21, 390971.74, 488714.66, 3570.53, 107.11, 142.82, 142.82, 3963.28, '16.9.21'),
(22, 488714.67, 610893.32, 4463.73, 133.91, 178.54, 178.54, 4954.72, '16.9.22'),
(23, 610893.33, 763616.66, 5580.09, 167.4, 223.2, 223.2, 6193.89, '16.9.23'),
(24, 763616.67, 954520.82, 6747.57, 202.42, 269.9, 269.9, 7489.79, '16.9.24'),
(25, 954520.83, 1193151.05, 7073.35, 212.2, 282.93, 282.93, 7851.41, '16.9.25'),
(26, 1193151.06, 1431781.26, 7285.7, 218.57, 291.42, 291.42, 8087.11, '16.9.26'),
(27, 1431781.27, 1718137.5, 7504.35, 225.13, 300.17, 300.17, 8329.82, '16.9.27'),
(28, 1718137.51, 2061765, 7729.42, 231.88, 309.17, 309.17, 8579.64, '16.9.28'),
(29, 2061765.01, 2474118.03, 7961.29, 238.83, 318.45, 318.45, 8837.02, '16.9.29'),
(30, 2474118.04, 2968941.63, 8200.11, 246, 328, 328, 9102.11, '16.9.30'),
(31, 2968941.64, 3562729.96, 8445.99, 253.37, 337.83, 337.83, 9375.02, '16.9.31'),
(32, 3562729.97, 4275275.95, 8699.57, 260.98, 347.98, 347.98, 9656.51, '16.9.32'),
(33, 4275275.96, 5130331.15, 8960.49, 268.81, 358.41, 358.41, 9946.12, '16.9.33'),
(34, 5130331.16, 6156397.36, 9229.23, 276.87, 369.16, 369.16, 10224.42, '16.9.34'),
(35, 6156397.37, 7387676.85, 9506.07, 285.18, 380.24, 380.24, 10551.73, '16.9.35');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
