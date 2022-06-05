<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController; 

class Tanah extends ResourceController
{
    protected $modelName = 'App\Models\TanahModel';
    protected $format = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    public function create()
    {
        $data = $this->request->getPost();
        $validate = $this->validation->run($data, 'tanah');
        $errors = $this->validation->getErrors();

        if($errors){
            return $this->fail($errors);
        }

        $tanah = new \App\Entities\Tanah();
        $tanah->fill($data);
        $tanah->created_by = 0;
        $tanah->created_date = date("Y-m-d H:i:s");

        if($this->model->save($tanah))
        {
            return $this->respondCreated($tanah, 'tanah ditambahkan');
        }
    }

    public function update($id_tanah = null)
    {
        $data = $this->request->getRawInput();
        $data['id_tanah'] = $id_tanah;
        $validate = $this->validation->run($data, 'tanah');
        $errors = $this->validation->getErrors();

        if($errors){
            return $this->fail($errors);
        }

        if(!$this->model->findById($id_tanah))
        {
            return $this->fail('id tidak ditemukan');
        }

        $Tanah = new \App\Entities\Tanah();
        $Tanah->fill($data);
        $Tanah->updated_by = 0;
        $Tanah->updated_date = date("Y-m-d H:i:s");

        if($this->model->save($Tanah))
        {
            return $this->respondUpdated($Tanah, 'Data Tanah Diperbaharui');
        }

    }

    public function delete($id_tanah = null)
    {
        if(!$this->model->findById($id_tanah))
        {
            return $this->fail('id tanah tidak ditemukan');
        }

        if($this->model->delete($id_tanah)){
            return $this->respondDeleted(['id_tanah'=>$id_tanah.' Deleted']);
        }
    }

    public function show($id_tanah = null)
    {
        $data = $this->model->findById($id_tanah);

        if($data)
        {
            return $this->respond($data);
        }

        return $this->fail('id tanah tidak ditemukan');
    }
}