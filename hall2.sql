-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2019 a las 08:27:58
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hall2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_complain`
--

CREATE TABLE `tbl_complain` (
  `id` int(255) NOT NULL,
  `university_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_complain`
--

INSERT INTO `tbl_complain` (`id`, `university_id`, `name`, `room`, `subject`, `description`) VALUES
(6, 1402018, 'Nahida Rahman', '101-A', 'asfaf', 'asfagfdgdhfgjlkjerwtwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `job`, `address`, `phone`, `image`) VALUES
(3, 'Nupur', ' Hall Cleaner', 'Dumki', 2147483647, '3.jpg'),
(4, 'Rabeya', 'Cook Manager', 'Dumki', 54356567, '4.jpg'),
(6, ' Shamol Das', 'guard', 'Dumki', 1510002231, '6.jpg'),
(7, 'Morsheda Islam', 'Cooker', 'Dumki', 2147483647, '7.jpg'),
(8, 'Shirin jahan', 'Dining Manager', 'Patuakhali', 54356567, '8.jpg'),
(9, 'Sathi', 'Cooker', 'Dumki', 2147483647, '9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `email`, `password`) VALUES
(3, 'eva@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(4, 'farjana.cse.15@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notices`
--

CREATE TABLE `tbl_notices` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_notices`
--

INSERT INTO `tbl_notices` (`id`, `title`, `description`, `time`) VALUES
(3, 'Room allotment', '<p>Firstly Students will&nbsp;submit&nbsp;an application for a new room. Then teachers will gave their new room when any room will empty.</p>\r\n', '2018-07-12 12:37:01'),
(4, 'hall enrollment date', '<p>Hall enrollment will be held on 25th July, 2018. Fees 1356 tk.&nbsp;</p>\r\n', '2018-07-13 04:16:15'),
(5, 'Hall feast', '<p>Hall feast of Sheikh Fazilatunnesa Mujib Hall will be&nbsp;held at 16 july,2018.</p>\r\n', '2018-07-13 13:14:56'),
(6, 'Hall Rag day', 'Hall rag day of NFS Faculty will be held at 5 p.m.', '2018-07-17 05:16:12'),
(7, 'Admission Date', '<p><em>Admission test will be held at 05-12-2018</em></p>\r\n', '2018-07-18 04:12:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `registration_no` int(11) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `is_verified` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `name`, `student_id`, `registration_no`, `faculty`, `phone`, `email`, `session`, `semester`, `amount`, `transaction_id`, `is_verified`) VALUES
(3, 'Nahida Rahman', 1402012, 5312, 'CSE', 1722413556, 'farjana.cse.15@gmail.com', '2014-15', '1st', 1320, 'asdfgj123', 1),
(4, 'Rupta', 1402013, 5313, 'CSE', 1722413555, 'raihanbappi420@gmail.com', '2014-15', '1st', 1320, 'asdfgj124', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_program`
--

CREATE TABLE `tbl_program` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_program`
--

INSERT INTO `tbl_program` (`id`, `title`, `description`, `image`, `time`) VALUES
(2, 'CSE RAG DAY', '<p>$statement = $db-&gt;prepare(&quot;SHOW TABLE STATUS LIKE &#39;tbl_student&#39;&quot;);<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; $statement-&gt;execute();<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; $result = $statement-&gt;fetchAll();<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; foreach ($result as $row) {<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $new_id = $row[10]; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; //Make next increment id for images naming<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; }<br />\r\n&nbsp;</p>\r\n', '2.jpg', '2019-01-27 15:19:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rooms`
--

CREATE TABLE `tbl_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `block` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_rooms`
--

INSERT INTO `tbl_rooms` (`id`, `name`, `block`) VALUES
(6, '101', 'A'),
(8, '402', 'A'),
(9, '301', 'A'),
(10, '302', 'A'),
(11, '102', 'A'),
(12, '401', 'A'),
(13, '103', 'A'),
(14, '306', 'A'),
(15, '104', 'A'),
(16, '105', 'A'),
(17, '106', 'A'),
(18, '107', 'A'),
(19, '201', 'A'),
(20, '202', 'A'),
(21, '203', 'A'),
(22, '204', 'A'),
(23, '205', 'A'),
(24, '206', 'A'),
(25, '207', 'A'),
(26, '208', 'A'),
(27, '209', 'A'),
(28, '210', 'A'),
(29, '211', 'A'),
(30, '212', 'A'),
(31, '303', 'A'),
(32, '304', 'A'),
(33, '305', 'A'),
(34, '307', 'A'),
(35, '308', 'A'),
(36, '309', 'A'),
(37, '310', 'A'),
(38, '311', 'A'),
(39, '312', 'A'),
(40, '403', 'A'),
(41, '404', 'A'),
(42, '405', 'A'),
(43, '406', 'A'),
(44, '407', 'A'),
(45, '408', 'A'),
(46, '409', 'A'),
(47, '410', 'A'),
(48, '101', 'B'),
(49, '102', 'B'),
(50, '103', 'B'),
(51, '104', 'B'),
(52, '105', 'B'),
(53, '106', 'B'),
(54, '201', 'B'),
(55, '202', 'B'),
(56, '203', 'B'),
(57, '204', 'B'),
(58, '205', 'B'),
(59, '206', 'B'),
(60, '301', 'B'),
(61, '302', 'B'),
(62, '303', 'B'),
(63, '304', 'B'),
(64, '305', 'B'),
(65, '306', 'B'),
(66, '401', 'B'),
(67, '402', 'B'),
(68, '403', 'B'),
(69, '404', 'B'),
(70, '405', 'B'),
(71, '406', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `registration_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `faculty` varchar(100) DEFAULT NULL,
  `phone_no` varchar(15) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_verified` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `university_id`, `registration_no`, `name`, `email`, `faculty`, `phone_no`, `address`, `room_id`, `session`, `image`, `is_verified`) VALUES
(65, 140232311, 54223, 'Tasnia Islam Esa THREE', 'djprince3g@gmail.com', 'Ag', '012932032', 'Dhaka', 6, '2014-15', '65.jpg', 1),
(66, 1402018, 5312, 'Nahida Rahman', 'raihanbappi420@gmail.com', 'CSE', '01778456878', 'Barisal', 50, '2014-15', '66.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `quantity`, `price`, `date`) VALUES
(1, 0, 60, '2019-01-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_token_buy`
--

CREATE TABLE `tbl_token_buy` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `is_paid` tinyint(4) NOT NULL DEFAULT '0',
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_token_buy`
--

INSERT INTO `tbl_token_buy` (`id`, `student_id`, `quantity`, `is_paid`, `date`) VALUES
(2, 1402026, 1, 0, '2019-01-29'),
(3, 1402026, 2, 0, '2019-01-29'),
(4, 1402026, 2, 1, '2019-01-29'),
(5, 1402073, 23, 1, '2019-01-29'),
(6, 1402073, 2, 0, '2019-01-29'),
(7, 1402073, 2, 1, '2019-01-29'),
(8, 1402073, 2, 1, '2019-01-29'),
(9, 1402073, 2, 1, '2019-01-29'),
(10, 1402073, 2, 1, '2019-02-02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_complain`
--
ALTER TABLE `tbl_complain`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_notices`
--
ALTER TABLE `tbl_notices`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_program`
--
ALTER TABLE `tbl_program`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_token`
--
ALTER TABLE `tbl_token`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_token_buy`
--
ALTER TABLE `tbl_token_buy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_complain`
--
ALTER TABLE `tbl_complain`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_notices`
--
ALTER TABLE `tbl_notices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_program`
--
ALTER TABLE `tbl_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_rooms`
--
ALTER TABLE `tbl_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_token_buy`
--
ALTER TABLE `tbl_token_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
