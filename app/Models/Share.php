<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Share extends Model
{
    use HasFactory;
    protected $table = 'share';
    
    protected $casts =[
        'auth_id'=>'int',
        'post_id'=>'int'
    ];
    
    protected $fillable = [
        'auth_id',
        'post_id'
    ];

    ///relation
    /**
     * @return hasOne
    */
    public function user(){
        return $this->hasOne('App\Models\User','id');
    }
    
    /**
     * @return hasOne
     */
    public function post(){
        return $this->hasOne('App\Models\Post','id');
    }
}