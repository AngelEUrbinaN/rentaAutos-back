-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS rentaautos;

-- Usar la base de datos
USE rentaautos;

-- Crear la tabla usuario
CREATE TABLE IF NOT EXISTS usuario (
    usu_id INT NOT NULL AUTO_INCREMENT,
    usu_nombre VARCHAR(100) NOT NULL,
    usu_apellidos VARCHAR(100) NOT NULL,
    usu_fechaNacimiento DATE,
    usu_genero ENUM('Hombre', 'Mujer', 'No especificar'),
    usu_correo VARCHAR(200) NOT NULL,
    usu_telefono VARCHAR(10),
    usu_direccion VARCHAR(1000),
    usu_password VARCHAR(10000) NOT NULL,
    PRIMARY KEY (usu_id)
);

-- Crear la tabla auto
CREATE TABLE IF NOT EXISTS auto (
    aut_id INT NOT NULL AUTO_INCREMENT,
    aut_modelo VARCHAR(200) NOT NULL,
    aut_asientos INT NOT NULL,
    aut_transmision ENUM('Manual', 'Automatica') NOT NULL,
    aut_costoDia DECIMAL(6, 2) NOT NULL,
    aut_disponible ENUM('True', 'False') ,
    aut_localizacion VARCHAR(500) NOT NULL,
    aut_imagen VARCHAR(1000) NOT NULL,
    PRIMARY KEY (aut_id)
);

CREATE TABLE IF NOT EXISTS pago (
    pag_id INT NOT NULL AUTO_INCREMENT,
    pag_monto DECIMAL(7, 2) NOT NULL,
    pag_fecha DATE NOT NULL,
    pag_metodo ENUM('Paypal', 'VISA', 'MasterCard', 'Mercado Pago', 'Efectivo') NOT NULL,
    PRIMARY KEY (pag_id)
);

-- Crear la tabla renta
CREATE TABLE IF NOT EXISTS renta (
    renta_id INT NOT NULL AUTO_INCREMENT,
    rent_usu_id INT NOT NULL,
    rent_aut_id INT NOT NULL,
    rent_diaInicio DATE NOT NULL,
    rent_diaFin DATE NOT NULL,
    rent_costoEstimado DECIMAL(7, 2) NOT NULL,
    rent_finReal DATE,
    rent_costoReal DECIMAL(7, 2),
    rent_pag_id INT UNIQUE,
    PRIMARY KEY (renta_id),
    FOREIGN KEY (rent_usu_id) REFERENCES usuario(usu_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rent_aut_id) REFERENCES auto(aut_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rent_pag_id) REFERENCES pago(pag_id) ON DELETE RESTRICT ON UPDATE CASCADE
);