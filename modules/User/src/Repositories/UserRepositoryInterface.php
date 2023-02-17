<?php
namespace Modules\User\src\Repositories;


use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface{

    /**
     * getUsers
     *
     * @param  mixed $limit
     * @return void
     */
    public function getUsers($limit);
}
