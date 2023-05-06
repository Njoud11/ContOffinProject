

<?php

$con = new PDO("mysql:host=localhost;dbname=geeksforgeeks",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `pdf_data` WHERE username = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>

    		<head>
    		    <meta charset="UTF-8">
    		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		    <title>Document</title>
    		    <link rel ="stylesheet" href="sty.css">


    		</head>
    <div class="container">


		<br><br><br>
		<table>
			<tr>
				<th>رقم المعاملة</th>
				<th>ملف المعاملة</th>
			</tr>
			<tr>

				<td><?php echo $row->username; ?></td>
			  <td><?php echo $row->filename; ?></td>
				<td><a href="download.php?file=<?php echo $row->filename; ?>">تحميل</a></td>

			</tr>

		</table>
 </div>
<?php
	}


		else{
			echo "Name Does not exist";
		}


}

?>
