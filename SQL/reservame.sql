-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-05-2022 a las 11:54:15
-- Versión del servidor: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 7.2.34-13+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reservame`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '4', NULL),
('responsable', '1', NULL),
('responsable', '13', 1653232317),
('responsable', '2', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'Rol de Admin', NULL, NULL, NULL, NULL),
('cliente', 1, 'Rol de cliente', NULL, NULL, NULL, NULL),
('responsable', 1, 'Rol de responsable de negocio', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos_promocionales`
--

CREATE TABLE `codigos_promocionales` (
  `id` int(11) NOT NULL,
  `codigo` varchar(25) NOT NULL,
  `id_licencia` int(11) NOT NULL,
  `id_negocio` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigos_promocionales`
--

INSERT INTO `codigos_promocionales` (`id`, `codigo`, `id_licencia`, `id_negocio`, `estatus`, `fecha_alta`) VALUES
(1, '5T11FG', 1, 9, 1, '2022-05-22 15:11:57'),
(3, 'XB5FPJ', 1, NULL, 0, '2022-05-20 03:04:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_negocio`
--

CREATE TABLE `direccion_negocio` (
  `id` int(11) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `municipio` varchar(200) NOT NULL,
  `colonia` varchar(150) NOT NULL,
  `cp` varchar(45) NOT NULL,
  `calle` varchar(200) NOT NULL,
  `no_interior` int(11) NOT NULL,
  `no_exterior` int(11) NOT NULL,
  `referencias` text NOT NULL,
  `id_negocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_negocio`
--

CREATE TABLE `horario_negocio` (
  `id` int(11) NOT NULL,
  `hora_apetura` varchar(45) NOT NULL,
  `hora_cierre` varchar(45) NOT NULL,
  `hora_descanso` varchar(45) NOT NULL,
  `hora_fin_descanso` varchar(45) NOT NULL,
  `dias_semana_laborables` varchar(45) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `id_negocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario_negocio_personalizado`
--

CREATE TABLE `horario_negocio_personalizado` (
  `id` int(11) NOT NULL,
  `hora_apetura` varchar(45) NOT NULL,
  `hora_cierre` varchar(45) NOT NULL,
  `hora_descanso` varchar(45) NOT NULL,
  `hora_fin_descanso` varchar(45) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `id_negocio` int(11) NOT NULL,
  `fecha_activacion` date NOT NULL,
  `dia_no_laborable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias`
--

CREATE TABLE `licencias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `tipo_licencia` int(11) NOT NULL,
  `duracion_dias` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_vigencia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencias`
--

INSERT INTO `licencias` (`id`, `nombre`, `tipo_licencia`, `duracion_dias`, `precio`, `fecha_vigencia`) VALUES
(1, 'Licencia Promocion', 2, 90, 0, '2023-06-01'),
(2, 'Licencia 1 mes', 1, 30, 100, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencias_negocio`
--

CREATE TABLE `licencias_negocio` (
  `id_negocio` int(11) NOT NULL,
  `id_licencia` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `fecha_renovacion` datetime NOT NULL,
  `estatus_texto` varchar(45) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0,
  `activo` int(11) NOT NULL DEFAULT 0,
  `fecha_proximo_pago` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `licencias_negocio`
--

INSERT INTO `licencias_negocio` (`id_negocio`, `id_licencia`, `fecha_compra`, `fecha_vencimiento`, `fecha_renovacion`, `estatus_texto`, `estatus`, `activo`, `fecha_proximo_pago`) VALUES
(9, 1, '2022-05-22', '2022-08-20', '2022-08-21 00:00:00', 'LICENCIA VALIDA', 0, 0, '2022-08-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1632598255),
('m130524_201442_init', 1632598918),
('m140501_075311_oauth_clients', 1632598258),
('m140501_075312_oauth_access_tokens', 1632598258),
('m140501_075313_oauth_refresh_tokens', 1632598258),
('m140501_075314_oauth_authorization_codes', 1632598258),
('m140501_075315_oauth_scopes', 1632598258),
('m140501_075316_oauth_public_keys', 1632598258),
('m140506_102106_rbac_init', 1649132504),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1649132504),
('m180523_151638_rbac_updates_indexes_without_prefix', 1649132504),
('m190124_110200_add_verification_token_column_to_user_table', 1632598918),
('m200409_110543_rbac_update_mssql_trigger', 1649132504),
('m200503_034056_create_table_clientes', 1632598918);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id` int(11) NOT NULL,
  `codigo_negocio` varchar(45) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `responsable` varchar(255) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `foto_fachada` text DEFAULT NULL,
  `id_tipo_negocio` int(11) NOT NULL,
  `telefono_fijo` varchar(45) DEFAULT NULL,
  `extencion` varchar(45) DEFAULT NULL,
  `telefono_celular` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id`, `codigo_negocio`, `nombre`, `responsable`, `fecha_alta`, `fecha_actualizacion`, `activo`, `foto_fachada`, `id_tipo_negocio`, `telefono_fijo`, `extencion`, `telefono_celular`) VALUES
(1, '1000001', 'Estetica Rosita', 'rosa alvarez', '2022-02-01 00:00:00', '2022-02-01 00:00:00', 0, 'na', 1, '5555555555', '58', '5555555578'),
(3, '1000002', 'Consultorio Dental Juan', 'juan perez', '2022-02-01 00:00:00', '2022-02-01 00:00:00', 0, 'na', 3, '5555555552', '12', '5555555512'),
(9, '605423', 'Barberia Ponchos', 'Alfonso Arellanes', '2022-05-22 15:05:11', '2022-05-22 15:05:11', 0, NULL, 1, NULL, NULL, '4444444444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`access_token`, `client_id`, `user_id`, `expires`, `scope`) VALUES
('010589b4dd0ce251ee4b2d7bc8f319826c9c3f84', 'testclient', 1, '2022-05-17 16:45:30', NULL),
('011903ac24b658cbbf3d84a1eb84fd4b900ae7bb', 'testclient', 1, '2022-05-17 03:48:28', NULL),
('09f48359ef28c9b791f7124006d3a99fd079c46c', 'testclient', 1, '2022-05-18 18:55:39', NULL),
('14564346080891ce0bfacad6f6ac7efb3830291a', 'testclient', 1, '2022-05-16 16:45:36', NULL),
('16900431569fdddde5495dc3bf1b842b6f507865', 'testclient', 1, '2022-05-16 16:49:03', NULL),
('179ca01c73757942cae518a2d19c19b6b8511ec8', 'testclient', 1, '2022-05-17 03:35:47', NULL),
('183f03d41ae74c75b784fa747fb80b99185bebf6', 'testclient', 1, '2022-05-16 16:48:24', NULL),
('246a475207499d1363c40a10ebc0bd59a91a07e1', 'testclient', 1, '2022-05-16 16:31:39', NULL),
('32713425378adaf8f633275cfa74fea93982978a', 'testclient', 12, '2022-05-23 04:21:15', NULL),
('3504e2aa4e8308690f349dcef7255b4257e19d43', 'testclient', 1, '2022-05-16 16:47:36', NULL),
('388bc044cf24d00d9ee0f380655d9aa1b7ece7b3', 'testclient', 1, '2022-05-17 16:46:30', NULL),
('39391cb92d98056c3e7bab943273656aaff4452c', 'testclient', 12, '2022-05-23 14:54:00', NULL),
('3b3b98bda9b4a6e35ad6ffe4c60f8cd4d9e1770c', 'testclient', 1, '2022-05-16 16:33:00', NULL),
('3c943456ca785673d6822426c763196df3b31204', 'testclient', 1, '2022-05-16 16:43:18', NULL),
('44637731f1e3b191c23422ec14991b587fa5fe35', 'testclient', 1, '2022-05-17 16:44:53', NULL),
('5903bc9492fcb6ed50e203a0880fff03e86076f7', 'testclient', 1, '2022-05-16 16:16:03', NULL),
('59662556cd6751a0151fe891d2b9b36ac37794db', 'testclient', 1, '2022-05-17 18:29:23', NULL),
('61c6ed79ff02d1d70898352c43a854963d660887', 'testclient', 13, '2022-05-23 15:24:06', NULL),
('6632373bb52d873cce96259dd185064e53ed9c8c', 'testclient', 12, '2022-05-23 15:02:47', NULL),
('6c5f113897982adce3bcbd1213b56942b4831bee', 'testclient', 1, '2022-05-16 16:48:38', NULL),
('7409dc9b25a49dfd618f30e48b22427d9852b4d9', 'testclient', 1, '2022-05-20 17:18:34', NULL),
('7a12ae109fe0c9c03fc9dccd895f8ba9d7c22183', 'testclient', 1, '2022-05-17 03:37:24', NULL),
('7bfa2fca9df055057c73755f5cecd7d0dca41a23', 'testclient', 13, '2022-05-23 15:12:04', NULL),
('7fc0bdf7ab7296672015dd53dbcf41d23a3f2f75', 'testclient', 12, '2022-05-23 15:04:41', NULL),
('8056e20ebad4c41d6f3cc5c42ea8d6ba96dfb213', 'testclient', 1, '2022-05-20 17:29:15', NULL),
('8b4b97a48c570dbaa3cc82646f4f292f3469271e', 'testclient', 1, '2022-05-16 16:30:50', NULL),
('8cf6a7bb383c1bd166645ed2eeb16ebdda665235', 'testclient', 12, '2022-05-23 15:05:58', NULL),
('93e766970579b5aaf11b32cf7bb002678b3d4500', 'testclient', 1, '2022-05-16 16:32:28', NULL),
('96a754601d7dc290cba527a2113a096ea3f08732', 'testclient', 1, '2022-05-16 16:29:52', NULL),
('98535c3a39d4c6d6401fefae2b583f5a592a5071', 'testclient', 1, '2022-05-17 18:26:22', NULL),
('a2b7a0b79cff970b075f812bceb2f625b6907984', 'testclient', 1, '2021-09-26 19:44:41', NULL),
('a2cedf80c5d160b3d73e4f711c4126c2cacaaf95', 'testclient', 1, '2022-05-16 17:28:31', NULL),
('abce8549d363e1c108eeae4de05a5518201d9d22', 'testclient', 1, '2022-05-18 19:04:04', NULL),
('acd42dcab6e2f5fa7817e63a50e833223598d305', 'testclient', 1, '2022-05-18 18:46:31', NULL),
('ad1f524e26396b45cb5d19bf8e5b5df4c09858c8', 'testclient', 1, '2022-05-16 16:47:59', NULL),
('ad3fdaceb2b5d65e00879d05f0159af03997a195', 'testclient', 1, '2022-05-16 16:32:12', NULL),
('ae8ce5653dd5f100be8403496d188c668c7210c2', 'testclient', 12, '2022-05-23 14:41:10', NULL),
('b3476805a4279e6ca63b70510e4eec4234f85449', 'testclient', 1, '2022-04-06 04:12:09', NULL),
('b4381bb6933a4df9633d7541c8fa5da91e52bcf4', 'testclient', 1, '2022-05-17 16:48:03', NULL),
('b8c42fc4d5140fa86ab89558ed2b2b2fd671695e', 'testclient', 1, '2022-05-16 16:39:06', NULL),
('ba1a7a7ad8a6fe7112be246c1e12ee23114c0dd9', 'testclient', 1, '2022-05-17 17:23:32', NULL),
('bc723917028e18d9ca2238d850cd8c8fb9370bae', 'testclient', 1, '2022-05-16 16:49:14', NULL),
('bf24ce597e6f3addeed40bf497aa11ff58c9f1df', 'testclient', 1, '2022-05-16 16:33:28', NULL),
('c1bb111458d065244c1ca66d7a90e2bd295e2010', 'testclient', 1, '2022-05-17 16:44:22', NULL),
('c3626d8785de8046e599c172586a38a01e096aaf', 'testclient', 13, '2022-05-23 15:11:57', NULL),
('c9d887f33ca2dd555554cde7345b46e207c349bd', 'testclient', 1, '2022-05-17 16:33:04', NULL),
('cc6c36ecb09a930f6ebac107a1968d390973872d', 'testclient', 1, '2022-05-18 22:49:23', NULL),
('d725ff7157d37b7dc82af33748c9b7c5d017d89e', 'testclient', 1, '2022-05-17 03:51:56', NULL),
('e30daa39cd7418016ad47b10e657de13c2921b57', 'testclient', 1, '2022-05-17 16:47:40', NULL),
('e4400e5ee53c66d3d74b2e792dc78eae7da01f6d', 'testclient', 1, '2022-05-17 16:47:33', NULL),
('e496fe7cb80cef8f82fb5d8f1f8da4dcc6b98f14', 'testclient', 1, '2022-05-20 17:17:58', NULL),
('e97dbc6e1dbd8f5f9b74e8234ebe530561ef5563', 'testclient', 12, '2022-05-23 14:50:40', NULL),
('efd5582d2aaf29d6676c240b776346b6ff1b1cf1', 'testclient', 12, '2022-05-23 15:06:48', NULL),
('faaab01a42e286418951d7814dfef2fa837d0f53', 'testclient', 1, '2022-05-20 17:18:25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_authorization_codes`
--

CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `redirect_uri` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `client_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `client_secret` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `grant_types` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`client_id`, `client_secret`, `redirect_uri`, `grant_types`, `scope`, `user_id`) VALUES
('testclient', 'testpass', 'http://fake/', 'client_credentials authorization_code password implicit', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_public_keys`
--

CREATE TABLE `oauth_public_keys` (
  `client_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `public_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `private_key` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `encription_algorithm` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'RS256'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`refresh_token`, `client_id`, `user_id`, `expires`, `scope`) VALUES
('08fd539a2d47f48e837058e77d4734d89b524ccb', 'testclient', 1, '2022-05-29 16:48:24', NULL),
('094b02ab27bead16ffaec3a433d02a871e30fc36', 'testclient', 1, '2022-05-30 18:29:23', NULL),
('11e8d9725c3be73af724cd26e7f3999833766a85', 'testclient', 1, '2022-06-02 17:18:34', NULL),
('134350592ac3bfdeed7921d47c33aee80affdc85', 'testclient', 1, '2022-06-02 17:17:58', NULL),
('135fce419c9cd2f2e5bc089f000f380a0c0d18b2', 'testclient', 1, '2022-05-29 16:43:18', NULL),
('1935f15fe07ca5313f3d99392dbef3e0513eaeeb', 'testclient', 1, '2022-06-02 17:29:15', NULL),
('19f61a3e20c9083b77aa9b07756184fd7f2b7676', 'testclient', 1, '2022-05-31 22:49:23', NULL),
('1a24c3bd5925897261902190ab92a1db1ad87c19', 'testclient', 1, '2022-05-31 18:46:31', NULL),
('1a980fbbe2bf4a3256d2bfe56dce93a2f3f36c8a', 'testclient', 12, '2022-06-05 14:50:40', NULL),
('206313d74eddc75b0f03c08648ed6595d7d7af4b', 'testclient', 1, '2022-05-30 03:48:28', NULL),
('2d55be58849cf01d5350e67485131290a720a323', 'testclient', 1, '2022-05-30 16:47:33', NULL),
('2f108f71b685819e0eea37a539731b73003e90d1', 'testclient', 12, '2022-06-05 04:21:15', NULL),
('2fa0818acf5fde63e1637335a11f358f459168a3', 'testclient', 12, '2022-06-05 14:41:10', NULL),
('2fd3aba942b8248ba16b0b879e3ccfdda384ed77', 'testclient', 13, '2022-06-05 15:12:04', NULL),
('39e316ebd7750e392d465d0029ef5c48b69b5937', 'testclient', 1, '2022-05-29 16:45:36', NULL),
('4329c88e7481b0233454ca8953e0d95b1220ccf2', 'testclient', 1, '2022-05-29 16:29:52', NULL),
('45815178eac34f29932c2c2bf41a1f710392f43f', 'testclient', 1, '2022-05-29 17:28:31', NULL),
('4890d1a7fc504115942f1ff3078f41e5875d46c6', 'testclient', 1, '2021-10-09 19:44:41', NULL),
('50d6a23c3ab9bbe0d5508acbb4ed1bfa063ce4e0', 'testclient', 12, '2022-06-05 15:04:41', NULL),
('5340c72d199e6b79a0bc5fe241103e2c6ca9d9bf', 'testclient', 1, '2022-05-29 16:31:39', NULL),
('536e24b8b7830d5bc6ac6daaf73eddede2809cfc', 'testclient', 1, '2022-05-30 16:33:04', NULL),
('5fa1042259975bd1f1007d87ac9dfd10ce53c5c2', 'testclient', 1, '2022-05-30 17:23:32', NULL),
('6383453473fb58e3c41c345c5cf5c91d359ba334', 'testclient', 1, '2022-05-30 16:44:53', NULL),
('644934079089551f804b16190425d0e06e5de094', 'testclient', 1, '2022-05-30 03:51:56', NULL),
('6735de32b1a140f1a46d9b80941161c3ae541c33', 'testclient', 1, '2022-05-30 16:45:30', NULL),
('67c180ddbc5870794e52820aa4d0ba6612382329', 'testclient', 1, '2022-05-29 16:33:00', NULL),
('6ea5f032965c3f525863bae10566b9d1c4d16f6d', 'testclient', 1, '2022-05-29 16:39:06', NULL),
('72db6ca86d467b72e73ae41875569517c9883048', 'testclient', 1, '2022-04-19 04:12:09', NULL),
('769599095941e031adca6e536514ebd505b90f2d', 'testclient', 1, '2022-05-29 16:16:03', NULL),
('7bc6a89e62d24224046c4c273690ab1001c7be5a', 'testclient', 1, '2022-05-29 16:32:12', NULL),
('86f9a04d1817f0e49da25b122a0a128b8b75f792', 'testclient', 1, '2022-06-02 17:18:25', NULL),
('9708a45ce478402440035936b9173c736ae760c9', 'testclient', 1, '2022-05-30 16:47:40', NULL),
('9c0ab25971232a27d7194de7e0956e14651ca227', 'testclient', 1, '2022-05-31 18:55:39', NULL),
('a46201c2aa6d4346d61923fee506ccdc1eda37e5', 'testclient', 12, '2022-06-05 15:05:58', NULL),
('a6fb0d7a01502608b77266641dc1cce9382bf5b8', 'testclient', 13, '2022-06-05 15:24:06', NULL),
('a926c1b2c2afed02caf7de9a73d2862ed93d6827', 'testclient', 1, '2022-05-30 16:44:22', NULL),
('b0a6172709322e0d1d1b2f9386a6a0e04e73bd32', 'testclient', 1, '2022-05-29 16:49:14', NULL),
('b32ab19ae12e719e3742351a68c739bb5d45192e', 'testclient', 1, '2022-05-29 16:33:28', NULL),
('b598aa0af6d6c4e26c8abe0c6644ea80811212aa', 'testclient', 1, '2022-05-29 16:47:36', NULL),
('b8f505b53b1d9f821d9fb40bd2be8d31df9e5d93', 'testclient', 12, '2022-06-05 15:02:47', NULL),
('c045e08ea07a5629dfa8afb2ba6a80fd9371bef5', 'testclient', 1, '2022-05-30 03:37:24', NULL),
('c395877352d8f69502f08ae36d76ff0b591fd7eb', 'testclient', 1, '2022-05-29 16:30:50', NULL),
('cb88caf762d5eae6374b5bf41054b676a56e7251', 'testclient', 13, '2022-06-05 15:11:57', NULL),
('cfcacfd8f63d83c14c0ebd4805613b7f99bf61fe', 'testclient', 1, '2022-05-30 03:35:47', NULL),
('daff07398699376eeb376522122b50dbd95dd82a', 'testclient', 12, '2022-06-05 14:54:00', NULL),
('dbc4d3c1eec31cec487bd5a56409c082d2dc7186', 'testclient', 1, '2022-05-29 16:48:38', NULL),
('def263d42f506ea3287ab81e11896421b2a22f0d', 'testclient', 12, '2022-06-05 15:06:48', NULL),
('e6cdb3fbe10ac31c446c1b11ea51a89acb8c3159', 'testclient', 1, '2022-05-30 16:48:03', NULL),
('eaa4f65cc42c74e0f139af48ed63d1722e2fa896', 'testclient', 1, '2022-05-31 19:04:04', NULL),
('eacb13e2d4ce2d580300e21d02975231d3d23ceb', 'testclient', 1, '2022-05-29 16:32:28', NULL),
('eb75c75d7fb030d4e015b5083d1d45011a8c770b', 'testclient', 1, '2022-05-30 18:26:22', NULL),
('eb7d575f66fb615dbe2f821a0048853b46fe36df', 'testclient', 1, '2022-05-29 16:49:03', NULL),
('fe1b515a456741e990754f030e115aed5279a011', 'testclient', 1, '2022-05-29 16:48:00', NULL),
('ffce4750bb3b7aeb70a1bdbd15a9f2e5f90cbe94', 'testclient', 1, '2022-05-30 16:46:30', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_scopes`
--

CREATE TABLE `oauth_scopes` (
  `scope` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_negocio`
--

CREATE TABLE `pagos_negocio` (
  `id_pagos_negocio` int(11) NOT NULL,
  `fecha_pago` date NOT NULL,
  `monto_pago` float NOT NULL,
  `comprobante_pago` text NOT NULL,
  `estatus` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `id_negocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_cliente`
--

CREATE TABLE `reservacion_cliente` (
  `id_negocio` int(11) NOT NULL,
  `fecha_reservacion` date NOT NULL,
  `hora_reservacion` time NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0,
  `comentarios` text DEFAULT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `adicionales` text DEFAULT NULL,
  `costo_servicio` float NOT NULL,
  `nombre_servicio` varchar(255) NOT NULL,
  `duracion_minutos` int(11) NOT NULL,
  `nombre_cliente` varchar(45) NOT NULL,
  `telefono_cliente` varchar(45) DEFAULT NULL,
  `email_cliente` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `nombre_responsable` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables_negocio`
--

CREATE TABLE `responsables_negocio` (
  `id_responsables_negocio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_negocio` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `fecha_alta` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `responsables_negocio`
--

INSERT INTO `responsables_negocio` (`id_responsables_negocio`, `id_usuario`, `id_negocio`, `activo`, `fecha_alta`) VALUES
(1, 1, 1, 0, '2022-05-01 00:00:00'),
(2, 2, 3, 0, '2022-05-01 00:00:00'),
(8, 13, 9, 0, '2022-05-22 15:05:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_negocio`
--

CREATE TABLE `tipo_negocio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_negocio`
--

INSERT INTO `tipo_negocio` (`id`, `nombre`, `descripcion`, `activo`) VALUES
(1, 'Estetica / Barberia', 'Negocios de esteticas y barberias', 0),
(2, 'Consultorio Médico', 'Consultorios Médicos', 0),
(3, 'Consultorio Dental', 'Consultoria dental', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `duracion_minutos` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `activo` int(11) NOT NULL DEFAULT 0,
  `id_negocio` int(11) NOT NULL,
  `costo_servicio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre_completo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre_completo`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, NULL, 'rosita', '7F5bvFaFOG7AGvhlovCv4Qu3PlMc11xF', '$2y$13$24.UF6Kx7O6ICu3MQGx8Lev4aOiPQxiuXy4TVr7mQYN9xMfx.XclS', NULL, 'rosita@gmail.com', 10, 1632599043, 1632599043, 'T9b3wcuf9l5Izv5l27cxyhyjlrCLYTCt_1632599043'),
(2, NULL, 'juan', '8Pmz1aZIKeGQ6YAUbuPm-A1G9eaZvWGb', '$2y$13$24.UF6Kx7O6ICu3MQGx8Lev4aOiPQxiuXy4TVr7mQYN9xMfx.XclS', NULL, 'juan@gmail.com', 10, 1649133242, 1649133242, '_8oVqygjOT4iBWpTuW4KUw3fC4T0UrB2_1649133242'),
(3, NULL, 'estilista', 'dN39OULOJMTAcpMHFd1GveeEmOiSLtaR', '$2y$13$ujOfST2Kw4EEYapEKP1vCem8MIp.6btCTgaHnzmC.S3sIuEmMf9Rq', NULL, 'estilista@gmail.com', 9, 1649133271, 1649133271, 'oSOe8wH_UwwLX724CJGfQLdYWZLyiWSE_1649133271'),
(4, NULL, 'admin', 'CzvG7twgZuVU8V8CaOjBKXDHKVJsA9K2', '$2y$13$bN1UTqHLsQr8F.6wEmOZ7ur9zuYAdop0t8U1M03b4rGDkPfiJevCK', NULL, 'admin@reservame.com', 10, 1652741366, 1652741366, 'f2InlQS7bDDtE-TPKs8EuCus9EC4ESg7_1652741366'),
(13, NULL, 'alfonso@gmail.com', 'FFg_W0enONMEzC8zUvvKXCTdPcFObX6_', '$2y$13$a61pWY9k736fya1BPv2EfeFeRPpODQP6i3pvshliZEDi0n179YJ5u', NULL, 'alfonso@gmail.com', 10, 1653232317, 1653232317, 'Ryvde-7B7OKqjcCaRmpNIDNS2JAwByQE_1653232317');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `codigos_promocionales`
--
ALTER TABLE `codigos_promocionales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direccion_negocio`
--
ALTER TABLE `direccion_negocio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_direccion_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `horario_negocio`
--
ALTER TABLE `horario_negocio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `horario_negocio_personalizado`
--
ALTER TABLE `horario_negocio_personalizado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `licencias`
--
ALTER TABLE `licencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencias_negocio`
--
ALTER TABLE `licencias_negocio`
  ADD PRIMARY KEY (`id_negocio`,`id_licencia`),
  ADD KEY `fk_negocio_has_licencias_licencias1_idx` (`id_licencia`),
  ADD KEY `fk_negocio_has_licencias_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_negocio_tipo_negocio_idx` (`id_tipo_negocio`);

--
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`access_token`),
  ADD KEY `idx-oauth_access_tokens-client_id` (`client_id`);

--
-- Indices de la tabla `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD PRIMARY KEY (`authorization_code`),
  ADD KEY `idx-oauth_authorization_codes-client_id` (`client_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indices de la tabla `oauth_public_keys`
--
ALTER TABLE `oauth_public_keys`
  ADD PRIMARY KEY (`client_id`,`public_key`),
  ADD KEY `idx-oauth_public_keys-client_id` (`client_id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`refresh_token`),
  ADD KEY `idx-oauth_refresh_tokens-client_id` (`client_id`);

--
-- Indices de la tabla `oauth_scopes`
--
ALTER TABLE `oauth_scopes`
  ADD PRIMARY KEY (`scope`);

--
-- Indices de la tabla `pagos_negocio`
--
ALTER TABLE `pagos_negocio`
  ADD PRIMARY KEY (`id_pagos_negocio`),
  ADD KEY `fk_pagos_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `reservacion_cliente`
--
ALTER TABLE `reservacion_cliente`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_cliente_has_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `responsables_negocio`
--
ALTER TABLE `responsables_negocio`
  ADD PRIMARY KEY (`id_responsables_negocio`),
  ADD KEY `fk_responsables_negocio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `tipo_negocio`
--
ALTER TABLE `tipo_negocio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_servicio_negocio1_idx` (`id_negocio`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `codigos_promocionales`
--
ALTER TABLE `codigos_promocionales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `direccion_negocio`
--
ALTER TABLE `direccion_negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_negocio`
--
ALTER TABLE `horario_negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario_negocio_personalizado`
--
ALTER TABLE `horario_negocio_personalizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `licencias`
--
ALTER TABLE `licencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pagos_negocio`
--
ALTER TABLE `pagos_negocio`
  MODIFY `id_pagos_negocio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsables_negocio`
--
ALTER TABLE `responsables_negocio`
  MODIFY `id_responsables_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_negocio`
--
ALTER TABLE `tipo_negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion_negocio`
--
ALTER TABLE `direccion_negocio`
  ADD CONSTRAINT `fk_direccion_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_negocio`
--
ALTER TABLE `horario_negocio`
  ADD CONSTRAINT `fk_horario_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `horario_negocio_personalizado`
--
ALTER TABLE `horario_negocio_personalizado`
  ADD CONSTRAINT `fk_horario_negocio_negocio10` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `licencias_negocio`
--
ALTER TABLE `licencias_negocio`
  ADD CONSTRAINT `fk_negocio_has_licencias_licencias1` FOREIGN KEY (`id_licencia`) REFERENCES `licencias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_negocio_has_licencias_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `fk_negocio_tipo_negocio` FOREIGN KEY (`id_tipo_negocio`) REFERENCES `tipo_negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD CONSTRAINT `fk-oauth_access_tokens-client_id` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oauth_authorization_codes`
--
ALTER TABLE `oauth_authorization_codes`
  ADD CONSTRAINT `fk-oauth_authorization_codes-client_id` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oauth_public_keys`
--
ALTER TABLE `oauth_public_keys`
  ADD CONSTRAINT `fk-oauth_public_keys-client_id` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD CONSTRAINT `fk-oauth_refresh_tokens-client_id` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos_negocio`
--
ALTER TABLE `pagos_negocio`
  ADD CONSTRAINT `fk_pagos_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservacion_cliente`
--
ALTER TABLE `reservacion_cliente`
  ADD CONSTRAINT `fk_cliente_has_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `responsables_negocio`
--
ALTER TABLE `responsables_negocio`
  ADD CONSTRAINT `fk_responsables_negocio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD CONSTRAINT `fk_tipo_servicio_negocio1` FOREIGN KEY (`id_negocio`) REFERENCES `negocio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
