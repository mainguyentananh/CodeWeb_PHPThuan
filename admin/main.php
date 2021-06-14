 	
<?php

				if(isset($_GET['action']) && $_GET['query']){
					$temp = $_GET['action'];
					$query = $_GET['query'];
				}
				else{
					$temp = '';
					$query = '';	
				}
				if($temp=='quanlyloaihanghoa' && $query=='lietke'){
					include("main/quanlyloaihanghoa/lietke.php");
				}
				if($temp=='quanlyloaihanghoa' && $query=='sua'){
					include("main/quanlyloaihanghoa/sua.php");
				}
				if($temp=='quanlyloaihanghoa' && $query=='them'){
					include("main/quanlyloaihanghoa/them.php");
				}
				if($temp=='quanlyhanghoa' && $query=='them'){
					include("main/quanlyhanghoa/them.php");
					
				}
				if($temp=='quanlyhanghoa' && $query=='lietke'){
					include("main/quanlyhanghoa/lietke.php");
					
				}
				if($temp=='quanlyhanghoa' && $query =='sua'){
					include("main/quanlyhanghoa/sua.php");
					
				}
				if($temp=='quanlydonhang' && $query =='lietke'){
					include("main/quanlydonhang/lietke.php");
					
				}
				if($temp=='quanlydonhang' && $query =='chitiet'){
					include("main/quanlydonhang/chitiet.php");
					
				}
				if($temp=='quanlydonhang' && $query =='xuly'){
					include("main/quanlydonhang/xuly.php");
					
				}
								
	?> 