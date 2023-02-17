<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

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
        if($result){
            $result->delete();
            return $result;
        }
        return false;
    }
}
