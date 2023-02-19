<?php

namespace Modules\User\src\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\User\src\Http\Requests\UserRequest;
use Modules\User\src\Models\User;
use Modules\User\src\Repositories\UserRepository;

class UserController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index(Request $request)
    {
        $title = "Người dùng";
        if ($request->ajax()) {
            return $this->userRepo->showDataTable(route("admin.user.delete")) ;
        }
        return view('User::lists', compact('title'));
    }

    public function create()
    {
        $title = "Người dùng";
        return view('User::add', compact('title'));
    }

    public function store(UserRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        $user = $this->userRepo->create($request->all());
        if ($user) {
            return redirect()->route("admin.user.index")->with("success", "Thêm thành công");
        }
        return redirect()->route("admin.user.index")->with("error", "Thêm thất bại");
    }
}
