<?php
namespace App\Repositories\Like;

use App\Repositories\BaseRepository;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function getModel(){
        return \App\Models\LikeUser::class;
    }
    public function countUser(){
        $post_id = \App\Models\Post::all();
        return $this->model->where('post_id',$post_id)->get();
    }
}