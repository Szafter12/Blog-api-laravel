# 📰 Blog API

A simple REST API for the Post model, created in Laravel for practise. It supports CRUD operations

---

## 📦 Endpoints

### ✅ `GET /api/posts`

Retrieves a list of all posts.

#### Response `200 OK`
```json
{
  ‘status’: ‘success’,
  ‘data’: {
    ‘posts’: [
      {
        ‘id’: 1,
        ‘title’: ‘Sample post’,
        ‘content’: ‘Post content’
      }
    ]
  }
}
```

---

### ✍️ `POST /api/posts`

Creates a new post.

#### Body (JSON)
```json
{
  ‘title’: ‘New post’,
  ‘content’: ‘Post content’
}
```

> Fields are validated by `StorePostRequest`.

#### Response `201 Created`
```json
{
  ‘status’: ‘success’,
  ‘data’: {
    ‘post’: {
      ‘id’: 1,
      ‘title’: ‘New post’,
      ‘content’: ‘Post content’
    }
  }
}
```

---

### 🔍 `GET /api/posts/{id}`

Retrieves the post with the specified ID.

#### Response `200 OK`
```json
{
  ‘status’: ‘success’,
  ‘data’: {
    ‘post’: {
      ‘id’: 1,
      ‘title’: ‘Post title’,
      ‘content’: ‘Post content’
    }
  }
}
```

#### Response `404 Not Found`
```json
{
  ‘status’: ‘failed’,
  ‘message’: ‘post not found’
}
```

---

### 🗑️ `DELETE /api/posts/{id}`

Deletes the post with the specified ID.

#### Response `200 OK`
```json
{
  ‘status’: ‘success’,
  ‘message’: ‘post deleted successfully’
}
```

#### Response `404 Not Found`
```json
{
  ‘status’: ‘failed’,
  ‘message’: ‘post not found’
}
```

---

### ✏️ `PUT /api/posts/{id}`

Endpoint for updating a post — **not implemented** in the current version of the API.

---

## ⚙️ HTTP statuses

| Code | Meaning             |
|-----|----------------------- -|
| 200 | OK / Success            |
| 201 | Created              |
| 404 | Not found         |
| 422 | Validation error (from `StorePostRequest`) |

---

## 🧪 Curl examples

```bash
# Get all posts
curl -X GET http://localhost:8000/api/posts

# Create a post
curl -X POST http://localhost:8000/api/posts \
  -H ‘Content-Type: application/json’ \
  -d '{‘title’:‘Test’,“content”:‘Content’}'

# Get a specific post
curl -X GET http://localhost:8000/api/posts/1

# Delete a post
curl -X DELETE http://localhost:8000/api/posts/1
```

---

## 📁 Source files

- Controller: `app/Http/Controllers/PostController.php`
- Validation: `app/Http/Requests/StorePostRequest.php`
- Model: `app/Models/Post.php`

---

## 📌 Requirements

- Laravel 10+
- PHP 8.1+
- SQLite / MySQL / other supported database

---

## 🔧 Running the project

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
