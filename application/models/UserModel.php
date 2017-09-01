<?php 
/**
* Model for user
*/
class UserModel extends CI_model
{
	protected $_user = 'users';

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

}
 ?>