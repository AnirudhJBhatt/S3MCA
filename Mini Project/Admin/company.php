<!---------------- Session starts form here ----------------------->
<?php  
	session_start();
	if (!$_SESSION["LoginAdmin"])
	{
		header('location:../login/login.php');
	}
		require_once "../connection/connection.php";
		$_SESSION['Logincompany']="";
	?>
<!---------------- Session Ends form here ------------------------>

<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	if (isset($_POST['Submit'])) {

		// write the php code here


		$query1= "INSERT INTO company (`C_ID`, `C_Name`, `C_Type`, `C_YOE`, `C_Address`, `C_Email`, `C_Phone`, `C_Person`, `C_Website`) VALUES ('$C_ID', '$C_Name', '$C_Type', '$C_YOE', '$C_Address', '$C_Email', '$C_Phone', '$C_Person', '$C_Website')";

		$query2="INSERT INTO `login`(`user_id`, `Password`, `Role`, `account`) VALUES ('$C_ID','Company123*','Company','Activate')";

 	
		$run1=mysqli_query($con, $query1);

		$run2=mysqli_query($con, $query2);
		
		if($run1 && $run2){
				echo "<script>alert('Success'); window.location='company.php';</script>";
 		}
 		else {
			echo "<script>alert('Failed'); window.location = 'company.php';</script>";
 		}
		
 	}
?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->
 

<!doctype html>
<html lang="en">
	<head>
		<title>Admin - Register company</title>
	</head>
	<body>
		<?php include('../common/common-header.php') ?>
		<?php include('../common/admin-sidebar.php') ?>
		<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 mb-2 w-100">
			<div class="sub-main">
				<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
					<div class="d-flex">
						<h4 class="mr-5">Company Management System</h4>
						<button type="button" class="btn btn-primary ml-5" data-toggle="modal" data-target=".bd-example-modal-lg">Add Company</button>
					</div>
				</div>
				<div class="row w-100">
					<div class=" col-lg-6 col-md-6 col-sm-12 mt-1 ">
						<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-content">
									<div class="modal-header bg-info text-white">
										<h4 class="modal-title text-center">Add New company</h4>
									</div>
									<div class="modal-body">
										<form action="company.php" method="post" enctype="multipart/form-data">
											<h5>Company Information</h5>
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="exampleInputEmail1">Company ID: </label>
														<input type="text" name="C_ID" class="form-control" required>
													</div>
												</div>
												<div class="col-md-4">
												  	<div class="form-group">
														<label for="exampleInputEmail1">Name</label>
														<input type="text" name="C_Name" class="form-control" required>
													</div>
												</div>
												<div class="col-md-4">
												  	<div class="form-group">
														<label for="exampleInputEmail1">Sector</label>
														<input type="text" name="C_Type" class="form-control" required>
													</div>
												</div>
											</div>
											<!-- Write the remaining code here -->
											<div class="modal-footer">
												<input type="submit" class="btn btn-primary" name="Submit" value="Submit">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 container-fluid">
						<section class="mt-3">							
							<table class="w-100 table-elements mb-5 table-three-tr" cellpadding="10">
								<tr class="table-tr-head table-three text-white">
									<th>Company ID</th>
									<th>Company Name</th>
									<th>Sector</th>
									<th>Contact Person</th>
									<th>Operations</th>
								</tr>
								<?php 
								$query="select * from company";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {
									echo "<tr>";
										echo "<td>".$row["C_ID"]."</td>";
										echo "<td>".$row["C_Name"]."</td>";
										echo "<td>".$row["C_Type"]."</td>";
										echo "<td>".$row["C_Person"]."</td>";
										echo "<td width='250'>";
											echo "<a class='btn btn-info' href=display-company.php?C_ID=".$row['C_ID'].">Profile</a>";
											echo " <a class='btn btn-primary' href=update-company.php?C_ID=".$row['C_ID'].">Update</a>";
											echo ' <a class="btn btn-danger" href=delete.php?C_ID='.$row['C_ID'].' onClick="return confirm(\'Do you want to delete ?\')">Delete</a>';
										echo "</td>";
									echo "</tr>";									
								}
								?>
							</table>				
						</section>
					</div>
				</div>	 	
			</div>
		</main>
		<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	</body>
</html>


