<?php
class SettingModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    protected $st = "settings";

    public function getValues($condition = '')
    {
        $this->db->select('*');
        $this->db->from($this->st);
        if(!empty($condition))
            $this->db->where($condition);

        $result = $this->db->get();
        return $result->result_array();
    }

    public function update($where,$data)
	{
        $this->db->set('Value',$data);
        $this->db->where('Name',$where);
		$this->db->update($this->st);
	}
}
?>