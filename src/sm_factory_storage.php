<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, initial-scale-1">

	<title>Inventory Management System</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
	integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
	crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	crossorigin="anonymous"></script>

	<!-- Customized css file -->
	<link rel="stylesheet" type="text/css" href="../styles/sm_factory_storage.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>

	<div id="header">
		<div class="logo">
			<a href="#">In<span>ventory</span></a>
		</div>

		<div class="dropdown">
			<a href=""><span class="fa fa-user"></span> User</a>

			<div class="dropdown-content">
				<a href="sm_edit_profile.php">Edit Profile</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
	</div>

	<div id="container">
		<div class="sidebar">
			<ul>
				<a href=""><li>Dashboard</li></a>

				<a href="sm_associates_list.php">
					<li>Associates List
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Managers</li></a> -->
							<!-- <a href=""><li>Manage Managers</li></a> -->
						<!-- </ul> -->
					</li>
				</a>

				<!-- <a href=""> -->
					<!-- <li>Caregories -->
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Caregories</li></a> -->
							<!-- <a href=""><li>Manage Caregories</li></a> -->
						<!-- </ul> -->
					<!-- </li> -->
				<!-- </a> -->

				<!-- <a href=""> -->
					<!-- <li>Sub-categories -->
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Sub-categories</li></a> -->
							<!-- <a href=""><li>Manage Sub-categories</li></a> -->
						<!-- </ul> -->
					<!-- </li> -->
				<!-- </a> -->

				<a href="">
					<li>Items
						<ul>
							<a href="sm_factory_storage.php"><li>Factory Storage</li></a>
							<a href="sm_showroom_products.php"><li>Showroom Products</li></a>
						</ul>
					</li>
				</a>

				<a href="">
					<li>Orders
						<ul>
							<a href="sm_add_orders.php"><li><span class="fa fa-plus"></span>Add Orders</li></a>
							<a href="sm_manage_orders.php"><li>Manage Orders</li></a>
						</ul>
					</li>
				</a>
			</ul>
		</div>

		<div class="content">
			<div class="content_area">

				<h2>Factory Storage</h2>
				<hr>

				<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for names..">

				<table id="myTable">
					<tr class="header">
						<th style="width:5%;">ID</th>
						<th style="width:10%;">Name</th>
						<th style="width:9%;">category name</th>
						<th style="width:9%;">subcategory name</th>
						<th style="width:5%;">Stock</th>
						<th style="width:7%;">price</th>
						<th style="width:7%;">discount</th>
					</tr>

					<?php
						require ("db.php");
						$result = getJSONFromDB("select * from items order by ITEM_ID asc");
						$result = json_decode($result, true);
						for($i=0;$i<sizeof($result);$i++){
							$id = $result[$i]["ITEM_ID"];
							$name = $result[$i]["ITEM_NAME"];
							$cname = $result[$i]["CATEGORY_NAME"];
							$sname = $result[$i]["SUBCATEGORY_NAME"];
							$stock =$result[$i]["ITEM_STOCK"];
							$price = $result[$i]["ITEM_PRICE"];
							$dis = $result[$i]["ITEM_DISCOUNT"];
							echo "<tr>
								<td>$id</td>
								<td>$name</td>
								<td>$cname</td>
								<td>$sname</td>
								<td>$stock</td>
								<td>$price</td>
								<td>$dis</td>
							 </tr>";
						}
					?>

			</div>
		</div>

		<script>
			function searchFunction() {
			  // Declare variables
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");

			  // Loop through all table rows, and hide those who don't match the search query
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				}
			  }
			}
		</script>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>
