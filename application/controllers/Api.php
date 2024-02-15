<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('form_validation');
	}

	public function index_get($id = null)
	{
		if (!empty($id)) {

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
		} else {

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
	}

	public function index_post()
	{

		try {

			$this->form_validation->set_data($this->post());
			$this->form_validation->set_rules([
				[
					"field" => "title",
					"label" => "Title",
					"rules" => "required",
				],
				[
					"field" => "firstName",
					"label" => "FirstName",
					"rules" => "required",
				],
				[
					"field" => "lastName",
					"label" => "LastName",
					"rules" => "required",
				],
				[
					"field" => "picture",
					"label" => "Picture",
					"rules" => "required",
				],
			]);

			if (!$this->form_validation->run()) {

				throw new Exception(validation_errors());
			} else {

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

		} catch (\Throwable $th) {

			$this->response([
				'code' => 400,
				'message' => $th->getMessage(),
				'data' => $th->getMessage()
			], 400);
		}
	}

	public function index_put($id)
	{

		try {

			$this->form_validation->set_data($this->put());
			$this->form_validation->set_rules([
				[
					"field" => "title",
					"label" => "Title",
					"rules" => "required",
				],
				[
					"field" => "firstName",
					"label" => "FirstName",
					"rules" => "required",
				],
				[
					"field" => "lastName",
					"label" => "LastName",
					"rules" => "required",
				],
				[
					"field" => "picture",
					"label" => "Picture",
					"rules" => "required",
				],
			]);

			if (!$this->form_validation->run()) {

				throw new Exception(validation_errors());

			} else {

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


		} catch (\Throwable $th) {
			//throw $th;

			$this->response([
				'code' => 400,
				'message' => $th->getMessage(),
				'data' => null
			], 400);
		}
	}

	function index_delete($id)
	{

		if (!$this->db->get_where('user', ['id' => $id])->num_rows() == 0) {

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

		} else {

			$this->response([
				'code' => 400,
				'message' => 'Data not found',
				'data' => "[]"
			], 400);
		}


	}
}
