<?php 
class Member extends CI_Controller
{
	protected $_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('UserModel');
	}

	public function checkUsername()
	{
		$where = array(
				'username' => $this->input->post('usernamereg'),
			);

		if ($this->UserModel->checkUser($where)) {
			$this->form_validation->set_message(__FUNCTION__, '{field} đã sử dụng');
			return false;
		} else {
			return true;
		}
	}

	public function checkEmail()
	{
		$where = array(
				'email' => $this->input->post('emailreg'),
			);

		if ($this->UserModel->checkUser($where)) {
			$this->form_validation->set_message(__FUNCTION__, '{field} đã sử dụng');
			return false;
		} else {
			return true;
		}
	}

	public function index()
	{
		$this->_data['view'] = 'blog/dangky';

		$this->load->view('main/container', $this->_data);
	}


	public function login()
	{
		$this->_data = array(
				'title' => 'Đăng nhập tài khoản',
				'view' => 'blog/logreg',
				'active' => 'login',
			);

		$this->form_validation->set_rules('namelog', 'Tài khoản hoặc địa chỉ email', 'required|min_length[5]');
		$this->form_validation->set_rules('passwordlog', 'Mật khẩu', 'required|min_length[5]');

		if ($this->form_validation->run() === true) {
			$datalogin = array(
					'Password' => $this->input->post('passwordlog'),
				);

			if (strpos($this->input->post('namelog'), '@') === false) {
				$datalogin['Username'] = $this->input->post('namelog');
			} else {
				$datalogin['Email'] = $this->input->post('namelog');
			}

			if ($this->UserModel->checkUser($datalogin) === true) {
				$this->session->set_userdata($this->UserModel->getUser($datalogin));

				redirect();
			} else {
				$this->session->set_flashdata('loi', 'Lỗi đăng nhập');
				$this->load->view('main/container', $this->_data);
			}
		} else {
			$this->load->view('main/container', $this->_data);
		}

	}

	public function register()
	{
		$this->_data = array(
				'title' => 'Đăng ký tài khoản',
				'view' => 'blog/logreg',
				'active' => 'register',
			);

		$this->form_validation->set_rules('usernamereg', 'Tên đăng nhập', 'required|min_length[5]|max_length[50]|callback_checkUsername');
		$this->form_validation->set_rules('passwordreg', 'Mật khẩu', 'required|min_length[5]|max_length[30]');
		$this->form_validation->set_rules('passwordconfirmreg', 'Nhập lại mật khẩu', 'required|min_length[5]|max_length[30]|matches[passwordreg]');
		$this->form_validation->set_rules('emailreg', 'Tài khoản email', 'required|max_length[70]|valid_email|callback_checkEmail');
		$this->form_validation->set_rules('fullnamereg', 'Họ và tên', 'required|max_length[50]');

		if ($this->form_validation->run() === true) {
			$data = array(
					'Username' => $this->input->post('usernamereg'),
					'Email' => $this->input->post('emailreg'),
					'Password' => $this->input->post('passwordreg'),
					'Fullname' => $this->input->post('fullnamereg'),
					'Avatar' => 'i.imgur.com/vCtRn7B.png',
					'Intro' => 'Updating',
					'Corn' => 100,
					'Countpost' => 0,
					'Date_create' => time(),
					'Date_modify' => time(),
				);

			$this->UserModel->initUser($data);

			$this->session->set_userdata($this->UserModel->getUser(array('Username'=>$this->input->post('usernamereg'))));

			redirect();
		} else {
			$this->load->view('main/container', $this->_data);
		}
	}

	public function logout()
	{
		if (!is_null($this->input->post('confirm')))
		{
			$this->session->sess_destroy();
			redirect();
		} else {
			redirect();
		}
	}
}

 ?>