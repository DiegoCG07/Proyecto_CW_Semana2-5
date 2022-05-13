CREATE DATABASE proyectocw CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE proyectocw;

CREATE TABLE tipoextra(
    -> ID_TipoExtra INT PRIMARY KEY AUTO_INCREMENT,
    -> TipoExtra VARCHAR(10));
INSERT INTO tipoextra (TipoExtra) VALUES ("Estetica");
INSERT INTO tipoextra (TipoExtra) VALUES ("Optativa");

CREATE TABLE extra_h_tipoextra(
    -> ID_extra INT PRIMARY KEY AUTO_INCREMENT,
    -> extra CHAR(50),
    -> ID_TipoExtra INT,
    -> FOREIGN KEY (ID_TipoExtra) REFERENCES tipoextra (ID_TipoExtra));

ID_Area INT PRIMARY KEY AUTO_INCREMENT,
    -> area tinyint);
INSERT INTO area (area) VALUES (1);
INSERT INTO area (area) VALUES (2);
INSERT INTO area (area) VALUES (3);
INSERT INTO area (area) VALUES (4);