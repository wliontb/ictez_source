<?php 
/**
* Model for user
*/
class User_Model extends CI_model
{
	protected $_user = 'users';

	public function __construct()
	{
		parent::__construct();
	}

	public function checkUser($where = array())
	{
		$this->db->where($where);
		$query = $this->db->get($this->_user);

		if ($query->num_rows() > 0) {
			return true;
		}

		return false;
	}

}
 ?>