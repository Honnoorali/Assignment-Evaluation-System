<?php

include "config.php";
if(isset($_POST['submit']))
{
	$sid="";
	$sid=$_POST['sid'];
	$sn=$_POST['sn'];
	$pn=$_POST['pn'];

	$file=rand(100,100000)."-".$_FILES['file']['name'];
	$floc=$_FILES['file']['tmp_name'];
	$fsize=$_FILES['file']['size'];
	

	$ftype=$_FILES['file']['type'];
	$ftype=explode('/',$_FILES['file']['type']);
	$ftype=end($ftype);


	$sts=false;
	$ext=array('pdf','zip');
	$file_ext=explode('.',$_FILES['file']['name']);
	$file_ext=end($file_ext);

	if(!in_array($file_ext, $ext))
	{
		$sts=true;
	}

	if($sts)
	{
		?>
		<script>
			alert("Invalid file type extensions,Please select valid file type!");
			window.location.href='uploads1.php?fail';
		</script>
		<?php
	}




	$folder="images/";

	$nsize=$fsize/1024;

	$nfile=strtolower($file);

	$ffile=str_replace('', '-', $nfile);

	$query="select * from uploads";
	$res=mysqli_query($conn,$query);
	if($res->num_rows>0)
	{
		while($row=mysqli_fetch_assoc($res))
		{
			if($row['sid']==$sid)
			{
			?>
			<script>
				alert("Sorry, you are allowed only once to upload the file");
				window.location.href="uploads1.php";

			</script>
			<?php
			exit;
			die();
			}
		}
	}

	if(move_uploaded_file($floc, $folder.$ffile))
	{
		$sql="insert into uploads (file,type,size,sid,sn,pn) values ('$ffile','$ftype','$nsize','$sid','$sn','$pn')";
		mysqli_query($conn,$sql);
		?>
		<script>
			alert("Successfully the file has been uploaded...!");
			window.location.href='uploads1.php?success';
		</script>

		<?php
	}
	else
	{
	?>
	<script>
		alert("!..Please select the file to upload..!");
		window.location.href='uploads1.php?fail';
	</script>
	<?php
	}
}
?>

<?php

	
	if(isset($_POST['delete']))
	{
		$sid="";
		$sid=$_POST['sid'];
			mysqli_query($conn,"delete from uploads where sid=$sid");
	}
?>
