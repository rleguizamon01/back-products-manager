<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\ProductModel;

class Products extends ResourceController
{

	protected $modelName = 'App\Models\ProductModel';
    protected $format = 'json';

	function __construct() {

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
	}

	public function index()
	{
		$products = $this->model->findAll();
		return $this->respond($products);
	}

	public function show($id = null)
	{
		$product = $this->model->find($id);
		return $this->respond($product);
	}

	public function update($id = null)
	{
		$data = [
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
		];

		$product = $this->model->update($id, $data);

		return $this->respond($product);
	}

	public function store()
	{
		$data = [
			'name' => $this->request->getVar('name'),
			'price' => $this->request->getVar('price'),
		];

		$product = $this->model->insert($data);
		return $this->respondCreated($product);
	}

	public function delete($id = null)
	{
		$product = $this->model->delete($id);
		return $this->respondDeleted($product);
	}
}
