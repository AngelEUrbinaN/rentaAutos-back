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
    aut_costoDia DECIMAL(14, 2) NOT NULL,
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
    rent_costoEstimado DECIMAL(14, 2) NOT NULL,
    rent_finReal DATE,
    rent_costoReal DECIMAL(14, 2),
    PRIMARY KEY (renta_id),
    FOREIGN KEY (rent_usu_id) REFERENCES usuario(usu_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (rent_aut_id) REFERENCES auto(aut_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS pago (
    pag_id INT NOT NULL AUTO_INCREMENT,
    pag_monto DECIMAL(14, 2) NOT NULL,
    pag_fecha DATE NOT NULL,
    pag_metodo ENUM('Paypal', 'VISA', 'MasterCard', 'Mercado Pago', 'Efectivo') NOT NULL,
    pag_rent_id INT NOT NULL,
    PRIMARY KEY (pag_id),
    FOREIGN KEY (pag_rent_id) REFERENCES renta(renta_id) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO auto (aut_modelo,aut_asientos,aut_transmision,aut_costoDia,aut_disponible,aut_localizacion,aut_imagen)
VALUES ('Chevrolet Aveo Sedan', 5, 'Manual', 151.00, 'True', 'Sucursal Celaya, Zona Centro', 'images/autos/chevrolet_aveo_sedan.jpg'),
('Chevrolet Onix', 5, 'Automatica', 300.00, 'True', 'Sucursal Celaya, Zona Centro', 'images/autos/chevrolet_onix.jpg'),
('Hyundai i10', 5, 'Automatica', 597.00, 'True', 'Sucursal Irapuato, Zona Centro', 'images/autos/hyundai_i10.jpg'),
('Kia Rio', 5, 'Automatica', 265.00, 'True', 'Sucursal Irapuato, Zona Centro', 'images/autos/kia_rio.jpg'),
('El Sube Viejas', 5, 'Manual', 7539.00, 'True', 'Sucursal Guanajuato, Zona Centro', 'images/autos/el_sube_viejas.jpg'),
('Kia Sedona', 8, 'Automatica', 1282.00, 'True', 'Sucursal Iraputo, Zona Centro', 'images/autos/kia_sedona.jpg'),
('Tsuru del Chivas', 5, 'Manual', 1.00, 'True', 'Sucursal Celaya, Zona Centro', 'images/autos/tsuru_del_chivas.jpg'),
('Mitsubishi L200/Triton', 5, 'Manual', 1076.00, 'True', 'Sucursal Salamanca, Zona Centro', 'images/autos/mitsubishi_l200.jpg'),
('Suzuki Ertiga', 7, 'Automatica', 1938.00, 'True', 'Sucursal Salamanca, Zona Centro', 'images/autos/suzuki_ertiga.jpg'),
('Vocho Tuneado', 3, 'Manual', 19.00, 'True', 'Sucursal Celaya, Zona Centro', 'images/autos/vocho_tuneado.jpg');

-- PARA PROBAR TODOS LOS CASOS DE PAGO DE RENTA

--INSERT INTO renta(rent_usu_id, rent_aut_id, rent_diaInicio, rent_diaFin, rent_costoEstimado, rent_finReal, rent_costoReal)
	--VALUES (1, 1, '2024-06-01', '2024-06-04', 453.00, null, null), -- Acaba el día esperado.
   -- 	(1, 6, '2024-05-29', '2024-06-10', 15384.00, null, null), -- Acaba antes del día esperado.
   --  	(1, 9, '2024-05-25', '2024-06-02', 15504.00, null, null); -- Acaba después del día esperado.

--UPDATE auto SET aut_disponible = 'False' WHERE aut_id = 1;
--UPDATE auto SET aut_disponible = 'False' WHERE aut_id = 6;
--UPDATE auto SET aut_disponible = 'False' WHERE aut_id = 9;