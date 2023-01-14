<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    //relation
    
    /**
     * @return belongsTo
     */
    
     public function post()
     {
        return $this->belongsTo('App\Models\Post','auth_id');   
     }
     
     /**
      * @return belongsTo
      */
      public function comment(){
        return $this->belongsTo(Comment::class);
      }

       /**
      * @return belongsTo
      */
      public function comment_replies(){
        return $this->belongsTo(CommentReplies::class);
      }

       /**
      * @return belongsTo
      */
      public function share(){
        return $this->belongsTo(Share::class);
      }
}