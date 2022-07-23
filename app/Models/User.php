<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function myPosts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
    public function image()
    {
        return $this->hasone(ProfileImage::class, 'user_id', 'id');
    }

    public function latestPosts()
    {
        return $this->myPosts()->orderBy('id', 'desc')->paginate();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function photo()
    {
        if($this->image) {
            return Storage::url($this->image->path);
        }
        return url('/images/avatar.png');
    }
}
