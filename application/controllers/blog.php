<?php 
class Blog extends CI_Controller
{
	protected $_data;
	public function __construct()
	{
		parent::__construct();

	}

	public function index()
	{
		$this->_data = array(
			'view' => 'blog/index',
			);

		$this->load->view('main/container',$this->_data);
	}
}


 ?>