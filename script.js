function showBrandData(str) {
	if (str == "") {
		document.getElementById("txtQueryMake").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtQueryMake").innerHTML = xmlhttp.responseText;
			}
		};

		var queryMake = "select Computer.Brand, Computer.model, Computer.type, Computer.OperatingSystem, Computer.color, Storage.DeviceType as 'Storage Type', Storage.Size as 'Storage Size(GB)', Display.Resolution as 'Display Resolution', Computer.Year, computermanu.Name as 'Factory' from Computer, Storage ,Display, computermanu where Computer.Brand = :0 and Computer.SerialNo = Storage.SerialNo and Computer.SerialNo = Display.SerialNo and Computer.InventoryID = Computermanu.InventoryID ";
		var checked = false;
		var limited = document.getElementById("limitedMake");
		if(limited.checked) {
		  checked = true;
		} 
		xmlhttp.open("GET","getData.php?q="+queryMake+"&v="+str+"&c="+checked,true);
		xmlhttp.send();
	}
}

function showRetailerData(str) {
	if (str == "") {
		document.getElementById("txtQueryRetailer").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtQueryRetailer").innerHTML = xmlhttp.responseText;
			}
		};

		var queryRetailer = "select computermanu.Name, AddressPhone.PhoneNumber, Address.street, Address.city, Address.state, Address.zip_code from computermanu, AddressPhone, Address where computermanu.Name = :0 and computermanu.InventoryID = Address.InventoryID and AddressPhone.AddressID = Address.AddressID  ";
		var checked = false;
		var limited = document.getElementById("limitedRetailer");
		if(limited.checked) {
		  checked = true;
		} 
		xmlhttp.open("GET","getData.php?q="+queryRetailer+"&v="+str+"&c="+checked,true);
		xmlhttp.send();
	}
}


function showComputerType(str) {
	if (str == "") {
		document.getElementById("txtQueryBody").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtQueryBody").innerHTML = xmlhttp.responseText;
			}
		};
		var checked = false;
		var limited = document.getElementById("limitedBody");
		if(limited.checked) {
		  checked = true;
		} 
		var queryBody = "select computer.brand, computer.model ,computer.type, computer.color, computer.year, computer.weight from computer where computer.type = :0 ";
		xmlhttp.open("GET","getData.php?q="+queryBody+"&v="+str+"&c="+checked,true);
		xmlhttp.send();
	}
}


function showMakeModelData(make, color) {
	if (make == "") {
		make = "HP";
	} 
	if (color == "") {
		color = "Silver";
	} 
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtQueryMakeModel").innerHTML = xmlhttp.responseText;
		}
	};
	
	var queryMakeModel = " select computer.brand, computer.model, computer.type, computer.OperatingSystem ,computer.color, computer.year, computer.weight from computer where computer.brand=:0 AND computer.color=:1  ";
	var vars = make+";"+color;
	var checked = false;
	var limited = document.getElementById("limitedMakeModel");
	if(limited.checked) {
	  checked = true;
	} 
	xmlhttp.open("GET","getData.php?q="+queryMakeModel+"&v="+vars+"&c="+checked,true);
	xmlhttp.send();
}


function showMakeWeightData(make, model, weightMin, weightMax) {
	if (make == "") {
		make = "HP";
	} 
	if (model == "") {
		model = "multi";
	} 
	if (weightMin == "") {
		weightMin = 1;
	}
	if (weightMax == "") {
		weightMax = 10;
	} 
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("txtQueryMakeModel2").innerHTML = xmlhttp.responseText;
		}
	};
	
	var queryMakeModel = "select * from computer where computer.brand=:0 AND computer.color=:1  AND computer.weight>=:2 AND computer.weight<=:3 order by computer.weight ";
	var vars = make+";"+model+";"+weightMin+";"+weightMax;
	var checked = false;
	var limited = document.getElementById("limitedMakeModel");
	if(limited.checked) {
	  checked = true;
	} 
	xmlhttp.open("GET","getData.php?q="+queryMakeModel+"&v="+vars+"&c="+checked,true);
	xmlhttp.send();
}


function showAllData(str) {
	if (str == "") {
		document.getElementById("txtAll").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtAll").innerHTML = xmlhttp.responseText;
			}
		};
		var checked = false;
		var limited = document.getElementById("limitedAll");
		if(limited.checked) {
		  checked = true;
		} 
		xmlhttp.open("GET","getData.php?q="+str+"&v= &c="+checked,true);
		xmlhttp.send();
	}
}

function showStarData(str) {
	if (str == "") {
		document.getElementById("txtStar").innerHTML = "";
		return;
	} else { 
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		} else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("txtStar").innerHTML = xmlhttp.responseText;
			}
		};
		var checked = false;
		var limited = document.getElementById("limitedStar");
		if(limited.checked) {
		  checked = true;
		} 
		xmlhttp.open("GET","getData.php?q="+str+"&v= &c="+checked,true);
		xmlhttp.send();
	}
}

