# Mitt CMS-projekt (PHP + MVC)

Detta är ett egetutvecklat CMS (Content Management System) byggt i PHP med en enkel MVC-struktur (Model-View-Controller). Projektet är resultatet av en längre tids inlärning inom PHP och SQL, där jag nyligen tagit steget från teori till att faktiskt börja bygga fungerande applikationer.

## Syfte

Syftet med projektet är att visa mina kunskaper inom webbutveckling med fokus på:

- PHP och databashantering (MySQL)
- Grundläggande MVC-struktur
- CRUD-funktionalitet (Create, Read, Update, Delete)
- Struktur och separation av ansvar i kod

## Om inlärningen och AI-stöd

Under utvecklingen av detta CMS har jag använt AI (ChatGPT) som ett stöd i min inlärning, bland annat för att få hjälp med syntax, strukturförslag och felsökning. Alla kodexempel och lösningar som AI föreslagit har jag noggrant gått igenom, förstått och anpassat efter mina egna behov. Projektet speglar därför inte bara kod som fungerar, utan kod jag själv har lärt mig av och kan stå för.

## Funktioner

- Skapa, visa, redigera och ta bort artiklar
- Grundläggande dashboard
- Separata vyer, controllers och modeller
- Formulärvalidering och enkla användarflöden

## Teknikstack

- PHP 8+
- MySQL
- PDO (för databaskoppling)
- HTML/CSS (för layout och vyer)

---

## 🔧 Installation (med XAMPP)

### 1. Ladda ner och installera XAMPP

Gå till [https://www.apachefriends.org](https://www.apachefriends.org) och ladda ner XAMPP för ditt operativsystem. Installera programmet.

### 2. Starta Apache och MySQL

Öppna XAMPP Control Panel och starta **Apache** och **MySQL**.

### 3. Placera projektet i `htdocs`

Kopiera projektmappen till:

### 4. Skapa databasen

1. Gå till [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
2. Skapa en ny databas, till exempel: `dietcms`
3. Importera `database.sql` (om du har bifogat en SQL-fil med tabellstruktur och testdata)

### 5. Konfigurera databasuppkoppling

I projektets `includes/config.php`, uppdatera följande rader om det behövs:

```php
$host = 'localhost';
$dbname = 'dietcms'; // ditt databasnamn
$username = 'root';
$password = ''; // standard i XAMPP är tomt lösenord
