<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use DataTables;
use Illuminate\Support\Facades\Log;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn được tương tác
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    private function setModel()
    {
        $this->model = app()->make($this->getModel());
    }

    /**
     * getAll
     *
     * @return void
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * getByAttribute
     *
     * @param  mixed $attr
     * @return void
     */
    public function getByAttribure($attr = [])
    {
        return $this->model->select($attr)->get();
    }

    /**
     * create
     *
     * @param  mixed $atrr
     * @return void
     */
    public function create($atrr = [])
    {
        return $this->model->create($atrr);
    }

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $atrr
     * @return void
     */
    public function update($id, $atrr = [])
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->update($$atrr);
            return $result;
        }
        return false;
    }

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id)
    {
        $result = $this->model->find($id);
        if ($result) {
            $result->delete();
            return $result;
        }
        return false;
    }

    public function showDataTable($routeDelete)
    {
        $data = $this->getAll();
        Log::debug($routeDelete);
        dd($routeDelete);
        // return DataTables::of($data)->addIndexColumn()
        //     ->addColumn('action', function ($row) {
        //         $btn = '<a href="" class="btn btn-warning btn-sm">Sửa</a>
        //             <a href="'.route('admin.user.delete',["id"=>$row->id]).'" class="btn btn-danger btn-sm">Xóa</a>';
        //         return $btn;
        //     })
        //     ->editColumn('created_at', function ($user) {
        //         return $user->created_at;
        //     })->rawColumns(['action'])
        //     ->make(true);
    }
}
