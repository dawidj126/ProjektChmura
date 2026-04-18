# Projekt bazy danych

## Kolejność migracji Laravel

```
001_create_users_table
002_create_user_profiles_table
003_create_properties_table
004_create_property_images_table
005_create_property_features_table
006_create_favorites_table
007_create_conversations_table
008_create_messages_table
009_create_property_viewings_table
010_create_blog_categories_table
011_create_blog_tags_table
012_create_blog_posts_table
013_create_blog_post_tag_table
014_create_pages_table
015_create_contact_messages_table
016_create_contracts_table
017_create_payments_table
018_create_notifications_table
019_create_activity_logs_table
020_create_settings_table
```

*(+ migracje Laravel wbudowane: password_reset_tokens, sessions, cache, jobs)*
*(+ migracje spatie/laravel-permission: roles, permissions, model_has_roles, model_has_permissions, role_has_permissions)*

---

## Enumy

| Enum | Wartości |
|---|---|
| PropertyType | `apartment`, `room` |
| PropertyStatus | `draft`, `pending`, `published`, `rejected`, `archived` |
| FurnishingType | `furnished`, `partially_furnished`, `unfurnished` |
| RentalPeriod | `minimum_1_month`, `minimum_3_months`, `minimum_6_months`, `minimum_12_months`, `indefinite` |
| ViewingStatus | `pending`, `accepted`, `rejected`, `cancelled`, `completed` |
| PaymentStatus | `pending`, `paid`, `failed`, `cancelled` |
| PaymentType | `rent`, `deposit`, `extra_fee` |
| ContactMessageStatus | `new`, `in_progress`, `closed` |
| BlogPostStatus | `draft`, `published` |
| PageStatus | `draft`, `published` |
| ContractStatus | `draft`, `generated`, `signed` |

---

## Tabele — skrót pól

### users
`id, name, email, email_verified_at, password, phone, is_active, remember_token, timestamps, deleted_at`

### user_profiles
`id, user_id(FK), avatar, bio, city, voivodeship, date_of_birth, timestamps`

### properties
`id, user_id(FK), property_type, status, title, slug, short_description, description,`
`voivodeship, city, district, street, postal_code, latitude, longitude,`
`area, rooms_count, bathrooms_count, floor, total_floors, furnishing, year_built, parking, elevator, balcony,`
`room_area*, apartment_area*, roommates_count*, total_rooms_count*,`
`price, admin_fee, deposit, additional_costs,`
`rental_period, available_from, min_rental_months,`
`pets_allowed, smoking_allowed, students_allowed, only_women, only_men,`
`rules, notes, main_image_id(FK),`
`meta_title, meta_description, views_count, favorites_count, published_at, rejected_reason,`
`timestamps, deleted_at`

*(\* pola nullable specyficzne dla pokoju)*

### property_images
`id, property_id(FK), path, filename, order, is_main, timestamps`

### property_features
`id, property_id(FK), feature, created_at`

### favorites
`id, user_id(FK), property_id(FK), created_at`

### conversations
`id, property_id(FK), user_id(FK), owner_id(FK), last_message_at, timestamps`

### messages
`id, conversation_id(FK), sender_id(FK), body, is_read, read_at, timestamps`

### property_viewings
`id, property_id(FK), user_id(FK), owner_id(FK), proposed_at, status, note, owner_note, timestamps`

### blog_categories
`id, name, slug, description, timestamps`

### blog_tags
`id, name, slug, created_at`

### blog_posts
`id, user_id(FK), category_id(FK), title, slug, excerpt, content, cover_image, status, meta_title, meta_description, published_at, timestamps`

### blog_post_tag (pivot)
`blog_post_id(FK), blog_tag_id(FK)`

### pages
`id, title, slug, content, meta_title, meta_description, status, timestamps`

### contact_messages
`id, user_id(FK nullable), name, email, subject, body, status, admin_note, ip_address, timestamps`

### contracts
`id, property_id(FK), owner_id(FK), tenant_id(FK), status,`
`owner_name, owner_address, owner_id_number, tenant_name, tenant_address, tenant_id_number,`
`property_address, property_type, rental_price, deposit_amount, admin_fee,`
`start_date, end_date, rental_months, conditions, pdf_path, generated_at, timestamps`

### payments
`id, property_id(FK), owner_id(FK), tenant_id(FK), contract_id(FK nullable), type, status, amount, description, due_date, paid_at, timestamps`

### notifications
`id, user_id(FK), type, title, body, data(JSON), is_read, read_at, created_at`

### activity_logs
`id, user_id(FK nullable), action, description, subject_type, subject_id, ip_address, user_agent, created_at`

### settings
`id, key, value, group, timestamps`

---

## Relacje

| Model | Typ | Cel |
|---|---|---|
| User | hasOne | UserProfile |
| User | hasMany | Property (oferty jako właściciel) |
| User | hasMany | Favorite |
| User | hasMany | Conversation (as user) |
| User | hasMany | Conversation (as owner) |
| User | hasMany | Message (as sender) |
| User | hasMany | PropertyViewing (as user) |
| User | hasMany | PropertyViewing (as owner) |
| User | hasMany | BlogPost (as author) |
| User | hasMany | Contract (as owner) |
| User | hasMany | Contract (as tenant) |
| User | hasMany | Payment (as owner) |
| User | hasMany | Payment (as tenant) |
| User | hasMany | Notification |
| Property | belongsTo | User (właściciel) |
| Property | hasMany | PropertyImage |
| Property | hasMany | PropertyFeature |
| Property | hasMany | Favorite |
| Property | hasMany | Conversation |
| Property | hasMany | PropertyViewing |
| Property | hasMany | Contract |
| Property | hasMany | Payment |
| Property | belongsTo | PropertyImage (main_image) |
| Conversation | hasMany | Message |
| Conversation | belongsTo | Property |
| Conversation | belongsTo | User (user) |
| Conversation | belongsTo | User (owner) |
| BlogPost | belongsTo | BlogCategory |
| BlogPost | belongsToMany | BlogTag |
| BlogPost | belongsTo | User |
| Contract | hasMany | Payment |
| Contract | belongsTo | Property |
| Contract | belongsTo | User (owner) |
| Contract | belongsTo | User (tenant) |
