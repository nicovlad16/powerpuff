-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 30, 2019 la 01:37 AM
-- Versiune server: 10.1.37-MariaDB
-- Versiune PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `conference_db`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bidding`
--

CREATE TABLE `bidding` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT 'reviewer id',
  `answer` int(11) DEFAULT NULL,
  `pid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `bidding`
--

INSERT INTO `bidding` (`id`, `uid`, `answer`, `pid`) VALUES
(3, 1, 0, 1),
(4, 1, 0, 2),
(6, 6, 1, 1),
(8, 1, 1, 3),
(9, 6, 1, 9);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `conference`
--

CREATE TABLE `conference` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `location` text NOT NULL,
  `no_participants` int(11) NOT NULL,
  `no_speakers` int(11) NOT NULL,
  `abstract_deadline` datetime DEFAULT NULL,
  `bidding_deadline` datetime DEFAULT NULL,
  `paper_deadline` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `conference`
--

INSERT INTO `conference` (`id`, `name`, `date_start`, `date_end`, `location`, `no_participants`, `no_speakers`, `abstract_deadline`, `bidding_deadline`, `paper_deadline`) VALUES
(1, 'Conferinta IT', '2019-05-18 00:00:00', '2019-05-25 00:00:00', 'Str. Mihail Kogalniceanu', 20, 3, '2019-05-20 00:00:00', '2019-05-31 00:00:00', '2019-05-31 00:00:00'),
(2, 'Dev talk', '2019-05-18 00:00:00', '2019-05-19 00:00:00', 'GG Byron', 0, 0, '2019-05-18 00:00:00', '2019-05-18 00:00:00', '2019-05-18 00:00:00'),
(3, 'ICCP', '2019-05-18 00:00:00', '2019-05-19 00:00:00', 'FSEGA', 0, 0, '2019-05-18 00:00:00', '2019-05-28 00:00:00', '2019-05-18 00:00:00'),
(4, 'Conferinta', '2019-05-31 00:00:00', '2019-05-31 00:00:00', 'FSEGA', 0, 0, '2019-05-31 00:00:00', NULL, '2019-05-31 00:00:00');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `paper`
--

CREATE TABLE `paper` (
  `id` int(11) NOT NULL,
  `abstract` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `topics` text NOT NULL,
  `meta_info` text NOT NULL,
  `paper` text,
  `file` varchar(255) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `paper`
--

INSERT INTO `paper` (`id`, `abstract`, `title`, `keywords`, `topics`, `meta_info`, `paper`, `file`, `answer`, `uid`, `cid`) VALUES
(1, 'Map Simple abstract', 'Map Simple', 'd', 'Google maps', 'd', '', NULL, 1, 5, 1),
(2, 'Scopul conteaza abstract', 'Scopul conteaza', 'Keywords', 'Motivatie', 'Meta info', 'Scopul conteaza paper', NULL, NULL, 5, 1),
(3, 'Lorem Ipsum dolor sit amet', 'Lorem Ipsum', 'Keywords', 'Lorem Ipsum', 'd', 'Lorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit ametLorem Ipsum dolor sit amet', NULL, NULL, 5, 1),
(4, 'asdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd asasdasdas asdas dasd as', 'test', 'Keywords', 'Motivatie', 'Meta info', '', NULL, NULL, 7, 3),
(5, 'dasdas', 'Lorem Ipsum Dolor', 'ddd', 'Motivatie', 'Meta info', 'asdasdas', 'biofizica.pdf', NULL, 4, 1),
(9, 'dsac', 'test', 'd', 'Motivatie', 'Meta info', 'zcasdas', 'chart.pdf', 1, 4, 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `presentation`
--

CREATE TABLE `presentation` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qualifier` int(11) NOT NULL,
  `recomandation` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `review`
--

INSERT INTO `review` (`id`, `pid`, `uid`, `qualifier`, `recomandation`) VALUES
(1, 1, 3, 3, ''),
(2, 1, 3, 2, ''),
(3, 1, 3, 1, 'Good'),
(4, 1, 3, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(5, 1, 3, -1, ''),
(6, 1, 3, -2, ''),
(7, 1, 3, -3, 'Yuk!'),
(8, 9, 1, 2, 'dasdas'),
(9, 9, 1, 0, 'xzXZ');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `reviewers_paper`
--

CREATE TABLE `reviewers_paper` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `reviewers_paper`
--

INSERT INTO `reviewers_paper` (`id`, `pid`, `uid`) VALUES
(1, 1, 1),
(4, 1, 3),
(5, 9, 6),
(6, 9, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `hour_start` varchar(255) NOT NULL,
  `hour_end` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `no_participants` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `session`
--

INSERT INTO `session` (`id`, `cid`, `hour_start`, `hour_end`, `room`, `no_participants`) VALUES
(1, 2, '08:00', '12:00', 'L002', 0),
(2, 2, '08:00', '12:00', 'L001', 0),
(3, 1, '08:00', '12:00', 'L001', 0),
(4, 1, '08:00', '12:00', 'L002', 0),
(5, 2, '08:00', '12:00', 'L011', 0),
(6, 4, '08:00', '12:00', 'L001', 0);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `session_participant`
--

CREATE TABLE `session_participant` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `session_participant`
--

INSERT INTO `session_participant` (`id`, `uid`, `sid`) VALUES
(1, 3, 1),
(3, 1, 6);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1-chair / 2-co-chair / 3-comitet / 4-author / 5-listener',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `affiliation` text,
  `webpage` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `type`, `name`, `email`, `affiliation`, `webpage`) VALUES
(1, 'chair.boss', '4297f44b13955235245b2497399d7a93', 1, 'Chair Boss', 'chair@powerpuff.ro', 'aff', ''),
(4, 'author', '4297f44b13955235245b2497399d7a93', 4, 'author', 'contact@webaround.ro', 'afffff', ''),
(3, 'test', '4297f44b13955235245b2497399d7a93', 3, 'test', 'contact@webaround.ro', 'aff', 'http://localhost/powerpuff/register'),
(5, 'submitter', '4297f44b13955235245b2497399d7a93', 4, 'submitter', 'submitter@powerpuff.ro', '', NULL),
(6, 'chair', '4297f44b13955235245b2497399d7a93', 3, 'chair', 'char@test.com', '', ''),
(7, 'andrei', '4297f44b13955235245b2497399d7a93', 5, 'Andrei', 'admin@admin.com', '', NULL),
(8, 'cochair', '4297f44b13955235245b2497399d7a93', 2, 'cochair', 'victor.tudosa@gmail.com', 'aff', '');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `bidding`
--
ALTER TABLE `bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `conference`
--
ALTER TABLE `conference`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `reviewers_paper`
--
ALTER TABLE `reviewers_paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `session_participant`
--
ALTER TABLE `session_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `bidding`
--
ALTER TABLE `bidding`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `conference`
--
ALTER TABLE `conference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `presentation`
--
ALTER TABLE `presentation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pentru tabele `reviewers_paper`
--
ALTER TABLE `reviewers_paper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pentru tabele `session_participant`
--
ALTER TABLE `session_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
