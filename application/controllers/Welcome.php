<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent:: __construct();
	}

	public function index()
	{
		if($this->session->userdata("is_login")){
			redirect("/dashboard");
		}

		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function logout(){
		$this->db->set('logged_in', null);
		$this->db->where('id_user', $this->session->userdata("user_id"));
		$this->db->update('user');

		$this->session->sess_destroy();
		redirect("/");
	}

	public function doLogin(){
		$data = $this->input->post();
		if($data["username"] == null || $data["password"] == null){
			$this->session->set_flashdata('message_info', 'Mohon masukan username/email dan password!');
			redirect("/");
		}

		$this->db->join('team',"team.id_team=user.team");
		$this->db->join('schedule_team',"schedule_team.team_id=user.team");
		$this->db->where('user.username', $data["username"]);
		$this->db->or_where('user.email', $data["username"]); 
		$user = $this->db->get("user")->row_array();

		if($user == null){
			$this->session->set_flashdata('message_info', 'Username / email tidak ditemukan!');
			redirect("/");
		}

		if($user["password"] != sha1($data["password"])){
			$this->session->set_flashdata('message_info', 'Password yang anda masukan salah!');
			redirect("/");
		}

		if($user["logged_in"] != null && $user["logged_in"] != $_SERVER['HTTP_USER_AGENT']){
			$this->session->set_flashdata('message_info', 'Anda sudah login di device lain!');
			redirect("/");
		}

		$this->db->set('logged_in', $_SERVER['HTTP_USER_AGENT']);
		$this->db->where('id_user', $user["id_user"]);
		$this->db->update('user');

		$newdata = array(
			'is_login'  => true,
			'test_id'  => $user["test_id"],
			'paket'  => $user["no_user"],
			'user_id'  => $user["id_user"],
			'name'  => $user["name"],
			'school'     => $user["school_name"],
			'nip'     => $user["nip"],
			'team'     => $user["team_name"],
			'photo'     => "https://lctipipb.com/".$user["formal_photo"]
		);
	
		$this->session->set_userdata($newdata);
		redirect("/dashboard");
	}

	public function dashboard()
	{
		date_default_timezone_set("Asia/Bangkok");
		if($this->session->userdata("is_login") == null){
			redirect("/");
		}

		$this->db->where('id_user', $this->session->userdata("user_id"));
		$user = $this->db->get("user")->row_array();

		if($user["logged_in"] != null && $user["logged_in"] !=$_SERVER['HTTP_USER_AGENT']){
			$this->session->sess_destroy();
			$this->session->set_flashdata('message_info', 'Akun anda sedang digunakan di device lain!');
			redirect("/");
		}

		$this->db->where("test", $this->session->userdata("test_id"));
		$test = $this->db->get('test')->row_array();
		$dateNow = date("Y-m-d H:i:s");
		$dateLabel = date('d F Y H:i:s', strtotime($test["start"]));

		$data["test"] = $test;
		$data["date_now"] = $dateNow;
		$data["date_label"] = $dateLabel;

		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function terms()
	{
		if($this->session->userdata("is_login") == null){
			redirect("/");
		}

		$this->db->where('id_user', $this->session->userdata("user_id"));
		$user = $this->db->get("user")->row_array();

		if($user["logged_in"] != null && $user["logged_in"] !=$_SERVER['HTTP_USER_AGENT']){
			$this->session->sess_destroy();
			$this->session->set_flashdata('message_info', 'Akun anda sedang digunakan di device lain!');
			redirect("/");
		}
		
		$this->load->view('header');
		$this->load->view('terms');
		$this->load->view('footer');
	}

	public function quiz($id)
	{
		date_default_timezone_set("Asia/Bangkok");
		$this->db->where("test", $this->session->userdata("test_id"));
		$test = $this->db->get('test')->row_array();
		$dateNow = date("Y-m-d H:i:s");

		if($dateNow < $test["start"]){
			$this->session->set_flashdata('message_info', 'Online test belum dimulai!');
			redirect("dashboard");
		}

		// if($this->session->userdata("team") == "APHP MANSABO"){
		// 	$test["end"] = "2021-09-04 16:15:00";
		// }else if($this->session->userdata("name") == "Aisyah Divani Rahmatullah" || $this->session->userdata("name") == "Indra Lakshmana Malik" || $this->session->userdata("team") == "Anandita"){
		// 	$test["end"] = "2021-09-04 17:15:00";
		// }else if($this->session->userdata("name") == "Berliana Nathania" || $this->session->userdata("name") == "Chelsea Meidina Larazani" || $this->session->userdata("name") == "Arifa Nur Azmi" || $this->session->userdata("name") == "Muhammad Rafly Ramadhan" || $this->session->userdata("name") == "Fadlizil Ikram" || $this->session->userdata("name") == "Maulidya Vina Apsari" || $this->session->userdata("team") == "VJR"){
		// 	$test["end"] = "2021-09-04 16:00:00";
		// }

		if($dateNow > $test["end"]){
			$this->session->set_flashdata('message_info', 'Online test sudah berakhir!');
			redirect("dashboard");
		}

		$this->db->where('user_id', $this->session->userdata("user_id"));
		$this->db->where('test_id', $this->session->userdata("test_id"));
		$submit = $this->db->get('submit')->row_array();

		if($submit){
			$this->session->set_flashdata('message_info', 'Maaf anda tidak bisa mengubah jawaban yang sudah submit!');
			redirect("dashboard");
		}

		if($this->session->userdata("is_login") == false || $this->session->userdata("is_login") == null){
			$this->session->set_flashdata('message_info', 'Anda harus login terlebih dahulu!');
			redirect("/");
		}

		$this->db->where('id_user', $this->session->userdata("user_id"));
		$user = $this->db->get("user")->row_array();

		if($user["logged_in"] != null && $user["logged_in"] !=$_SERVER['HTTP_USER_AGENT']){
			$this->session->sess_destroy();
			$this->session->set_flashdata('message_info', 'Akun anda sedang digunakan di device lain!');
			redirect("/");
		}

		$this->db->where('user_id', $this->session->userdata("user_id"));
		$this->db->where('test_id', $this->session->userdata("test_id"));
		$startTest = $this->db->get('start_test')->row_array();

		if(!$startTest){
			$dataStartTest = array(
				'test_id' => $this->session->userdata("test_id"),
				'user_id' => $this->session->userdata("user_id")
			);
			$insert = $this->db->insert('start_test', $dataStartTest);
		}

		$dueDate = $test["end"];

		if($dateNow > $dueDate){
			$this->session->set_flashdata('message_info', 'Maaf waktu anda sudah habis!');
			redirect("dashboard");
		}

		$this->db->where("user_id",$this->session->userdata("user_id"));
		$history = $this->db->get('history')->row_array();

		if(!$history){
			$data = array(
				'number' => 1,
				'user_id' => $this->session->userdata("user_id")
			);
			$insert = $this->db->insert('history', $data);
			redirect("online-test/1");
		}else{
			if($id == ($history["number"]+1)){
				$this->db->set('number', $id);
				$this->db->where('user_id', $this->session->userdata("user_id"));
				$this->db->update('history');
			}else if($id < $history["number"]){
				redirect("online-test/".$history["number"]);
			}else if($id > ($history["number"]+1)){
				redirect("online-test/".$history["number"]);
			}
		}

		$this->db->where("question.paket", $this->session->userdata("paket"));
		$this->db->where("question.test_id", $this->session->userdata("test_id"));
		$question = $this->db->get('question')->result_array();
		$index = $id-1;
		$id = $question[$index]["question_id"];

		$this->db->where("user_id", $this->session->userdata("user_id"));
		$answer = $this->db->get('answer')->result_array();

		$questionNotAnswer = [];
		$questionAnswer = [];
		foreach($answer as $value){
			if($value["term_id"] == null){
				$questionNotAnswer[$value["question_id"]] = true;
			}else{
				$questionAnswer[$value["question_id"]] = true;
			}
		}

		$this->db->join("answer", "answer.question_id=question.question_id", "left");
		$this->db->where("question.question_id", $id);
		$this->db->where("answer.user_id", $this->session->userdata("user_id"));
		$this->db->where("question.paket", $this->session->userdata("paket"));
		$this->db->where("question.test_id", $this->session->userdata("test_id"));
		$currentQuestion = $this->db->get('question')->row_array();

		if($currentQuestion == null){
			$currentQuestion = $question[$index];
			$currentQuestion["term_id"] = null;
		}
		
		$nextQuestion = isset($question[$index+1]) ? $question[$index+1] : null;
		
		//get terms
		$this->db->where("question_id", $id);
		$term = $this->db->get('term')->result_array();

		//insert not answer
		$this->db->where('user_id',$this->session->userdata("user_id"));
		$this->db->where('question_id', $id);
		$answer = $this->db->get('answer')->row_array();

		if($answer == null){
			$data = array(
				'question_id' => $id,
				'user_id' => $this->session->userdata("user_id")
			);
			$insert = $this->db->insert('answer', $data);
			if($insert){
				$this->writeLogAnswer2("Insert Data ".$id." Oleh ".$this->session->userdata("user_id")." : ".json_encode($data));
			}
		}

		$data["question"] = $question;
		$data["nextQuestion"] = $nextQuestion;
		$data["currentQuestion"] = $currentQuestion;
		$data["term"] = $term;
		$data["questionNotAnswer"] = $questionNotAnswer;
		$data["questionAnswer"] = $questionAnswer;
		$data["dueDate"] = $dueDate;
		$this->load->view('header-no-navbar');
		$this->load->view('quiz',$data);
		$this->load->view('footer');
	}

	public function clearQuiz($id){
		$this->db->where("test", $this->session->userdata("test_id"));
		$test = $this->db->get('test')->row_array();
		$dateNow = date("Y-m-d H:i:s");

		if($dateNow > $test["end"]){
			$this->session->set_flashdata('message_info', 'Online test sudah berakhir!');
			redirect("dashboard");
		}

		$this->db->where('id_user', $this->session->userdata("user_id"));
		$user = $this->db->get("user")->row_array();
		
		if($user["logged_in"] != null && $user["logged_in"] !=$_SERVER['HTTP_USER_AGENT']){
			$this->session->sess_destroy();
			redirect("/");
		}else{
			$this->db->where("question.paket", $this->session->userdata("paket"));
			$this->db->where("question.test_id", $this->session->userdata("test_id"));
			$this->db->where("question.question_id", $id);
			$question = $this->db->get('question')->row_array();

			$this->db->where('user_id',$this->session->userdata("user_id"));
			$this->db->where('question_id', $id);
			$answer = $this->db->get('answer')->row_array();

			if($answer){
				$this->db->set('term_id', null);
				$this->db->where('answer_id', $answer["answer_id"]);
				$update = $this->db->update('answer');
			}

			redirect("online-test/".$question["number"]);
		}
	}

	public function done(){
		$this->db->where('user_id', $this->session->userdata("user_id"));
		$this->db->where('test_id', $this->session->userdata("test_id"));
		$submit = $this->db->get('submit')->row_array();

		if(!$submit){
			$data = array(
				'test_id' => $this->session->userdata("test_id"),
				'user_id' => $this->session->userdata("user_id")
			);
			$insert = $this->db->insert('submit', $data);
		}

		$this->session->set_flashdata('message_info', 'Terima kasih sudah mengisi soal dengan jujur!');
		redirect("dashboard");
	}

	public function answer($questionId){
		$data = $this->input->post();

		date_default_timezone_set("Asia/Bangkok");
		$this->db->where("test", $this->session->userdata("test_id"));
		$test = $this->db->get('test')->row_array();
		$dateNow = date("Y-m-d H:i:s");

		$status = false;
		if($dateNow < $test["start"]){
			echo json_encode(array("status" => $status, "question" => $questionId)); exit();
		}

		if($dateNow > $test["end"]){
			echo json_encode(array("status" => $status, "question" => $questionId)); exit();
		}

		if($this->session->userdata("is_login") == false || $this->session->userdata("is_login") == null){
			echo json_encode(array("status" => $status, "question" => $questionId)); exit();
		}

		$this->db->where('id_user', $this->session->userdata("user_id"));
		$user = $this->db->get("user")->row_array();

		if($user["logged_in"] != null && $user["logged_in"] !=$_SERVER['HTTP_USER_AGENT']){
			$this->session->sess_destroy();
			echo json_encode(array("status" => $status, "question" => $questionId)); exit();
		}

		$this->db->where('user_id',$this->session->userdata("user_id"));
		$this->db->where('question_id', $questionId);
		$answer = $this->db->get('answer')->row_array();

		if($answer){
			$this->db->set('term_id', $data["term"]);
			$this->db->where('answer_id', $answer["answer_id"]);
			$update = $this->db->update('answer');

			if($update){
				$this->writeLogAnswer2("Update Data ".$questionId." Oleh ".$this->session->userdata("user_id")." : ".json_encode($data));
				$status = true;
			}
		}else{
			$data = array(
				'term_id' => $data["term"],
				'question_id' => $questionId,
				'user_id' => $this->session->userdata("user_id")
			);
			$insert = $this->db->insert('answer', $data);

			if($insert){
				$this->writeLogAnswer2("Insert Data ".$questionId." Oleh ".$this->session->userdata("user_id")." : ".json_encode($data));
				$status = true;
			}
		}

		echo json_encode(array("status" => $status, "question" => $questionId));
	}
	
	private function writeLogAnswer2($text){
        $text = '['.date('d-m-Y H:i:s').'] '.$text.PHP_EOL;
        $file = './application/logs/answerLog.txt';
        file_put_contents($file,$text, FILE_APPEND);
    }
    
    public function admin()
	{
		if($this->session->userdata("is_admin")){
			redirect("/adminDashboard");
		}

		$this->load->view('header');
		$this->load->view('admin_login');
		$this->load->view('footer');
	}

	public function logoutAdmin(){
		$this->db->set('logged_in', null);
		$this->db->where('id_user', $this->session->userdata("user_id"));
		$this->db->update('user');

		$this->session->sess_destroy();
		redirect("/");
	}

	public function doLoginAdmin(){
		$data = $this->input->post();
		if($data["username"] == null || $data["password"] == null){
			$this->session->set_flashdata('message_info', 'Mohon masukan username/email dan password!');
			redirect("/admin");
		}

		if($data["username"] != "admin" || $data["password"] != "lctip%123!"){
			$this->session->set_flashdata('message_info', 'username dan password salah!');
			redirect("/admin");
		}

		$newdata = array(
			'is_admin'  => true
		);
	
		$this->session->set_userdata($newdata);
		redirect("/adminDashboard");
	}

	public function adminDashboard(){
		if(!$this->session->userdata("is_admin")){
			redirect("/admin");
		}

		$this->db->join("team","user.team=team.id_team");
		$user = $this->db->get("user")->result_array();

		$answer2 = $this->db->query("SELECT user.username, user.name, user.email, team.team_name, team.school_region, team.school_name, answer.question_id, answer.term_id jawaban, question.type, term.status from user join team on user.team = team.id_team JOIN answer on answer.user_id = user.id_user LEFT JOIN term on term.term_id = answer.term_id join schedule_team on  schedule_team.team_id = user.team JOIN question on question.question_id = answer.question_id WHERE schedule_team.test_id = 2 and question.test_id = 2")->result_array();

		$dataAnswer2 = array();
		foreach ($answer2 as $key => $value) {
			$dataAnswer2[$value["username"]]["name"] = $value["name"];
			$dataAnswer2[$value["username"]]["school"] = $value["school_name"];
			$dataAnswer2[$value["username"]]["school_region"] = $value["school_region"];
			$dataAnswer2[$value["username"]]["team"] = $value["team_name"];

			if($dataAnswer2[$value["username"]]["correct_answer"] == null){
				$dataAnswer2[$value["username"]]["correct_answer"] = 0;
			}

			if($dataAnswer2[$value["username"]]["wrong_answer"] == null){
				$dataAnswer2[$value["username"]]["wrong_answer"] = 0;
			}

			if($dataAnswer2[$value["username"]]["total_scor"] == null){
				$dataAnswer2[$value["username"]]["total_scor"] = 0;
			}

			if($dataAnswer2[$value["username"]]["total_answer"] == null){
				$dataAnswer2[$value["username"]]["total_answer"] = 0;
			}

			if($dataAnswer2[$value["username"]]["true_false_answer"] == null){
				$dataAnswer2[$value["username"]]["true_false_answer"] = 0;
			}

			if($dataAnswer2[$value["username"]]["general_answer"] == null){
				$dataAnswer2[$value["username"]]["general_answer"] = 0;
			}

			if($value["jawaban"] != null){
				if($value["status"] == "true"){
					if($value["type"] == "general"){
						$dataAnswer2[$value["username"]]["total_scor"] += 4;
						$dataAnswer2[$value["username"]]["correct_answer"] += 1;
						$dataAnswer2[$value["username"]]["general_answer"] += 1;
					}else{
						$dataAnswer2[$value["username"]]["total_scor"] += 2;
						$dataAnswer2[$value["username"]]["correct_answer"] += 1;
						$dataAnswer2[$value["username"]]["true_false_answer"] += 1;
					}
				}else{
					$dataAnswer2[$value["username"]]["total_scor"] -= 1;
					$dataAnswer2[$value["username"]]["wrong_answer"] += 1;
				}
				$dataAnswer2[$value["username"]]["total_answer"] += 1;
			}
			
			$dataAnswer2[$value["username"]]["null_answer"] = 55 - $dataAnswer2[$value["username"]]["total_answer"];
		}

		$answer3 = $this->db->query("SELECT user.username, user.name, user.email, team.team_name, team.school_region, team.school_name, answer.question_id, answer.term_id jawaban, question.type, term.status from user join team on user.team = team.id_team JOIN answer on answer.user_id = user.id_user LEFT JOIN term on term.term_id = answer.term_id join schedule_team on  schedule_team.team_id = user.team JOIN question on question.question_id = answer.question_id WHERE schedule_team.test_id = 3 and question.test_id = 3")->result_array();

		$dataAnswer3 = array();
		foreach ($answer3 as $key => $value) {
			$dataAnswer3[$value["username"]]["name"] = $value["name"];
			$dataAnswer3[$value["username"]]["school"] = $value["school_name"];
			$dataAnswer3[$value["username"]]["school_region"] = $value["school_region"];
			$dataAnswer3[$value["username"]]["team"] = $value["team_name"];

			if($dataAnswer3[$value["username"]]["correct_answer"] == null){
				$dataAnswer3[$value["username"]]["correct_answer"] = 0;
			}

			if($dataAnswer3[$value["username"]]["wrong_answer"] == null){
				$dataAnswer3[$value["username"]]["wrong_answer"] = 0;
			}

			if($dataAnswer3[$value["username"]]["total_scor"] == null){
				$dataAnswer3[$value["username"]]["total_scor"] = 0;
			}

			if($dataAnswer3[$value["username"]]["total_answer"] == null){
				$dataAnswer3[$value["username"]]["total_answer"] = 0;
			}

			if($dataAnswer3[$value["username"]]["true_false_answer"] == null){
				$dataAnswer3[$value["username"]]["true_false_answer"] = 0;
			}

			if($dataAnswer3[$value["username"]]["general_answer"] == null){
				$dataAnswer3[$value["username"]]["general_answer"] = 0;
			}

			if($value["jawaban"] != null){
				if($value["status"] == "true"){
					if($value["type"] == "general"){
						$dataAnswer3[$value["username"]]["total_scor"] += 4;
						$dataAnswer3[$value["username"]]["correct_answer"] += 1;
						$dataAnswer3[$value["username"]]["general_answer"] += 1;
					}else{
						$dataAnswer3[$value["username"]]["total_scor"] += 2;
						$dataAnswer3[$value["username"]]["correct_answer"] += 1;
						$dataAnswer3[$value["username"]]["true_false_answer"] += 1;
					}
				}else{
					$dataAnswer3[$value["username"]]["total_scor"] -= 1;
					$dataAnswer3[$value["username"]]["wrong_answer"] += 1;
				}
				$dataAnswer3[$value["username"]]["total_answer"] += 1;
			}
			
			$dataAnswer3[$value["username"]]["null_answer"] = 55 - $dataAnswer3[$value["username"]]["total_answer"];
		}

		$data["user"] = $user;
		$data["answer2"] = $dataAnswer2;
		$data["answer3"] = $dataAnswer3;
		$this->load->view('header');
		$this->load->view('admin_dashboard', $data);
		$this->load->view('footer');
	}

	public function resetDevice($user_id){
		if(!$this->session->userdata("is_admin")){
			redirect("/admin");
		}

		$this->db->set('logged_in', null);
		$this->db->where('id_user', $user_id);
		$this->db->update('user');

		redirect("/adminDashboard");
	}

	public function resetSubmit($user_id){
		if(!$this->session->userdata("is_admin")){
			redirect("/admin");
		}

		$this->db->where('user_id', $user_id);
		$this->db->delete('submit');

		redirect("/adminDashboard");
	}

	public function changePassword($user_id){
		if(!$this->session->userdata("is_admin")){
			redirect("/admin");
		}

		$this->db->where('id_user', $user_id);
		$user = $this->db->get('user')->row_array();
		$data["user"] = $user;
		$this->load->view('header');
		$this->load->view('change_password', $data);
		$this->load->view('footer');
	}

	public function change_password_post(){
		$data = $this->input->post();

		$pass = sha1($data["password"]);

		$this->db->set('password', $pass);
		$this->db->where('id_user', $data["id_user"]);
		$this->db->update('user');

		redirect("/adminDashboard");

	}
}