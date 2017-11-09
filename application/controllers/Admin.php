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
			'datacates' => $this->PostModel->getCates(),
			'datatypes' => $this->PostModel->getTypes('','',$where = 'ID_cate=1'),
		);

		$this->form_validation->set_rules('Categories','required');
		$this->form_validation->set_rules('Types','required');
		$this->form_validation->set_rules('Title','Tiêu đề bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Des','Miêu tả bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Content','Nội dung','required|min_length[5]');
		$this->form_validation->set_rules('Thumbnail','Ảnh đại diện','required|max_length[150]');
		$this->form_validation->set_rules('Tags','required');

		if ($this->form_validation->run() === true) {
			$data = array(
					'Title' => $this->input->post('Title'),
					'Des' => $this->input->post('Des'),
					'Content' => $this->input->post('Content'),
					'Thumbnail' => $this->input->post('Thumbnail'),
					'Date_create' => time(),
					'ID_user' => $this->session->userdata('ID'),
					'Public' => (($this->input->post('Public') != null) ? $this->input->post('Public') : 0),
					'Special' => (($this->input->post('Special') != null) ? $this->input->post('Special') : 0),
					'Tags' => $this->input->post('hidden-Tags'),
					'ID_type' => $this->input->post('Types'),
				);
			redirect('baiviet-'.$this->PostModel->createPost($data));
		} else {
			$this->load->view('main/admin',$this->_data);
		}
	}

	public function setProfile()
	{
		$this->_data = array(
			'title' => 'Cá nhân - tùy chỉnh',
			'view' => 'admin/profile',
		);

		$this->form_validation->set_rules('fullname','họ và tên','required|min_length[2]|max_length[50]');
		$this->form_validation->set_rules('address','địa chỉ','required|min_length[2]|max_length[100]');
		$this->form_validation->set_rules('intro','giới thiệu','required|min_length[2]|max_length[300]');
		$this->form_validation->set_rules('avatar','ảnh đại diện','required|min_length[2]|max_length[70]');

		if($this->form_validation->run()){
			$this->UserModel->updateUser($this->session->userdata('ID'),$data = array(
				'Fullname' => $this->input->post('fullname'),
				'Address' => $this->input->post('address'),
				'Intro' => $this->input->post('intro'),
				'Avatar' => $this->input->post('avatar')
			));

			$this->session->set_flashdata('alert','Cập nhật thông tin thành công');
			$this->session->set_userdata($this->UserModel->getUser(array('ID' => $this->session->userdata('ID'))));

			redirect(base_url('quanly/canhan'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function changePassword()
	{
		$this->form_validation->set_rules('currentpassword','mật khẩu hiện tại','required');
		$this->form_validation->set_rules('password','mật khẩu mới','required');
		$this->form_validation->set_rules('passwordconfirm','nhập lại mật khẩu','required|matches[password]');

		if($this->form_validation->run()){
			$this->UserModel->updateUser($this->session->userdata('ID'),$data = array('Password' => $this->input->post('passwordconfirm')));

			$this->session->set_flashdata('alert','Cập nhật mật khẩu thành công');
			redirect(base_url('quanly/canhan'));
		}
	}

	public function listPosts()
	{
		$this->_data = array(
			'title' => 'Danh sách bài viết',
			'view' => 'admin/listpost',
			'postsactive' => $this->PostModel->getPosts('','',$where = 'Public=1'),
			'postsnoactive' => $this->PostModel->getPosts('','',$where = 'Public=0'),
		);

		$this->load->view('main/admin',$this->_data);
	}

	public function listMembers()
	{
		$this->_data = array(
			'title' => 'Danh sách thành viên',
			'view' => 'admin/listmember',
			'memactive' => $this->UserModel->getUsers('','',$where = 'Permission!=0'),
			'memnoactive' => $this->UserModel->getUsers('','',$where = 'Permission=0'),
		);

		$this->load->view('main/admin',$this->_data);
	}

	public function editPost($idpost)
	{
		$thispost = $this->PostModel->getPost($idpost);
		$this->_data = array(
			'title' => $thispost['Title'],
			'view' => 'admin/editpost',
			'datapost' => $thispost,
		);

		$this->form_validation->set_rules('Title','Tiêu đề bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Des','Miêu tả bài viết','required|max_length[300]|min_length[5]');
		$this->form_validation->set_rules('Content','Nội dung','required|min_length[5]');
		$this->form_validation->set_rules('Thumbnail','Ảnh đại diện','required|max_length[150]');
		$this->form_validation->set_rules('Tags','required');

		if($this->form_validation->run()){
			$dataupdate = array(
				'Title' => $this->input->post('Title'),
				'Des' => $this->input->post('Des'),
				'Content' => $this->input->post('Content'),
				'Thumbnail' => $this->input->post('Thumbnail'),
				'Date_modify' => time(),
				'Tags' => $this->input->post('hidden-Tags'),
			);

			$this->PostModel->putPost($idpost,$dataupdate);
			redirect(base_url('baiviet-'.$idpost));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function catesManager()
	{
		$this->_data = array(
			'title' => 'Quản lý chuyên mục',
			'view' => 'admin/catesmanager',
			'datacates' => $this->PostModel->getCates(),
		);

		$this->form_validation->set_rules('Name','Tên chuyên mục','required|max_length[100]|min_length[5]');
		$this->form_validation->set_rules('Intro','Mô tả','required|max_length[300]|min_length[4]');
		$this->form_validation->set_rules('Manager','Quản lý','max_length[100]');

		if($this->form_validation->run()){
			$data = array(
				'Name' => $this->input->post('Name'), 
				'Intro' => $this->input->post('Intro'),
				'Manager' => $this->input->post('Manager'),
				'Date_create' => time(),
			);

			$this->PostModel->createCate($data);
			$this->session->set_flashdata('alert','Tạo thành công chuyên mục '.$data['Name']);
			redirect(base_url('quanly/chuyenmuc'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function editCate($id)
	{
		$this->_data = array(
			'title' => $this->PostModel->getCate($id)['Name'],
			'view' => 'admin/editcate',
			'datacate' => $this->PostModel->getCate($id),
			'datatypes' => $this->PostModel->getTypes(10,0,$where = 'ID_cate='.$id),
			'counttype' => $this->PostModel->countTypes($where = 'ID_cate='.$id), 
			'countmanager' => count(explode(',',$this->PostModel->getCate($id)['Manager'])),
			'idmanager' => explode(',',$this->PostModel->getCate($id)['Manager']),
		);

		$this->form_validation->set_rules('Name','Tên chuyên mục','required|max_length[100]|min_length[5]');
		$this->form_validation->set_rules('Intro','Mô tả','required|max_length[300]|min_length[4]');
		$this->form_validation->set_rules('Manager','Quản lý','max_length[100]');

		if($this->form_validation->run()){
			$data = array(
				'Name' => $this->input->post('Name'), 
				'Intro' => $this->input->post('Intro'),
				'Manager' => $this->input->post('Manager'),
				'Date_modify' => time(),
			);

			$this->PostModel->putCate($id,$data);
			$this->session->set_flashdata('alert','Đã cập nhật chuyên mục '.$data['Name']);
			redirect(base_url('quanly/chuyenmuc-'.$id));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function typesManager()
	{
		$this->_data = array(
			'title' => 'Quản lý thể loại',
			'view' => 'admin/typesmanager',
			'datatypes' => $this->PostModel->getTypes(6,0),
			'datacates' => $this->PostModel->getCates(),
		);

		$this->form_validation->set_rules('Name','Tên thể loại','required|max_length[100]|min_length[5]');
		$this->form_validation->set_rules('Intro','Mô tả','required|max_length[300]|min_length[4]');
		$this->form_validation->set_rules('Manager','Quản lý','max_length[100]');
		$this->form_validation->set_rules('ID_cate','Chuyên mục','required');

		if($this->form_validation->run()){
			$data = array(
				'Name' => $this->input->post('Name'), 
				'Intro' => $this->input->post('Intro'),
				'Manager' => $this->input->post('Manager'),
				'ID_cate' => $this->input->post('ID_cate'),
				'Date_create' => time(),
			);

			$this->PostModel->createType($data);
			$this->session->set_flashdata('alert','Đã thêm thể loại '.$data['Name']);
			redirect(base_url('quanly/theloai'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function editType($id)
	{
		$this->_data = array(
			'title' => 'Sửa '.$this->PostModel->getType($id)['Name'],
			'view' => 'admin/edittype',
			'datatype' => $this->PostModel->getType($id),
			'dataposts' => $this->PostModel->getPosts(10,0,$where = 'ID_type='.$id),
			'countpost' => $this->PostModel->countPosts($where = 'ID_type='.$id), 
			'countmanager' => count(explode(',',$this->PostModel->getType($id)['Manager'])),
			'idmanager' => explode(',',$this->PostModel->getType($id)['Manager']),
			'datacates' => $this->PostModel->getCates(),
		);

		$this->form_validation->set_rules('Name','Tên thể loại','required|max_length[100]|min_length[5]');
		$this->form_validation->set_rules('Intro','Mô tả','required|max_length[300]|min_length[4]');
		$this->form_validation->set_rules('Manager','Quản lý','max_length[100]');
		$this->form_validation->set_rules('ID_cate','Chuyên mục','required');

		if($this->form_validation->run()){
			$data = array(
				'Name' => $this->input->post('Name'), 
				'Intro' => $this->input->post('Intro'),
				'Manager' => $this->input->post('Manager'),
				'ID_cate' => $this->input->post('ID_cate'),
				'Date_create' => time(),
			);

			$this->PostModel->putType($id,$data);
			$this->session->set_flashdata('alert','Đã cập nhật thể loại '.$data['Name']);
			redirect(base_url('quanly/theloai-'.$id));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function deletePost($id)
	{
		$post = $this->PostModel->getPost($id);

		$this->_data = array(
			'title' => 'Xóa bài viết '.$post['Title'],
			'view' => 'admin/deletepost',
		);

		$this->form_validation->set_rules('confirm','confirm','required');

		if($this->form_validation->run()){
			$this->PostModel->deletePost($id);

			$this->session->set_flashdata('alert','Bạn đã xóa thành công bài viết '.$post['Title']);
			redirect(base_url('quanly/danhsachbaiviet'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function deleteType($id)
	{
		$type = $this->PostModel->getType($id);

		$this->_data = array(
			'title' => 'Xóa thể loại '.$type['Name'],
			'view' => 'admin/deletetype',
		);

		$this->form_validation->set_rules('confirm','confirm','required');

		if($this->form_validation->run()){
			$this->PostModel->deleteType($id);

			$this->session->set_flashdata('alert','Bạn đã xóa thành công thể loại '.$type['Name']);
			redirect(base_url('quanly/theloai'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function deleteCate($id)
	{
		$cate = $this->PostModel->getCate($id);

		$this->_data = array(
			'title' => 'Xóa chuyên mục '.$cate['Name'],
			'view' => 'admin/deletecate',
		);

		$this->form_validation->set_rules('confirm','confirm','required');

		if($this->form_validation->run()){
			$this->PostModel->deleteCate($id);

			$this->session->set_flashdata('alert','Bạn đã xóa thành công chuyên mục '.$cate['Name']);
			redirect(base_url('quanly/chuyenmuc'));
		}

		$this->load->view('main/admin',$this->_data);
	}

	public function setting()
	{
		$this->_data = array(
			'title' => 'Cài đặt',
			'view' => 'admin/setting',
		);
		
		$this->form_validation->set_rules('allow-register','cho phép đăng ký','required');
		$this->form_validation->set_rules('postsperindex','số bài viết trên trang chủ','required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('typespercate','số thể loại trong chuyên mục','required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('postspertype','số bài viết trong thể loại','required|min_length[1]|max_length[20]');
		$this->form_validation->set_rules('ads','quảng cáo','max_length[255]');

		if($this->form_validation->run()){
			$data = array(
				'allowreg'  => $this->input->post('allow-register'),
				'postsperindex' => $this->input->post('postsperindex'),
				'typespercate' => $this->input->post('typespercate'),
				'postspertype' => $this->input->post('postspertype'),
			);

			if(!empty($this->input->post('ads')))
				$data['ads'] = $this->input->post('ads');

			$this->UserModel->updateSetting($data);
			$this->session->set_flashdata('alert','Cập nhật cài đặt thành công!');

			redirect(base_url('quanly/caidat'));
		}

		$this->load->view('main/admin',$this->_data);
	}
}

 ?>