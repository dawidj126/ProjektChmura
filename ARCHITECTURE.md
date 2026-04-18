# Architektura techniczna — Aplikacja wynajmu mieszkań i pokoi

## Stack technologiczny

### Backend
| Warstwa | Technologia |
|---|---|
| Framework | Laravel 11 |
| PHP | 8.3+ |
| Baza danych | MySQL 8.0 |
| Autoryzacja API | Laravel Sanctum |
| Role i uprawnienia | spatie/laravel-permission |
| Upload plików | Laravel Storage |
| Generowanie PDF | barryvdh/laravel-dompdf |
| Walidacja | Laravel Form Requests |
| Email | Laravel Mail + Mailtrap (dev) |

### Frontend
| Warstwa | Technologia |
|---|---|
| Framework | Vue 3 (Composition API + `<script setup>`) |
| Build tool | Vite |
| Routing | Vue Router 4 |
| State management | Pinia |
| HTTP client | Axios |
| CSS framework | Tailwind CSS 3 |
| Formularze | VeeValidate + Yup |
| Powiadomienia | vue-toastification |
| SEO / meta | @vueuse/head |
| Daty | date-fns |
| Ikony | lucide-vue-next |

---

## Komunikacja Vue ↔ Laravel

- REST API pod `/api/v1/`
- Autoryzacja: Bearer Token (Sanctum)
- Token przechowywany w `localStorage`
- Axios interceptor dołącza token automatycznie
- CORS skonfigurowany dla domeny frontendu

---

## Role użytkowników

| Rola | Opis |
|---|---|
| `guest` | Niezalogowany — tylko publiczne zasoby |
| `user` | Zalogowany — ulubione, wiadomości, rezerwacje |
| `owner` | Właściciel — zarządza ofertami, umowami, płatnościami |
| `admin` | Administrator — pełny dostęp |

---

## Konwencje nazw

### Tabele (snake_case, liczba mnoga)
`users`, `user_profiles`, `properties`, `property_images`, `property_features`, `favorites`, `conversations`, `messages`, `property_viewings`, `blog_posts`, `blog_categories`, `blog_tags`, `pages`, `contact_messages`, `contracts`, `payments`, `notifications`, `activity_logs`, `settings`

### Modele (PascalCase, liczba pojedyncza)
`User`, `UserProfile`, `Property`, `PropertyImage`, `Favorite`, `Conversation`, `Message`, `PropertyViewing`, `BlogPost`, `BlogCategory`, `BlogTag`, `Page`, `ContactMessage`, `Contract`, `Payment`, `Notification`, `ActivityLog`, `Setting`

### Endpointy (kebab-case, liczba mnoga)
Prefiks: `/api/v1/`  
Przykłady: `/properties`, `/blog-posts`, `/property-viewings`, `/contact-messages`

### Komponenty Vue (PascalCase)
`BaseButton`, `BaseInput`, `PropertyCard`, `PropertyFilters`, `MessageThread` itd.

### Trasy Vue Router (kebab-case, po polsku)
`/oferty`, `/oferty/:slug`, `/auth/logowanie`, `/panel/dashboard`, `/wlasciciel/oferty`, `/admin/dashboard`

---

## Model danych — oferty

Jedna tabela `properties` z polem:
```
property_type: 'apartment' | 'room'
```

Pola specyficzne dla pokoju (nullable gdy apartment):
- `room_area` — metraż pokoju
- `apartment_area` — metraż całego mieszkania
- `roommates_count` — liczba współlokatorów
- `total_rooms_count` — liczba pokoi w mieszkaniu

---

## Struktura katalogów

### Backend (`/backend`)
```
app/
  Enums/
  Http/
    Controllers/Api/{Auth,Public,User,Owner,Shared,Admin}/
    Middleware/
    Requests/
    Resources/
  Models/
  Policies/
  Services/
database/
  migrations/
  seeders/
routes/
  api.php
storage/app/
  properties/
  contracts/
```

### Frontend (`/frontend`)
```
src/
  assets/
  components/{base,property,blog,auth,notifications,shared}/
  composables/
  layouts/
  router/{routes/}
  services/
  stores/
  utils/
  views/{public,auth,user,owner,admin}/
```

---

## Format odpowiedzi API

### Sukces
```json
{
  "success": true,
  "data": {},
  "message": "OK"
}
```

### Sukces z paginacją
```json
{
  "success": true,
  "data": [],
  "meta": {
    "current_page": 1,
    "last_page": 5,
    "per_page": 15,
    "total": 73
  }
}
```

### Błąd walidacji (422)
```json
{
  "success": false,
  "message": "Dane są nieprawidłowe.",
  "errors": {
    "email": ["Pole email jest wymagane."]
  }
}
```

### Błąd ogólny
```json
{
  "success": false,
  "message": "Nie masz uprawnień do tej akcji."
}
```

---

## Layouty

| Layout | Użycie |
|---|---|
| `PublicLayout` | Strona główna, lista ofert, blog, strony statyczne |
| `UserPanelLayout` | Panel użytkownika (sidebar + router-view) |
| `OwnerPanelLayout` | Panel właściciela (sidebar + router-view) |
| `AdminPanelLayout` | Panel admina (sidebar + topbar + router-view) |
