<?php
namespace Modules\User\src\Http\Controllers;
use App\Http\Controllers\Controller;
use Modules\User\src\Repositories\UserRepository;

class UserController extends Controller{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;

    }

    public function index(){
        $title = "Người dùng";
        $a = $this->userRepo->getUsers(4);
        return view('User::lists',compact('title')) ;
    }

    public function create()
    {
        $title = "Người dùng";
        return view('User::add',compact('title')) ;
    }

}
