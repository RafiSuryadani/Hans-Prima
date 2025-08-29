<?php

namespace App\Controllers\Api;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class GroupCategoryController extends ResourceController
{
    protected $modelName    = 'App\Models\GroupCategory';
    protected $format       = 'json'; // Format respons default adalah JSON

    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        return $this->respond($this->model->findAll());
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
        $category = $this->model->find($id);
        if ($category) {
            return $this->respond($category);
        }

        return $this->failNotFound('Group category tidak ditemukan.');
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

        $groupCategory_data = new \App\Entities\GroupCategory($data);

        try {
            if (!$this->model->save($groupCategory_data, ['validate' => 'create'])) {
                return $this->fail($this->model->errors());
            }

            $response = [
                'status'   => 201,
                'error'    => null,
                'messages' => [
                    'success' => 'Group category berhasil dibuat.'
                ],
                'id' => $this->model->getInsertID()
            ];
            return $this->respondCreated($response);
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                return $this->fail([
                    'group_name' => 'Nama grup sudah ada, silakan gunakan nama lain.'
                ], 400);
            }

            return $this->failServerError('Terjadi kesalahan pada server saat menyimpan data.');
        }
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
            return $this->failNotFound('Group category tidak ditemukan.');
        }

        $data = $this->request->getJSON(true);

        $data['id'] = $id;

        $groupCategory_data = new \App\Entities\GroupCategory($data);

        if (!$this->model->update($id, $groupCategory_data, ['validate' => 'update'])) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Group category berhasil diperbarui.'
            ]
        ];
        return $this->respond($response);
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
            return $this->failNotFound('Group category tidak ditemukan.');
        }

        $this->model->delete($id);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Group category berhasil dihapus.'
            ]
        ];
        return $this->respondDeleted($response);
    }
}
