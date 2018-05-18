-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.1.37 - Source distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para prova
CREATE DATABASE IF NOT EXISTS `prova` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `prova`;

-- Copiando estrutura para tabela prova.tarefas
CREATE TABLE IF NOT EXISTS `tarefas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` longtext,
  `prioridade` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela prova.tarefas: 2 rows
/*!40000 ALTER TABLE `tarefas` DISABLE KEYS */;
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `prioridade`) VALUES
	(21, 'tarefa', 'isto eh uma nova tarefa', 1),
	(12, 'Prova', 'Terminar este trabalho!', 5);
/*!40000 ALTER TABLE `tarefas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
