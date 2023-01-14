<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class CommentReplies extends Model
{
    use HasFactory;
    protected $table = 'comment_replies';

    protected $casts =[
        'auth_id'=>'int',
        'comment_id'=> 'int',
        'post_id'=>'int'
    ];

    protected $fillable = [
        'reply',
        'auth_id',
        'comment_id',
        'post_id'
    ];

    ///relation

    /**
     * @return hasOne
     */
    public function comment(){
        return $this->hasOne(Comment::class);
    }

    /**
     * @return hasOne
     */
    public function user(){
        return $this->hasOne('App\Models\User','id');
    }

    /**
     * @return belongsTo
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
}