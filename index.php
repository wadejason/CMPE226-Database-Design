<!DOCTYPE html>
<?php
include_once 'dbconf.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
	 $SerialNo = $_POST['SerialNo'];
	 $Brand = $_POST['Brand'];
	 $Type = $_POST['Type'];
	 $Color = $_POST['Color'];
	 $Year = $_POST['Year'];
	 $Model = $_POST['Model'];
	 $OperatingSystem = $_POST['OperatingSystem'];
	 $Weight = $_POST['Weight'];
	 $InventoryID = $_POST['InventoryID'];
 // variables for input data
 
 // sql query for inserting data into database
 
       // $sql_query = "INSERT INTO computer(first_name,last_name,user_city) VALUES('$first_name','$last_name','$city_name')";
	 $sql_query = "INSERT INTO computer(SerialNo,Brand,Type,Color,Year,Model,OperatingSystem,Weight,InventoryID) VALUES('$SerialNo','$Brand','$Type','$Color','$Year','$Model','$OperatingSystem','$Weight','$InventoryID')";
	mysql_query($sql_query);
        
        // sql query for inserting data into database
 
}
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Computer Grocery Management System</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <!--link href="../../dist/css/bootstrap.min.css" rel="stylesheet"-->

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
    <script src="script.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Computer Management System</a>
        </div>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">

        <div class="container theme-showcase" role="main">
          <h1 class="page-header">OVERLOOK</h1>
          <p>This web application offers the detail info of the small computer retail's inventory. User can just simply search the basic information, such as computer's brand, type, color, resolution, CUP, memory capacity, etc.</p>
		  <br>
          <h2 class="sub-header">What computers do you like?</h2>
		  
          <div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Brand:</label>
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Search for..." 
				         id="queryMake">
				  <span class="input-group-btn">
					<button class="btn btn-default" 
							onclick="showBrandData(document.getElementById('queryMake').value)" 
							type="button">Go!</button>
				  </span>
				</div>
			  <label><input type="checkbox" id="limitedMake" 
			                onclick="showBrandData(document.getElementById('queryMake').value)" 
							checked>Limit Rows</label>
              <div id="txtQueryMake"></div>
            </form>
          </div>
		  <hr>
		  <div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Factory:</label>
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Search for..." 
				         id="queryRetailer">
				  <span class="input-group-btn">
					<button class="btn btn-default" 
							onclick="showRetailerData(document.getElementById('queryRetailer').value)" 
							type="button">Go!</button>
				  </span>
				</div>
			  <label><input type="checkbox" id="limitedRetailer" 
			                onclick="showRetailerData(document.getElementById('queryRetailer').value)" 
							checked>Limit Rows</label>
              <div id="txtQueryRetailer"></div>
            </form>
          </div>
		  <hr>
		 	<div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Computer Brand: </label>
			    <div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Brand: HP" 
				         id="queryMakeName">
				</div>
				<label for="text"> and Color: </label>
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Color: silver" 
				         id="queryModelName">
				  <span class="input-group-btn">
					<button class="btn btn-default" 
							onclick="showMakeModelData(document.getElementById('queryMakeName').value,
														document.getElementById('queryModelName').value)"
							type="button">Go!</button>
				  </span>
				</div>
			  <label><input type="checkbox" id="limitedMakeModel" 
			                onclick="showMakeModelData(document.getElementById('queryMakeName').value,
														document.getElementById('queryModelName').value)"
							checked>Limit Rows</label>
              <div id="txtQueryMakeModel"></div>
            </form>
          </div>
		   <hr>
		 	<div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Search Computer by Brand: </label>
			    
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Brand: DELL" 
				         id="queryMakeName2">
				</div>
				<label for="text"> and Color: </label>
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="Color: black" 
				         id="queryModelName2">
				</div>
			
			<label for="text">and Weight:</label>
			    <div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="weight min: 0" 
				         id="queryPriceMin">
				</div>
				<label for="text"> To </label>
				
				<div class="input-group" class="form-inline">
				  <input type="text" class="form-control" placeholder="weight max: 10" 
				         id="queryPriceMax">
				  <span class="input-group-btn">
					<button class="btn btn-default" 
							onclick="showMakeWeightData(document.getElementById('queryMakeName2').value,
														document.getElementById('queryModelName2').value,
														document.getElementById('queryPriceMin').value,
														document.getElementById('queryPriceMax').value)"
							type="button">Go!</button>
				  </span>
				</div>
				

              <div id="txtQueryMakeModel2"></div>
            </form>
         </div>
		  <hr>
		  
		 
          <div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Computer Type:</label>
				<div class="input-group" class="form-inline">		 
				  <div class="input-group-btn">
					<select id="computerType"  class="form-control" onchange="showComputerType(this.value)">
					  <option value="" selected="selected">--Select Type--</option>
					  <option value="Laptop">Laptop</option>
					  <option value="Desktop">Desktop</option>
					  <option value="Surface">Surface</option>
					</select>
				  </div>
				</div>
				<div class="checkbox">
				<label><input type="checkbox" id="limitedBody" 
							  onclick="showComputerType(document.getElementById('computerType').value)" 
							  checked>Limit Rows</label>
				</div>
				<div id="txtQueryBody"></div>
            </form>
          </div>
		  <hr>
		  
          <div class="row">
            <form class="form-inline" role="form">
			    <label for="text">All Info:</label>
				<div class="input-group" class="form-inline">		 
				  <div class="input-group-btn">
					<select name="queryAll" id="queryAll" class="form-control" onchange="showAllData(this.value)">
						<option value="" selected="selected">--Query--</option>
						<option value="select * from Computer ">Computer</option>
						<option value="select * from ComputerManu ">ComputerManu</option>
						<option value="select * from CPU ">CPU</option>
						<option value="select * from Display ">Display</option>
						<option value="select * from Memory ">Memory</option>
						<option value="select * from Retailer ">Retailer</option>
						<option value="select * from Storage ">Storage</option>
						<option value="select * from Transaction ">Transaction</option>
						<option value="select * from Address ">Address</option>
						<option value="select * from Addressphone ">Phone</option>
						<option value="select * from Sells ">Sells</option>
					</select>
				  </div>
				</div>
				<div class="checkbox">
				<label><input type="checkbox" id="limitedAll" 
						  onclick="showAllData(document.getElementById('queryAll').value)" 
						  checked>Limit Rows</label>
				</div>
				<!--button type="submit" class="btn btn-default">Submit</button-->
				<div id="txtAll"></div>
            </form>
          </div>
		  
		  
		  <!-- Insert Row-->
		  <hr>
		  <div class="row">
		  <form class="form-inline"  method="post">
		  <label for="text">Creat a record for computer :</label>
		    <input type="text" class="form-control" name="SerialNo" placeholder="SerialNo: 2xxxx "  required>
			<input type="text" class="form-control" name="Brand" placeholder="Brand: " required />
			<input type="text" class="form-control" name="Type" placeholder="Type: " required />
			<input type="text" class="form-control" name="Color" placeholder="Color: " required />
			<input type="text" class="form-control" name="Year" placeholder="Year: "  required>
			<input type="text" class="form-control" name="Model" placeholder="Model: " required />
			<input type="text" class="form-control" name="OperatingSystem" placeholder="OperatingSystem: " required />
			<input type="text" class="form-control" name="Weight" placeholder="Weight: " required />
			<input type="text" class="form-control" name="InventoryID" placeholder="InventoryID: C-x" required />
			<button type="submit" name="btn-save"><strong>SAVE</strong></button>
			<br>
		 </form>
		</div>

		  <hr>
		  <div class="row">
            <form class="form-inline" role="form">
			    <label for="text">Star Schema Info:</label>
				<div class="input-group" class="form-inline">		 
				  <div class="input-group-btn">
					<select name="queryStar" id="queryStar" class="form-control" onchange="showStarData(this.value)">
						<option value="" selected="selected">--Query Star--</option>
						<option value="SELECT DISTINCTROW storaged.DeviceType as 'Storage Type', storaged.Size as 'Storage Size(GB)', retailproductionfact.PriceSold, computerd.Brand, computerd.model from storaged, retailproductionfact, computerd where retailproductionfact.computerkey = computerd.computerkey and retailproductionfact.storagekey = storaged.storagekey ORDER BY retailproductionfact.PriceSold ">
						Pricesold comparision between the factors of Storage DeviceType & Brand</option>
						<option value="SELECT DISTINCTROW computerd.color, sum(retailproductionfact.PriceSold) as 'Amount' from retailproductionfact, computerd where retailproductionfact.computerkey = computerd.computerkey GROUP BY computerd.color ORDER BY sum(retailproductionfact.PriceSold) ">
						Sales Amount comparision between the factors of Computer Color & Brand</option>
					</select>
				  </div>
				</div>
				<div class="checkbox">
				<label><input type="checkbox" id="limitedStar" 
						  onclick="showStarData(document.getElementById('queryStar').value)" 
						  checked>Limit Rows</label>
				</div>
				<!--button type="submit" class="btn btn-default">Submit</button-->
            </form>
			<a href="index.php">back to main page</a>
			<div id="txtStar"></div>
          </div>

		  <br/>
		  <br/>
		  <br/>
		  <br/>
        </div>
      </div>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
