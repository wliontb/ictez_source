<?php 
class Ajax extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel');
		$this->load->helper('form');
		//$this->load->library('upload');
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

	public function upload()
	{
		 	$filename = $_FILES['fileToUpload']['tmp_name'];
			$handle = fopen($filename, "r"); 
		  	$data = fread($handle, filesize($filename)); 
		  	$pvars   = array('image' => base64_encode($data)); 
			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.imgur.com/3/image",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => $pvars,
			  CURLOPT_HTTPHEADER => array(
			    "authorization: Client-ID 75ea7cc4abd608b"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  var_dump(json_decode($response,true));
			}
	}
	public function apiupload()
	{
			
		
		$this->load->view('api/upload');

		
	}
}

 ?>