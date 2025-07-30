# Blog API

This is a simple Blog API built with Laravel for practise, providing endpoints to manage blog posts. The API allows you to perform CRUD (Create, Read, Update, Delete) operations on blog posts.

## API Documentation

Below is the documentation for the available API endpoints.

### Base URL
All endpoints are prefixed with `/api`.

### Endpoints

#### 1. Get All Posts
- **Method**: `GET`
- **Endpoint**: `/api/posts`
- **Controller**: `PostController@index`
- **Description**: Retrieves a list of all blog posts.
- **Response**:
  - **Status Code**: `200 OK`
  - **Body**:
    ```json
    {
        "status": "success",
        "data": {
            "posts": [
                {
                    "id": 1,
                    "title": "Post Title",
                    "content": "Post Content",
                    "created_at": "2025-07-30T16:02:00.000000Z",
                    "updated_at": "2025-07-30T16:02:00.000000Z"
                },
                ...
            ]
        }
    }
    ```

#### 2. Create a Post
- **Method**: `POST`
- **Endpoint**: `/api/posts`
- **Controller**: `PostController@store`
- **Description**: Creates a new blog post.
- **Request Body**:
  ```json
  {
      "title": "New Post Title",
      "content": "New Post Content"
  }
  ```
- **Response**:
  - **Status Code**: `201 Created`
  - **Body**:
    ```json
    {
        "status": "success",
        "data": {
            "post": {
                "id": 1,
                "title": "New Post Title",
                "content": "New Post Content",
                "created_at": "2025-07-30T16:02:00.000000Z",
                "updated_at": "2025-07-30T16:02:00.000000Z"
            }
        }
    }
    ```

#### 3. Get a Specific Post
- **Method**: `GET`
- **Endpoint**: `/api/posts/{post}`
- **Controller**: `PostController@show`
- **Description**: Retrieves a specific blog post by its ID.
- **Parameters**:
  - `post`: The ID of the post (e.g., `/api/posts/1`).
- **Response**:
  - **Status Code**: `200 OK`
  - **Body**:
    ```json
    {
        "status": "success",
        "data": {
            "post": {
                "id": 1,
                "title": "Post Title",
                "content": "Post Content",
                "created_at": "2025-07-30T16:02:00.000000Z",
                "updated_at": "2025-07-30T16:02:00.000000Z"
            }
        }
    }
    ```
  - **Error Response** (if post not found):
    - **Status Code**: `404 Not Found`
    - **Body**:
      ```json
      {
          "status": "failed",
          "message": "post not found"
      }
      ```

#### 4. Update a Post
- **Method**: `PUT` or `PATCH`
- **Endpoint**: `/api/posts/{post}`
- **Controller**: `PostController@update`
- **Description**: Updates an existing blog post by its ID.
- **Parameters**:
  - `post`: The ID of the post (e.g., `/api/posts/1`).
- **Request Body**:
  ```json
  {
      "title": "Updated Post Title",
      "content": "Updated Post Content"
  }
  ```
- **Response**:
  - **Status Code**: `200 OK`
  - **Body**:
    ```json
    {
        "status": "success",
        "data": {
            "post": {
                "id": 1,
                "title": "Updated Post Title",
                "content": "Updated Post Content",
                "created_at": "2025-07-30T16:02:00.000000Z",
                "updated_at": "2025-07-30T16:03:00.000000Z"
            }
        }
    }
    ```
  - **Error Response** (if post not found):
    - **Status Code**: `404 Not Found`
    - **Body**:
      ```json
      {
          "status": "failed",
          "message": "post not found"
      }
      ```

#### 5. Delete a Post
- **Method**: `DELETE`
- **Endpoint**: `/api/posts/{post}`
- **Controller**: `PostController@destroy`
- **Description**: Deletes a specific blog post by its ID.
- **Parameters**:
  - `post`: The ID of the post (e.g., `/api/posts/1`).
- **Response**:
  - **Status Code**: `200 OK`
  - **Body**:
    ```json
    {
        "status": "success",
        "message": "post deleted succesfuly"
    }
    ```
  - **Error Response** (if post not found):
    - **Status Code**: `404 Not Found`
    - **Body**:
      ```json
      {
          "status": "failed",
          "message": "post not found"
      }
      ```

## Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd blog-api
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Set Up Environment**:
   - Copy the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update the `.env` file with your database credentials and other configurations.

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

7. **Test the API**:
   - Use tools like Postman or cURL to test the API endpoints.
   - Ensure the `Accept` header is set to `application/json` for all requests.

## Validation
The `StorePostRequest` class handles validation for the `store` and `update` methods. Ensure the request body includes:
- `title`: Required, string.
- `content`: Required, string.

Example validation rules (assumed in `StorePostRequest`):
```php
public function rules()
{
    return [
        'title' => 'required|string',
        'content' => 'required|string',
    ];
}
```

## Notes
- The API assumes a `Post` model with `id`, `title`, `content`, `created_at`, and `updated_at` fields.
- Ensure your database is properly configured to avoid connection errors.
- The API returns JSON responses with a consistent structure: `{ "status": "success|failed", "data": {...} }` or `{ "status": "failed", "message": "error message" }`.
