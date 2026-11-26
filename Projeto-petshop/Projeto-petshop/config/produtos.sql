-- Tabela de produtos + produtos fictícios
-- Importe no mesmo banco usado pelo projeto (veja config/Database.php)

CREATE TABLE IF NOT EXISTS `tbl_produto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `estoque` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_produto` (`nome`, `categoria`, `preco`, `estoque`) VALUES
('Ração Premium Cães Adultos 15kg',   'Alimentação', 189.90, 25),
('Ração Premium Gatos Castrados 10kg','Alimentação', 164.50, 18),
('Petisco Bifinho de Carne 500g',     'Petiscos',     24.90, 60),
('Osso de Couro Bovino Grande',       'Petiscos',     16.00, 45),
('Shampoo Neutro Pet 500ml',          'Higiene',      32.90, 30),
('Areia Higiênica para Gatos 4kg',    'Higiene',      21.50, 50),
('Coleira Ajustável Tamanho M',       'Acessórios',   29.90, 40),
('Guia Retrátil 5 metros',            'Acessórios',   54.90, 15),
('Bolinha de Borracha com Apito',     'Brinquedos',   12.90, 80),
('Arranhador para Gatos 60cm',        'Brinquedos',   89.90, 10),
('Cama Pet Confort Tamanho G',        'Camas',       119.90, 12),
('Antipulgas Cães 10-20kg',           'Saúde',        79.90, 22);
