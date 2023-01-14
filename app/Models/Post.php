<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    
    protected $casts =[
        'auth_id'=>'int'
    ];
    
    protected $fillable = [
        'title',
        'content',
        'auth_id'
    ];

    ///relation
    /**
     * @return hasOne
     */
     public function user(){
        return $this->hasOne('App\Models\User','id');
     }
     
     /**
      * @return hasMany
      */
     public function comment(){
        return $this->hasMany(Comment::class);
     }
     
     /**
      * @return hasMany
      */
     public function like(){
        return $this->hasMany('App\Models\LikeUser','post_id');
     }

     /**
      * @return hasMany
     */
    public function share(){
        return $this->hasMany('App\Models\Share','post_id');
    }
    
    /**
     * @return hasMany
     */
    public function comment_replies(){
        return $this->hasMany(CommentReplies::class);
    }
}