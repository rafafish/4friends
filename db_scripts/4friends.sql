-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 26/05/2014 às 20h38min
-- Versão do Servidor: 5.5.20
-- Versão do PHP: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `4friends`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `friend_requests`
--

CREATE TABLE IF NOT EXISTS `friend_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `user_posted_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES
(25, 'oi raquel.. agora sim eh o rafa', '2014-05-20', 'rafafish', 'raquel'),
(24, 'oi raquel... eh o rafa..', '2014-05-20', 'raquel', 'raquel'),
(23, 'eu sou eu', '2014-05-20', 'rafafish', 'rafafish'),
(22, 'ola', '2014-05-20', 'rafafish', 'rafafish'),
(21, 'este Ã© um post de teste', '2014-05-20', 'raquel', 'rafafish'),
(20, 'testando de rafafish', '2014-05-20', 'rafafish', 'raquel'),
(26, 'oi rafa... eu sei que Ã© vc... rsrsrs', '2014-05-20', 'raquel', 'rafafish'),
(27, 'Eu sou a duda...', '2014-05-21', 'duda', 'duda'),
(28, 'oi papai me adiciona ai...', '2014-05-21', 'duda', 'rafafish'),
(29, 'oi', '2014-05-23', 'raquel', 'raquel'),
(30, 'tudo bem??', '2014-05-23', 'raquel', 'raquel'),
(31, 'teste', '2014-05-23', 'raquel', 'raquel'),
(32, 'olaaaaa', '2014-05-23', 'raquel', 'test123'),
(33, 'olaaaaa', '2014-05-23', 'raquel', 'test123'),
(34, 'olaaaaa', '2014-05-23', 'raquel', 'test123'),
(35, 'olaaaaa', '2014-05-23', 'raquel', 'test123'),
(36, 'olaaaaa', '2014-05-23', 'raquel', 'test123'),
(37, 'asdasdas', '2014-05-23', 'raquel', 'test123'),
(38, 'asdasdas', '2014-05-23', 'raquel', 'test123'),
(39, 'asdasdas', '2014-05-23', 'raquel', 'test123'),
(40, 'asdasdas', '2014-05-23', 'raquel', 'test123'),
(41, 'asdasdas', '2014-05-23', 'raquel', 'test123'),
(42, 'testandoooooooooooooo', '2014-05-23', '', 'raquel'),
(43, 'lalalalalala', '2014-05-23', 'raquel', 'raquel'),
(44, 'adasdasdas', '2014-05-23', 'raquel', 'raquel'),
(45, 'sadasdasdasd', '2014-05-23', 'raquel', ''),
(46, 'aaaaaaaaaaaaaaaaaaaaaaaa', '2014-05-23', 'raquel', ''),
(47, 'aaaaaaa', '2014-05-23', 'raquel', 'raquel'),
(48, 'bbbbbbbbbb', '2014-05-23', 'raquel', 'raquel'),
(49, 'aaaaaaaaaaa', '2014-05-23', 'raquel', 'raquel'),
(50, 'ccccccccccccc', '2014-05-23', 'raquel', 'raquel'),
(51, 'dddddddddddd', '2014-05-23', 'raquel', 'raquel'),
(52, 'dddddddddddd', '2014-05-23', 'raquel', 'raquel'),
(53, 'dsdsdsdsdds', '2014-05-23', 'raquel', 'raquel'),
(54, 'asasas', '2014-05-23', 'raquel', 'raquel'),
(55, 'asasas', '2014-05-23', 'raquel', 'raquel'),
(56, 'aaaaaaa', '2014-05-23', 'raquel', 'raquel'),
(57, 'oioioi', '2014-05-23', 'raquel', 'raquel'),
(58, 'aaaaaaaaaaaa', '2014-05-23', 'raquel', 'raquel'),
(59, 'bbbbbbbbbbbb', '2014-05-23', 'raquel', 'raquel'),
(60, 'tttttttttttttttttttt', '2014-05-23', 'raquel', 'raquel'),
(61, 'oioioi', '2014-05-23', 'raquel', 'raquel'),
(62, 'oioioi', '2014-05-23', 'raquel', 'raquel'),
(63, 'teste', '2014-05-23', 'raquel', 'raquel'),
(64, 'hahahahaha funfou', '2014-05-23', 'raquel', 'raquel'),
(65, 'feed', '2014-05-23', 'raquel', 'raquel'),
(66, 'opaddddd', '2014-05-23', 'raquel', 'raquel'),
(67, 'dasdasdasd', '2014-05-23', 'raquel', 'raquel'),
(68, 'asdasdasdasdasdasd', '2014-05-23', 'raquel', 'raquel'),
(69, 'sadasdasdasd', '2014-05-23', 'raquel', 'raquel'),
(70, 'oi rafa... me adiciona ai...', '2014-05-23', 'raquel', 'rafafish'),
(71, 'oi', '2014-05-23', 'raquel', 'rafafish'),
(72, 'oioi', '2014-05-23', 'raquel', 'raquel'),
(73, 'oioioi', '2014-05-23', 'raquel', 'raquel'),
(74, 'oioioioioi', '2014-05-23', 'raquel', 'raquel'),
(75, 'oi maninho', '2014-05-23', 'raquel', 'rafafish'),
(76, 'oi maninha', '2014-05-23', 'rafafish', 'raquel'),
(77, 'coisa linda do pai...', '2014-05-23', 'rafafish', 'duda');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pvt_messages`
--

CREATE TABLE IF NOT EXISTS `pvt_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` varchar(255) NOT NULL,
  `msg_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `pvt_messages`
--

INSERT INTO `pvt_messages` (`id`, `user_from`, `user_to`, `msg_body`, `date`, `opened`, `msg_title`) VALUES
(2, 'raquel', 'rafafish', 'Olá, como vai???', '2014-05-22', 'no', ''),
(3, 'raquel', 'rafafish', ' testando', '2014-05-22', 'no', ''),
(4, 'raquel', 'rafafish', 'Testando 1 2 3', '2014-05-22', 'no', ''),
(5, 'ricardo', 'rafafish', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel dolor in lorem vulputate scelerisque mollis sed magna. Vestibulum viverra gravida dignissim. Donec lobortis odio sed nisi vulputate, eu dignissim odio suscipit. Maecenas in elit nunc. Donec commodo quis sapien rhoncus posuere. Nunc et dui vel quam condimentum iaculis. In nulla nisl, malesuada id eros ac, fermentum laoreet mi. Vivamus adipiscing mattis mollis. Maecenas tristique ornare turpis, eu dignissim mi cursus a. Vestibulum in velit vel tortor pretium pretium vitae vitae ligula. Pellentesque scelerisque ipsum a urna blandit malesuada.', '2014-05-22', 'no', ''),
(7, 'rafafish', 'raquel', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.', '2014-05-23', 'no', 'Teste de titulo da mensagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') CHARACTER SET latin1 NOT NULL,
  `bio` text CHARACTER SET latin1 NOT NULL,
  `profile_pic` text CHARACTER SET latin1 NOT NULL,
  `friend_array` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `bio`, `profile_pic`, `friend_array`) VALUES
(2, 'rafafish', 'Rafael Ferreira', 'da Silva', 'rafaelfs81@gmail.com', '0aca330c5604521e957e853c01da03fd', '2014-05-16', '0', 'Somente um texto para testar o campo de biografia. Se você esta vendo isso, parece que funcionou.', 'kLe1d8z5cw0X2AN/eu e duda.jpg', 'duda,ricardo'),
(3, 'raquel', 'Raquel', 'Ferreira', 'raquel@uol.com.br', '690c0ca1d95dd5731d948c48d9f3ae8a', '2014-05-20', '0', 'Eu sou eu e vc é vc!!!', 'Pc6iCR8HAXFnhGl/raquel.jpg', ''),
(4, 'duda', 'Maria Eduarda', 'Scrafani da Silva', 'duda@gmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', '2014-05-21', '0', 'Sou a Dudinha, filha do Rafael e da Evelyn. Sou linda e carinhosa. Mas fico brava de vez em quando, principalmente quando estou com sono.', 'tIYEFWaQp6yfmPK/Duda - 36.jpg', 'rafafish'),
(5, 'evelyn', 'Evelyn', 'Scrafani', 'evelyn.scrafani@ig.com.br', 'e8d95a51f3af4a3b134bf6bb680a213a', '2014-05-21', '0', 'Sou a mamãe da Duda e Esposa linda e dedicada do Rafael.', 'Sjg2GvA0XY4r7Ti/evy_duda.jpg', ''),
(6, 'ricardo', 'Ricardo Ferreira', 'da Silva', 'pela@hotmail.com', 'e8d95a51f3af4a3b134bf6bb680a213a', '2014-05-22', '0', '', '', 'rafafish');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
