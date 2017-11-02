<div class="row">
	<div class="col-md-12">
		<form method="GET" action="">
			<div class="form-group">
				<input type="text" name="keywords" value="<?php echo set_value('keywords') ?>" class="form-control">
			</div>
			<button type="submit" class="btn btn-info">Tìm kiếm</button>
		</form>
		<p>
			<?php 
				if(!is_null(($this->input->get('keywords')))){
					echo 'kết quả tìm kiếm cho <strong>'.$this->input->get('keywords').'</strong><br/>';
					$data = $this->PostModel->search($this->input->get('keywords'));

					foreach($data as $bv){
						echo '<a href="'.base_url('baiviet-'.$bv['ID']).'">'.str_replace($this->input->get('keywords'),'<font color="red">'.$this->input->get('keywords').'</font>',$bv['Title']).'</a><br>';
					}
				}
			?>
		</p>
	</div>
</div>