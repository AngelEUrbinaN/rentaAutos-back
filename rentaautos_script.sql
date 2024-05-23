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
    PRIMARY KEY (renta_id),
    FOREIGN KEY (rent_usu_id) REFERENCES usuario(usu_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rent_aut_id) REFERENCES auto(aut_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertar datos en la tabla usuario
INSERT INTO usuario (usu_nombre, usu_apellidos, usu_fechaNacimiento, usu_genero, usu_correo, usu_telefono, usu_direccion, usu_password)
VALUES 
('Juan Pérez', 'Urbina Navarrete','1990-01-15', 'Hombre', 'juan.perez@example.com', '5551234567', 'Calle Falsa 123, Ciudad', 'password1'),
('María Gómez', 'Vallejo Perez','1985-05-20', 'Mujer', 'maria.gomez@example.com', '5557654321', 'Avenida Siempre Viva 742, Ciudad', 'password2'),
('Carlos Sánchez', 'Saldaña Algo' ,'1992-07-30', 'Hombre', 'carlos.sanchez@example.com', '5559876543', 'Boulevard de los Sueños Rotos 456, Ciudad', 'password3'),
('Ana López', 'Coronilla Algo','1988-03-10', 'Mujer', 'ana.lopez@example.com', '5556543210', 'Pasaje de los Milagros 789, Ciudad', 'password4'),
('Elena Martínez', 'García Algo' ,'1995-12-25', 'No especificar', 'elena.martinez@example.com', '5554321098', 'Plaza de la Libertad 101, Ciudad', 'password5');

-- Insertar datos en la tabla auto
INSERT INTO auto (aut_modelo, aut_asientos, aut_transmision, aut_costoDia, aut_disponible, aut_localizacion, aut_imagen)
VALUES 
('Toyota Corolla', 5, 'Automatica', 50.00, TRUE, 'Estacionamiento A', 'imagen1.jpg'),
('Honda Civic', 5, 'Manual', 45.00, TRUE, 'Estacionamiento B', 'imagen2.jpg'),
('Ford Focus', 5, 'Automatica', 55.00, TRUE, 'Estacionamiento C', 'imagen3.jpg'),
('Chevrolet Cruze', 5, 'Manual', 40.00, TRUE, 'Estacionamiento D', 'imagen4.jpg'),
('Mazda 3', 5, 'Automatica', 60.00, TRUE, 'Estacionamiento E', 'imagen5.jpg');

-- Insertar datos en la tabla renta
INSERT INTO renta (rent_usu_id, rent_aut_id, rent_diaInicio, rent_diaFin, rent_costoEstimado, rent_finReal, rent_costoReal)
VALUES 
(1, 1, '2024-06-01', '2024-06-07', 350.00, '2024-06-07', 350.00),
(2, 2, '2024-06-02', '2024-06-05', 135.00, '2024-06-05', 135.00),
(3, 3, '2024-06-03', '2024-06-10', 385.00, '2024-06-10', 385.00),
(4, 4, '2024-06-04', '2024-06-08', 160.00, '2024-06-08', 160.00),
(5, 5, '2024-06-05', '2024-06-12', 420.00, '2024-06-12', 420.00);