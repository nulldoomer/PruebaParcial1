CREATE TABLE Recetas (
    receta_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    descripcion TEXT,
    tiempo_preparacion INT,
    dificultad ENUM('Facil', 'Intermedia', 'Dificil') NOT NULL
);

CREATE TABLE Ingredientes (
    ingrediente_id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(255) NOT NULL,
    cantidad DECIMAL(10, 2),
    unidad VARCHAR(50),
    calorias INT
);

CREATE TABLE Receta_Ingrediente (
    receta_id INT,
    ingrediente_id INT,
    cantidad DECIMAL(10, 2),
    unidad VARCHAR(50),
    PRIMARY KEY (receta_id, ingrediente_id),
    FOREIGN KEY (receta_id) REFERENCES Recetas(receta_id) ON DELETE CASCADE,
    FOREIGN KEY (ingrediente_id) REFERENCES Ingredientes(ingrediente_id) ON DELETE CASCADE
);
