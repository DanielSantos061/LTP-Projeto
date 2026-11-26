-- Tabela de clientes (com o pet de cada um) + clientes fictícios
-- Importe este arquivo no mesmo banco usado pelo projeto (veja config/Database.php)

CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pet_nome` varchar(50) NOT NULL,
  `pet_especie` varchar(30) NOT NULL,
  `pet_raca` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tbl_cliente` (`nome`, `telefone`, `email`, `pet_nome`, `pet_especie`, `pet_raca`) VALUES
('Mariana Souza',      '(61) 99876-1201', 'mariana.souza@exemplo.com',   'Thor',     'Cachorro', 'Golden Retriever'),
('Carlos Eduardo Lima','(61) 98812-4455', 'carlos.lima@exemplo.com',     'Mel',      'Cachorro', 'Poodle'),
('Fernanda Alves',     '(61) 99234-7788', 'fernanda.alves@exemplo.com',  'Luna',     'Gato',     'Siamês'),
('Rafael Martins',     '(61) 98145-3390', 'rafael.martins@exemplo.com',  'Bob',      'Cachorro', 'Bulldog Francês'),
('Juliana Costa',      '(61) 99567-2210', 'juliana.costa@exemplo.com',   'Nina',     'Gato',     'Persa'),
('Pedro Henrique Rocha','(61) 98391-6604','pedro.rocha@exemplo.com',     'Rex',      'Cachorro', 'Pastor Alemão'),
('Ana Beatriz Nunes',  '(61) 99702-5518', 'ana.nunes@exemplo.com',       'Pipoca',   'Coelho',   'Mini Lop'),
('Lucas Ferreira',     '(61) 98456-9933', 'lucas.ferreira@exemplo.com',  'Fred',     'Cachorro', 'Shih Tzu'),
('Camila Ribeiro',     '(61) 99123-4476', 'camila.ribeiro@exemplo.com',  'Mia',      'Gato',     'SRD (vira-lata)'),
('Thiago Barbosa',     '(61) 98677-0021', 'thiago.barbosa@exemplo.com',  'Docinho',  'Hamster',  'Sírio');
