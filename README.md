# Festibusje 🎉🚌  
Een Laravel-applicatie waarmee gebruikers busreizen naar festivals kunnen boeken met behulp van een puntensysteem.

## Inhoud
- [Installatie](#installatie)
- [Inloggen](#inloggen)
- [Gebruik](#gebruik)
- [Ontwikkelmodus starten (met styling)](#ontwikkelmodus-starten-met-styling)
- [Features](#features)
- [Bekende beperkingen](#bekende-beperkingen)

---

## Installatie

1. Clone de repository:
   ```bash
   git clone https://github.com/Cmoonie/Laravel2.git
   cd festibusje
   
composer install
npm install
cp .env.example .env
php artisan key:generate
cp .env.example .env
php artisan key:generate

Inloggen
Admin inloggegevens

E-mail: Cecilia@windesheim.nl

Wachtwoord: Cecilia

Gebruik
Registreer als nieuwe gebruiker om automatisch 50 punten te ontvangen.

Elke festivalboeking kost 10 punten.

Na het boeken krijg je 2 punten terug per festival.

Beheerders kunnen festivals toevoegen of verwijderen via het admin-dashboard.

Ontwikkelmodus starten (met styling)
Vanwege een timeout-probleem (300 seconden), moet je de server en styling afzonderlijk starten in twee terminals:

Terminal 1:
php artisan serve
Terminal 2:
composer run dev

Zo blijft Vite actief en zie je de correcte TailwindCSS-styling in de browser.


Features
- Puntensysteem voor boekingen

- Gebruiker en admin-rollen

- Admin kan festivals CRUD-en

- Gebruiker ziet eigen puntensaldo en boekingen

- Volledige Laravel-authenticatie

- Responsief ontwerp met TailwindCSS

Bekende beperkingen
De Vite dev-server sluit automatisch na 5 minuten als je composer run dev in een enkele terminal gebruikt.

Profielpagina (bewerken/verwijderen) is bewust buiten scope gehouden.

Festivalprijzen zijn statisch (10 punten); dit is niet per festival instelbaar.
