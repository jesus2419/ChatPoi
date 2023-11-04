create database test;

CREATE TABLE Usuarios (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Usuario VARCHAR(255) NOT NULL,
    Contraseña VARCHAR(255) NOT NULL,
    Nombre VARCHAR(255) NOT NULL,
    Apellidos VARCHAR(255) NOT NULL,
    Telefono VARCHAR(15),
    TipoUsuario VARCHAR(20) NOT NULL,
    ImagenBlop BLOB
);
CREATE TABLE Mensajes (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Contenido TEXT NOT NULL,
    FechaEnvio DATETIME NOT NULL,
    RemitenteID INT NOT NULL,
    DestinatarioID INT NOT NULL,
    FOREIGN KEY (RemitenteID) REFERENCES Usuarios(ID),
    FOREIGN KEY (DestinatarioID) REFERENCES Usuarios(ID)
);



CREATE TABLE Grupo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre Varchar(100) NOT NULL,
	Descripcion Varchar(100) ,
    Fecha_creacion DATETIME ,
    Creador_ID INT NOT NULL,

    FOREIGN KEY (Creador_ID) REFERENCES Usuarios(ID)
);

CREATE TABLE Mensajes_grupo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Contenido TEXT NOT NULL,
    FechaEnvio DATETIME ,
    RemitenteID INT NOT NULL,
    Grupo_ID INT NOT NULL,
    FOREIGN KEY (RemitenteID) REFERENCES Usuarios(ID),
    FOREIGN KEY (Grupo_ID) REFERENCES Grupo(ID)
);

CREATE TABLE MensajeUsuario (
    MensajeID INT NOT NULL,
    RemitenteID INT NOT NULL,
    FOREIGN KEY (MensajeID) REFERENCES Mensajes(ID),
    FOREIGN KEY (RemitenteID) REFERENCES Usuarios(ID)
);

DELIMITER $$

CREATE PROCEDURE InsertarUsuario(
    IN p_Usuario VARCHAR(255),
    IN p_Contraseña VARCHAR(255),
    IN p_Nombre VARCHAR(255),
    IN p_Apellidos VARCHAR(255),
    IN p_Telefono VARCHAR(15),
    IN p_TipoUsuario VARCHAR(20),
    IN p_ImagenBlop BLOB
)
BEGIN
    INSERT INTO Usuarios (Usuario, Contraseña, Nombre, Apellidos, Telefono, TipoUsuario, ImagenBlop)
    VALUES (p_Usuario, p_Contraseña, p_Nombre, p_Apellidos, p_Telefono, p_TipoUsuario, p_ImagenBlop);
END $$

DELIMITER ;
SELECT * FROM Usuarios WHERE Usuario = 'jesus';
select * from  Usuarios;
SELECT ID, Usuario, Nombre, Apellidos FROM Usuarios;
select * from Mensajes;
SELECT Contenido, FechaEnvio, RemitenteID
FROM Mensajes
WHERE (RemitenteID = 3 AND DestinatarioID = 1)
   OR (RemitenteID = 1 AND DestinatarioID = 3)
ORDER BY FechaEnvio asc
LIMIT 1;
select TIMEDIFF(NOW(), FechaEnvio) AS diferencia_tiempo, FechaEnvio FROM Mensajes ;
SELECT TIMESTAMPDIFF(MINUTE, FechaEnvio, NOW()) AS diferencia_minutos FROM Mensajes ;
SELECT 
            CONCAT(
                TIMESTAMPDIFF(HOUR, FechaEnvio, NOW()), ' horas ',
                MOD(TIMESTAMPDIFF(MINUTE, FechaEnvio, NOW()), 60), ' minutos'
            ) AS diferencia_tiempo 
        FROM Mensajes ;
        
INSERT INTO Grupo (Nombre, Descripcion, Fecha_creacion, Creador_ID)
VALUES ('tilines', 'simon', NOW(), 1);

INSERT INTO Grupo (Nombre, Descripcion, Fecha_creacion, Creador_ID)
VALUES ('tilines', 'simon', NOW(), 1);

select * from Grupo;

select * from usuarios;
select * from Mensajes_grupo;


-- Insertar un mensaje en el grupo 1 enviado por el usuario con ID 1
INSERT INTO Mensajes_grupo (Contenido, FechaEnvio, RemitenteID, Grupo_ID)
VALUES ('Hola, este es un mensaje del usuario 1 al grupo 1', NOW(), 1, 1);

-- Insertar un mensaje en el grupo 1 enviado por el usuario con ID 2
INSERT INTO Mensajes_grupo (Contenido, FechaEnvio, RemitenteID, Grupo_ID)
VALUES ('Hola, este es un mensaje del usuario 2 al grupo 1', NOW(), 2, 1);

