<?php
namespace App\Repositories\Like;

use App\Repositories\BaseRepository;

class LikeRepository extends BaseRepository implements LikeRepositoryInterface
{
    public function getModel(){
        return \App\Models\LikeUser::class;
    }
    public function countUser(){
        return $this->model->distinct('auth_id')->count('auth_id');;
    }
}