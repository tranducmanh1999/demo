<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class LikeUser extends Model
{
    use HasFactory;
    protected $table = 'like_user';

    protected $casts =[
        'user_id'=>'int',
        'post_id'=>'int'
    ];
    
    protected $fillable = [
        'user_id',
        'post_id'
    ];
    
    ///relation
    /**
     * @return belongsTo
     */
    public function post(){
        return $this->belongsTo(Post::class);
    }
    
    /**
     * @return belongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
  
}