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