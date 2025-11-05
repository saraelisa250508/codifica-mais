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
    data_nascimento DATE,
    criado_em DATE
);

CREATE TABLE hospedagens (
    id_hospedagem INT AUTO_INCREMENT PRIMARY KEY,
    id_anfitriao INT NOT NULL,
    titulo VARCHAR(100),
    descricao TEXT,
    cidade VARCHAR(50),
    estado VARCHAR(50),
    capacidade INT,
    criado_em DATE
);

CREATE TABLE status_reservas (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status_nome VARCHAR(50) NOT NULL
);

CREATE TABLE reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    id_hospedagem INT NOT NULL,
    id_hospede INT NOT NULL,
    status_id INT NOT NULL,
    data_checkin DATE,
    data_checkout DATE,
    valor_noite DECIMAL(10,2),
    noites INT NOT NULL,
    taxa_servico DECIMAL(10,2),
    taxa_limpeza DECIMAL(10,2),
    desconto DECIMAL(10,2),
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    deletado_em DATETIME NULL,
    FOREIGN KEY (id_hospedagem) REFERENCES hospedagens(id_hospedagem),
    FOREIGN KEY (id_hospede) REFERENCES hospedes(id_hospede),
    FOREIGN KEY (status_id) REFERENCES status_reservas(id_status)
);
