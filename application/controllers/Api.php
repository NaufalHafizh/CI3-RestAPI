<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index_get()
	{
		$datamahasiswa = $this->db->get('user')->result();

		if (!empty($datamahasiswa)) {

			$this->response([

				'code' => 200,
				'message' => 'Success',
				'data' => $datamahasiswa
			], 200);

		} else {

			$this->response([

				'code' => 400,
				'message' => 'Error',
				'data' => null
			], 400);

		}
	}

	public function view_get($id)
	{
		$datamahasiswa = $this->db->get_where('user', ['id' => $id])->result();

		if (!empty($datamahasiswa)) {

			$this->response([

				'code' => 200,
				'message' => 'Success',
				'data' => $datamahasiswa
			], 200);

		} else {

			$this->response([

				'code' => 400,
				'message' => 'Error',
				'data' => null
			], 400);

		}
	}

	public function index_post()
	{

		$data = [
			"title" => $this->post('title'),
			"firstName" => $this->post('firstName'),
			'lastName' => $this->post('lastName'),
			'picture' => $this->post('picture')
		];

		$insertdata = $this->db->insert('user', $data);

		if ($insertdata) {

			$this->response([

				'code' => 201,
				'message' => 'Success',
				'data' => $insertdata
			], 201);
		} else {

			$this->response([

				'code' => 400,
				'message' => 'Error',
				'data' => null
			], 400);
		}
	}

	public function index_put($id)
	{

		$data = [
			"title" => $this->put('title'),
			"firstName" => $this->put('firstName'),
			'lastName' => $this->put('lastName'),
			'picture' => $this->put('picture')
		];

		$this->db->where('id', $id);
		$updatedata = $this->db->update('user', $data);

		if ($updatedata) {

			$this->response([

				'code' => 200,
				'message' => 'Success',
				'data' => $updatedata
			], 200);
		} else {

			$this->response([

				'code' => 400,
				'message' => 'Error',
				'data' => null
			], 400);
		}

	}

	function index_delete($id)
	{

		$deletedata = $this->db->where('id', $id)->delete('user');

		if ($deletedata) {

			$this->response([

				'code' => 200,
				'message' => 'Success',
				'data' => null
			], 200);
		} else {

			$this->response([

				'code' => 400,
				'message' => 'Error',
				'data' => null
			], 400);
		}

	}
}
