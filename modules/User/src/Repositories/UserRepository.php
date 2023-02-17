<?php
namespace Modules\User\src\Repositories;


use App\Models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface{

    public function getModel()
    {
        return User::class;
    }

    public function getUsers($limit)
    {
        return $this->model->paginate($limit);
    }


}
