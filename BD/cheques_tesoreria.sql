-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2020 a las 17:37:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cheques_tesoreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` bigint(11) NOT NULL,
  `cargo` varchar(25) COLLATE latin1_bin NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `monto_letras` varchar(100) COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `cargo`, `monto`, `monto_letras`) VALUES
(1, 'Residente I', '500.00', 'Quinientos quetzales exactos'),
(2, 'Residente II', '500.00', 'Quinientos quetzales exactos'),
(3, 'Residente III', '500.00', 'Quinientos quetzales exactos'),
(4, 'Residente IV', '500.00', 'Quinientos quetzales exactos'),
(5, 'Residentes (Jefe)', '3500.00', 'Tres mil quinientos quetzales exactos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque`
--

CREATE TABLE `cheque` (
  `id_cheque` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `id_empleado` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_Empleado` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE latin1_bin NOT NULL,
  `status` bigint(20) NOT NULL,
  `nit` varchar(20) COLLATE latin1_bin NOT NULL,
  `id_cargo` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_Empleado`, `nombre`, `status`, `nit`, `id_cargo`) VALUES
(1, 'Dulce Regina Cajbon Yllescas', 1, '90897900', 1),
(2, 'Kevin Ajanel Trejo ', 0, '82560846', 1),
(3, 'Estefani Alejandra de León Rucuch', 1, '80188656', 1),
(4, 'Nancy Paola Sánchez Mux', 1, '99665476', 1),
(5, 'Damaris Rocío Yutan Zamora ', 1, '72820977', 1),
(6, 'Iván Enrique Palacios Ramos ', 1, '106175068', 1),
(7, 'Rudy Dressley Alvarado Amado ', 0, '106131141', 1),
(8, 'Isidro Pérez Coché', 1, '68809247', 1),
(9, 'Pedro Fernando Barrios Abzún ', 1, '106131346', 1),
(10, 'Rodrigo Andrés Bautista Rodas ', 1, '105006297', 1),
(11, 'Alexander García Santay', 1, '72470380', 1),
(12, 'David Antonio Reyes Enríquez ', 1, '76511227', 1),
(13, 'María Carlyle Barrios Nowell', 1, '56369689', 1),
(14, 'Jesamin Bridgeth Córdova Ovalle ', 1, '79180779', 1),
(15, 'Henry Alexander García Cuá ', 1, '91949068', 1),
(16, 'Miguel Angel Adonías Godínez González', 1, '10287400K', 1),
(17, 'Cathleen Magaly Pérez Recinos ', 1, '104998997', 1),
(18, 'Karla Isela Racancoj López ', 1, '69739803', 1),
(19, 'Rosa María Rendón Mejía ', 1, '91902851', 1),
(20, 'Nohelia Pamela Sac García ', 1, '99475448', 1),
(21, 'Elisa Lucia Sigüenza Arredondo', 1, '90911172', 1),
(22, 'Yenifer Lucrecia Velásquez Orozco ', 1, '104631252', 1),
(23, 'Karen Mary Gabriela Yax Toyom ', 1, '92054072', 1),
(24, 'Cristel Yaneli Chicas Morales ', 1, '101733658', 1),
(25, 'Víctor Josué Pacajoj Alonzo ', 1, '95808000', 1),
(26, 'Marcelino Agustin Champet Herrera ', 1, '91710995', 1),
(27, 'Jonathan André Julio Sánchez Argueta ', 1, '97369071', 1),
(28, 'Wilson Eliseo Sontay Oxlaj ', 1, '103006958', 1),
(29, 'Brian Dahllin Enríquez Herrera ', 1, '87919966', 1),
(30, 'Edin Roberto Leiva Fuentes ', 1, '104334355', 1),
(31, 'Anderson Gonzalo Alvarado Huinac', 1, '103399739', 1),
(32, 'Joceline Carola Morales Sandoval ', 1, '83590838', 1),
(33, 'Kimberly Cristal Zacarías Castro ', 1, '75997894', 1),
(34, 'Brandon Oswaldo Alvarez de León ', 1, '97086857', 1),
(35, 'Shirley Teresa Cabrera Piedrasanta ', 1, '88651924', 1),
(36, 'Gloria Bonifilia Fuentes Orozco ', 1, '101882947', 1),
(37, 'Edilma Mariela Mazariegos Rodas', 1, '63503891', 1),
(38, 'Marta Julia Orozco y Orozco ', 1, '102837074', 1),
(39, 'Andrea Lucia Smith Pisquiy ', 1, '105252956', 1),
(40, 'Leticia Nohemí Vicente Cardona ', 1, '18155499', 1),
(41, 'Lindsay Karola Zamora González', 1, '106405187', 1),
(42, 'María del Rosario Xol Caal', 1, '70872287', 1),
(43, 'Andy Jared Barrera Villagrán ', 1, '103714243', 1),
(44, 'Carlos Alberto Gómez Delgado ', 1, '80627323', 1),
(45, 'William Arturo Sanic Martinez ', 1, '64081370', 1),
(46, 'Cristhian Manuel Velásquez', 1, '105626120', 1),
(47, 'Francisco Daniel Juárez Colomo', 1, '81154488', 1),
(48, 'Alexis Raúl Lucas Rojas ', 1, '102288348', 1),
(49, 'Walter Fernando Sazo Torres', 1, '88167577', 1),
(50, 'Bárbara del Rosario González Román ', 1, '99811960', 1),
(51, 'Bryan Alexander Taracena Díaz', 1, '106462539', 1),
(52, 'Gladys Anabella López de León ', 1, '53438965', 2),
(53, 'Fredy Humberto Maldonado Guzmán ', 1, '92177336', 2),
(54, 'Aileen Fuentes Oliva ', 1, '101298803', 2),
(55, 'María Edith Paz Alvarado ', 1, '88658589', 2),
(56, 'Victor Manuel Yacón Pichol ', 1, '70863946', 2),
(57, 'David Andrés Velásquez Argueta ', 1, '101261942', 2),
(58, 'Maritza Elodia Marina Eulalia Cupil Barrios', 1, '71543465', 2),
(59, 'Ricardo Antonio Ovalle Rubio ', 1, '50213938', 2),
(60, 'Ingrid Manuela Baquiax Yax ', 1, '102463166', 2),
(61, 'Shamma Díaz Barillas', 1, '74005693', 2),
(62, 'Mónica Dianeth Chuvac Mérida ', 1, '78831482', 2),
(63, 'Héctor Manuel Cortez Hí', 1, '86176161', 2),
(64, 'Gloria Debora Fuentes García ', 1, '86143506', 2),
(65, 'Ever Fernando Itzep Pérez ', 1, '80793657', 2),
(66, 'Luisa Fernanda Molina Pocóm ', 1, '87820684', 2),
(67, 'Alvaro Leonardo Recinos Chávez ', 1, '75738309', 2),
(68, 'Yoselin Mayté Orozco Velásquez ', 1, '92160905', 2),
(69, 'Vanesa Virginia Sapón López ', 1, '102418101', 2),
(70, 'Cindy Karina Solís Barrios ', 1, '92104916', 2),
(71, 'Fernanda Claudia Judith Tobías Calderón ', 1, '67689701', 2),
(72, 'Ana Beatriz Tello Say', 1, '80833950', 2),
(73, 'Daniel Alexis Castillo ', 1, '94823766', 2),
(74, 'Alam Eduardo Guerra Saavedra', 1, '102807884', 2),
(75, 'Edvin Alexander Santos González', 1, '80727417', 2),
(76, 'Juan Edison Raymundo López ', 1, '101051743', 2),
(77, 'Saúl Antonio Pérez Marroquín ', 1, '80670407', 2),
(78, 'Ana Beatriz Crisanda Pisquiy Quemé ', 1, '92280684', 2),
(79, 'Leslie Melinda Valiente Velásquez ', 1, '102824398', 2),
(80, 'Luis Fernando Joj Tajiboy ', 1, '99588994', 2),
(81, 'Josué Leví López Mazariegos ', 1, '94180474', 2),
(82, 'Yhelitza Maribel Poz Chojolán ', 1, '92564437', 2),
(83, 'Dary Lucero García Barrios ', 1, '83593373', 2),
(84, 'Iris Alejandra Calderón Miranda ', 1, '77563271', 2),
(85, 'Lilian María Anleu García ', 1, '74145991', 2),
(86, 'Ana Cristina Xivir Xic', 1, '75123975', 2),
(87, 'Alejandra Berenice Reyes Sula', 1, '49029525', 2),
(88, 'Miguel Angel Nolasco Chuc ', 1, '92123570', 2),
(89, 'Jaime Estuardo Dionisio Rivera ', 1, '95423206', 2),
(90, 'Ana Michelle Funes Leal ', 1, '95426949', 2),
(91, 'Carmen Yalí del Rosario Tacaxoy Santos ', 1, '75373858', 2),
(92, 'Esthephanie Michelle Welch Reyes ', 1, '95692037', 2),
(93, 'Marco Antonio Fulgencio Cifuentes Gramajo', 1, '50431455', 2),
(94, 'Susan Michelle Vásquez Orozco ', 1, '80227317', 2),
(95, 'Blandina del Carmen Mogollón Gil', 1, '92856772', 2),
(96, 'Manolo Morales Rivera ', 1, '73913014', 2),
(97, 'Jorge Luis Domínguez Rivera ', 1, '58958630', 2),
(98, 'Luis Eduardo Loarca Hernández ', 1, '65120094', 2),
(99, 'Jorge David de León Domínguez ', 1, '81631596', 2),
(100, 'Eduardo Luis Rodriguez de León ', 1, '65566718', 2),
(101, 'Samantha Doreth Reyes Monterroso', 1, '70908559', 3),
(102, 'Yulissa de los Angeles Queme Mazariegos ', 1, '80212034', 3),
(103, 'Gwendoline Odeth Rodas Barrios ', 1, '56887078', 3),
(104, 'Paola Lisbeth Rodas Fuentes', 1, '71671919', 3),
(105, 'Hannye Marbeny Gutiérrez Herrera de López', 1, '42548888', 3),
(106, 'Edwin Ovando Pelíco Sontay', 1, '96039345', 3),
(107, 'Jorge Estuardo Martínez Ramos', 1, '38134462', 3),
(108, 'Silverman García Barrios ', 1, '83593365', 3),
(109, 'Bryan Yossimar Roblero Oroxom', 1, '39599043', 3),
(110, 'Raúl Estuardo Vicente García ', 1, '56092962', 3),
(111, 'Ahirys Enory Alva González', 1, '68972369', 3),
(112, 'Ana Elifelet de León Domínguez', 1, '64647641', 3),
(113, 'Karenn Antonia Pérez Ortega', 1, '70703019', 3),
(114, 'Nancy Paola Girón López', 1, '77541111', 3),
(115, 'Betsy Yomali Díaz Solis', 1, '89154363', 3),
(116, 'Gustavo Enrique García Pur', 1, '71088873', 3),
(117, 'Ana María Teresa Lux Osorio', 1, '60912626', 3),
(118, 'Juan Carlos Dardón Juárez', 1, '34356398', 3),
(119, 'José Alejandro Herrera Pon ', 1, '92182313', 3),
(120, 'Ada Noemí Chávez Gómez ', 1, '92492231', 3),
(121, 'Heike Daibely Tzoc Socop', 1, '97228826', 3),
(122, 'Ferdi Baldomero Bartolon Gómez ', 1, '59491639', 3),
(123, 'Edgar Moisés Josué Nimatuj Gonzalez', 1, '92107117', 3),
(124, 'Cinthya Maité Fuentes López ', 1, '60946997', 3),
(125, 'Elliott Aderly Argueta López ', 1, '92224202', 3),
(126, 'Miguel Alfonso Escobar Castillo ', 1, '92281508', 3),
(127, 'Kevin Guillermo Hernández García ', 1, '73916110', 3),
(128, 'Mario Robin Pérez Barrios ', 1, '55787983', 3),
(129, 'Beily Melissa Sapón López de Morales ', 1, '98946838', 3),
(130, 'Cristhian Ronald Ixcot Pérez', 1, '97206024', 3),
(131, 'Kelly María Cojtín Contreras', 1, '92315860', 3),
(132, 'Carmen María Oliva Barrientos ', 1, '66681227', 3),
(133, 'Javier Fernando Rodas Valenzuela ', 1, '94398887', 3),
(134, 'Angelica Lisseth Reyes Reyes ', 1, '83269371', 3),
(135, 'Isabel de Lourdes Ajtún Pelicó ', 1, '95569588', 3),
(136, 'Erika Gabriela Maldonado Alvarez', 1, '95145974', 3),
(137, 'Luis Pablo Quintana de León', 1, '92310206', 3),
(138, 'Begli Ottoniel Vásquez Velásquez ', 1, '60944765', 3),
(139, 'Hermelinda Josefa Puac Vásquez', 1, '94022801', 3),
(140, 'José Miguel Alcázar de León', 1, '57980799', 3),
(141, 'Marie-Franz Burmester Chinchilla', 1, '71947302', 3),
(142, 'Noé Jeremias Coz Cité ', 1, '37528424', 3),
(143, 'Felipe Eduardo Yax Pelicó', 1, '98960814', 3),
(144, 'Donald Ricardo Salazar Herrera', 1, '58822534', 3),
(145, 'Joao Josimar Barrios Hernández', 1, '50748408', 4),
(146, 'César Rodas Calderón', 1, '40973727', 4),
(147, 'Jorge Mario Arriola Martínez', 1, '53437772', 4),
(148, 'Miguel Rodrigo Alegría Díaz', 1, '58958983', 4),
(149, 'Víctor Alfonso Castillo Gómez ', 1, '43852661', 4),
(150, 'Crúz Alejandro Llinas Segura', 1, '27779599', 4),
(151, 'Carlos Iván Lima Gamboa ', 1, '92455611', 4),
(152, 'Melani Noemi Rojas Barrera', 1, '91421942', 4),
(153, 'Maritza Alejandra Joachín Mazariegos ', 1, '77956052', 1),
(154, 'Gualberto Ixpiyakok Sotz Alvarado', 1, '71443193', 5),
(155, 'Yuliana Lisseth de León Loarca ', 1, '82541876', 5),
(156, 'Lucrecia Lorena Quixtán Pon', 1, '72154284', 5),
(157, 'Michelle Marie Haydeé Juarez Vargas ', 1, '80420621', 5),
(158, 'Rudy Alexander Tzunún Tax', 1, '91699401', 5),
(159, 'Edgar Joel Romero Marroquín', 1, '42443989', 5),
(160, 'Diego Alfonso García Fuentes', 1, '68700105', 5),
(161, 'Heidy Eugenia Aguilar Castillo', 1, '89149955', 5),
(162, 'Leonel José Alfredo Almengor Gutierrez', 1, '94320691', 5),
(163, 'Hugo Roberto Alvarado Gutiérrez', 1, '94319537', 5),
(164, 'Ivonne María Ivette Argueta Cifuentes', 1, '93798245', 5),
(165, 'Jorge Noé de León Colop', 1, '48771589', 5),
(166, 'Hilda Leonor Díaz Mora', 1, '74366890', 5),
(167, 'Mónica Denisse Figueroa Aguilar de López', 1, '53438531', 5),
(168, 'Carmen Alicia López Ortíz', 1, '89145089', 5),
(169, 'Helen Yulissa Morales Rodas', 1, '92410618', 5),
(170, 'Eva María Samayoa Castillo', 1, '52036294', 5),
(171, 'Brenda Jazmín Soch Chiché', 1, '62978292', 5),
(172, 'Mabel Stephanie Herrera Aquino ', 1, '20570473', 5),
(173, 'Mónica del Rosario Ramos Figuero de Estrada', 1, '34464255', 5),
(174, 'Karla Yesenia Miranda Sandoval', 1, '72092807', 5),
(175, 'Lucinda Patricia Alonzo Juan ', 1, '74157183', 5),
(176, 'Nancy Johanna Orozco Fuentes ', 1, '93789823', 5),
(177, 'Yenifer Mariela Ventura López', 1, '95194657', 5),
(178, 'Flor Pamela Rodas Gutierrez de Zelada', 1, '39345327', 5),
(179, 'Jorge Roberto Ríos Zambrano', 1, '94194416', 5),
(180, 'Angel Vicente Saquilá Chocoy', 1, '77147677', 5),
(181, 'Pedro Eladio Vásquez Oxlaj', 1, '90855590', 5),
(182, 'Eva Alejandra Santizo Paz', 1, '91007240', 5),
(183, 'Rossana Ibethe Barrios Osorio', 1, '73920819', 5),
(184, 'Carlos Manuel Mendoza Mendoza', 1, '94187398', 5),
(185, 'Ana Gabriela Eunice Rodas Domingo ', 1, '54785065', 5),
(186, 'Ana Lucrecia Godínez Fuentes', 1, '60964375', 5),
(187, 'Sandra Catalina Gaspar Pérez', 1, '93805160', 5),
(188, 'Paola Yaneth López Orozco', 1, '88118975', 5),
(189, 'Yuly Alejandra Reyes Romero ', 1, '55483976', 5),
(190, 'Renan Roberto Reyes Lucas', 1, '90780752', 5),
(191, 'Miguel Eduardo Chavaloc Tzoc', 1, '70430659', 5),
(192, 'Fernando Salvador Fuentes Barrios ', 1, '27984095', 5),
(193, 'Mirna Alejandra Cifuentes Rodríguez', 1, '36489069', 5),
(194, 'Adirson Joaquín Chuvác Cifuentes ', 1, '20559755', 5),
(195, 'Nelly Rebeca Martínez Castillo de Guevara', 1, '91377277', 5),
(196, 'Miguel Estuardo Pérez Colop ', 1, '62962280', 5),
(197, 'Rony Fernando Pereira López ', 1, '61298735', 5),
(198, 'Irma Sofía Comelli Avila ', 1, '86442651', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`id_cheque`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_Empleado`),
  ADD KEY `id_monto` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cheque`
--
ALTER TABLE `cheque`
  MODIFY `id_cheque` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_Empleado` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cheque`
--
ALTER TABLE `cheque`
  ADD CONSTRAINT `cheque_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_Empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
