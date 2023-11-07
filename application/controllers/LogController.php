<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogController extends CI_Controller {
	public function __construct(){
		parent:: __construct();
		$this->load->model('Log_model','logM');
	}
	
	public function index() //otomatis dipanggil
	{
		$mhs_data = $this->logM->getAll();

		$data['isi_content'] = $mhs_data;
		$this->load->view('header');
		$this->load->view('v_table', $data);
		$this->load->view('footer');
	}

	//menampilkan form pendaftaran (data baru)
	public function daftar(){
		$this->load->view('header');
		$this->load->view('v_form');
		$this->load->view('footer');
	}

	//respon setelah form penambahan diisi
	public function add(){
		$data = $this->input->post();
		$file = $this->do_upload('file');

		$data['file'] = "uploads/".$file['upload_data']['file_name'];

		$file_output = $this->do_upload('file_output');

		$data['file_output'] = "uploads/".$file_output['upload_data']['file_name'];

		$simpan = $this->logM->save_insert($data);
		if($simpan){
			redirect('LogController/index?msg=Berhasil menambahkan data!');
		}
	}

	//respon setelah tombol hapus ditekan
	public function hapusData($id){
		$del = $this->logM->save_delete($id);
		if($del){
			redirect('LogController/index?msg=Berhasil menghapus data!');
		}
	}

	//respon setelah tombol edit ditekan
	public function editData($id){
		$mhs_data = $this->logM->getById($id);
		$data['judul'] = "Edit Table";
		$data['isi_content'] = $mhs_data;

		$this->load->view('header');
		$this->load->view('v_edit', $data);
		$this->load->view('footer');
	}

	//respon setelah form update diisi
	public function updateData(){
		$id = $this->input->post('id_log');
		$data = $this->input->post();
		unset($data['id_log']);

		if(!$_FILES['file']['size'] == 0 && $_FILES['file']['error'] == 0){
			$file = $this->do_upload('file');
			$data['file'] = "uploads/".$file['upload_data']['file_name'];
		}

		if(!$_FILES['file_output']['size'] == 0 && $_FILES['file_output']['error'] == 0){
			$file = $this->do_upload('file_output');
			$data['file_output'] = "uploads/".$file['upload_data']['file_name'];
		}

		$update = $this->logM->save_update($id, $data);
		if($update){
			redirect('LogController/index?msg=Berhasil mengubah data!');
		}
	}

	public function do_upload($fileName){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2000;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($fileName))
		{
				$error = array('error' => $this->upload->display_errors());

				return $error;
		}
		else
		{
				$data = array('upload_data' => $this->upload->data());

				return $data;
		}
	}
}
