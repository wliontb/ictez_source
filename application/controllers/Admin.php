<?php 
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
		$this->load->model('UserModel');
		$this->load->library('form_validation');
	}

	protected $_data;

	public function index()
	{
		$this->_data = array(
				'title' => 'Admin panel',
				'view' => 'admin/index',
				'count_posts' => $this->PostModel->countPosts(),
				'count_users' => $this->UserModel->countUsers(),
				'count_types' => $this->PostModel->countTypes(),
				'count_cates' => $this->PostModel->countCates(),
				'count_comments' => $this->PostModel->countComments(),
				'last_post' => $this->PostModel->getPosts(1,0,$where = ''),
				'last_user' => $this->UserModel->getUsers(1,0,$where = ''),
				'list_last_comments' => $this->PostModel->getComments(5,0,$where = ''),
			);

		$this->load->view('main/admin',$this->_data);
	}

	public function newPost($idType)
	{
		$this->_data = array(
				'title' => 'Bài viết mới - '.$this->PostModel->getType($idType)['Name'],
				'view' => 'admin/newpost',
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
					'Special' => (($this->input->post('Special') != null) ? $this->input->post('Special') : 0),
				);

			
			redirect('baiviet-'.$this->PostModel->createPost($data));
		} else {
			$this->load->view('main/admin',$this->_data);
		}
	}

	public function newPosts()
	{
		$this->_data = array(
			'title' => 'Thêm bài viết mới',
			'view' => 'admin/newposts',
		);

		$this->load->view('main/admin',$this->_data);
	}

	public function setProfile()
	{
		$this->_data = array(
			'title' => 'Cá nhân',
			'view' => 'admin/profile',
		);

		$this->load->view('main/admin',$this->_data);
	}
}

 ?>