<?php 
class Member extends CI_Controller
{
	protected $_data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('User_Model');
	}

	public function checkUsername()
	{
		$where = array(
				'username' => $this->input->post('usernamereg'),
			);

		if ($this->User_Model->checkUser($where)) {
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

		if ($this->User_Model->checkUser($where)) {
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

		$this->form_validation->set_rules('usernamelog', 'Tên đăng nhập', 'required|min_length[5]');
		$this->form_validation->set_rules('passwordlog', 'Mật khẩu', 'required|min_length[5]');

		if ($this->form_validation->run() === true) {
			var_dump($this->input->post());
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
			var_dump($this->input->post());
		} else {
			$this->load->view('main/container', $this->_data);
		}
	}
}

 ?>