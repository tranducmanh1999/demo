<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';

    protected $casts =[
        'auth_id'=>'int',
        'post_id'=>'int'
    ];

    protected $fillable = [
        'body',
        'auth_id'
    ];

    //relation

    /**
     * @return belongsTo
     */
    public function post(){
        return $this->belongsTo(PostClass::class);
    }

    /**
     * @return belongsTo
     */
    public function comment_replies(){
        return $this->belongsTo(CommentReplies::class);
    }

    /**
     * @return hasOne
     */
    public function user(){
        return $this->hasOne('App\Models\User','id');
    }
}