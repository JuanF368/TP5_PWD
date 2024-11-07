--creacion de la Base de Datos
CREATE DATABASE bdautenticacion;

--comando para realizar los siguientes comandos dentro de la base de datos
USE bdautenticacion;

--Estructura de tabla para la tabla "usuario"
--
CREATE TABLE usuario(
    idusuario bigint(20) AUTO_INCREMENT,
    usnombre varchar(50) NOT NULL,
    uspass varchar(50) NOT NULL,
    usmail varchar(50) NOT NULL,
    usdeshabilitado timestamp NOT NULL,
    PRIMARY KEY (idusuario)
);
-- 
-- Volcar la base de datos para la tabla `usuario`
-- 
INSERT INTO usuario (usnombre, uspass, usmail, usdeshabilitado) VALUES
('juanperez', 12345, 'juan.perez@example.com', '2024-01-01 00:00:00'),
('mariagonzalez', 23456, 'maria.gonzalez@example.com', '2024-02-01 00:00:00'),
('carloslopez', 34567, 'carlos.lopez@example.com', '2024-03-01 00:00:00'),
('anafernandez', 45678, 'ana.fernandez@example.com', '2024-04-01 00:00:00'),
('luismartinez', 56789, 'luis.martinez@example.com', '2024-05-01 00:00:00');


--Estructura de tabla para la tabla "rol"
--
CREATE TABLE rol(
    idrol bigint(20) AUTO_INCREMENT,
    roldescripcion varchar(50) NOT NULL,
    PRIMARY KEY (idrol)
);
-- 
-- Volcar la base de datos para la tabla `rol`
-- 
INSERT INTO rol (roldescripcion) VALUES
('Administrador'),
('Editor'),
('Usuario'),
('Supervisor');


--Estructura de tabla para la tabla "usuariorol"
--
CREATE TABLE usuariorol(
    idusuario bigint(20) NOT NULL,
    idrol bigint(20) NOT NULL,
    PRIMARY KEY (idusuario, idrol),
    FOREIGN KEY (idusuario) REFERENCES usuario(idusuario)ON UPDATE CASCADE ON DELETE RESTRICT,
    FOREIGN KEY (idrol) REFERENCES rol(idrol)ON UPDATE CASCADE ON DELETE RESTRICT
);
-- 
-- Volcar la base de datos para la tabla `usuariorol`
-- 
INSERT INTO usuariorol (idusuario, idrol) VALUES
(1, 1),  -- Juan Pérez es Administrador
(2, 2),  -- María González es Editor
(3, 3),  -- Carlos López es Usuario
(4, 2),  -- Ana Fernández es Editor
(5, 4);  -- Luis Martínez es Supervisor



--
--BORRAR LA BASE DE DATOS (SOLO SI ES NECESARIO)
--
DROP DATABASE bdautenticacion;