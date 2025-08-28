<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Category extends ResourceController
{
    protected $modelName    = 'App\Models\Category';
    protected $format       = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model
            ->select('categories.*, group_categories.group_name')
            ->join('group_categories', 'group_categories.id = categories.group_category_id', 'left')
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
        $category = $this->model
            ->select('categories.*, group_categories.group_name')
            ->join('group_categories', 'group_categories.id = categories.group_category_id', 'left')
            ->find($id);

        if ($category) {
            return $this->respond($category);
        }
        return $this->failNotFound('Kategori tidak ditemukan.');
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

        if (!$this->validate($this->model->validationRules)) {
            return $this->fail($this->validator->getErrors());
        }

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/images/categories', $newName);
            $data['image'] = $newName;
        }

        if ($this->model->save($data)) {
            $response = [
                'status'   => 201,
                'messages' => ['success' => 'Kategori berhasil dibuat.'],
                'id' => $this->model->getInsertID()
            ];
            
            return $this->respondCreated($response);
        }

        return $this->fail('Gagal menyimpan data.');
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
        $category = $this->model->find($id);
        if (!$category) {
            return $this->failNotFound('Kategori tidak ditemukan.');
        }

        $data = $this->request->getJSON(true);

        $validation = \Config\Services::validation();
        $validation->setRules($this->model->getValidationRules(['except' => ['image']]));

        if ($this->request->getFile('image')) {
            $validation->setRules($this->model->getValidationRules(['only' => ['image']]));
        }

        if (!$validation->run($data)) {
            return $this->fail($validation->getErrors());
        }

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($category->image && file_exists(FCPATH . 'uploads/images/categories/' . $category->image)) {
                unlink(FCPATH . 'uploads/images/categories/' . $category->image);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/images/categories', $newName);
            $data['image'] = $newName;
        }

        if ($this->model->update($id, $data)) {
            return $this->respondUpdated(['message' => 'Kategori berhasil diperbarui.']);
        }

        return $this->fail('Gagal memperbarui data.');
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
        $category = $this->model->find($id);
        if (!$category) {
            return $this->failNotFound('Kategori tidak ditemukan.');
        }

        if ($category->image && file_exists(FCPATH . 'uploads/images/categories/' . $category->image)) {
            unlink(FCPATH . 'uploads/images/categories/' . $category->image);
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Kategori berhasil dihapus.']);
        }

        return $this->fail('Gagal menghapus data.');
    }
}
