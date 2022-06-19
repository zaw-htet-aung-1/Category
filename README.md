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
- Auth::login($user)
- Auth::loginUsingId(4)
- Auth::check()
- Auth::user()
- Auth::id()
- Auth::logout()

## Request

- $request->all()
- $request->only()
- $request->except()

## Carbon

- $post->created_at->format('M d, Y') 
- $post->created_at->toDateString() 
- $post->created_at->toDateTimeString() 
- $post->created_at->toFormattedDateString() 
- $post->created_at->diffForHumans()

## Route

- CRUD Method (get, post, put, patch, delete)
- redirect
- view
- where (regular expression)
- middleware
- name route

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
Login, Register - Validate and show old value
change logout method get to post
```