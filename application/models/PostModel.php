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
	protected $_user = 'users';
	protected $_comment = 'comments';

	//get,gets data
	public function getCate($idCate)
	{
		$this->db->select('*');
		$this->db->from($this->_cate);
		$this->db->where('ID',$idCate);
		$result = $this->db->get();

		return $result->row_array(); 
	}

	public function getCates()
	{
		$this->db->select('*');
		$this->db->from($this->_cate);
		$this->db->limit(6,0);

		$result = $this->db->get();
		return $result->result_array();
	}

	public function getType($idType)
	{
		$this->db->select('*');
		$this->db->from($this->_type);
		$this->db->where('ID',$idType);
		$result = $this->db->get();

		return $result->row_array();
	}

	public function getTypes($limit, $offset, $where = '')
	{
		$this->db->select('*');
		$this->db->from($this->_type);
		if (!empty($where)) {
			$this->db->where($where);
		}
		$this->db->limit($limit,$offset);
		$result = $this->db->get();

		return $result->result_array();
	}

	public function getPost($idPost)
	{
		$this->db->select('*');
		$this->db->from($this->_user);
		$this->db->join($this->_post,'posts.ID_user = users.ID');
		$this->db->where('posts.ID',$idPost);
		$result = $this->db->get();

		return $result->row_array();
	}

	public function getComments($limit, $offset, $where = '')
	{
		$this->db->select('*');
		$this->db->from($this->_comment);
		$this->db->join($this->_user,'comments.ID_user = users.ID');
		empty($where) ? : $this->db->where($where);
		$this->db->limit($limit,$offset);
		$this->db->order_by('comments.ID','DESC');
		$result = $this->db->get();

		return $result->result_array();
	}

	public function getPosts($limit, $offset, $where = '')
	{
		$this->db->select('*');
		$this->db->from($this->_user);
		$this->db->join($this->_post,'posts.ID_user = users.ID');
		if (!empty($where)) {
			$this->db->where($where);
		}
		$this->db->limit($limit,$offset);
		$this->db->order_by('posts.ID','DESC');
		$result = $this->db->get();

		return $result->result_array();
	}


	//count data
	public function countCates($where = '')
	{
		if (empty($where)) {
			return $this->db->count_all($this->_cate);
		} else {
			$this->db->where($where);
			return $this->db->get($this->_cate)->num_rows();
		}
	}

	public function countTypes($where = '')
	{
		if (empty($where)) {
			return $this->db->count_all($this->_type);
		} else {
			$this->db->where($where);
			return $this->db->get($this->_type)->num_rows();
		}
	}

	public function countPosts($where = '')
	{
		if (empty($where)) {
			return $this->db->count_all($this->_post);
		} else {
			$this->db->where($where);
			return $this->db->get($this->_post)->num_rows();
		}
	}	

	public function countComments($where = '')
	{
		if (empty($where)) {
			return $this->db->count_all($this->_comment);
		} else {
			$this->db->where($where);
			return $this->db->get($this->_comment)->num_rows();
		}
	}

	//create data
	public function createPost($data = array())
	{
		$this->db->insert($this->_post,$data);
		$this->db->select_max('ID');
		return $this->db->get($this->_post)->row('ID');
	}

	public function createComment($data = array())
	{
		$this->db->insert($this->_comment,$data);
	}

	public function createCate($data = array())
	{
		$this->db->insert($this->_cate,$data);
	}

	public function createType($data = array())
	{
		$this->db->insert($this->_type,$data);
	}

	//update[put] data
	public function updateView($idpost)
	{
		$this->db->set('View','View+1',FALSE);
		$this->db->where('ID',$idpost);
		$this->db->update($this->_post);
	}

	public function putPost($idpost,$data)
	{
		$this->db->where('ID', $idpost);
		$this->db->update($this->_post, $data); 
	}

	public function putCate($idcate,$data)
	{
		$this->db->where('ID', $idcate);
		$this->db->update($this->_cate, $data);
	}

	public function putType($idtype,$data)
	{
		$this->db->where('ID', $idtype);
		$this->db->update($this->_type, $data);
	}

	//delete data
	public function deletePost($id)
	{
		$this->db->delete($this->_post,array('ID' => $id));
	}

	public function deleteCate($id)
	{
		$this->db->delete($this->_cate,array('ID' => $id));
	}

	public function deleteType($id)
	{
		$this->db->delete($this->_type,array('ID' => $id));
	}

	//search data
	public function search($search_text)
	{
	  	$this->db->like('Title', $search_text);
	  	$this->db->or_like('Content', $search_text);
	  	
	  	$query = $this->db->get($this->_post);
	  	return $query->result_array();
	}
}

 ?>