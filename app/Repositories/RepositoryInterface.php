<?php
namespace App\Repositories;

interface RepositoryInterface {
    /**
     * getAll
     *
     * @return void
     */
    public function getAll();

    /**
     * create
     *
     * @param  mixed $attributes
     * @return void
     */
    public function create($attributes = []);

    /**
     * update
     *
     * @param  mixed $id
     * @param  mixed $attributes
     * @return void
     */
    public function update($id, $attributes = []);

    /**
     * delete
     *
     * @param  mixed $id
     * @return void
     */
    public function delete($id);

    /**
     * getByAttribure
     *
     * @param  mixed $attr
     * @return void
     */
    public function getByAttribure($attr = []);

    /**
     * showDataTable
     *
     * @param  mixed $created
     * @return void
     */
    public function showDataTable($routeDelete);


}
