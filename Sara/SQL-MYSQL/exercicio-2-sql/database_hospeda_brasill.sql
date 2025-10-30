USE hospeda_brasil;

CREATE TABLE anfitrioes (
    id_anfitriao INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20)
);

CREATE TABLE hospedes (
    id_hospede INT AUTO_INCREMENT PRIMARY KEY,
    nome_completo VARCHAR(100),
    email VARCHAR(100),
    telefone VARCHAR(20),
    data_nascimento DATE
);

CREATE TABLE hospedagens (
    id_hospedagem INT AUTO_INCREMENT PRIMARY KEY,
    id_anfitriao INT,
    titulo VARCHAR(100),
    descricao VARCHAR(500),
    cidade VARCHAR(50),
    estado VARCHAR(50),
    capacidade INT
);

CREATE TABLE status_reservas (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status_nome VARCHAR(50)
);

CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_hospedagem INT,
    id_hospede INT,
    status_id INT,
    data_checkin DATE,
    data_checkout DATE,
    valor_noite DECIMAL(10,2),
    noites INT,
    taxa_servico DECIMAL(10,2),
    taxa_limpeza DECIMAL(10,2),
    desconto DECIMAL(10,2)
);
