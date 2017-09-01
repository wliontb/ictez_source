<?php 
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	protected $_data;

	public function index()
	{

	}

	public function logout()
	{
		$this->_data = array(
				'title' => 'Đăng xuất tài khoản '.$this->session->userdata('Username'),
				'view' => 'profile/profile',
			);

		$this->load->view('main/container',$this->_data);
	}
}

?>