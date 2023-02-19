<?php
namespace Modules\User\src\Repositories;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Models\User;

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
