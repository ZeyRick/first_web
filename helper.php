<?php 
	
	function renderpage($page, $data=array()){
		extract($data);
		$path = "./" . $page . ".php";
		require($path);

	}
?>