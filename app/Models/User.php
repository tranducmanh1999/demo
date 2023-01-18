<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Permissions\HasPermissionsTrait;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasPermissionsTrait;

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
     * @return hasMany
     */
    
     public function post()
     {
        return $this->hasMany('App\Models\Post','user_id');   
     }

     /**
     * @return hasMany
     */
    public function like(){
      return $this->hasMany('App\Models\LikeUser','user_id');
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