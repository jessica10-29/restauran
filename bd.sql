CREATE DATABASE restaurante;
USE restaurante;

CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100),
    plato VARCHAR(100),
    cantidad INT,
    estado ENUM('Pendiente','Preparando','Despachado') DEFAULT 'Pendiente'
);
