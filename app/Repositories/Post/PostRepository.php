<?php
namespace App\Repositories\Post;

use App\Repositories\BaseRepository;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function getModel(){
        return \App\Models\Post::class;
    }
    public function getPostById(){
        return $this->model->where('user_id')->orderBy('id','desc')->get();
    }
}