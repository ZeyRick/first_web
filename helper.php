<?php 
	
	function renderpage($page, $data=array()){
		extract($data);
		$path = "./pages/" . $page . ".php";
		require($path);

	}

	function check_empty(array $datas){
		foreach	($datas as $data){
			if (trim($data) == "") {
				return false;
			}
		}

		return true;
	}
?>