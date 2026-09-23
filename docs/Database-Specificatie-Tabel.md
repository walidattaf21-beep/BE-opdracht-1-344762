# Database Specificatie Tabel - Jamin magazijn

Alle tabellen hebben ook de systeemvelden:

| Veld | Datatype | NULL | Opmerking |
|---|---|---|---|
| IsActief | BIT | Nee | Standaard 1 |
| Opmerking | VARCHAR(250) | Ja | |
| DatumAangemaakt | DATETIME(6) | Nee | |
| DatumGewijzigd | DATETIME(6) | Nee | |

## Product

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| Naam | VARCHAR(100) | Nee | |
| Barcode | VARCHAR(20) | Nee | |

## Allergeen

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| Naam | VARCHAR(50) | Nee | |
| Omschrijving | VARCHAR(250) | Nee | |

## Leverancier

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| Naam | VARCHAR(100) | Nee | |
| ContactPersoon | VARCHAR(100) | Nee | |
| LeverancierNummer | VARCHAR(20) | Nee | |
| Mobiel | VARCHAR(15) | Nee | |

## Magazijn

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| ProductId | INT | Nee | FK -> Product.Id |
| VerpakkingsEenheidInKilogram | DECIMAL(5,2) | Nee | |
| AantalAanwezig | INT | Ja | |

## ProductPerAllergeen

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| ProductId | INT | Nee | FK -> Product.Id |
| AllergeenId | INT | Nee | FK -> Allergeen.Id |

## ProductPerLeverancier

| Veld | Datatype | NULL | Sleutel |
|---|---|---|---|
| Id | INT AUTO_INCREMENT | Nee | PK |
| LeverancierId | INT | Nee | FK -> Leverancier.Id |
| ProductId | INT | Nee | FK -> Product.Id |
| DatumLevering | DATE | Nee | |
| Aantal | INT | Nee | |
| DatumEerstVolgendeLevering | DATE | Ja | |
