<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class ProductController extends ResourceController
{

    protected $modelName = 'App\Models\Product';
    protected $format    = 'json';

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $data = $this->model
            ->select('products.*, group_categories.group_name, categories.category_name, sub_categories.category_subname')
            ->join('group_categories', 'group_categories.id = products.group_category_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('sub_categories', 'sub_categories.id = products.sub_category_id')
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
        $product = $this->model
            ->select('products.*, group_categories.group_name, categories.category_name, sub_categories.category_subname')
            ->join('group_categories', 'group_categories.id = products.group_category_id')
            ->join('categories', 'categories.id = products.category_id')
            ->join('sub_categories', 'sub_categories.id = products.sub_category_id')
            ->findAll();

        if ($product) {
            return $this->respond($product);
        }
        
        return $this->failNotFound('Produk tidak ditemukan.');
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
            $file->move(FCPATH . 'uploads/images/products', $newName);
            $data['image'] = $newName;
        }

        $product_data = new \App\Entities\Product($data);

        if ($this->model->save($product_data)) {
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
        $product = $this->model->find($id);
        if (!$product) {
            return $this->failNotFound('Produk tidak ditemukan.');
        }

        $data = $this->request->getJSON(true);
        
        $data['id'] = $id;

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
            if ($product->image && file_exists(FCPATH . 'uploads/images/products/' . $product->image)) {
                unlink(FCPATH . 'uploads/images/products/' . $product->image);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/images/products', $newName);
            $data['image'] = $newName;
        }

        $product_data = new \App\Entities\Product($data);

        if ($this->model->update($id, $product_data)) {
            return $this->respondUpdated(['message' => 'Produk berhasil diperbarui.']);
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
        $product = $this->model->find($id);
        if (!$product) {
            return $this->failNotFound('Produk tidak ditemukan.');
        }

        if ($product->image && file_exists(FCPATH . 'uploads/images/products/' . $product->image)) {
            unlink(FCPATH . 'uploads/images/products/' . $product->image);
        }

        if ($this->model->delete($id)) {
            return $this->respondDeleted(['message' => 'Produk berhasil dihapus.']);
        }

        return $this->fail('Gagal menghapus data.');
    }
}
