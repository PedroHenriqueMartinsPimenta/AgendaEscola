-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2018 às 01:06
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agendamento`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aula`
--

INSERT INTO `aula` (`CODIGO`, `DESCRICAO`) VALUES
(1, '1º aula'),
(2, '2º aula'),
(3, '3º aula'),
(4, '4º aula'),
(5, '5º aula'),
(6, '6º aula'),
(7, '7º aula'),
(8, '8º aula'),
(9, '9º aula');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) NOT NULL,
  `ICON` varchar(200) NOT NULL,
  `QUANTIDADE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`CODIGO`, `DESCRICAO`, `ICON`, `QUANTIDADE`) VALUES
(1, 'Projetor', 'http://localhost/agendaEscola/imgEquipamentos/projetor.png', 6),
(2, 'Caixa de som', 'http://localhost/agendaEscola/imgEquipamentos/caixa de som.png', 4),
(3, 'Laboratório de informatica', 'http://localhost/agendaEscola/imgEquipamentos/laboratoria de informatica.png', 1),
(4, 'Laboratório de química ', 'http://localhost/agendaEscola/imgEquipamentos/laboratorio de quimica.png', 1),
(5, 'Laboratório de biologia ', 'http://localhost/agendaEscola/imgEquipamentos/laboratorio de biologia.png', 1),
(6, 'Laboratório de física ', 'http://localhost/agendaEscola/imgEquipamentos/laboratorio de fisica.png', 1),
(7, 'Televisão', 'http://localhost/agendaEscola/imgEquipamentos/tv.png', 1),
(8, 'Laboratório especial ', 'http://localhost/agendaEscola/imgEquipamentos/laboratorio especial.png', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `CODIGO` int(11) NOT NULL,
  `DATA` datetime NOT NULL,
  `USUARIO_CPF` varchar(14) NOT NULL,
  `EQUIPAMENTO_CODIGO` int(11) NOT NULL,
  `AULA_CODIGO` int(11) NOT NULL,
  `TURMA_CODIGO` int(3) UNSIGNED ZEROFILL NOT NULL,
  `DATA_ULTILIZAR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

CREATE TABLE `turma` (
  `CODIGO` int(3) UNSIGNED ZEROFILL NOT NULL,
  `DESCRICAO` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`CODIGO`, `DESCRICAO`) VALUES
(010, '1º INFOR'),
(011, '2º INFOR'),
(012, '3º INFOR'),
(013, '1º DCC'),
(014, '2º DCC'),
(015, '3º DCC'),
(016, '1º FIN'),
(017, '2º FIN'),
(018, '3º FIN'),
(019, '1º AGRO'),
(020, '2º AGRO'),
(021, '3º AGRO'),
(022, '1º ADM'),
(023, '2º ADM'),
(024, '3º ADM');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `CPF` varchar(14) NOT NULL,
  `NOME` varchar(45) NOT NULL,
  `SOBRENOME` varchar(45) NOT NULL,
  `FOTO` varchar(200) NOT NULL,
  `SENHA` varchar(45) NOT NULL,
  `ATIVO` tinyint(1) DEFAULT NULL,
  `PERMISSAO` tinyint(4) NOT NULL,
  `EMAIL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`CPF`, `NOME`, `SOBRENOME`, `FOTO`, `SENHA`, `ATIVO`, `PERMISSAO`, `EMAIL`) VALUES
('888.888.888-88', 'Pedro Henrique', 'Martins', 'http://localhost/agendaEscola/path/888.888.888-88/1.png', 'Y0dWa2NtOW1ZV0pwWVc1aA==', 1, 1, 'pedrohenrique234322@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`CODIGO`),
  ADD KEY `fk_RESERVA_USUARIO_idx` (`USUARIO_CPF`),
  ADD KEY `fk_RESERVA_EQUIPAMENTO1_idx` (`EQUIPAMENTO_CODIGO`),
  ADD KEY `fk_RESERVA_AULA1_idx` (`AULA_CODIGO`),
  ADD KEY `fk_RESERVA_TURMA1_idx` (`TURMA_CODIGO`);

--
-- Indexes for table `turma`
--
ALTER TABLE `turma`
  ADD PRIMARY KEY (`CODIGO`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`CPF`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD UNIQUE KEY `EMAIL_2` (`EMAIL`),
  ADD UNIQUE KEY `EMAIL_3` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aula`
--
ALTER TABLE `aula`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `turma`
--
ALTER TABLE `turma`
  MODIFY `CODIGO` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_RESERVA_AULA1` FOREIGN KEY (`AULA_CODIGO`) REFERENCES `aula` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RESERVA_EQUIPAMENTO1` FOREIGN KEY (`EQUIPAMENTO_CODIGO`) REFERENCES `equipamento` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RESERVA_TURMA1` FOREIGN KEY (`TURMA_CODIGO`) REFERENCES `turma` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RESERVA_USUARIO` FOREIGN KEY (`USUARIO_CPF`) REFERENCES `usuario` (`CPF`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
