<?php namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController; 

class Fasilitas extends ResourceController
{
    protected $modelName = 'App\Models\FasilitasModel';
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
        $validate = $this->validation->run($data, 'fasilitas');
        $errors = $this->validation->getErrors();

        if($errors){
            return $this->fail($errors);
        }

        $fasilitas = new \App\Entities\Fasilitas();
        $fasilitas->fill($data);
        $fasilitas->created_by = 0;
        $fasilitas->created_date = date("Y-m-d H:i:s");

        if($this->model->save($fasilitas))
        {
            return $this->respondCreated($fasilitas, 'fasilitas ditambahkan');
        }
    }

    public function update($id_fasilitas = null)
    {
        $data = $this->request->getRawInput();
        $data['id_fasilitas'] = $id_fasilitas;
        $validate = $this->validation->run($data, 'fasilitas');
        $errors = $this->validation->getErrors();

        if($errors){
            return $this->fail($errors);
        }

        if(!$this->model->findById($id_fasilitas))
        {
            return $this->fail('id tidak ditemukan');
        }

        $fasilitas = new \App\Entities\fasilitas();
        $fasilitas->fill($data);
        $fasilitas->updated_by = 0;
        $fasilitas->updated_date = date("Y-m-d H:i:s");

        if($this->model->save($fasilitas))
        {
            return $this->respondUpdated($fasilitas, 'Data fasilitas Diperbaharui');
        }

    }

    public function delete($id_fasilitas = null)
    {
        if(!$this->model->findById($id_fasilitas))
        {
            return $this->fail('id fasilitas tidak ditemukan');
        }

        if($this->model->delete($id_fasilitas)){
            return $this->respondDeleted(['id_fasilitas'=>$id_fasilitas.' Deleted']);
        }
    }

    public function show($id_fasilitas = null)
    {
        $data = $this->model->findById($id_fasilitas);

        if($data)
        {
            return $this->respond($data);
        }

        return $this->fail('id fasilitas tidak ditemukan');
    }
}