# 📰 Blog API

Prosty REST API dla modelu Post, stworzony w Laravelu. Obsługuje operacje CRUD: pobieranie, tworzenie, przeglądanie i usuwanie postów.

---

## 📦 Endpointy

### ✅ `GET /api/posts`

Pobiera listę wszystkich postów.

#### Response `200 OK`
```json
{
  "status": "success",
  "data": {
    "posts": [
      {
        "id": 1,
        "title": "Przykładowy post",
        "content": "Treść posta"
      }
    ]
  }
}
```

---

### ✍️ `POST /api/posts`

Tworzy nowy post.

#### Body (JSON)
```json
{
  "title": "Nowy post",
  "content": "Treść posta"
}
```

> Pola są walidowane przez `StorePostRequest`.

#### Response `201 Created`
```json
{
  "status": "success",
  "data": {
    "post": {
      "id": 1,
      "title": "Nowy post",
      "content": "Treść posta"
    }
  }
}
```

---

### 🔍 `GET /api/posts/{id}`

Pobiera post o podanym ID.

#### Response `200 OK`
```json
{
  "status": "success",
  "data": {
    "post": {
      "id": 1,
      "title": "Tytuł posta",
      "content": "Treść posta"
    }
  }
}
```

#### Response `404 Not Found`
```json
{
  "status": "failed",
  "message": "post not found"
}
```

---

### 🗑️ `DELETE /api/posts/{id}`

Usuwa post o podanym ID.

#### Response `200 OK`
```json
{
  "status": "success",
  "message": "post deleted succesfuly"
}
```

#### Response `404 Not Found`
```json
{
  "status": "failed",
  "message": "post not found"
}
```

---

### ✏️ `PUT /api/posts/{id}`

Endpoint do aktualizacji posta — **niezaimplementowany** w aktualnej wersji API.

---

## ⚙️ Statusy HTTP

| Kod | Znaczenie             |
|-----|------------------------|
| 200 | OK / Sukces            |
| 201 | Stworzono              |
| 404 | Nie znaleziono         |
| 422 | Błąd walidacji (z `StorePostRequest`) |

---

## 🧪 Przykłady curl

```bash
# Pobierz wszystkie posty
curl -X GET http://localhost:8000/api/posts

# Utwórz post
curl -X POST http://localhost:8000/api/posts \
  -H "Content-Type: application/json" \
  -d '{"title":"Test","content":"Treść"}'

# Pobierz konkretny post
curl -X GET http://localhost:8000/api/posts/1

# Usuń post
curl -X DELETE http://localhost:8000/api/posts/1
```

---

## 📁 Pliki źródłowe

- Kontroler: `app/Http/Controllers/PostController.php`
- Walidacja: `app/Http/Requests/StorePostRequest.php`
- Model: `app/Models/Post.php`

---

## 📌 Wymagania

- Laravel 10+
- PHP 8.1+
- SQLite / MySQL / inna obsługiwana baza danych

---

## 🔧 Uruchomienie projektu

```bash
git clone <repo-url>
cd blog-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

---

## 📚 Licencja

Projekt na potrzeby nauki – MIT License.
