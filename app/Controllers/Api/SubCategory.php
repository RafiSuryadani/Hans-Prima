<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class SubCategory extends ResourceController
{

    protected $modelName    = 'App\Models\SubCategory';
    protected $format       = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model
            ->select('sub_categories.*, categories.category_name')
            ->join('categories', 'categories.id = sub_categories.category_id')
            ->findAll();

        return $this->respond($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $subCategory = $this->model
            ->select('sub_categories.*, categories.category_name')
            ->join('categories', 'categories.id = sub_categories.category_id')
            ->find($id);

        if ($subCategory) {
            return $this->respond($subCategory);
        }
        return $this->failNotFound('Sub kategori tidak ditemukan.');
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = $this->request->getJSON(true);

        $subCategory_data = new \App\Entities\SubCategory($data);

        if (!$this->model->save($subCategory_data)) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status'   => 201,
            'messages' => ['success' => 'Sub kategori berhasil dibuat.'],
            'id' => $this->model->getInsertID()
        ];
        return $this->respondCreated($response);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Sub kategori tidak ditemukan.');
        }

        $data = $this->request->getJSON(true);

        $subCategory_data = new \App\Entities\SubCategory($data);
        
        if (!$this->model->update($id, $subCategory_data)) {
            return $this->fail($this->model->errors());
        }
        
        return $this->respondUpdated(['message' => 'Sub kategori berhasil diperbarui.']);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        if (!$this->model->find($id)) {
            return $this->failNotFound('Sub kategori tidak ditemukan.');
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Sub kategori berhasil dihapus.']);
        }
        
        return $this->fail('Gagal menghapus data.');
    }
}
