## Command

- php artisan serve
- php artisan serve --port=3000
- php artisan --version
- php artisan make:controller PostController
- php artisan make:migration create_post_table
- php artisan migrate
- php artisan migrate:rollback
- php artisan migrate:reset
- php artisan migrate:refresh
- php artisan migrate:fresh
- php artisan make:model Post
- php artisan make:model Post --migration
- php artisan make:model Post -m
- php artisan route:list
- php artisan make:request PostRequest
- php artisan make:factory PostFactory
- php artisan tinker
- Post::factory()->create() // create a post
- Post::factory()->count(10)->create() // create 10 post
- Post::factory(10)->create() // create 10 post
- php artisan db:seed --class=PostSeeder
- php artisan db:seed
- php artisan migrate:fresh --seed
- php artisan make:migration add_user_id_to_posts_table --table=posts
- php artisan make:controller API\CategoryController --api

## Model
- Post::all()
- Post::where('title', '=', 'PHP')->get() == Post::where('title', 'PHP')->get()
- Post::where('title', 'like', '%PHP%')->get()
- Post::find(1) == Post::where('id', 1)->first()
- Post::where('titel', 'Your title')->update(['title' => 'My title']);
- Post::where('id', 1)->delete();
- Post::whereIn('id', [1, 2, 3])->delete();
- Post::query()->delete()
- Post::truncate()


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
- Tinker
- Factory
- Seeder

# HTTP Status Code

```
200 - Success
201 - Created
301,302 - Redirect
400 - General Clint Error
401 - Unauthorized (check login or not)
403 - Forbidden (login && permission)
404 - Page Not Found
422 - Validation Error
500 - Server Error 

more detail -> https://developer.mozilla.org/en-US/docs/Web/HTTP/Status
```

## Homework

```
RESTful API (CRUD)
# products
- id
- name (string)
- price (int)
- created_at
- updated_at


## Response format
- Get all products
[
    {
        "id": "x",
        "name": "x",
        "price": "1,500",
        "created_at"
    },
    ...
]
```