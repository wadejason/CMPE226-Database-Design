<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="../../dist/css/bootstrap.min.css" rel="stylesheet"-->

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<?php
    $q=$_GET['q'];
	try {
		$con = new PDO("mysql:host=localhost;dbname=CMPE226_Final",
					   "root", "9012");
		$con->setAttribute(PDO::ATTR_ERRMODE,
						   PDO::ERRMODE_EXCEPTION);

		//print "$make";

		$query = "$q";
	//print $query;
		$data = $con->query($query);
		$data->setFetchMode(PDO::FETCH_ASSOC);

		//print "<select id="memoryType"  class="form-control">";
		foreach ($data as $row) {
			foreach ($row as $name => $value) {
				//print '<option value="'.$value.'">'.$value.'</option>';
				print "$value\n";
			}
		}
		//print "</select>";
		//foreach ($row as $field => $value) {
			//print "<option value=$field></option>\n";
			//print "$field\n";
		//}
	}
	catch(PDOException $ex) {
		echo 'ERROR: '.$ex->getMessage();
	}
?>
