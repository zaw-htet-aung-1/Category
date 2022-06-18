## Command

- php artisan serve
- php artisan serve --port=3000
- php artisan --version
- php artisan make:controller PostController
- php artisan make:migration create_post_table
- php artisan migrate
- php artisan migrate:rollback
- php artisan migrate:refresh
- php artisan make:model Post
- php artisan make:model Post --migration
- php artisan make:model Post -m
- php artisan route:list
- php artisan make:request PostRequest

## Auth

- Auth::attempt()
- Auth::check()
- Auth::user()
- Auth::id()
- Auth::logout()

## Learning

- Route
- View
- View (Passing data to view)
- blade
- blade (Escapse html)
- Controller
- Model
- Migration
- CRUD
- Route (RESTful)
- Validation (Rule, Messasge, Request)

## Homework

```
Category CRUD -> route, controller, model, migration, validation, view

# DB Table Design
categories
- id (bigint, auto increment)
- name (string)
- created_at (timestamp)
- updated_at (timestamp)
```