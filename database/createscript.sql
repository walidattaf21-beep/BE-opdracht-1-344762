-- ***************************************************************
-- Createscript Jamin magazijn
-- Opdracht 1 - Realiseren userstories
-- ***************************************************************

CREATE DATABASE IF NOT EXISTS jamin;
USE jamin;

DROP TABLE IF EXISTS ProductPerLeverancier;
DROP TABLE IF EXISTS ProductPerAllergeen;
DROP TABLE IF EXISTS Magazijn;
DROP TABLE IF EXISTS Leverancier;
DROP TABLE IF EXISTS Allergeen;
DROP TABLE IF EXISTS Product;

-- Stamtabellen

CREATE TABLE Product (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(100) NOT NULL,
    Barcode VARCHAR(20) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Allergeen (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(50) NOT NULL,
    Omschrijving VARCHAR(250) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE Leverancier (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    Naam VARCHAR(100) NOT NULL,
    ContactPersoon VARCHAR(100) NOT NULL,
    LeverancierNummer VARCHAR(20) NOT NULL,
    Mobiel VARCHAR(15) NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL
) ENGINE=InnoDB;

-- Koppeltabellen

CREATE TABLE Magazijn (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    ProductId INT NOT NULL,
    VerpakkingsEenheidInKilogram DECIMAL(5,2) NOT NULL,
    AantalAanwezig INT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;

CREATE TABLE ProductPerAllergeen (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    ProductId INT NOT NULL,
    AllergeenId INT NOT NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    FOREIGN KEY (ProductId) REFERENCES Product(Id),
    FOREIGN KEY (AllergeenId) REFERENCES Allergeen(Id)
) ENGINE=InnoDB;

CREATE TABLE ProductPerLeverancier (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    LeverancierId INT NOT NULL,
    ProductId INT NOT NULL,
    DatumLevering DATE NOT NULL,
    Aantal INT NOT NULL,
    DatumEerstVolgendeLevering DATE NULL,
    IsActief BIT NOT NULL DEFAULT 1,
    Opmerking VARCHAR(250) NULL,
    DatumAangemaakt DATETIME(6) NOT NULL,
    DatumGewijzigd DATETIME(6) NOT NULL,
    FOREIGN KEY (LeverancierId) REFERENCES Leverancier(Id),
    FOREIGN KEY (ProductId) REFERENCES Product(Id)
) ENGINE=InnoDB;

-- ***************************************************************
-- Testdata
-- ***************************************************************

INSERT INTO Product (Naam, Barcode, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 ('Mintnopjes',     '8719587231278', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Schoolkrijt',    '8719587326713', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Honingdrop',     '8719587327836', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Zure Beren',     '8719587321441', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Cola Flesjes',   '8719587321237', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Turtles',        '8719587322245', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Witte Muizen',   '8719587328256', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Reuzen Slangen', '8719587325641', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Zoute Rijen',    '8719587322739', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Winegums',       '8719587327527', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Drop Munten',    '8719587322345', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Kruis Drop',     '8719587322265', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Zoute Ruitjes',  '8719587323256', 1, NULL, SYSDATE(6), SYSDATE(6));

INSERT INTO Allergeen (Naam, Omschrijving, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 ('Gluten',        'Dit product bevat gluten',          1, NULL, SYSDATE(6), SYSDATE(6))
,('Gelatine',      'Dit product bevat gelatine',        1, NULL, SYSDATE(6), SYSDATE(6))
,('AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Lactose',       'Dit product bevat lactose',         1, NULL, SYSDATE(6), SYSDATE(6))
,('Soja',          'Dit product bevat soja',            1, NULL, SYSDATE(6), SYSDATE(6));

INSERT INTO Leverancier (Naam, ContactPersoon, LeverancierNummer, Mobiel, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 ('Venco',       'Bert van Linge',     'L1029384719', '06-28493827', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Astra Sweets','Jasper del Monte',   'L1029284315', '06-39398734', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Haribo',      'Sven Stalman',       'L1029324748', '06-24383291', 1, NULL, SYSDATE(6), SYSDATE(6))
,('Basset',      'Joyce Stelterberg',  'L1023845773', '06-48293823', 1, NULL, SYSDATE(6), SYSDATE(6))
,('De Bron',     'Remco Veenstra',     'L1023857736', '06-34291234', 1, NULL, SYSDATE(6), SYSDATE(6));

INSERT INTO Magazijn (ProductId, VerpakkingsEenheidInKilogram, AantalAanwezig, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 (1,  5,   453,  1, NULL, SYSDATE(6), SYSDATE(6))
,(2,  2.5, 400,  1, NULL, SYSDATE(6), SYSDATE(6))
,(3,  5,   1,    1, NULL, SYSDATE(6), SYSDATE(6))
,(4,  1,   800,  1, NULL, SYSDATE(6), SYSDATE(6))
,(5,  3,   234,  1, NULL, SYSDATE(6), SYSDATE(6))
,(6,  2,   345,  1, NULL, SYSDATE(6), SYSDATE(6))
,(7,  1,   795,  1, NULL, SYSDATE(6), SYSDATE(6))
,(8,  10,  233,  1, NULL, SYSDATE(6), SYSDATE(6))
,(9,  2.5, 123,  1, NULL, SYSDATE(6), SYSDATE(6))
,(10, 3,   NULL, 1, NULL, SYSDATE(6), SYSDATE(6))
,(11, 2,   367,  1, NULL, SYSDATE(6), SYSDATE(6))
,(12, 1,   467,  1, NULL, SYSDATE(6), SYSDATE(6))
,(13, 5,   20,   1, NULL, SYSDATE(6), SYSDATE(6));

INSERT INTO ProductPerAllergeen (ProductId, AllergeenId, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 (1,  2, 1, NULL, SYSDATE(6), SYSDATE(6))
,(1,  1, 1, NULL, SYSDATE(6), SYSDATE(6))
,(1,  3, 1, NULL, SYSDATE(6), SYSDATE(6))
,(3,  4, 1, NULL, SYSDATE(6), SYSDATE(6))
,(6,  5, 1, NULL, SYSDATE(6), SYSDATE(6))
,(9,  2, 1, NULL, SYSDATE(6), SYSDATE(6))
,(9,  5, 1, NULL, SYSDATE(6), SYSDATE(6))
,(10, 2, 1, NULL, SYSDATE(6), SYSDATE(6))
,(12, 4, 1, NULL, SYSDATE(6), SYSDATE(6))
,(13, 1, 1, NULL, SYSDATE(6), SYSDATE(6))
,(13, 4, 1, NULL, SYSDATE(6), SYSDATE(6))
,(13, 5, 1, NULL, SYSDATE(6), SYSDATE(6));

INSERT INTO ProductPerLeverancier (LeverancierId, ProductId, DatumLevering, Aantal, DatumEerstVolgendeLevering, IsActief, Opmerking, DatumAangemaakt, DatumGewijzigd) VALUES
 (1, 1,  '2024-10-09', 23, '2024-10-16', 1, NULL, SYSDATE(6), SYSDATE(6))
,(1, 1,  '2024-10-18', 21, '2024-10-25', 1, NULL, SYSDATE(6), SYSDATE(6))
,(1, 2,  '2024-10-09', 12, '2024-10-16', 1, NULL, SYSDATE(6), SYSDATE(6))
,(1, 3,  '2024-10-10', 11, '2024-10-17', 1, NULL, SYSDATE(6), SYSDATE(6))
,(2, 4,  '2024-10-14', 16, '2024-10-21', 1, NULL, SYSDATE(6), SYSDATE(6))
,(2, 4,  '2024-10-21', 23, '2024-10-28', 1, NULL, SYSDATE(6), SYSDATE(6))
,(2, 5,  '2024-10-14', 45, '2024-10-21', 1, NULL, SYSDATE(6), SYSDATE(6))
,(2, 6,  '2024-10-14', 30, '2024-10-21', 1, NULL, SYSDATE(6), SYSDATE(6))
,(3, 7,  '2024-10-12', 12, '2024-10-19', 1, NULL, SYSDATE(6), SYSDATE(6))
,(3, 7,  '2024-10-19', 23, '2024-10-26', 1, NULL, SYSDATE(6), SYSDATE(6))
,(3, 8,  '2024-10-10', 12, '2024-10-17', 1, NULL, SYSDATE(6), SYSDATE(6))
,(3, 9,  '2024-10-11', 1,  '2024-10-18', 1, NULL, SYSDATE(6), SYSDATE(6))
,(4, 10, '2024-10-16', 24, '2024-10-30', 1, NULL, SYSDATE(6), SYSDATE(6))
,(5, 11, '2024-10-10', 47, '2024-10-17', 1, NULL, SYSDATE(6), SYSDATE(6))
,(5, 11, '2024-10-19', 60, '2024-10-26', 1, NULL, SYSDATE(6), SYSDATE(6))
,(5, 12, '2024-10-11', 45, NULL,         1, NULL, SYSDATE(6), SYSDATE(6))
,(5, 13, '2024-10-12', 23, NULL,         1, NULL, SYSDATE(6), SYSDATE(6));
