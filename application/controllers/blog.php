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
		$this->load->library('pagination');

		$config = array(
				'base_url' => base_url('index.php'), 
				'total_rows' => $this->PostModel->countPosts('posts.Public = 1'),
				'per_page' => 6,
				'full_tag_open' => '<nav aria-label="Page navigation" class="pt-2" style="border-top: 1px dashed #ccc;"><ul class="pagination justify-content-center">',
				'full_tag_close' => '</ul></nav>',
				'attributes' => array('class'=>'page-link'),
				'next_link' => 'Trang sau',
				'next_tag_open' => '<li class="page-item">',
				'next_tag_close' => '</li>',
				'prev_link' => 'Trang trước',
				'prev_tag_open' => '<li class="page-item">',
				'prev_tag_close' => '</li>',
				'cur_tag_open' => '<li class="page-item disabled"><a href="#" class="page-link text-secondary">',
				'cur_tag_close' => '</a></li>',
				'last_tag_open' => '<li class="page-item">',
				'last_tag_close' => '</li>',
				'last_link' => '&raquo;',
				'first_tag_open' => '<li class="page-item">',
				'first_tag_close' => '</li>',
				'first_link' => '&laquo;',
				'num_tag_open' => '<li class="page-item">',
				'num_tag_close' => '</li>',
				'suffix' => '#newtopic',
			);
		$this->pagination->initialize($config);

		$this->_data = array(
			'view' => 'blog/index',
			'title' => 'Trang chủ',
			'dataposts' => $this->PostModel->getPosts($config['per_page'], $this->uri->segment('1'), 'Posts.Public = 1'),
			'datacates' => $this->PostModel->getCates(),
			'overlay' => $this->PostModel->getPosts('','','posts.Public = 1 AND posts.Special = 1'),
			'topviews' => $this->PostModel->getPosts('5','0','View > 0'),
			);

		
		$this->load->view('main/container', $this->_data);
	}

	public function displayPost($idpost)
	{
		$this->load->helper('cookie');
		$datapost = $this->PostModel->getPost($idpost);
		$this->_data = array(
				'title' => $datapost['Title'],
				'view' => 'blog/displaypost',
				'datapost' => $datapost,
				'datatype' => $this->PostModel->getType($datapost['ID_type']),
				'datacate' => $this->PostModel->getCate($this->PostModel->getType($datapost['ID_type'])['ID_cate']),
				'datacates' => $this->PostModel->getCates(),
				'datacomment' => $this->PostModel->getComments(5,0,$where = 'comments.ID_post='.$idpost),
			);

		//count views

		if(is_null(get_cookie('viewpost_'.$idpost))){
			$this->PostModel->updateView($idpost);
			set_cookie('viewpost_'.$idpost,'done',3600);
		}

		$this->form_validation->set_rules('Content','Nội dung bình luận','required|max_length[1000]|min_length[4]');

		if ($this->form_validation->run()) {
			$data = array(
					'ID_user' => $this->session->userdata('ID'),
					'ID_post' => $idpost,
					'Date_create' => time(),
					'Content' => $this->input->post('Content'),
				);

			$this->PostModel->createComment($data);
			$this->session->set_flashdata('alert','Gửi bình luận thành công');
			redirect(base_url('baiviet-'.$idpost.'#comment'));
		}

		$this->load->view('main/container',$this->_data);
	}

	public function displayCate($idcate)
	{
		$thiscate = $this->PostModel->getCate($idcate);
		$this->_data = array(
			'title' => $thiscate['Name'],
			'view' => 'blog/displaycate',
			'datacate' => $thiscate,
			'datatypes' => $this->PostModel->getTypes('','',$where = 'ID_cate='.$thiscate['ID']),
			'datacates' => $this->PostModel->getCates(),
		);

		$this->load->view('main/container',$this->_data);
	}

	public function displayType($idtype)
	{
		$thistype = $this->PostModel->getType($idtype);
		$this->_data = array(
			'title' => $thistype['Name'],
			'view' => 'blog/displaytype',
			'datatype' => $thistype,
			'dataposts' => $this->PostModel->getPosts('','',$where = 'ID_type='.$thistype['ID']),
			'datacates' => $this->PostModel->getCates(),
		);

		$this->load->view('main/container',$this->_data);
	}

	public function search()
	{
		$this->_data = array(
			'title' => 'Tìm kiếm ',
			'view' => 'blog/search',
		);

		$this->load->view('main/container',$this->_data);
	}

}


 ?>