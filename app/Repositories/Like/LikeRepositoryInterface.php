<?php
namespace App\Repositories\Like;

use App\Repositories\RepositoryInterface;

interface LikeRepositoryInterface extends RepositoryInterface
{
    public function countUser();
}