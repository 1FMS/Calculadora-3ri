-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15/07/2024 às 23:50
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
-- Banco de dados: `calculadora3ri`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico_valor_declarado`
--

DROP TABLE IF EXISTS `servico_valor_declarado`;
CREATE TABLE IF NOT EXISTS `servico_valor_declarado` (
  `id_valor_declarado` int NOT NULL AUTO_INCREMENT,
  `restricao_inicial` double NOT NULL,
  `restricao_final` double NOT NULL,
  `emolumentos_valor_declarado` double NOT NULL,
  `ferc_valor_declarado` double NOT NULL,
  `fadep_valor_declarado` double NOT NULL,
  `femp_valor_declarado` double NOT NULL,
  `total_valor_declarado` double NOT NULL,
  `codigo_valor_declarado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_valor_declarado`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Despejando dados para a tabela `servico_valor_declarado`
--

INSERT INTO `servico_valor_declarado` (`id_valor_declarado`, `restricao_inicial`, `restricao_final`, `emolumentos_valor_declarado`, `ferc_valor_declarado`, `fadep_valor_declarado`, `femp_valor_declarado`, `total_valor_declarado`, `codigo_valor_declarado`) VALUES
(1, 0, 5417.79, 90.82, 2.72, 3.63, 3.63, 100.8, '16.3.1'),
(2, 5417.8, 7043.13, 114.46, 3.43, 4.57, 4.57, 127.03, '16.3.2'),
(3, 7043.14, 8803.91, 129.61, 3.88, 5.17, 5.17, 143.85, '16.3.3'),
(4, 8803.92, 11004.89, 160.84, 4.82, 6.43, 6.43, 178.52, '16.3.4'),
(5, 11004.9, 13756.12, 200.01, 6, 8, 8, 222.01, '16.3.5'),
(6, 13756.13, 17195.14, 250.77, 7.52, 10.03, 10.03, 278.35, '16.3.6'),
(7, 17195.15, 21493.91, 314.61, 9.43, 12.58, 12.58, 349.2, '16.3.7'),
(8, 21493.92, 26867.38, 393.74, 11.81, 15.74, 15.74, 437.03, '16.3.8'),
(9, 26867.39, 33584.23, 490.35, 14.71, 19.61, 19.61, 544, '16.3.9'),
(10, 33584.24, 41980.29, 613.67, 18.41, 24.54, 24.54, 681.16, '16.3.10'),
(11, 41980.3, 52475.34, 767.83, 23.03, 30.71, 30.71, 852.28, '16.3.11'),
(12, 52475.35, 65594.16, 958.98, 28.76, 38.35, 38.35, 1064.44, '16.3.12'),
(13, 65594.17, 81992.73, 1198.69, 35.96, 47.94, 47.94, 1330.53, '16.3.13'),
(14, 81992.74, 102490.9, 1497.89, 44.93, 59.91, 59.91, 1662.64, '16.3.14'),
(15, 102490.91, 128113.62, 1871.85, 56.15, 74.87, 74.87, 2077.74, '16.3.15'),
(16, 128113.63, 160142.01, 2340.23, 70.2, 93.6, 93.6, 2597.63, '16.3.16'),
(17, 160142.02, 200177.52, 2925.38, 87.76, 117.01, 117.01, 3247.16, '16.3.17'),
(18, 200177.53, 250221.91, 3657.62, 109.72, 146.3, 146.3, 4059.94, '16.3.18'),
(19, 250221.92, 312777.38, 4570.37, 137.11, 182.81, 182.81, 5073.1, '16.3.19'),
(20, 312777.39, 390971.73, 5713.95, 171.41, 228.55, 228.55, 6342.46, '16.3.20'),
(21, 390971.74, 488714.66, 7141.7, 214.25, 285.66, 285.66, 7927.27, '16.3.21'),
(22, 488714.67, 610893.32, 8927.21, 267.81, 357.08, 357.08, 9909.18, '16.3.22'),
(23, 610893.33, 763616.66, 11159.66, 334.78, 446.38, 446.38, 12387.2, '16.3.23'),
(24, 763616.67, 954520.82, 13251.3, 397.53, 530.05, 530.05, 14708.93, '16.3.24'),
(25, 954520.83, 1193151.05, 14142.07, 424.26, 565.68, 565.68, 15697.69, '16.3.25'),
(26, 1193151.06, 1431781.26, 14566.27, 436.98, 582.65, 582.65, 16168.55, '16.3.26'),
(27, 1431781.27, 1718137.5, 15003.3, 450.09, 600.13, 600.13, 16653.65, '16.3.27'),
(28, 1718137.51, 2061765, 15453.43, 463.6, 618.13, 618.13, 17153.29, '16.3.28'),
(29, 2061765.01, 2474118.03, 15917.06, 477.51, 636.68, 636.68, 17667.93, '16.3.29'),
(30, 2474118.04, 2968941.63, 16394.56, 491.83, 655.78, 655.78, 18197.95, '16.3.30'),
(31, 2968941.64, 3562729.96, 16886.32, 506.58, 675.45, 675.45, 18743.8, '16.3.31'),
(32, 3562729.97, 4275275.95, 17392.98, 521.78, 695.71, 695.71, 19306.18, '16.3.32'),
(33, 4275275.96, 5130331.15, 17914.67, 537.44, 716.58, 716.58, 19885.27, '16.3.33'),
(34, 5130331.16, 6156397.36, 18452.17, 553.56, 738.08, 738.08, 20481.89, '16.3.34'),
(35, 6156397.37, 7387676.85, 19005.72, 570.17, 760.22, 760.22, 21096.33, '16.3.35');
COMMIT;

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico_valor_fixo`
--

DROP TABLE IF EXISTS `servico_valor_fixo`;
CREATE TABLE IF NOT EXISTS `servico_valor_fixo` (
  `id_servico_fixo` int NOT NULL AUTO_INCREMENT,
  `nome_servico_fixo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `emolumentos_fixo` double NOT NULL,
  `ferc_fixo` double NOT NULL,
  `fadep_fixo` double NOT NULL,
  `femp_fixo` double NOT NULL,
  `total_fixo` double NOT NULL,
  `codigo_servico_fixo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_servico_fixo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `servico_valor_fixo`
--

INSERT INTO `servico_valor_fixo` (`id_servico_fixo`, `nome_servico_fixo`, `emolumentos_fixo`, `ferc_fixo`, `fadep_fixo`, `femp_fixo`, `total_fixo`, `codigo_servico_fixo`) VALUES
(1, 'Prenotação', 35.45, 1.06, 1.41, 1.41, 39.33, '16.1'),
(2, 'Alienação Fiduciária', 109.9, 3.29, 4.39, 4.39, 121.97, '16.22.2'),
(3, 'Cédula de Crédito Imobiliário', 109.9, 3.29, 4.39, 4.39, 121.97, '16.22.2'),
(4, 'Hipoteca', 109.9, 3.29, 4.39, 4.39, 121.97, '16.22.2'),
(5, 'Usufruto', 109.9, 3.29, 4.39, 4.39, 121.97, '16.22.2'),
(6, 'Penhora', 109.9, 3.29, 4.39, 4.39, 121.97, '16.22.2'),
(7, 'Arquivamento', 5.65, 0.16, 0.22, 0.22, 6.25, '16.39'),
(8, 'Certidão', 83.28, 2.49, 3.33, 3.33, 92.43, '16.24.4'),
(9, 'Conferência', 5.65, 0.16, 0.22, 0.22, 6.25, '16.42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
