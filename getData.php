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

<body>

          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
<?php
    $q=$_GET['q'];
    $v=$_GET['v'];
    $c=$_GET['c'];
            try {
                $con = new PDO("mysql:host=localhost;dbname=CMPE226_Final",
                               "root", "9012");
                $con->setAttribute(PDO::ATTR_ERRMODE,
                                   PDO::ERRMODE_EXCEPTION);

                //print "$q";
                //print "$v";
				$vars = explode(';',$v);
				//print $vars[0];
				//print $vars[1];
				
				$pdovars = [];
				for ($i = 0; $i < sizeof($vars); $i++){
					$pdovars[":$i"]=$vars["$i"];
				}
				//print $pdovars[':0'];
                //print "$c";

                $limit = "limit 30 ";
                $endstmt = ";";
                $query = "$q";
                if("$c" == "true") {
                  $query .= "$limit";
                }
                $query .= "$endstmt";
	//print $query;
                // Fetch the database field names.
                //$result = $con->query($query);
				$result = $con->prepare($query);
				$result->execute($pdovars);
                $data = $result->fetchAll(PDO::FETCH_ASSOC);

 				if(sizeof($data) != 0) {
					
					$rowresult=0;
					print "<tbody>\n";
					$doHeader = true;
					foreach ($data as $row) {
						if ($doHeader) {
							print "<tr>\n";			
							foreach ($row as $name => $value) {
								print "<th>$name</th>\n";
							}
							print "</tr>\n";
							$doHeader = false;
						}
						// Data row.
						print "<tr>\n";
							$rowresult++;
						foreach ($row as $name => $value) {	
							print "<td>$value</td>\n";
						}
						print "</tr>\n";
					}
					print "</tbody>\n";
					print "$rowresult results found ";
				}
				else {
					print "No Results";
				}
            }
            catch(PDOException $ex) {
                echo 'ERROR: '.$ex->getMessage();
            }
?>
            </table>
          </div>
</body>
