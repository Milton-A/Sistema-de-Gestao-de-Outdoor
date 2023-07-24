-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/07/2023 às 07:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `outdoorgest`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idComuna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`id`, `nome`, `email`, `idUsuario`, `idComuna`) VALUES
(1, 'Root Master', 'teste@gmail.com', 1, 193);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `actividade` varchar(50) DEFAULT NULL,
  `idComuna` int(11) NOT NULL,
  `nacionalidade` varchar(50) DEFAULT NULL,
  `morada` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telemovel` bigint(20) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAdm` int(11) DEFAULT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `tipo`, `actividade`, `idComuna`, `nacionalidade`, `morada`, `email`, `telemovel`, `idUsuario`, `idAdm`, `estado`) VALUES
(4, 'Jota', 'Particular', NULL, 258, 'Angolana', 'Luanda', 'jota@gmail.com', 45454, 5, NULL, 'ativo'),
(8, 'Tiago', 'Particular', '', 496, 'Angolana', '0', 'cascata@gmail.com', 95652665, 6, NULL, 'ativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idMunicipio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comuna`
--

INSERT INTO `comuna` (`id`, `nome`, `idMunicipio`) VALUES
(1, 'Cacuso', 27),
(2, 'Lombe', 27),
(3, 'Quizenga', 27),
(4, 'Pungo-Andongo', 27),
(5, 'Soqueco', 27),
(6, 'Cambundi Catembo', 30),
(7, 'Quitapa', 30),
(8, 'Tala Mungongo', 30),
(9, 'Dumba Cambango', 30),
(10, 'Cangandala', 34),
(11, 'Bembo', 34),
(12, 'Culamagia', 34),
(13, 'Caribo', 34),
(14, 'Caombo', 42),
(15, 'Bange-Angola', 42),
(16, 'Cambo Suinginge', 42),
(17, 'Micanda', 42),
(18, 'Cuaba Nzoji', 61),
(19, 'Mufuma', 61),
(20, 'Cunda-Dia-Baze', 72),
(21, 'Lemba', 72),
(22, 'Milando', 72),
(23, 'Calandula', 32),
(24, 'Cateco Cangola', 32),
(25, 'Cota Cuale', 32),
(26, 'Quinje', 32),
(27, 'Cacuso', 27),
(28, 'Lombe', 27),
(29, 'Quizenga', 27),
(30, 'Pungo-Andongo', 27),
(31, 'Soqueco', 27),
(32, 'Cambundi Catembo', 30),
(33, 'Quitapa', 30),
(34, 'Tala Mungongo', 30),
(35, 'Dumba Cambango', 30),
(36, 'Cangandala', 34),
(37, 'Bembo', 34),
(38, 'Culamagia', 34),
(39, 'Caribo', 34),
(40, 'Caombo', 42),
(41, 'Bange-Angola', 42),
(42, 'Cambo Suinginge', 42),
(43, 'Micanda', 42),
(44, 'Cuaba Nzoji', 61),
(45, 'Mufuma', 61),
(46, 'Cunda-Dia-Baze', 72),
(47, 'Lemba', 72),
(48, 'Milando', 72),
(49, 'Calandula', 32),
(50, 'Cateco Cangola', 32),
(51, 'Cota Cuale', 32),
(52, 'Quinje', 32),
(53, 'Luquembo', 62),
(54, 'Quimbango', 62),
(55, 'Capunda Dombo', 62),
(56, 'Cunga Palanga', 62),
(57, 'Rimba', 62),
(58, 'Cazombo', 6),
(59, 'Nana Candundo', 6),
(60, 'Lumbala Caquengue', 6),
(61, 'Macondo', 6),
(62, 'Caianda', 6),
(63, 'Calunda', 6),
(64, 'Lóvua Leste', 6),
(65, 'Lumbala Guimbo', 22),
(66, 'Lutembo', 22),
(67, 'Chiume', 22),
(68, 'Luvuei', 22),
(69, 'Ninda', 22),
(70, 'Mussuma', 22),
(71, 'Sessa', 22),
(72, 'Camanongue', 35),
(73, '', 35),
(74, 'Cameia', 36),
(75, '', 36),
(76, 'Léua', 107),
(77, 'Liangongo', 107),
(78, 'Luau', 100),
(79, '', 100),
(80, 'Luacano', 98),
(81, 'Lago-Dilolo', 98),
(82, 'Luchazes', 106),
(83, 'Cangombe', 106),
(84, 'Cassamba', 106),
(85, 'Tempué', 106),
(86, 'Muié', 106),
(87, 'Luena', 111),
(88, 'Cangumbe', 111),
(89, 'Cachipoque', 111),
(90, 'Lucusse', 111),
(91, 'Lutuai', 111),
(92, 'Bibala', 4),
(93, 'Caitou', 4),
(94, 'Capangombe', 4),
(95, 'Lola', 4),
(96, 'Camucuio', 40),
(97, 'Mamué', 40),
(98, 'Chingo', 40),
(99, 'Moçâmedes', 126),
(100, 'Lucira', 126),
(101, 'Bentiaba', 126),
(102, 'Tômbua', 157),
(103, 'Iona', 157),
(104, 'São Martinho dos Tigres', 157),
(105, 'Virei', 161),
(106, 'Cainde', 161),
(107, 'Cangola', 1),
(108, 'Bengo', 1),
(109, 'Caiongo', 1),
(110, 'Nova Ambuíla', 6),
(111, 'Quipedro', 6),
(112, 'Bembe', 14),
(113, 'Lucunga', 14),
(114, 'Mabaia', 14),
(115, 'Buengas', 19),
(116, 'Nova Esperança', 19),
(117, 'Cuilo-Camboso', 19),
(118, 'Bungo', 21),
(119, '', 21),
(120, 'Damba', 26),
(121, 'Cazola', 26),
(122, 'Quiongua', 26),
(123, 'Buela', 26),
(124, 'Maquela do Zombo', 85),
(125, 'Cazua–Guali', 85),
(126, 'Matiamvo', 85),
(127, 'Quissol', 85),
(128, 'Mucaba', 85),
(129, 'Mucaba', 89),
(130, 'Canga', 89),
(131, 'Quinzau', 89),
(132, 'Quilumbo dos Dembos', 89),
(133, 'Negage', 92),
(134, 'Cota', 92),
(135, 'Lombe', 92),
(136, 'Quizenga', 92),
(137, 'Pungo-Andongo', 92),
(138, 'Puri', 103),
(139, 'Cunjo', 103),
(140, 'Quizenga', 103),
(141, 'Quimbele', 105),
(142, 'Luachimo', 105),
(143, 'Sanzala', 105),
(144, 'Quitexe', 106),
(145, 'Cambamba', 106),
(146, 'Uando', 106),
(147, 'Camabatela', 106),
(148, 'Quimunza', 107),
(149, 'Cuilo Pombo', 107),
(150, 'Cunga Palanca', 107),
(151, 'Songo', 123),
(152, 'Cuango', 123),
(153, 'Dange-Quitexe', 123),
(154, 'Uíge', 130),
(155, 'Alto-Zambeze', 130),
(156, 'Bembe', 130),
(157, 'Cuilo Futa', 130),
(158, 'Icoca', 130),
(159, 'Zombo', 133),
(160, 'Cambamba', 133),
(161, 'Uando', 133),
(162, 'Camabatela', 133),
(163, 'Cambulo', 15),
(164, 'Luia', 15),
(165, 'Cachimo', 15),
(166, 'Canzar', 15),
(167, 'Capenda Camulemba', 43),
(168, 'Xinge', 43),
(169, 'Caungula', 48),
(170, 'Camaxilo', 48),
(171, 'Chitato', 58),
(172, 'Luachimo', 58),
(173, 'Cuango', 64),
(174, 'Luremo', 64),
(175, 'Cuílo', 69),
(176, 'Caluango', 69),
(177, 'Lóvua', 93),
(178, '', 93),
(179, 'Lubalo', 101),
(180, 'Luangue', 101),
(181, 'Muvuluege', 101),
(182, 'Lucapa', 104),
(183, 'Camissombo', 104),
(184, 'Capaia', 104),
(185, 'Xa–Cassau', 104),
(186, 'Xá-Muteba', 161),
(187, 'Iongo', 161),
(188, 'Cassanje Calucala', 161),
(189, 'Belas', 12),
(190, 'Barra do Cuanza', 12),
(191, 'Cacuaco', 27),
(192, 'Funda', 27),
(193, 'Cazenga', 49),
(194, '', 49),
(195, 'Ícolo e Bengo', 89),
(196, 'Bom Jesus do Cuanza', 89),
(197, 'Cabiri', 89),
(198, 'Cassoneca', 89),
(199, 'Caculo Cahango', 89),
(200, 'Luanda', 99),
(201, '', 99),
(202, 'Kilamba Kiaxi', 91),
(203, '', 91),
(204, 'Muxima', 143),
(205, 'Demba Chio', 143),
(206, 'Quixinge', 143),
(207, 'Mumbondo', 143),
(208, 'Caboledo', 143),
(209, 'Talatona', 155),
(210, 'Benfica', 155),
(211, 'Viana', 160),
(212, 'Calumbo', 160),
(213, 'Caconda', 25),
(214, 'Gungue', 25),
(215, 'Uaba', 25),
(216, 'Cusse', 25),
(217, 'Caluquembe', 33),
(218, 'Calépi', 33),
(219, 'Ngola', 33),
(220, 'Chiange', 37),
(221, 'Chibemba', 37),
(222, 'Chibia', 54),
(223, 'Capunda-Cavilongo', 54),
(224, 'Quihita', 54),
(225, 'Jau', 54),
(226, 'Chicomba', 55),
(227, 'Cutenda', 55),
(228, 'Chipindo', 57),
(229, 'Bambi', 57),
(230, 'Cuvango', 75),
(231, 'Galangue', 75),
(232, 'Vicungo', 75),
(233, 'Humpata', 88),
(234, '', 88),
(235, 'Jamba', 90),
(236, 'Cassinga', 90),
(237, 'Dongo', 90),
(238, 'Lubango', 102),
(239, 'Arimba', 102),
(240, 'Hoque', 102),
(241, 'Huíla', 102),
(242, 'Matala', 113),
(243, 'Capelongo', 113),
(244, 'Mulondo', 113),
(245, 'Quilengues', 139),
(246, 'Impulo', 139),
(247, 'Dinde', 139),
(248, 'Ambriz', 5),
(249, 'Bela Vista', 5),
(250, 'Tabi', 5),
(251, 'Bula Atumba', 22),
(252, 'Quiage', 22),
(253, 'Caxito', 2),
(254, 'Barra do Dande', 2),
(255, 'Mabubas', 2),
(256, 'Quicabo', 2),
(257, 'Úcua', 2),
(258, 'Quibaxe', 7),
(259, 'Paredes', 7),
(260, 'Piri', 7),
(261, 'São José das Matas', 7),
(262, 'Muxaluando', 11),
(263, 'Cage', 11),
(264, 'Canacassala', 11),
(265, 'Gombe', 11),
(266, 'Quicunzo', 11),
(267, 'Quixico', 11),
(268, 'Zala', 11),
(269, 'Pango Aluquém', 18),
(270, 'Cazuangongo', 18),
(271, 'Baía Farta', 2),
(272, 'Dombe Grande', 2),
(273, 'Calahanga', 2),
(274, 'Equimina', 2),
(275, 'Balombo', 10),
(276, 'Chindumbo', 10),
(277, 'Chingongo', 10),
(278, 'Maca Mombolo', 10),
(279, 'Benguela', 2),
(280, 'Bocoio', 4),
(281, 'Chila', 4),
(282, 'Monte Belo', 4),
(283, 'Passe', 4),
(284, 'Cavimbe', 4),
(285, 'Cubal do Lumbo', 4),
(286, 'Caimbambo', 9),
(287, 'Catengue', 9),
(288, 'Caiave', 9),
(289, 'Canhamela', 9),
(290, 'Viangombe', 9),
(291, 'Catumbela', 15),
(292, 'Gama', 15),
(293, 'Biópio', 15),
(294, 'Praia Bebe', 15),
(295, 'Chongoroi', 20),
(296, 'Bolonguera', 20),
(297, 'Camuine', 20),
(298, 'Cubal', 8),
(299, 'Iambala', 8),
(300, 'Capupa', 8),
(301, 'Tumbulo', 8),
(302, 'Ganda', 13),
(303, 'Babaera', 13),
(304, 'Chicuma', 13),
(305, 'Ebanga', 13),
(306, 'Casseque', 13),
(307, 'Lobito', 3),
(308, 'Egipto', 3),
(309, 'Praia Canjala', 3),
(310, 'Andulo', 24),
(311, 'Calucinga', 24),
(312, 'Cassumbe', 24),
(313, 'Chivaúlo', 24),
(314, 'Camacupa', 29),
(315, 'Ringoma', 29),
(316, 'Santo António da Muinha', 29),
(317, 'Umpulo', 29),
(318, 'Cuanza', 29),
(319, 'Catabola', 32),
(320, 'Chipeta', 32),
(321, 'Caiuera', 32),
(322, 'Chiuca', 32),
(323, 'Sande', 32),
(324, 'Chinguar', 34),
(325, 'Cutato', 34),
(326, 'Cangote', 34),
(327, 'Chitembo', 33),
(328, 'Cachingues', 33),
(329, 'Mutumbo', 33),
(330, 'Mumbué', 33),
(331, 'Malengue', 33),
(332, 'Soma Cuanza', 33),
(333, 'Cuemba', 23),
(334, 'Luando', 23),
(335, 'Munhango', 23),
(336, 'Sachinemuna', 23),
(337, 'Cuíto', 26),
(338, 'Chicala Cambândua', 26),
(339, 'Cunje', 26),
(340, 'Trumba', 26),
(341, 'Cunhinga', 31),
(342, 'Belo Horizonte', 31),
(343, 'Nharea', 30),
(344, 'Gamba', 30),
(345, 'Lúbia', 30),
(346, 'Caiei', 30),
(347, 'Dando', 30),
(348, 'Belize', 34),
(349, 'Luali', 34),
(350, 'Miconje', 34),
(351, 'Buco-Zau', 33),
(352, 'Inhuca', 33),
(353, 'Necuto', 33),
(354, 'Cabinda', 36),
(355, 'Malembo', 36),
(356, 'Tanto-Zinze', 36),
(357, 'Cacongo', 37),
(358, 'Dinge', 37),
(359, 'Massabi', 37),
(360, 'Calai', 42),
(361, 'Maue', 42),
(362, 'Mavengue', 42),
(363, 'Cuangar', 43),
(364, 'Savate', 43),
(365, 'Caila', 43),
(366, 'Cuchi', 40),
(367, 'Cutato', 40),
(368, 'Chinguanja', 40),
(369, 'Vissati', 40),
(370, 'Cuito Cuanavale', 38),
(371, 'Longa', 38),
(372, 'Lupire', 38),
(373, 'Baixo Longa', 38),
(374, 'Dirico', 41),
(375, 'Xamavera', 41),
(376, 'Mucusso', 41),
(377, 'Mavinga', 45),
(378, 'Cunjamba', 45),
(379, 'Cutuile', 45),
(380, 'Luengue', 45),
(381, 'Menongue', 39),
(382, 'Caiundo', 39),
(383, 'Cueio-Betre', 39),
(384, 'Missombo', 39),
(385, 'Nancova', 44),
(386, 'Rito', 44),
(387, 'Rivungo', 46),
(388, 'Luiana', 46),
(389, 'Chipundo', 46),
(390, 'Neriquinha', 46),
(391, 'Jamba-Cueio', 46),
(392, 'Ambaca', 50),
(393, 'Camabatela', 50),
(394, 'Tango', 50),
(395, 'Maúa', 50),
(396, 'Bindo', 50),
(397, 'Luinga', 50),
(398, 'Banga', 52),
(399, 'Caculo Cabaça', 52),
(400, 'Cariamba', 52),
(401, 'Aldeia Nova', 52),
(402, 'Bolongongo', 57),
(403, 'Terreiro', 57),
(404, 'Quiquiemba', 57),
(405, 'Cambambe', 55),
(406, 'Massangano', 55),
(407, 'Danje-ia-Menha', 55),
(408, 'Zenza do Itombe', 55),
(409, 'São Pedro da Quilemba', 55),
(410, 'Cazengo', 54),
(411, 'Nadalatando', 54),
(412, 'Canhoca', 54),
(413, 'Golungo Alto', 58),
(414, 'Cambondo', 58),
(415, 'Cêrca', 58),
(416, 'Quiluanje', 58),
(417, 'Gonguembo', 59),
(418, 'Quilombo dos Dembos', 59),
(419, 'Camame', 59),
(420, 'Cavunga', 59),
(421, 'Lucala', 51),
(422, 'Quiangombe', 51),
(423, 'Quiculungo', 56),
(424, 'Samba Caju', 6),
(425, 'Samba Lucala', 6),
(426, 'Gabela', 65),
(427, 'Assango', 65),
(428, 'Cassongue', 63),
(429, 'Pambangala', 63),
(430, 'Dumbi', 63),
(431, 'Atome', 63),
(432, 'Cela', 66),
(433, 'Uaco Cungo', 66),
(434, 'Quissanga', 66),
(435, 'Sanga', 66),
(436, 'Conda', 61),
(437, 'Cunjo', 61),
(438, 'Ebo', 64),
(439, 'Condé', 64),
(440, 'Quissanje', 64),
(441, 'Mussende', 62),
(442, 'São Lucas', 62),
(443, 'Quienha', 62),
(444, 'Libolo', 67),
(445, 'Calulo', 67),
(446, 'Munenga', 67),
(447, 'Cabuta', 67),
(448, 'Quissongo', 67),
(449, 'Porto Amboim', 68),
(450, 'Capolo', 68),
(451, 'Quibala', 60),
(452, 'Cariango', 60),
(453, 'Dala Cachibo', 60),
(454, 'Lonhe', 60),
(455, 'Quilenda', 69),
(456, 'Quirimbo', 69),
(457, 'Seles', 70),
(458, 'Amboiva', 70),
(459, 'Botera', 70),
(460, 'Sumbe', 71),
(461, 'Gangula', 71),
(462, 'Gungo', 71),
(463, 'Quicombo', 71),
(464, 'Cahama', 79),
(465, 'Oxinjau', 79),
(466, 'Cuanhama', 75),
(467, 'Ondijiva', 75),
(468, 'Môngua', 75),
(469, 'Evale', 75),
(470, 'Nehone Cafima', 75),
(471, 'Simporo', 75),
(472, 'Curoca', 76),
(473, 'Oncócua', 76),
(474, 'Chitado', 76),
(475, 'Cuvelai', 72),
(476, 'Mucolongodijo', 72),
(477, 'Mupa', 72),
(478, 'Calonga', 72),
(479, 'Cuvati', 72),
(480, 'Namacunde', 73),
(481, 'Chiede', 73),
(482, 'Ombadja', 74),
(483, 'Xangongo', 74),
(484, 'Ombala yo Mungu', 74),
(485, 'Naulila', 74),
(486, 'Humbe', 74),
(487, 'Bailundo', 85),
(488, 'Lunge', 85),
(489, 'Luvemba', 85),
(490, 'Bimbe', 85),
(491, 'Hengue-Caculo', 85),
(492, 'Caála', 86),
(493, 'Cuíma', 86),
(494, 'Calenga', 86),
(495, 'Catata', 86),
(496, 'Cachiungo', 87),
(497, 'Chiumbo', 87),
(498, 'Chinhama', 87),
(499, 'Chicala-Choloanga', 88),
(500, 'Mbave', 88),
(501, 'Sambo', 88),
(502, 'Samboto', 88),
(503, 'Chinjenje', 89),
(504, 'Chiaca', 89),
(505, 'Ecunha', 90),
(506, 'Quipeio', 90),
(507, 'Huambo', 91),
(508, 'Chipipa', 91),
(509, 'Calima', 91),
(510, 'Londuimbali', 92),
(511, 'Angalanga', 92),
(512, 'Alto–Hama', 92),
(513, 'Ussoque', 92),
(514, 'Cumbira', 92),
(515, 'Longonjo', 93),
(516, 'Lépi', 93),
(517, 'Iava', 93),
(518, 'Chilata', 93),
(519, 'Mungo', 94),
(520, 'Cambuengo', 94),
(521, 'Ucuma', 95),
(522, 'Cacoma', 95),
(523, 'Mundundo', 95);

-- --------------------------------------------------------

--
-- Estrutura para tabela `gestor`
--

CREATE TABLE `gestor` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idComuna` int(11) NOT NULL,
  `morada` varchar(100) NOT NULL,
  `telemovel` bigint(100) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idAdm` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `email`, `idComuna`, `morada`, `telemovel`, `idUsuario`, `idAdm`, `estado`) VALUES
(1, 'Gestor', 'gestor@gmail.com', 155, 'rua 21', 924588675, 7, 1, 'on'),
(2, 'Gestor2', 'gestor2@gmail.com', 36, 'lskjdksld jsndnsk', 92956651, 9, 1, 'on'),
(3, 'Gestor3', 'gestor3@gmail.com', 193, 'Ruas 122', 95632653, 10, 1, 'off'),
(4, 'Gestor4', 'gestor4@gmai.com', 201, 'rua 23', 924588675, 11, 1, 'on');

-- --------------------------------------------------------

--
-- Estrutura para tabela `municipio`
--

CREATE TABLE `municipio` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `idProvincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `municipio`
--

INSERT INTO `municipio` (`id`, `nome`, `idProvincia`) VALUES
(1, 'Alto Cauale', 17),
(2, 'Alto Zambeze', 15),
(3, 'Ambaca', 6),
(4, 'Amboim', 7),
(5, 'Ambriz', 1),
(6, 'Ambuíla', 17),
(7, 'Andulo', 3),
(8, 'Bailundo', 9),
(9, 'Balombo', 2),
(10, 'Banga', 6),
(11, 'Baía Farta', 2),
(12, 'Belas', 11),
(13, 'Belize', 4),
(14, 'Bembe', 17),
(15, 'Benguela', 2),
(16, 'Bibala', 16),
(17, 'Bocoio', 2),
(18, 'Bolongongo', 6),
(19, 'Buco-Zau', 4),
(20, 'Buengas', 17),
(21, 'Bula Atumba', 1),
(22, 'Bundas', 15),
(23, 'Cabinda', 4),
(24, 'Cacolo', 13),
(25, 'Caconda', 10),
(26, 'Cacongo', 4),
(27, 'Cacuaco', 11),
(28, 'Cacuso', 14),
(29, 'Cahama', 8),
(30, 'Caimbambo', 2),
(31, 'Calai', 5),
(32, 'Calandula', 14),
(33, 'Caluquembe', 10),
(34, 'Camacupa', 3),
(35, 'Camanongue', 15),
(36, 'Cambambe', 6),
(37, 'Cambulo', 12),
(38, 'Cambundi Catembo', 14),
(39, 'Cameia', 15),
(40, 'Camucuio', 16),
(41, 'Cangandala', 14),
(42, 'Caombo', 14),
(43, 'Capenda-Camulemba', 12),
(44, 'Cassongue', 7),
(45, 'Catabola', 3),
(46, 'Catchiungo', 9),
(47, 'Catumbela', 2),
(48, 'Caungula', 12),
(49, 'Cazenga', 11),
(50, 'Cazengo', 6),
(51, 'Caála', 9),
(52, 'Cela', 7),
(53, 'Chiange', 10),
(54, 'Chibia', 10),
(55, 'Chicomba', 10),
(56, 'Chinguar', 3),
(57, 'Chipindo', 10),
(58, 'Chitato', 12),
(59, 'Chitembo', 3),
(60, 'Chongorói', 2),
(61, 'Conda', 7),
(62, 'Cuaba Nzoji', 14),
(63, 'Cuangar', 5),
(64, 'Cuango', 12),
(65, 'Cuanhama', 8),
(66, 'Cubal', 2),
(67, 'Cuchi', 5),
(68, 'Cuemba', 3),
(69, 'Cuílo', 12),
(70, 'Cuimba', 18),
(71, 'Cuito Cuanavale', 5),
(72, 'Cunda-Dia-Baze', 14),
(73, 'Cunhinga', 3),
(74, 'Curoca', 8),
(75, 'Cuvango', 10),
(76, 'Cuvelai', 8),
(77, 'Dala', 13),
(78, 'Damba', 17),
(79, 'Dande', 1),
(80, 'Dembos', 1),
(81, 'Dirico', 5),
(82, 'Ebo', 7),
(83, 'Ecunha', 9),
(84, 'Ganda', 2),
(85, 'Golungo Alto', 6),
(86, 'Gonguembo', 6),
(87, 'Huambo', 9),
(88, 'Humpata', 10),
(89, 'Ícolo e Bengo', 11),
(90, 'Jamba', 10),
(91, 'Kilamba Kiaxi', 11),
(92, 'Cuito', 3),
(93, 'Libolo', 7),
(94, 'Lobito', 2),
(95, 'Londuimbale', 9),
(96, 'Longonjo', 9),
(97, 'Lóvua', 12),
(98, 'Luacano', 15),
(99, 'Luanda', 11),
(100, 'Luau', 15),
(101, 'Lubalo', 12),
(102, 'Lubango', 10),
(103, 'Lucala', 6),
(104, 'Lucapa', 12),
(105, 'Luchazes', 15),
(106, 'Luquembo', 14),
(107, 'Léua', 15),
(108, 'Milunga', 17),
(109, 'Malanje', 14),
(110, 'Maquela do Zombo', 17),
(111, 'Marimba', 14),
(112, 'Massango', 14),
(113, 'Matala', 10),
(114, 'Mavinga', 5),
(115, 'Menongue', 5),
(116, 'Moxico', 15),
(117, 'Mucaba', 17),
(118, 'Mucari', 14),
(119, 'Muconda', 13),
(120, 'Mungo', 10),
(121, 'Mussende', 7),
(122, 'Nancova', 5),
(123, 'Mbanza Kongo', 18),
(124, 'Namacunde', 8),
(125, 'Nambuangongo', 1),
(126, 'Moçâmedes', 16),
(127, 'Negage', 17),
(128, 'Nharea', 3),
(129, 'Nóqui', 18),
(130, 'Nzeto', 18),
(131, 'Ombadja', 8),
(132, 'Pango Aluquém', 1),
(133, 'Porto Amboim', 7),
(134, 'Puri', 17),
(135, 'Quela', 14),
(136, 'Quibala', 7),
(137, 'Quiculungo', 6),
(138, 'Quilenda', 7),
(139, 'Quilengues', 10),
(140, 'Quimbele', 17),
(141, 'Quipungo', 10),
(142, 'Quirima', 14),
(143, 'Quissama', 11),
(144, 'Quitexe', 17),
(145, 'Rivungo', 5),
(146, 'Samba Caju', 6),
(147, 'Sanza Pombo', 17),
(148, 'Saurimo', 13),
(149, 'Seles', 7),
(150, 'Songo', 17),
(151, 'Soyo', 18),
(152, 'Sumbe', 7),
(153, 'Chicala-Choloanga', 9),
(154, 'Chindjenje', 9),
(155, 'Talatona', 11),
(156, 'Tômbua', 16),
(157, 'Tomboco', 18),
(158, 'Ucuma', 9),
(159, 'Uíge', 17),
(160, 'Viana', 11),
(161, 'Virei', 16),
(162, 'Xá-Muteba', 12);

-- --------------------------------------------------------

--
-- Estrutura para tabela `outdoor`
--

CREATE TABLE `outdoor` (
  `id` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `idComuna` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'Disponivel',
  `eliminado` varchar(10) NOT NULL DEFAULT 'nao',
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `outdoor`
--

INSERT INTO `outdoor` (`id`, `tipo`, `preco`, `idComuna`, `estado`, `eliminado`, `idUsuario`) VALUES
(1, 'Paineis Luminosos', 5000, 53, 'Por Validar Pagamento', 'nao', 7),
(2, 'Paineis Não Luminosos', 20000, 155, 'Por Validar Pagamento', 'nao', 7),
(3, 'Faixadas', 5000, 155, 'Por Validar Pagamento', 'nao', 7),
(4, 'Placas \r\nIndicativas', 5000, 155, 'Ocupado', 'nao', 7),
(5, 'Lampoles', 5000, 155, 'Ocupado', 'nao', 7),
(6, 'Paineis Luminosos', 3000, 43, 'Disponivel', 'nao', 11),
(7, 'Paineis Nao Luminosos', 1500, 69, 'Disponivel', 'nao', 11);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `idGestor` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  `dataInicio` date NOT NULL,
  `dataFim` date NOT NULL,
  `total` double NOT NULL,
  `idOutdoor` int(11) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'nao',
  `estado` varchar(50) NOT NULL DEFAULT 'nao aprovado',
  `recibo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `idGestor`, `idCliente`, `imagem`, `dataInicio`, `dataFim`, `total`, `idOutdoor`, `eliminado`, `estado`, `recibo`) VALUES
(1, 7, 5, NULL, '2023-07-01', '2023-07-31', 15000, 3, 'nao', 'nao aprovado', NULL),
(2, 7, 6, NULL, '2023-07-03', '2023-07-28', 1000, 4, 'nao', 'aprovado', 'http://localhost/gestOutdoor/content/comprovativo/64bd57cf0359c_outdoorgest.pdf'),
(3, 7, 5, NULL, '2023-07-04', '2023-07-26', 10000, 5, 'nao', 'aprovado', NULL),
(4, 10, 5, 'http://localhost/gestOutdoor/content/images/64bd57cf03334_DER.png', '2023-07-13', '2023-07-13', 35000, 3, 'nao', 'nao aprovado', 'http://localhost/gestOutdoor/content/comprovativo/64bd57cf0359c_outdoorgest.pdf'),
(5, 10, 5, 'http://localhost/gestOutdoor/content/images/64bd57e87f952_Diagrama de Classes.png', '2023-07-13', '2023-07-13', 100000, 2, 'nao', 'nao aprovado', 'http://localhost/gestOutdoor/content/comprovativo/64bd57e87fba0_outdoorgest.pdf');

-- --------------------------------------------------------

--
-- Estrutura para tabela `provincia`
--

CREATE TABLE `provincia` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `provincia`
--

INSERT INTO `provincia` (`id`, `nome`) VALUES
(1, 'Bengo'),
(2, 'Benguela'),
(3, 'Bie'),
(4, 'Cabinda'),
(5, 'Cuando Cubango'),
(6, 'Cuanza Norte'),
(7, 'Cuanza Sul'),
(8, 'Cunene'),
(9, 'Huambo'),
(10, 'Huila'),
(11, 'Luanda'),
(12, 'Lunda Norte'),
(13, 'Lunda Sul'),
(14, 'Malanje'),
(15, 'Moxico'),
(16, 'Namibe'),
(17, 'Uige'),
(18, 'Zaire');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `eliminado` varchar(10) NOT NULL DEFAULT 'nao'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `senha`, `tipo`, `eliminado`) VALUES
(1, 'root', 'root', 'Administrador', 'nao'),
(5, 'jota', '123', 'Cliente', 'nao'),
(6, 'cascata', '123', 'Cliente', 'nao'),
(7, 'gestor', '123', 'Gestor', 'nao'),
(9, 'gestor2', '123', 'Gestor', 'nao'),
(10, 'gestor3', '123', 'Gestor', 'nao'),
(11, 'gest', '123', 'Gestor', 'nao');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idComuna` (`idComuna`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idComuna` (`idComuna`),
  ADD KEY `cliente_ibfk_3` (`idAdm`);

--
-- Índices de tabela `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMunicipio` (`idMunicipio`);

--
-- Índices de tabela `gestor`
--
ALTER TABLE `gestor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idComuna` (`idComuna`),
  ADD KEY `gestor_ibfk_3` (`idAdm`);

--
-- Índices de tabela `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProvincia` (`idProvincia`);

--
-- Índices de tabela `outdoor`
--
ALTER TABLE `outdoor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComuna` (`idComuna`),
  ADD KEY `outdoor_ibfk_1` (`idUsuario`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idOutdoor` (`idOutdoor`),
  ADD KEY `pedidos_ibfk_1` (`idCliente`),
  ADD KEY `pedidos_ibfk_2` (`idGestor`);

--
-- Índices de tabela `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;

--
-- AUTO_INCREMENT de tabela `gestor`
--
ALTER TABLE `gestor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT de tabela `outdoor`
--
ALTER TABLE `outdoor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `administrador_ibfk_2` FOREIGN KEY (`idComuna`) REFERENCES `comuna` (`id`);

--
-- Restrições para tabelas `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`idComuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `cliente_ibfk_3` FOREIGN KEY (`idAdm`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `comuna_ibfk_1` FOREIGN KEY (`idMunicipio`) REFERENCES `municipio` (`id`);

--
-- Restrições para tabelas `gestor`
--
ALTER TABLE `gestor`
  ADD CONSTRAINT `gestor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `gestor_ibfk_2` FOREIGN KEY (`idComuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `gestor_ibfk_3` FOREIGN KEY (`idAdm`) REFERENCES `usuario` (`id`);

--
-- Restrições para tabelas `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`id`);

--
-- Restrições para tabelas `outdoor`
--
ALTER TABLE `outdoor`
  ADD CONSTRAINT `outdoor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `outdoor_ibfk_2` FOREIGN KEY (`idComuna`) REFERENCES `comuna` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`idGestor`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`idOutdoor`) REFERENCES `outdoor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
