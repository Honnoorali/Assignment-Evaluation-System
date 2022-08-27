<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php

	if(isset($_FILES['userfile']))
	{
		pre_r($_FILES);
		$phpFileUploadErrors= array(

			0 => 'There is no error, the file is uploaded with success',
			1 => 'The uploaded file exceeds the upload_max_fileSize directive in php.ini',
			2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified',
			3 => 'The file uploaded was partially uploaded',
			4 => 'NO file was uploaded',
			6 => 'Missing a temporary folder',
			7 => 'Failed to write file to disc',
			8 => 'A PHP extenion stopped the file upload.',


		);

		$ext_error=false;
		$extensions=array('pdf','zip','doc');
		$file_ext=explode('.',$_FILES['userfile']['name']);
		/*pre_r($file_ext);*/
		$file_ext=end($file_ext);
		pre_r($file_ext);

		$filepath='Desktop/htdocs/assignment/images/'.basename($_FILES['userfile']['name']);
		pre_r($filepath);

		if(!in_array($file_ext, $extensions))
		{
			$ext_error=true;
		}

		if($_FILES['userfile']['error'])
		{
			echo $phpFileUploadErrors[$_FILES['userfile']['error']];
		}
		elseif($ext_error)
		{
			echo "Invalid extension....!";
		}
		else
		{
			echo "File has been uploaded successfully!";
		}
		
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'images/'. $_FILES['userfile']['name']);
	}

	function pre_r($array)
	{
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

?>

	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="userfile">
		<input type="submit" name="" value="upload">
		
	</form>
</body>
</html>