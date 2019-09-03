<?php
	function getFileNames($dir){
	  //检查是否为目录
		if(is_dir($dir)){
	    //打开一个目录句柄
			if ($dh = opendir($dir)){
	      //判断打开的目录句柄中的条目
				while (($file = readdir($dh)) !== false){
	        //判断是否为目录，进入子目录读取
					if((is_dir($dir."/".$file)) && $file!="." && $file!=".."){
						if(strstr($file,'.html')){
							echo "<b><font color='red'>文件夹名：</font></b>",$file,"<hr>"."<br/>";
							getFileNames($dir."/".$file."/");
						}
					}else{
						if($file!="." && $file!=".."){
							if(strstr($file,'.html')){
								echo "<a href=".$file." target='_blank'><p>".$file."</p></a>"."<br/>";
							}
						}
					}
				}
	      //关闭由 opendir() 函数打开的目录句柄。
				closedir($dh);
			}
		}
	}
  //测试示例
	getFileNames("./");
?>