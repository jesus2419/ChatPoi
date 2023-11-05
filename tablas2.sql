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
    ImagenBlop BLOB,

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
CREATE TABLE MiembrosGrupo (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    UsuarioID INT NOT NULL,
    GrupoID INT NOT NULL,
    FechaUnion DATETIME,
    FOREIGN KEY (UsuarioID) REFERENCES Usuarios(ID),
    FOREIGN KEY (GrupoID) REFERENCES Grupo(ID)
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


DELIMITER $$

CREATE PROCEDURE CrearGrupoConMiembro(
    IN p_Nombre VARCHAR(100),
    IN p_Descripcion VARCHAR(100),
    IN p_CreadorID INT
)
BEGIN
    DECLARE v_GrupoID INT;
    
    -- Insertar el grupo en la tabla Grupo
    INSERT INTO Grupo (Nombre, Descripcion, Fecha_creacion, Creador_ID)
    VALUES (p_Nombre, p_Descripcion, NOW(), p_CreadorID);
    
    -- Obtener el ID del grupo recién insertado
    SET v_GrupoID = LAST_INSERT_ID();
    
    -- Insertar al usuario creador como miembro del grupo en la tabla MiembrosGrupo
    INSERT INTO MiembrosGrupo (UsuarioID, GrupoID, FechaUnion)
    VALUES (p_CreadorID, v_GrupoID, NOW());
END $$

DELIMITER ;



DELIMITER ;
SELECT * FROM Usuarios WHERE Usuario = 'jesus';
select ID,
    Usuario,
    Contraseña,
    Nombre,
    Apellidos,
    Telefono,
    TipoUsuario,
    ImagenBlop from  Usuarios;
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


SELECT
    mg.ID AS MensajeID,
    mg.Contenido AS MensajeContenido,
    mg.FechaEnvio AS FechaEnvio,
    u.Usuario AS RemitenteUsuario,
    g.Nombre AS NombreGrupo
FROM Mensajes_grupo mg
JOIN Usuarios u ON mg.RemitenteID = u.ID
JOIN Grupo g ON mg.Grupo_ID = g.ID;


CALL CrearGrupoConMiembro('ezquizos', 'jaja', 1);


SELECT
    mg.ID AS MensajeID,
    mg.Contenido AS MensajeContenido,
    mg.FechaEnvio AS FechaEnvio,
    u.Usuario AS RemitenteUsuario,
    g.ID AS GrupoID,  -- Agregado: ID del grupo
    g.Nombre AS NombreGrupo
FROM Mensajes_grupo mg
JOIN Usuarios u ON mg.RemitenteID = u.ID
JOIN Grupo g ON mg.Grupo_ID = g.ID ; 

SELECT
    mg.ID AS MensajeID,
    mg.Contenido AS MensajeContenido,
    mg.FechaEnvio AS FechaEnvio,
    u.Usuario AS RemitenteUsuario,
    g.ID AS GrupoID,
    g.Nombre AS NombreGrupo
FROM Mensajes_grupo mg
JOIN Usuarios u ON mg.RemitenteID = u.ID
JOIN Grupo g ON mg.Grupo_ID = g.ID
WHERE g.ID = 1;  -- Filtra por el ID del grupo deseado


SELECT
    mg.ID AS MensajeID,
    mg.Contenido AS MensajeContenido,
    mg.FechaEnvio AS FechaEnvio,
    u.Usuario AS RemitenteUsuario,
    u.ID AS RemitenteID,
    g.ID AS GrupoID,
    g.Nombre AS NombreGrupo,
    CONCAT(
        TIMESTAMPDIFF(HOUR, mg.FechaEnvio, NOW()), ' horas ',
        MOD(TIMESTAMPDIFF(MINUTE, mg.FechaEnvio, NOW()), 60), ' minutos'
    ) AS DiferenciaTiempo
FROM Mensajes_grupo mg
JOIN Usuarios u ON mg.RemitenteID = u.ID
JOIN Grupo g ON mg.Grupo_ID = g.ID
WHERE g.ID = 1  ORDER BY FechaEnvio asc;  -- Filtra por el ID del grupo deseado




SELECT
    G.ID AS GrupoID,
    G.Nombre AS NombreGrupo,
    G.Descripcion AS DescripcionGrupo,
    G.Fecha_creacion AS FechaCreacion,
    G.Creador_ID AS CreadorID,
    U.Usuario AS NombreCreador,
    U.Nombre AS NombreMiembro,
    U.Apellidos AS ApellidosMiembro,
    U.Telefono AS TelefonoMiembro
FROM Grupo G
JOIN Usuarios U ON G.Creador_ID = U.ID
LEFT JOIN MiembrosGrupo MG ON G.ID = MG.GrupoID
LEFT JOIN Usuarios UM ON MG.UsuarioID = UM.ID;


SELECT mg.ID AS MensajeID, mg.Contenido AS MensajeContenido, mg.FechaEnvio AS FechaEnvio, u.Usuario AS RemitenteUsuario, u.ID AS RemitenteID, g.ID AS GrupoID, g.Nombre AS NombreGrupo, CONCAT( TIMESTAMPDIFF(HOUR, mg.FechaEnvio, NOW()), ' horas ', MOD(TIMESTAMPDIFF(MINUTE, mg.FechaEnvio, NOW()), 60), ' minutos' ) AS DiferenciaTiempo FROM Mensajes_grupo mg JOIN Usuarios u ON mg.RemitenteID = u.ID JOIN Grupo g ON mg.Grupo_ID = g.ID WHERE g.ID = 1 ORDER BY FechaEnvio asc

