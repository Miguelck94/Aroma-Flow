-- Active: 1769557851507@@127.0.0.1@3306@loja_virtual
CREATE DATABASE loja_virtual;

USE loja_virtual;

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(250) NOT NULL,
    preco FLOAT(10, 2),
    marca VARCHAR(100),
    quantidade INT NOT NULL,
    data_adicao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE login_usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    cidade VARCHAR(100) NOT NULL
);

CREATE TABLE listagem_produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    saida VARCHAR(100)
);

DROP TABLE funcionario

CREATE TABLE carrinho (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_login_usuario INT NOT NULL,
    id_produto INT NOT NULL,
    preco_total DECIMAL NOT NULL,
    FOREIGN KEY (id_login_usuario) REFERENCES login_usuario (id),
    Foreign Key (id_produto) REFERENCES produto (id)
);

DROP TABLE funcionario;

CREATE TABLE funcionario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NUll,
    cargo VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    id_listagem_produtos INT,
    id_produto INT,
    FOREIGN KEY (id_listagem_produtos) REFERENCES listagem_produto (id),
    FOREIGN KEY (id_produto) REFERENCES produto (id)
);

INSERT INTO
    funcionario (
        nome,
        email,
        cargo,
        senha,
        cidade,
        id_listagem_produtos,
        id_produto
    )
VALUES (
        'Carlos Silva',
        'carlos.silva@email.com',
        'Gerente',
        'carlos123',
        'São Paulo',
        1,
        1
    ),
    (
        'Ana Souza',
        'ana.souza@email.com',
        'Vendedora',
        'ana@2024',
        'Rio de Janeiro',
        2,
        2
    ),
    (
        'João Pereira',
        'joao.pereira@email.com',
        'Estoquista',
        'joao789',
        'Belo Horizonte',
        3,
        3
    ),
    (
        'Mariana Lima',
        'mariana.lima@email.com',
        'Atendente',
        'mari456',
        'Salvador',
        1,
        4
    ),
    (
        'Lucas Ferreira',
        'lucas.ferreira@email.com',
        'Supervisor',
        'lucas321',
        'Curitiba',
        2,
        5
    );

INSERT INTO
    produtos (
        nome,
        preco,
        marca,
        quantidade
    )
VALUES (
        'Essência Noturna',
        199.90,
        'AromaLux',
        15
    ),
    (
        'Brisa Floral',
        149.50,
        'Florence',
        20
    ),
    (
        'Ouro Intenso',
        259.99,
        'Golden Scents',
        10
    ),
    (
        'Doce Encanto',
        179.00,
        'Sweet Line',
        18
    ),
    (
        'Mistério Oriental',
        229.90,
        'Oriental Fragances',
        12
    ),
    (
        'Fresh Summer',
        139.99,
        'CoolVibe',
        25
    ),
    (
        'Black Night',
        279.90,
        'Dark Essence',
        8
    ),
    (
        'Rose Delicate',
        159.90,
        'Bella Rosa',
        22
    ),
    (
        'Citrus Power',
        129.90,
        'Energy Fragrance',
        30
    ),
    (
        'Velvet Touch',
        199.00,
        'SoftSkin',
        14
    ),
    (
        'Ocean Breeze',
        169.90,
        'BlueWave',
        17
    ),
    (
        'Luxury Gold',
        299.90,
        'Elite Perfumes',
        6
    ),
    (
        'Sweet Vanilla',
        149.00,
        'Vanilla Dreams',
        19
    ),
    (
        'Urban Style',
        189.90,
        'City Scents',
        13
    ),
    (
        'Pure Elegance',
        239.90,
        'Classic Line',
        9
    ),
    (
        'Wild Forest',
        179.50,
        'Nature Essence',
        16
    ),
    (
        'Crystal Night',
        209.90,
        'Shine Perfumes',
        11
    ),
    (
        'Sunshine Glow',
        159.90,
        'Sunny Day',
        21
    ),
    (
        'Dark Coffee',
        189.00,
        'Coffee Scent',
        15
    ),
    (
        'Magic Blossom',
        174.90,
        'Flower Magic',
        18
    );

INSERT INTO
    login_usuario (nome, email, cidade)
VALUES (
        'Lucas Silva',
        'lucas.silva@email.com',
        'São Paulo'
    ),
    (
        'Mariana Souza',
        'mariana.souza@email.com',
        'Rio de Janeiro'
    ),
    (
        'Carlos Pereira',
        'carlos.pereira@email.com',
        'Belo Horizonte'
    ),
    (
        'Ana Oliveira',
        'ana.oliveira@email.com',
        'Curitiba'
    ),
    (
        'João Santos',
        'joao.santos@email.com',
        'Salvador'
    ),
    (
        'Fernanda Costa',
        'fernanda.costa@email.com',
        'Fortaleza'
    ),
    (
        'Rafael Almeida',
        'rafael.almeida@email.com',
        'Recife'
    ),
    (
        'Juliana Rocha',
        'juliana.rocha@email.com',
        'Porto Alegre'
    ),
    (
        'Bruno Martins',
        'bruno.martins@email.com',
        'Brasília'
    ),
    (
        'Camila Ferreira',
        'camila.ferreira@email.com',
        'Manaus'
    ),
    (
        'Gabriel Barbosa',
        'gabriel.barbosa@email.com',
        'Belém'
    ),
    (
        'Patrícia Gomes',
        'patricia.gomes@email.com',
        'Goiânia'
    ),
    (
        'Diego Ribeiro',
        'diego.ribeiro@email.com',
        'Florianópolis'
    ),
    (
        'Larissa Teixeira',
        'larissa.teixeira@email.com',
        'Natal'
    ),
    (
        'Eduardo Carvalho',
        'eduardo.carvalho@email.com',
        'Vitória'
    ),
    (
        'Beatriz Lopes',
        'beatriz.lopes@email.com',
        'João Pessoa'
    ),
    (
        'Felipe Mendes',
        'felipe.mendes@email.com',
        'Campo Grande'
    ),
    (
        'Renata Nunes',
        'renata.nunes@email.com',
        'Maceió'
    ),
    (
        'Thiago Castro',
        'thiago.castro@email.com',
        'Aracaju'
    ),
    (
        'Isabela Freitas',
        'isabela.freitas@email.com',
        'Teresina'
    );

INSERT INTO
    listagem_produtos (nome, quantidade, saida)
VALUES ('Essência Noturna', 15, 5),
    ('Brisa Floral', 20, 8),
    ('Ouro Intenso', 10, 4),
    ('Doce Encanto', 18, 7),
    ('Mistério Oriental', 12, 3),
    ('Fresh Summer', 25, 10),
    ('Black Night', 8, 2),
    ('Rose Delicate', 22, 9),
    ('Citrus Power', 30, 12),
    ('Velvet Touch', 14, 6),
    ('Ocean Breeze', 17, 5),
    ('Luxury Gold', 6, 2),
    ('Sweet Vanilla', 19, 7),
    ('Urban Style', 13, 4),
    ('Pure Elegance', 9, 3),
    ('Wild Forest', 16, 6),
    ('Crystal Night', 11, 4),
    ('Sunshine Glow', 21, 8),
    ('Dark Coffee', 15, 5),
    ('Magic Blossom', 18, 7);

INSERT INTO
    carrinho (
        id_login_usuario,
        id_produto,
        preco_total
    )
VALUES (1, 1, 199.90),
    (2, 2, 149.50),
    (3, 3, 259.99),
    (1, 4, 179.00),
    (2, 5, 229.90),
    (3, 6, 139.99),
    (1, 7, 279.90),
    (2, 8, 159.90),
    (3, 9, 129.90),
    (1, 10, 199.00),
    (2, 11, 169.90),
    (3, 12, 299.90),
    (1, 13, 149.00),
    (2, 14, 189.90),
    (3, 15, 239.90),
    (1, 16, 179.50),
    (2, 17, 209.90),
    (3, 18, 159.90),
    (1, 19, 189.00),
    (2, 20, 174.90);

ALTER TABLE produtos ADD COLUMN img VARCHAR(255);

INSERT INTO produtos (nome, preco, marca, quantidade, img) VALUES
('Essência Noturna', 199.90, 'AromaLux', 15, 'imagens/Essencia_Noturna.png'),
('Brisa Floral', 149.50, 'Florence', 20, 'imagens/Brisa_Floral.png'),
('Ouro Intenso', 259.99, 'Golden Scents', 10, 'imagens/Ouro_Intenso.png'),
('Doce Encanto', 179.00, 'Sweet Line', 18, 'imagens/Doce_Encanto.png'),
('Mistério Oriental', 229.90, 'Oriental Fragances', 12, 'imagens/Misterio_Oriental.png'),
('Fresh Summer', 139.99, 'CoolVibe', 25, 'imagens/Fresh_Summer.png'),
('Black Night', 279.90, 'Dark Essence', 8, 'imagens/Black_Night.png'),
('Rose Delicate', 159.90, 'Bella Rosa', 22, 'imagens/Rose_Delicate.png'),
('Citrus Power', 129.90, 'Energy Fragrance', 30, 'imagens/Citrus_Power.png'),
('Velvet Touch', 199.00, 'SoftSkin', 14, 'imagens/Velvet_Touch.png'),
('Ocean Breeze', 169.90, 'BlueWave', 17, 'imagens/Ocean_Breeze.png'),
('Luxury Gold', 299.90, 'Elite Perfumes', 6, 'imagens/Luxury_Gold.png'),
('Sweet Vanilla', 149.00, 'Vanilla Dreams', 19, 'imagens/Sweet_Vanilla.png'),
('Urban Style', 189.90, 'City Scents', 13, 'imagens/Urban_Style.png'),
('Pure Elegance', 239.90, 'Classic Line', 9, 'imagens/Pure_Elegance.png'),
('Wild Forest', 179.50, 'Nature Essence', 16, 'imagens/Wild_Forest.png'),
('Crystal Night', 209.90, 'Shine Perfumes', 11, 'imagens/Crystal_Night.png'),
('Sunshine Glow', 159.90, 'Sunny Day', 21, 'imagens/Sunshine_Glow.png'),
('Dark Coffee', 189.00, 'Coffee Scent', 15, 'imagens/Dark_Coffee.png'),
('Magic Blossom', 174.90, 'Flower Magic', 18, 'imagens/Magic_Blossom.png');

ALTER TABLE carrinho ADD COLUMN quantidade INT DEFAULT 1;

DESCRIBE produtos;



TRUNCATE TABLE carrinho;

SELECT id_produto,nome, img 
FROM carrinho 
JOIN produtos p ON carrinho.id_produto = p.id
WHERE carrinho.id_login_usuario = 1;

UPDATE produtos SET img = 'imagens/brisa_floral.png'     WHERE nome = 'Brisa Floral';
UPDATE produtos SET img = 'imagens/essencia_noturna.png' WHERE nome = 'Essência Noturna';
UPDATE produtos SET img = 'imagens/ouro_intenso.png'     WHERE nome = 'Ouro Intenso';
UPDATE produtos SET img = 'imagens/doce_encanto.png'     WHERE nome = 'Doce Encanto';
UPDATE produtos SET img = 'imagens/misterio_oriental.png' WHERE nome = 'Mistério Oriental';
UPDATE produtos SET img = 'imagens/fresh_summer.png'     WHERE nome = 'Fresh Summer';
UPDATE produtos SET img = 'imagens/black_night.png'      WHERE nome = 'Black Night';
UPDATE produtos SET img = 'imagens/rose_delicate.png'    WHERE nome = 'Rose Delicate';
UPDATE produtos SET img = 'imagens/citrus_power.png'     WHERE nome = 'Citrus Power';
UPDATE produtos SET img = 'imagens/velvet_touch.png'     WHERE nome = 'Velvet Touch';
UPDATE produtos SET img = 'imagens/ocean_breeze.png'     WHERE nome = 'Ocean Breeze';
UPDATE produtos SET img = 'imagens/luxury_gold.png'      WHERE nome = 'Luxury Gold';
UPDATE produtos SET img = 'imagens/sweet_vanilla.png'    WHERE nome = 'Sweet Vanilla';
UPDATE produtos SET img = 'imagens/urban_style.png'      WHERE nome = 'Urban Style';
UPDATE produtos SET img = 'imagens/pure_elegance.png'    WHERE nome = 'Pure Elegance';
UPDATE produtos SET img = 'imagens/wild_forest.png'      WHERE nome = 'Wild Forest';
UPDATE produtos SET img = 'imagens/crystal_night.png'    WHERE nome = 'Crystal Night';
UPDATE produtos SET img = 'imagens/sunshine_glow.png'    WHERE nome = 'Sunshine Glow';
UPDATE produtos SET img = 'imagens/dark_coffee.png'      WHERE nome = 'Dark Coffee';
UPDATE produtos SET img = 'imagens/magic_blossom.png'    WHERE nome = 'Magic Blossom';

SELECT id, nome, img FROM produtos ORDER BY id;
-- Atualiza img dos produtos duplicados (ids 21-40) para o mesmo caminho dos originais
