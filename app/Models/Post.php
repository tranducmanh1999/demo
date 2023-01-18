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
        'user_id'=>'int'
    ];
    
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    ///relation
    /**
     * @return belongsTo
     */
     public function user(){
        return $this->belongsTo(User::class);
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
        return $this->hasMany(LikeUser::class);
     }

     /**
      * @return hasMany
     */
    public function share(){
        return $this->hasMany(Share::class);
    }
    
    /**
     * @return hasMany
     */
    public function comment_replies(){
        return $this->hasMany(CommentReplies::class);
    }
}