<?php

	include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background:url(5.jpg);
			
		}
		.content-table{
			border-collapse: collapse;
			margin:25px 0;
			font-size: 1.1em;
			min-width: 200px;
			border-radius: 5px 5px 0 0;
			overflow: hidden;
			box-shadow: 0 0 20px rgba(0,0,0,1.95);
			position: relative;top: 50px;left: 75px;
			width: 90%;
		}
		.content-table thead tr{
			background-color: #009879;
			color: #ffffff;
			text-align: left;
			font-weight: bold;
		}

		.content-table th,
		.content-table td{
			padding:12px 15px;
			color: white;
		}

		.content-table tbody tr{
			border-bottom : 1px solid #dddddd;
		}

		.content-table tbody tr:nth-of-type(even){
			background-color: #f3f3f3;
		}

		.content-table tbody tr:last-child{
			border-bottom: 1px solid teal;
		}

		/*.content-table tbody tr : active-row{
			font-weight: bold;
			color:#009879;
		}*/
		.btn{
			text-decoration: none;
			color: teal;
			font-size: 17px;
			text-align: center;
		}
		p{
			position: relative;top: 20px;left: 380px;
			font-size: 50px;
			color: white;

		}
		
	</style>
</head>
<body>
	<form action="marks_admin.php" method="post" target="right"> 
<div id="body">
	<p><b>ASSIGNMENT FILES</b></p>
	<table  class="content-table">
		<thead>
		<tr>
			<th>STUDENT ID</th>
			<th>SUBJECT NAME</th>
			<th>PROJECT NAME</th>
			<th>FILE NAME</th>
			<th>ACTION</th>
			<th colspan="1" align="center">STATUS</th>
		</tr>
		<thead>

		<?php

			$sql="select * from uploads";
			$res=mysqli_query($conn,$sql);
			while($row=mysqli_fetch_array($res))
			{
				$buttons="";
				$u_query="SELECT * FROM marks WHERE sid='".$row['sid']."'";
				$r=mysqli_query($conn,$u_query);
				if( $r->num_rows==0 )
				{
					$buttons='
						<td><a href="marks_admin.php?usn='.$row['sid'].'"  class="btn" target="right"><b>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

							EVALUATE</b></a></td>
					';
				}
				else
				{
					$buttons='<td colspan="2" class="m">
									<label>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										<b>EVALUATED</b>
									</label>
								</td>';
				}

		?>
		<tbody>
		<tr class="active-row">
			<td><?php echo $row['sid'] ?></td>
			<td><?php echo $row['sn'] ?></td>
			<td><?php echo $row['pn'] ?></td>
			<td><?php echo $row['file'] ?></td>
			<td><a href="images/<?php echo $row['file'] ?>" target="_blank" class="btn"><b>VIEW</b></a></td>
			<?php echo $buttons; ?>

		</tr>
	</tbody>
		<?php
			}
		?>
		
	</table>
</div>
</form>
</body>
</html>