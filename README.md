<a id="readme-top"></a>

[![LinkedIn][linkedin-shield]][linkedin-url]
[![Laravel][Laravel.com]][Laravel-url]


<br />
<div align="center">

   <img src="public\header-bf.jpg" alt="Logo" width="160" height="80">

  <h3 align="center">🎃 Black Yellow Friday 🎃</h3>

  <p align="center">
    Questo progetto è una piattaforma di e-commerce basata su Laravel progettata per mostrare e gestire prodotti con categorie, sconti e recensioni. Il sito offre un robusto backend basato su Laravel, Filament per le interfacce di amministrazione e Laravel Scout per le funzionalità di ricerca.
</div>


## 📃 Come funziona il sito

[![Mockup][product-screenshot]]()
<img src="public\mockup.png" alt="Logo" width="800" height="800">

1. **Home Page**:
    - 📷 Visualizza categorie e prodotti.
    - 🔎 Barra di ricerca globale per prodotti con tecnologia Laravel Scout.

2. **Pannello di amministrazione**:
    - 🗃️​ Gestito con Filament, consente operazioni CRUD per prodotti, categorie e utenti.

3. **Funzionalità utente**:
    - 🔏​ Funzionalità di registrazione/accesso (Laravel Fortify).
    - 🖋️​ Aggiungi recensioni di prodotti con valutazioni e immagini del profilo facoltative.
    - 💸​ Visualizza prodotti con sconti applicati.

4. **Ricerca**:
   - 🔎 Ricerca full-text per prodotti tramite TNTSearch.

<p align="right">(<a href="#readme-top">back to top</a>)</p>


## ⚙️ Tecnologie

### Backend
- **PHP**: ^8.2
- **Laravel Framework**: ^11.31
- **Laravel Fortify**: ^1.25 (Autenticazione)
- **Laravel Scout**: ^10.11 (Ricerca)
- **Team TNT Laravel Scout TNTSearch Driver**: ^14.0 (Ricerca)
- **Filament**: ^3.2 (Pannello di amministrazione)

### Frontend
- **Tailwind CSS**: Usato per lo stile.
- **Node.js and NPM**: Per la gestione degli strumenti di creazione del frontend.

---

## Installazione

### Prerequisiti
- **PHP**: >= 8.2
- **Composer**: >= 2.x
- **Node.js**: >= 16.x
- **Database**: MySQL (o un database compatibile)

---

### Guida

1. **Clona il Repository**:
   ```bash
   git clone <repository-url>
   cd Black-Yellow-Friday
   ```

2. **Installa le dipendeze**:
   ```bash
   composer install
   ```

3. **Installa le dipendenze Node.js**:
   ```bash
   npm install
   ```

4. **Configurazione Environment**:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Aggiornare le credenziali del database e altre configurazioni nel file `.env`.

5. **Genera la chiave dell' applicazione**:
   ```bash
   php artisan key:generate
   ```

6. **Lancia le migrazioni al Database**:
   ```bash
   php artisan migrate
   ```

7. **Lancia i Seed**:
   Usa i Seed per popolare il database velocemente con dati di esempio:
   ```bash
   php artisan db:seed
   ```

8. **Building degli assets**:
   ```bash
   npm run dev
   ```

9. **Lancia il server**:
   ```bash
   php artisan serve
   ```

---

## Utilizzo

- **Pannello di amministrazione**:
Accedi al pannello di amministrazione tramite `/admin` e accedi con le credenziali di amministratore.

I seed creano un utente Admin, usa root@mail.com:SuperSecret1! per accedere come Admin e assegnare il ruolo di Admin ad altri utenti.

- **Funzionalità di ricerca**:
Utilizza la barra di ricerca globale per trovare prodotti.

- **Recensioni**:
Lascia le recensioni ai prodotti dopo esserti registrato ed aver effettuato l' accesso.



[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://www.linkedin.com/in/nicolamazzaferroweb/
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com