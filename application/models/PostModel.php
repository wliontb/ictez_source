<?php 
class PostModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	protected $_cate = 'categories';
	protected $_type = 'types';
	protected $_post = 'posts';

	public function getCate($idCate)
	{
		$this->db->select('*');
		$this->db->from($this->_cate);
		$this->db->where('ID',$idCate);
		$result = $this->db->get();

		return $result->row_array(); 
	}

	public function getType($idType)
	{
		$this->db->select('*');
		$this->db->from($this->_type);
		$this->db->where('ID',$idType);
		$result = $this->db->get();

		return $result->row_array();
	}

	public function getPost($idPost)
	{
		$this->db->select('*');
		$this->db->from($this->_post);
		$this->db->where('ID',$idPost);
		$result = $this->db->get();

		return $result->row_array();
	}

	public function createPost($data = array())
	{
		$this->db->insert($this->_post,$data);

		return $this->db->count_all($this->_post);
	}


}

 ?>