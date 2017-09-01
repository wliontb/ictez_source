<?php 
class Blog extends CI_Controller
{
	protected $_data;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('PostModel');
		$this->load->model('UserModel');

		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->_data = array(
			'view' => 'blog/index',
			);

		$this->load->view('main/container',$this->_data);
	}

	public function newPost($idType)
	{
		$this->_data = array(
				'title' => 'Bài viết mới - '.$this->PostModel->getType($idType)['Name'],
				'view' => 'blog/newpost',
				'datatype' => $this->PostModel->getType($idType),
				'datacate' => $this->PostModel->getCate($this->PostModel->getType($idType)['ID_cate']),
			);

		$this->form_validation->set_rules('Title','Tiêu đề bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Des','Miêu tả bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Content','Nội dung','required|min_length[5]');
		$this->form_validation->set_rules('Thumbnail','Ảnh đại diện','required|max_length[70]');

		if ($this->form_validation->run() === true) {
			$data = array(
					'Title' => $this->input->post('Title'),
					'Des' => $this->input->post('Des'),
					'Content' => $this->input->post('Content'),
					'Thumbnail' => $this->input->post('Thumbnail'),
					'Date_create' => time(),
					'ID_user' => $this->session->userdata('ID'),
					'ID_type' => $idType,
					'Public' => (($this->input->post('Public') != null) ? $this->input->post('Public') : 0),
				);

			
			redirect('baiviet-'.$this->PostModel->createPost($data));
		} else {
			$this->load->view('main/container',$this->_data);
		}
	}

	public function displayPost($idPost)
	{
		$datapost = $this->PostModel->getPost($idPost);
		$this->_data = array(
				'title' => $datapost['Title'],
				'view' => 'blog/displaypost',
				'datapost' => $datapost,
				'datatype' => $this->PostModel->getType($datapost['ID_type']),
				'datacate' => $this->PostModel->getCate($this->PostModel->getType($datapost['ID_type'])['ID_cate']),
			);

		$this->load->view('main/container',$this->_data);
	}
}


 ?>