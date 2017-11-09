<?php 
/**
* Model for user
*/
class UserModel extends CI_model
{
	protected $_user = 'users';
	protected $_post = 'posts';

	public function __construct()
	{
		parent::__construct();
	}

	public function checkUser($where = array())
	{
		$this->db->where($where);
		$result = $this->db->get($this->_user);

		if ($result->num_rows() > 0) {
			return true;
		}

		return false;
	}

	public function initUser($data = array())
	{
		$this->db->insert($this->_user, $data);
	}

	public function getUser($where = array())
	{
		$this->db->select('*');
		$this->db->where($where);
		$result = $this->db->get($this->_user);

		return $result->row_array();
	}

	public function getUsers($limit, $offset, $where = '')
	{
		$this->db->select('*');
		$this->db->from($this->_user);
		if (!empty($where)) {
			$this->db->where($where);
		}
		$this->db->limit($limit,$offset);
		$this->db->order_by('ID','DESC');
		$result = $this->db->get();

		return $result->result_array();
	}

	public function countUsers($where = '')
	{
		if(empty($where)){
			return $this->db->count_all($this->_user);
		} else {
			$this->db->where($where);
			return $this->db->get($this->_user)->num_rows();
		}
	}

	public function updateUser($id,$data)
	{
		$this->db->where('ID',$id);
		$this->db->update($this->_user,$data);
	}

	public function updateSetting($data)
	{
		$this->db->update('setting',$data);
	}

}
 ?>