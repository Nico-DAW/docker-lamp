-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2021 a las 09:56:12
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellidos`, `edad`, `email`, `telefono`) VALUES
(1, 'Easton Orn', 'Ankunding', 75, 'raina09@example.net', '820-751-2925x00'),
(2, 'Jewell Mar', 'Lockman', 77, 'carmine87@example.com', '+74(2)791953341'),
(3, 'Mr. Walton', 'Wilkinson', 53, 'shields.luella@example.org', '428.040.6851x58'),
(4, 'Dr. Lolita', 'Borer', 90, 'tkoelpin@example.net', '218-904-5250'),
(5, 'Mrs. Virgi', 'Gottlieb', 30, 'schmeler.kelvin@example.com', '+82(3)753952763'),
(6, 'Mr. Lonzo ', 'Carter', 3, 'vcarroll@example.org', '824-715-0817x38'),
(7, 'Doug Brown', 'Wisozk', 2, 'murray.kenya@example.org', '(127)190-8465'),
(8, 'Zoey Mante', 'Hermann', 96, 'mills.tremaine@example.net', '967-477-9819x26'),
(9, 'Ahmad Ullr', 'Stoltenberg', 79, 'alva10@example.net', '(839)208-0728x2'),
(10, 'Joseph Hau', 'Prohaska', 12, 'darien95@example.org', '929.520.7810x32'),
(11, 'Eve Prohas', 'Fahey', 88, 'kaylin.upton@example.com', '032.844.2771x49'),
(12, 'Mr. Fern G', 'Predovic', 47, 'stacy.stracke@example.org', '292.010.5888x48'),
(13, 'Liana Kohl', 'Gerhold', 97, 'trinity07@example.org', '+22(6)684472222'),
(14, 'Jodie Howe', 'Russel', 57, 'sipes.bradly@example.org', '(754)824-8191x1'),
(15, 'Dangelo We', 'Steuber', 34, 'arvel63@example.com', '04079459425'),
(16, 'Leonora Os', 'Kohler', 5, 'jennie16@example.org', '1-288-642-9785'),
(17, 'Prof. Clif', 'Schulist', 91, 'kade79@example.org', '142.057.7609x25'),
(18, 'Alessandro', 'Treutel', 73, 'jesse.jakubowski@example.net', '1-566-513-7099x'),
(19, 'Dr. Ali Na', 'Walsh', 2, 'hoppe.rocio@example.org', '468.393.8804'),
(20, 'Prof. Hort', 'Keeling', 73, 'o\'connell.garret@example.org', '1-961-468-2537'),
(21, 'Leda Wolff', 'Beahan', 7, 'hettinger.lavern@example.org', '(591)981-0122x4'),
(22, 'Prof. Kory', 'Cole', 38, 'mathias.weber@example.org', '430-633-2417'),
(23, 'Alexandre ', 'Kris', 46, 'toy.judd@example.net', '1-521-027-6161x'),
(24, 'Miss Laury', 'Hoppe', 76, 'plind@example.com', '1-067-370-8291'),
(25, 'Prof. Mike', 'Franecki', 72, 'pbruen@example.org', '(272)518-8168x2'),
(26, 'Jarret Gol', 'Herman', 9, 'ellen63@example.org', '866-571-5079'),
(27, 'Raegan Wal', 'Padberg', 4, 'okuneva.billie@example.net', '+89(2)950578580'),
(28, 'Bennie Cru', 'Collins', 65, 'nellie27@example.com', '758-207-7923x12'),
(29, 'Miss Amira', 'Heaney', 27, 'osinski.kaela@example.com', '(946)427-1710x2'),
(30, 'Dr. Everar', 'Kovacek', 20, 'pagac.alisha@example.org', '03070971336'),
(31, 'Bennie May', 'Franecki', 5, 'alyson.dare@example.com', '+65(0)260319018'),
(32, 'Prof. Suza', 'Batz', 41, 'arvilla96@example.com', '187-779-6328'),
(33, 'Giles Kloc', 'Collins', 50, 'loraine.koepp@example.com', '044.648.7236x69'),
(34, 'Mrs. Desti', 'Runolfsdottir', 12, 'bode.ivah@example.com', '+73(9)746595294'),
(35, 'Gregg Kess', 'Hirthe', 52, 'abner.kuhic@example.net', '473.883.0514x70'),
(36, 'Ludie Berg', 'Johnson', 39, 'abashirian@example.com', '982-776-2665x46'),
(37, 'Candelario', 'Towne', 44, 'schmeler.jayce@example.org', '1-122-817-0199x'),
(38, 'Rick Terry', 'Bernier', 30, 'kjacobi@example.org', '1-773-341-0334'),
(39, 'Mollie Rue', 'Gerlach', 62, 'abbott.ross@example.org', '(270)537-1699'),
(40, 'Larissa Be', 'Fadel', 71, 'ziemann.ali@example.org', '510-608-3550x53'),
(41, 'Brock Wild', 'Auer', 52, 'felipe38@example.net', '175.158.7942'),
(42, 'Dr. Darrel', 'Cassin', 26, 'cody.torphy@example.com', '707.068.5023'),
(43, 'Amara Wild', 'Auer', 19, 'beulah43@example.org', '1-373-877-0632'),
(44, 'Prof. Marj', 'Mueller', 79, 'eloise59@example.net', '803-638-0035x52'),
(45, 'Ramon Schu', 'Luettgen', 79, 'ratke.tyshawn@example.com', '057.834.3439x79'),
(46, 'Nelda Rau', 'Mosciski', 58, 'crona.lewis@example.com', '(344)136-1736'),
(47, 'Prof. Tomm', 'Krajcik', 74, 'ova.jakubowski@example.com', '707-101-7913'),
(48, 'Kimberly B', 'Champlin', 99, 'mbergstrom@example.net', '1-603-797-1223x'),
(49, 'Meggie Kuh', 'Murray', 47, 'msmith@example.com', '05314954958'),
(50, 'Destinee A', 'Gaylord', 22, 'cierra78@example.com', '081.429.9630'),
(51, 'German Fri', 'Trantow', 9, 'nbechtelar@example.net', '1-452-460-8371x'),
(52, 'Reed Schad', 'Leannon', 54, 'kaylin.brekke@example.org', '316.477.2864'),
(53, 'Bonnie Ema', 'Johns', 23, 'ilarson@example.net', '(269)304-4529'),
(54, 'Brett Donn', 'Johnston', 93, 'elouise51@example.net', '475.249.2568x74'),
(55, 'Mateo Auer', 'Romaguera', 73, 'kkutch@example.com', '(304)295-0134'),
(56, 'Mr. Demarc', 'Koss', 79, 'leora44@example.net', '122-666-8539'),
(57, 'Anais Kub', 'Murphy', 2, 'vlockman@example.net', '09257062898'),
(58, 'Ian Botsfo', 'Larson', 49, 'eldora81@example.net', '822.956.1498x36'),
(59, 'Deanna Bor', 'Jacobi', 68, 'kade72@example.com', '01031925432'),
(60, 'Sabina Cro', 'Auer', 66, 'bud15@example.org', '1-382-851-0494x'),
(61, 'Miss Tatya', 'Stehr', 5, 'murray.clementina@example.net', '1-253-845-9831x'),
(62, 'Eusebio Sw', 'Kuhic', 14, 'melyssa29@example.org', '(272)761-9100x5'),
(63, 'Prof. Omer', 'Corkery', 47, 'skeeling@example.com', '467-269-5818'),
(64, 'Pamela Joh', 'Graham', 50, 'virginia.moen@example.net', '+60(5)156464759'),
(65, 'Micah Koze', 'Schoen', 21, 'qpaucek@example.org', '895.590.7735x03'),
(66, 'Anthony Ba', 'Gaylord', 71, 'ebert.sylvester@example.net', '087-947-8297'),
(67, 'Ciara Smit', 'Lang', 73, 'zhegmann@example.org', '508-243-0897'),
(68, 'Carmen Buc', 'Hamill', 34, 'dane45@example.com', '474.353.3713x69'),
(69, 'Mavis Rath', 'Altenwerth', 53, 'dereck46@example.org', '(126)876-1341x5'),
(70, 'Scot Erdma', 'Gibson', 56, 'grimes.coralie@example.net', '1-362-937-3118x'),
(71, 'Isaias Koh', 'Weber', 33, 'jettie09@example.org', '212-741-2795x40'),
(72, 'Lucie Beah', 'Prosacco', 29, 'xveum@example.net', '+16(6)886783648'),
(73, 'Estelle An', 'Shanahan', 54, 'do\'keefe@example.org', '1-159-589-6816x'),
(74, 'Ruthie Nik', 'Renner', 18, 'marjolaine63@example.net', '1-500-553-4301x'),
(75, 'Dr. Lucian', 'Kemmer', 58, 'williamson.armani@example.net', '832-441-9397'),
(76, 'Miss Katri', 'Murray', 90, 'alena.pouros@example.org', '(954)208-7623x0'),
(77, 'Miss Margi', 'Boyer', 99, 'tabshire@example.org', '06378536477'),
(78, 'Ambrose Ma', 'Parker', 78, 'eichmann.justine@example.org', '758-634-8822'),
(79, 'Alexanne C', 'Fritsch', 15, 'justine59@example.org', '162-160-0692'),
(80, 'Miss Zoie ', 'Williamson', 68, 'lindgren.ellis@example.com', '1-111-353-1155'),
(81, 'Dr. Rosali', 'Roob', 45, 'breitenberg.guiseppe@example.com', '706-388-5631x90'),
(82, 'Zachery Mc', 'Brakus', 79, 'rreichel@example.com', '135.840.6466'),
(83, 'Kirsten Ri', 'Tillman', 85, 'little.kailee@example.org', '992-834-9891'),
(84, 'Dr. Earlen', 'Ward', 38, 'raven.o\'reilly@example.com', '973-651-8183'),
(85, 'Prof. Wilt', 'McLaughlin', 13, 'emmett.simonis@example.com', '+46(5)156369051'),
(86, 'Connor Bre', 'Stroman', 91, 'carey60@example.org', '422-053-9884'),
(87, 'Ms. Kali J', 'Lakin', 5, 'abbigail91@example.org', '753.608.6629x67'),
(88, 'Ethelyn Da', 'Waelchi', 34, 'stacy.runte@example.org', '(727)246-0994x3'),
(89, 'Pinkie Weh', 'Gottlieb', 26, 'reagan18@example.com', '(515)307-0277'),
(90, 'Mr. Josiah', 'King', 36, 'bechtelar.kelsie@example.com', '09717339848'),
(91, 'Robb Larso', 'Ziemann', 24, 'sasha.quitzon@example.net', '467-941-0450x92'),
(92, 'Dr. Sabrin', 'Mosciski', 17, 'morissette.lavonne@example.net', '1-248-891-2608x'),
(93, 'Lazaro Str', 'Quitzon', 12, 'maribel88@example.net', '1-641-336-9231x'),
(94, 'Josue Heat', 'Kuhlman', 90, 'blick.tiara@example.com', '+46(9)115067597'),
(95, 'Estevan Zi', 'Langosh', 66, 'abarrows@example.org', '022-226-0261'),
(96, 'Jakob Will', 'Kerluke', 67, 'runte.torey@example.net', '663.519.3016'),
(97, 'Elaina Ham', 'Bashirian', 38, 'minnie06@example.org', '775.806.2417x09'),
(98, 'Kimberly J', 'Wolff', 67, 'adell85@example.net', '856-075-8549x21'),
(99, 'Ms. Sophie', 'Watsica', 71, 'savannah.simonis@example.com', '692.194.2356x81'),
(100, 'Yazmin Rau', 'Murphy', 77, 'alivia66@example.org', '+73(7)795443614');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `hotel` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id`, `hotel`, `direccion`, `telefono`, `email`) VALUES
(1, 'Little Group', '436 Howe Plains Apt. 437', '1-153-111-99', 'earlene.legros@example.org'),
(2, 'Medhurst Inc', '795 Bayer Inlet Apt. 449', '08299512048', 'trolfson@example.com'),
(3, 'Goodwin, Rippin and ', '98764 Darrell Viaduct', '514.073.4657', 'gorczany.rusty@example.com'),
(4, 'Kovacek-O\'Keefe', '74717 Ethel Port Apt. 192', '946-466-5654', 'quincy.hoeger@example.org'),
(5, 'Purdy, Block and Kuh', '5836 Keshaun Walks Apt. 607', '598-360-7332', 'caleigh.langosh@example.net'),
(6, 'Kuhic, Abshire and S', '17642 Trantow Hill', '1-529-721-83', 'gordon.emard@example.org'),
(7, 'Braun, Leffler and H', '7456 Bill Corners', '(653)249-754', 'marquis40@example.com'),
(8, 'Cartwright, Zulauf a', '8468 Brekke Ferry', '1-644-872-76', 'loma.lesch@example.com'),
(9, 'O\'Hara, Graham and A', '89895 Emard Unions Suite 258', '287-817-9414', 'diamond.hane@example.org'),
(10, 'Murazik, Fisher and ', '47484 Smitham Fields Apt. 406', '288.715.8862', 'kade31@example.net'),
(11, 'Miller-Ledner', '6604 Hailie Rapid Apt. 988', '(468)349-002', 'leonora11@example.org'),
(12, 'Medhurst and Sons', '4152 Newton Fall', '084.048.5521', 'myron.luettgen@example.net'),
(13, 'Beatty Inc', '11977 Thiel Walks', '1-584-244-71', 'lkoelpin@example.org'),
(14, 'Schoen-Hand', '57635 Lavinia Meadows', '1-993-835-25', 'ariane80@example.org'),
(15, 'Hintz Group', '0545 Pat Cove Apt. 928', '332.413.4483', 'hattie01@example.net'),
(16, 'Gleichner Inc', '13233 Predovic Rapids Suite 003', '(803)275-895', 'gracie.blick@example.com'),
(17, 'Rogahn, Collins and ', '260 Graciela Forges', '05995598400', 'agulgowski@example.com'),
(18, 'Heller, Paucek and S', '32685 Valentina Way Suite 699', '(179)054-086', 'paucek.cristian@example.net'),
(19, 'Gorczany-Cormier', '70644 Doyle Islands Apt. 075', '1-525-512-09', 'wava.hodkiewicz@example.net'),
(20, 'Mayer Group', '54139 Rutherford Mission', '01734735035', 'ethelyn.ledner@example.net'),
(21, 'Gleason Group', '245 Laisha Rapids', '042-496-0778', 'eric39@example.com'),
(22, 'Bergnaum and Sons', '879 Devonte Mountain Apt. 903', '680.845.8229', 'gvolkman@example.com'),
(23, 'Rogahn Ltd', '1776 Kristofer Brooks Apt. 952', '(378)360-130', 'lilla.lueilwitz@example.net'),
(24, 'Adams, Romaguera and', '9057 Rylan Trace Suite 938', '712.152.2287', 'reyna40@example.com'),
(25, 'Oberbrunner-Leannon', '3408 Konopelski Rapids Apt. 433', '05356881442', 'laron56@example.net'),
(26, 'Schmeler-Nolan', '7038 Zakary Alley', '+40(9)529498', 'powlowski.alf@example.org'),
(27, 'Jast-Legros', '2193 Rhiannon Manors', '(958)115-197', 'hnikolaus@example.net'),
(28, 'Dibbert Group', '5039 Leda Drives', '1-935-202-98', 'imills@example.com'),
(29, 'Ryan, Dare and Emard', '4466 Esther Corner Apt. 952', '1-423-061-61', 'king.elisabeth@example.net'),
(30, 'Yundt LLC', '7201 Botsford Inlet Suite 270', '02186121304', 'ludwig51@example.org'),
(31, 'Barrows Inc', '490 McLaughlin Mountains Apt. 775', '04337966826', 'roob.carson@example.com'),
(32, 'Will-Dickinson', '542 Clement Garden Suite 531', '(838)846-025', 'andrew.white@example.com'),
(33, 'Leannon-Conn', '1738 Hermann Land', '287.940.3390', 'oabbott@example.com'),
(34, 'Yundt, Beatty and Du', '5416 Witting Circle', '02324457738', 'veum.abbigail@example.org'),
(35, 'Johnson and Sons', '6185 O\'Kon Road', '930.010.2508', 'cayla19@example.net'),
(36, 'Schoen, Deckow and R', '0655 Nader Shore', '292.985.1647', 'weldon.ortiz@example.com'),
(37, 'Jaskolski and Sons', '444 Lelah Squares', '1-920-721-82', 'ashton.koelpin@example.net'),
(38, 'Legros-Murazik', '461 Lilla Court Apt. 554', '1-253-884-35', 'ugusikowski@example.com'),
(39, 'Hayes, Treutel and G', '53946 Ledner Ridges', '723-191-0448', 'paufderhar@example.com'),
(40, 'Walter Inc', '6700 Antonietta Crossroad', '(027)056-551', 'hackett.susie@example.org'),
(41, 'Considine-Schumm', '487 Reuben Shore Suite 946', '1-891-129-14', 'mreinger@example.com'),
(42, 'Herman-Rodriguez', '5220 Bauch Glen Apt. 642', '(034)712-948', 'kuhic.russ@example.net'),
(43, 'Ward Ltd', '3989 Darrion Dam', '(177)883-104', 'stefanie93@example.org'),
(44, 'Barrows PLC', '92842 Stoltenberg Flat', '1-921-300-95', 'fidel.kreiger@example.org'),
(45, 'McKenzie, Feest and ', '159 Erwin Wells', '288.060.9952', 'gayle64@example.org'),
(46, 'Herzog, Skiles and S', '2239 Roman Port', '08492260996', 'felicia.veum@example.net'),
(47, 'Padberg, Medhurst an', '50969 Carmel Knolls Apt. 799', '027.169.0994', 'isabel.ondricka@example.com'),
(48, 'Gislason Group', '9078 Jedidiah Extension', '(708)690-165', 'bkiehn@example.org'),
(49, 'Nienow-Bins', '327 Braun Village', '771.748.4512', 'merle.maggio@example.net'),
(50, 'Hessel Ltd', '1264 Lorena Causeway Suite 720', '+60(4)283726', 'joseph14@example.net');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `fecha_reserva` date NOT NULL,
  `fecha_entrada` date NOT NULL,
  `fecha_salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_cliente`, `id_hotel`, `fecha_reserva`, `fecha_entrada`, `fecha_salida`) VALUES
(1, 74, 38, '1981-11-29', '1996-09-24', '2000-03-27'),
(2, 91, 11, '2020-10-13', '2006-09-23', '2020-08-21'),
(3, 93, 44, '1989-04-08', '1999-04-23', '1998-11-10'),
(4, 49, 45, '1976-07-14', '1971-05-15', '1987-10-06'),
(5, 42, 36, '2007-06-28', '1988-12-27', '2019-08-20'),
(6, 98, 21, '1988-01-21', '1993-06-06', '1992-09-03'),
(7, 45, 41, '2012-11-13', '1988-07-29', '2015-02-20'),
(8, 17, 8, '1980-12-16', '1978-09-27', '2020-06-12'),
(9, 43, 25, '1983-01-14', '1972-10-07', '2015-02-03'),
(10, 14, 45, '2003-04-11', '1974-01-03', '1974-05-11'),
(11, 12, 44, '1975-03-04', '2016-07-21', '2007-08-28'),
(12, 64, 7, '2004-07-11', '1974-04-18', '1992-12-02'),
(13, 86, 29, '1995-07-27', '1992-04-05', '1978-11-29'),
(14, 69, 32, '2015-08-03', '1995-06-14', '1984-10-23'),
(15, 88, 3, '2015-12-27', '1995-05-23', '1983-10-21'),
(16, 57, 40, '1989-08-03', '1977-05-19', '1997-10-09'),
(17, 66, 5, '2005-04-02', '1977-11-23', '2011-01-13'),
(18, 86, 33, '1995-03-07', '2003-03-27', '2017-03-20'),
(19, 23, 13, '1993-08-18', '2007-07-15', '1974-03-16'),
(20, 42, 19, '2014-06-05', '1976-05-04', '1976-07-08'),
(21, 5, 4, '1998-08-04', '1986-02-15', '1976-09-28'),
(22, 76, 15, '1997-03-10', '1993-12-09', '1991-03-30'),
(23, 25, 24, '1986-03-30', '2009-01-09', '2006-10-24'),
(24, 57, 16, '2006-08-30', '1987-04-29', '1973-06-07'),
(25, 72, 44, '2019-12-13', '2018-12-08', '1979-02-26'),
(26, 89, 20, '1976-10-23', '2013-07-11', '1993-06-24'),
(27, 92, 20, '2012-05-02', '1973-06-10', '2005-10-31'),
(28, 87, 1, '1997-06-17', '2020-10-27', '2003-08-20'),
(29, 36, 4, '2014-10-07', '2008-11-02', '1986-12-17'),
(30, 71, 39, '1971-12-12', '1979-06-05', '2005-08-21'),
(31, 21, 49, '2015-11-10', '1991-09-22', '1993-06-20'),
(32, 2, 11, '2009-11-04', '1994-02-21', '1987-04-01'),
(33, 83, 29, '2013-11-29', '1991-11-03', '1996-09-29'),
(34, 54, 30, '1976-12-21', '1979-04-13', '1998-11-05'),
(35, 30, 27, '2006-07-24', '1995-04-20', '1987-08-14'),
(36, 65, 23, '1987-06-05', '2012-05-27', '1988-11-17'),
(37, 29, 44, '1994-03-19', '1998-06-24', '2004-08-08'),
(38, 32, 42, '1978-05-26', '2000-01-18', '1979-05-24'),
(39, 20, 31, '1985-04-16', '1977-02-16', '1976-06-18'),
(40, 36, 3, '2013-03-02', '1990-03-02', '2014-12-12'),
(41, 59, 39, '2018-05-29', '1997-04-28', '2018-12-27'),
(42, 53, 13, '1993-08-05', '1974-10-15', '1985-03-16'),
(43, 75, 13, '2011-07-19', '2005-03-01', '1975-11-10'),
(44, 83, 10, '1972-02-11', '1982-08-09', '1988-09-07'),
(45, 20, 31, '2013-03-08', '1993-09-24', '1984-11-05'),
(46, 30, 27, '1984-12-18', '2005-01-09', '1991-02-22'),
(47, 17, 26, '1998-11-02', '2018-05-01', '2009-11-13'),
(48, 91, 13, '1989-07-18', '1998-07-15', '2012-04-10'),
(49, 39, 42, '2009-09-23', '2010-06-15', '1998-01-21'),
(50, 99, 20, '1984-02-08', '2012-07-24', '1989-10-30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_reserva` (`id_hotel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_hotel`) REFERENCES `hoteles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;