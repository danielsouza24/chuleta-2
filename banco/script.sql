-- Database: 
CREATE DATABASE
	IF NOT EXISTS `tincphpdb01`
    DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
    
USE `tincphpdb01`;

-- --------------------------------------------------------
-- Estrutura da tabela `produtos`
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `resumo` varchar(1000) DEFAULT NULL,
  `valor` decimal(9,2) DEFAULT NULL,
  `imagem` varchar(50) DEFAULT NULL,
  `destaque` enum('Sim','Não') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Extraindo dados da tabela `produtos`
INSERT INTO `produtos` (`id`, `tipo_id`, `descricao`, `resumo`, `valor`, `imagem`, `destaque`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', 49.90, 'picanha_alho.jpg', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', 29.90, 'fraldinha.jpg', 'Não'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', 39.90, 'costelona.jpg', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', 47.90, 'cupim.jpg', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', 72.90, 'picanha_sem.jpg', 'Não'),
(6, 1, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', 12.60, 'strudel.jpg', 'Não'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', 36.28, 'alcatra_pedra.jpg', 'Não'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', 31.90, 'maminha.jpg', 'Não'),
(9, 2, 'Abacaxii', 'Abacaxi assado com canela ao creme de leite condensado ', 16.95, 'abacaxi.jpg', 'Não');

-- Indexes for table `produtos`
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for table `produtos`
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

-- Estrutura para tabela `tipos`
CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `sigla` varchar(3) NOT NULL,
  `rotulo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Despejando dados para a tabela `tipos`
INSERT INTO `tipos` (`id`, `sigla`, `rotulo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa');

-- Índices de tabela `tipos`
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Estrutura para tabela `tipos`
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` ENUM('sup','com') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserindo Dados na Tabela `usuarios'
INSERT INTO `usuarios` 
	(`id`, `login`, `senha`, `nivel`) 
	VALUES
		(1, 'senac', md5('1234'), 'sup'),
		(2, 'joao', md5('456'), 'com'),
		(3, 'maria', md5('789'), 'com'),
		(4, 'well', md5('1234'), 'sup');

-- Índices de tabela `tipos`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login_uniq`(`login`);

-- AUTO_INCREMENT de tabela `tipos`
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  
-- Chave estrangeira
ALTER TABLE `produtos`
  ADD CONSTRAINT `tipo_id_fk` FOREIGN KEY (`tipo_id`)
	REFERENCES `tipos`(`id`)
    ON DELETE no action
    ON UPDATE no action;  
    
-- Criando a view vw_produtos
CREATE VIEW vw_produtos AS
	SELECT	p.id,
			p.tipo_id,
            t.sigla,
            t.rotulo,
            p.descricao,
            p.resumo,
            p.valor,
            p.imagem,
            p.destaque
    FROM produtos p
		JOIN tipos t
	WHERE p.tipo_id=t.id;
COMMIT;

-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tincphpdb01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tincphpdb01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tincphpdb01` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema tincphpdb01
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tincphpdb01
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tincphpdb01` DEFAULT CHARACTER SET utf8 ;
USE `tincphpdb01` ;

-- -----------------------------------------------------
-- Table `tincphpdb01`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tincphpdb01`.`clientes` (
  `id` INT NOT NULL,
  `nomeCompleto` VARCHAR(100) NULL,
  `cpf` CHAR(14) NULL,
  `email` VARCHAR(100) NULL,
  `telefone` VARCHAR(14) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tincphpdb01`.`reservas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tincphpdb01`.`reservas` (
  `id` INT NOT NULL,
  `motivo` VARCHAR(100) NOT NULL,
  `comentarios` VARCHAR(100) NOT NULL,
  `hora` DATETIME NOT NULL,
  `data` DATE NOT NULL,
  `status` VARCHAR(100) NOT NULL,
  `clientes_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reservas_clientes_idx` (`clientes_id` ASC) ,
  CONSTRAINT `fk_reservas_clientes`
    FOREIGN KEY (`clientes_id`)
    REFERENCES `tincphpdb01`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `tincphpdb01` ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

DROP TABLE IF EXISTS `tincphpdb01`. `events`;
CREATE TABLE IF NOT EXISTS `tincphpdb01`. `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Tutorial 1', '#FFD700', '2023-10-16 10:05:00', '2023-10-16 11:05:00'),
(2, 'Tutorial 2', '#0071c5', '2023-10-18 10:06:00', '2023-10-18 11:06:00'),
(3, 'Tutorial 3', '#40e0d0', '2023-10-20 10:07:00', '2023-10-20 11:07:00'),
(4, 'Tutorial 4', '#FFD700', '2023-10-23 10:08:00', '2023-10-23 11:08:00'),
(5, 'Tutorial 5', '#40e0d0', '2023-10-25 10:09:00', '2023-10-26 11:09:00'),
(6, 'Tutorial 6', '#0071c5', '2023-10-27 10:10:00', '2023-10-27 11:10:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
