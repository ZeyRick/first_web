<?php 
	
	function renderpage($page, $data=array()){
		extract($data);
		$path = "./pages/" . $page . ".php";
		require($path);

	}

?>