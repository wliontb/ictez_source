<?php 
class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
	}

	public function theLoai($id)
	{
		$type = $this->PostModel->getTypes('','',$where = 'ID_cate='.$id);
		if(empty($type)){
			echo '<option>Chuyên mục rỗng!</option>';
		}
		foreach($type as $tl)
		{
			echo '<option value="'.$tl['ID'].'">'.$tl['Name'].'</option>';
		}
	}
}

 ?>