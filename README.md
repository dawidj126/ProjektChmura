# NajmujMieszkanie — Aplikacja do wynajmu mieszkań i pokoi

Webowa aplikacja do wynajmu mieszkań i pokoi w Polsce. Projekt zaliczeniowy.

---

## Stack technologiczny

- **Frontend:** Vue 3 (Composition API, Vite, Pinia, Vue Router 4, Tailwind CSS, Axios, VeeValidate)
- **Backend:** Laravel 11 (PHP 8.3+, MySQL 8.0, Sanctum, spatie/laravel-permission, dompdf)
- **Komunikacja:** REST API (`/api/v1/`) z Bearer Token (Sanctum)
- **Baza danych:** MySQL 8.0

---

## Funkcjonalności

- Przeglądanie i filtrowanie ofert mieszkań i pokoi
- Rejestracja, logowanie, zarządzanie profilem
- Role: gość, użytkownik, właściciel, administrator
- Panel użytkownika: ulubione, rezerwacje oglądania, wiadomości
- Panel właściciela: zarządzanie ofertami, zdjęciami, wiadomościami, umowami, płatnościami
- Panel administratora: moderacja ofert, zarządzanie użytkownikami, blog, strony statyczne
- Blog z kategoriami i tagami
- Strony statyczne: O nas, Jak to działa, Kontakt, FAQ, Regulamin, Polityka prywatności
- Generowanie umów PDF
- Demonstracyjne płatności (bez integracji z operatorem)
- System powiadomień w aplikacji
- Podstawowe SEO (meta tagi, sitemap, Open Graph)

---

## Struktura projektu

```
ProjektZaliczeniowy/
├── backend/          # Laravel 11 API
├── frontend/         # Vue 3 SPA
├── ARCHITECTURE.md   # Dokumentacja architektury technicznej
└── README.md
```

---

## Uruchomienie projektu

### Backend

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Backend dostępny pod: `http://localhost:8000`

### Frontend

```bash
cd frontend
npm install
cp .env.example .env
npm run dev
```

Frontend dostępny pod: `http://localhost:5173`

---

## Zmienne środowiskowe

### Backend (`backend/.env`)
```env
APP_NAME=NajmujMieszkanie
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=najmuj_mieszkanie
DB_USERNAME=root
DB_PASSWORD=
FRONTEND_URL=http://localhost:5173
SANCTUM_STATEFUL_DOMAINS=localhost:5173
```

### Frontend (`frontend/.env`)
```env
VITE_API_URL=http://localhost:8000/api/v1
VITE_APP_NAME=NajmujMieszkanie
VITE_APP_URL=http://localhost:5173
```

---

## Konta domyślne (po seedowaniu)

| Rola | Email | Hasło |
|---|---|---|
| Administrator | admin@example.com | password |
| Właściciel | owner@example.com | password |
| Użytkownik | user@example.com | password |

---

## Realizacja kroków

| Krok | Nazwa | Status |
|---|---|---|
| 1 | Architektura techniczna | ✅ Zakończony |
| 2 | Projekt bazy danych | ✅ Zakończony |
| 3 | Inicjalizacja backendu Laravel | ✅ Zakończony |
| 4 | Inicjalizacja frontendu Vue | ⏳ Następny |
| 5 | Autoryzacja i konta użytkowników | — |
| 6 | Role i uprawnienia | — |
| 7 | Model i API ofert | — |
| 8 | Formularz dodawania/edycji oferty | — |
| 9 | Upload i galeria zdjęć | — |
| 10 | Publiczna lista ofert | — |
| 11 | Zaawansowana wyszukiwarka | — |
| 12 | Szczegóły oferty | — |
| 13 | Ulubione | — |
| 14 | Wiadomości użytkownik ↔ właściciel | — |
| 15 | Kontakt użytkownik ↔ administrator | — |
| 16 | Rezerwacja oglądania | — |
| 17 | Panel użytkownika | — |
| 18 | Panel właściciela | — |
| 19 | Panel administratora | — |
| 20 | Blog | — |
| 21 | Strony statyczne i prosty CMS | — |
| 22 | Generowanie umów PDF | — |
| 23 | Sztuczne płatności | — |
| 24 | Powiadomienia | — |
| 25 | SEO | — |
| 26 | Bezpieczeństwo | — |

---

## Prompt wykonawczy projektu

Projekt jest realizowany krokami według poniższego schematu pracy:

### Zasady pracy
- W każdej odpowiedzi realizowany jest jeden kolejny etap lub podetap
- Każdy etap jest rozpisany praktycznie
- Jeżeli etap jest zbyt duży, dzielony jest na podetapy
- Zachowywane jest spójne nazewnictwo tabel, modeli, endpointów, komponentów i widoków
- Stosowana jest jedna główna encja ofert (`properties`) z polem `property_type = apartment | room`

### Format każdego kroku
1. Nazwa kroku
2. Cel kroku
3. Zakres prac
4. Backend
5. Frontend
6. Modele / tabele / relacje
7. Endpointy API
8. Widoki / komponenty Vue
9. Kod lub struktura plików
10. Wynik po zakończeniu kroku
11. Następny krok

### Założenia projektu
- Aplikacja działa tylko dla Polski
- Oferty dotyczą mieszkań i pokoi
- Brak obsługi firm
- Logowanie, rejestracja i role (gość, użytkownik, właściciel, administrator)
- Właściciel może dodawać, edytować i publikować oferty
- Użytkownik może: przeglądać i filtrować oferty, dodawać do ulubionych, pisać do właściciela, rezerwować termin oglądania
- Panel właściciela i panel administratora
- Blog i strony statyczne (O nas, Jak to działa, Kontakt, FAQ, Regulamin, Polityka prywatności)
- Formularz kontaktu do administratora
- Generowanie umów PDF (bez podpisu elektronicznego)
- Demonstracyjne płatności (bez integracji z operatorem płatności)
- Brak funkcji AI, brak funkcji premium, brak scoringu kandydatów
- Brak raportu rentowności, brak checklist odbioru
- Brak integracji z zewnętrznymi portalami

---

## Dokumentacja

- [ARCHITECTURE.md](ARCHITECTURE.md) — Szczegółowa dokumentacja architektury technicznej
- [docs/DATABASE.md](docs/DATABASE.md) — Projekt bazy danych (tabele, pola, relacje, indeksy)
- [docs/ENUMS.md](docs/ENUMS.md) — Definicje wszystkich enumów PHP

---

## Informacja o użyciu LLM (Claude AI)

Projekt realizowany jest przy wsparciu modelu **Claude Sonnet 4.6** (Anthropic) w ramach Claude Code CLI.

### Zakres kodu generowanego przez LLM

Cały projekt — architektura, kod backendu (Laravel), kod frontendu (Vue 3), migracje, modele, kontrolery, serwisy, komponenty — jest **generowany przez LLM** (Claude Sonnet 4.6) na podstawie szczegółowego promptu wykonawczego dostarczonego przez studenta.

### Fragments wygenerowane przez LLM

| Plik / katalog | Opis |
|---|---|
| `ARCHITECTURE.md` | Architektura techniczna projektu |
| `docs/DATABASE.md` | Schemat bazy danych |
| `docs/ENUMS.md` | Enumy PHP |
| `backend/app/Enums/` | Wszystkie enumy (9 plików) |
| `backend/app/Models/` | Wszystkie modele Eloquent (17 plików) |
| `backend/app/Http/Controllers/` | Wszystkie kontrolery API |
| `backend/app/Services/` | Serwisy (PDF, Powiadomienia, Logi) |
| `backend/database/migrations/` | Wszystkie migracje (20 tabel) |
| `backend/database/seeders/` | Seedery ról, użytkowników, stron, ustawień |
| `backend/routes/api.php` | Pełna mapa tras REST API (65 tras) |
| `frontend/` | Cały frontend Vue 3 (w trakcie realizacji) |

### Modyfikacje wygenerowanych treści

- Konfiguracja `.env` — wartości `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` uzupełniają dane lokalne
- Klucz aplikacji (`APP_KEY`) generowany przez `php artisan key:generate`
- Dane dostępowe do Mailtrap wypełniane ręcznie w środowisku deweloperskim

### Kontekst rozmowy z LLM

Rozmowy prowadzone są w narzędziu Claude Code (CLI) i można je śledzić przez historię commitów w tym repozytorium — każdy commit odpowiada jednemu krokowi z promptu wykonawczego.
