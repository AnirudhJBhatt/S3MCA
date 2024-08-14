<!---------------- Session starts form here ----------------------->
<?php  
	// session_start();
	// if (!$_SESSION["LoginAdmin"])
	// {
	// 	echo '<script> alert("Your Are Not Authorize Person For This link");</script>';
    //     echo '<script>window.location="../login/login.php"</script>';
	// }
	// 	require_once "../connection/connection.php";
	// 	$_SESSION["LoginStudent"]="";
	?>
<!---------------- Session Ends form here ------------------------>


<!--*********************** PHP code starts from here for data insertion into database ******************************* -->
<?php  
 	// Write your php code here

// *****************************************Images upload code starts here********************************************************** 
		$Stud_Image = $_FILES['Stud_Image']['name'];
		$tmp_name=$_FILES['Stud_Image']['tmp_name'];
		$path1 = "images/".$Stud_Image;
		move_uploaded_file($tmp_name, $path1);

		$Mark_List_10th = $_FILES['Mark_List_10th']['name'];
		$tmp_name=$_FILES['Mark_List_10th']['tmp_name'];
		$path2 = "images/".$Mark_List_10th;
		move_uploaded_file($tmp_name, $path2);

		$Mark_List_12th = $_FILES['Mark_List_12th']['name'];
		$tmp_name=$_FILES['Mark_List_12th']['tmp_name'];
		$path3 = "images/".$Mark_List_12th;
		move_uploaded_file($tmp_name, $path3);
		
// *****************************************Images upload code end here********************************************************** 
		$query1= "INSERT INTO student (`Stud_ID`, `Stud_Name`, `Stud_DOB`, `Stud_Gender`, `Stud_Mob`, `Stud_Email`, `Stud_Address`, `Stud_Caste`, `Stud_M_T`, `Stud_Course`, `Stud_Batch`, `Stud_Sem`, `Stud_ID_No`, `Stud_Reg_No`, `Stud_Father_Name`, `Stud_Father_Occ`, `Stud_Father_No`, `Stud_Mother_Name`, `Stud_Mother_Occ`, `Stud_Mother_No`, `Guardian_Email`, `Annual_Income`, `Board_12th`, `School_12th`, `Stream_12th`, `YOP_12th`, `Board_10th`, `School_10th`, `YOP_10th`, `CGPA`, `Stud_Image`, `Mark_List_10th`, `Mark_List_12th`) VALUES ('$Stud_ID', '$Stud_Name', '$Stud_DOB', '$Stud_Gender', '$Stud_Mob', '$Stud_Email', '$Stud_Address', '$Stud_Caste', '$Stud_M_T', '$Stud_Course', '$Stud_Batch', '$Stud_Sem', '$Stud_ID_No', '$Stud_Reg_No', '$Stud_Father_Name', '$Stud_Father_Occ', '$Stud_Father_No', '$Stud_Mother_Name', '$Stud_Mother_Occ', '$Stud_Mother_No', '$Guardian_Email', '$Annual_Income', '$Board_12th', '$School_12th', '$Stream_12th', '$YOP_12th', '$Board_10th', '$School_10th', '$YOP_10th', '$CGPA', '$Stud_Image', '$Mark_List_10th', '$Mark_List_12th')";
		
		$query2="INSERT INTO `login`(`user_id`, `Password`, `Role`, `account`) VALUES ('$Stud_ID','Student123*','Student','Activate')";

		$run1=mysqli_query($con, $query1);

		$run2=mysqli_query($con, $query2);
 		
		if ($run1 && $run2) {
			echo "<script>alert('Success'); window.location='student.php';</script>";
 		}
 		else {
			echo "<script>alert('Failed'); window.location = 'student.php';</script>";
 		}
 	}
?>

<!--*********************** PHP code end from here for data insertion into database ******************************* -->

<!doctype html>
<html lang="en">

<head>
	<title>Admin - Add Student</title>
</head>

<body>
	<?php include('../common/common-header.php') ?>
	<?php include('../common/admin-sidebar.php') ?>
	<main role="main" class="col-xl-10 col-lg-9 col-md-8 ml-sm-auto px-md-4 w-100">
		<div class="sub-main">
			<div class="text-center d-flex flex-wrap flex-md-nowrap pt-3 pb-2 mb-3 text-white admin-dashboard pl-3">
				<div class="d-flex">
					<h4 class="mr-5">Student Management System </h4>
					<button type="button" class="btn btn-primary ml-5" data-toggle="modal"
						data-target=".bd-example-modal-lg">Add Student</button>
				</div>
			</div>
			<div class="col-md-2 pt-3 w-100">
				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
					aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg">
						<div class="modal-content">
							<div class="modal-header bg-info text-white">
								<h4 class="modal-title text-center">Add New Student</h4>
							</div>
							<div class="modal-body">
								<form action="student.php" method="POST" enctype="multipart/form-data">
									<h5>Student Details</h5>
									<div class="row mt-3">
										<div class="col-md-4">
											<div class="form-group">
												<label>Admission No:*</label>
												<input type="text" name="Stud_ID" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Name:*</label>
												<input type="text" name="Stud_Name" class="form-control" required>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label>Date of Birth: </label>
												<input type="date" name="Stud_DOB" class="form-control" required>
											</div>
										</div>
									</div>
									<!-- Write the remaining code here -->
									<div class="modal-footer">
										<input type="submit" class="btn btn-primary" name="submit">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 container-fluid">
					<section class="mt-3">						
						<table class="w-100 table-elements mb-5 table-three-tr text-center" cellpadding="10">
							<tr class="table-tr-head table-three text-white">
								<th>Admission No</th>
								<th>Name</th>
								<th>Course</th>
								<th>Batch</th>
								<th>Semester</th>
								<th colspan="1">Operations</th>
							</tr>
							<?php 
								
								$query ="SELECT `Stud_ID`,`Stud_Name`,`Stud_Course`,`Stud_Batch`,`Stud_Sem` FROM student;";
								$run=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($run)) {?>
							<tr>
								
								<td>
									<?php echo $row["Stud_ID"] ?>
								</td>
								<td>
									<?php echo $row["Stud_Name"] ?>
								</td>
								<td>
									<?php echo $row["Stud_Course"] ?>
								</td>
								<td>
									<?php echo $row["Stud_Batch"] ?>
								</td>
								<td>
									<?php echo $row["Stud_Sem"] ?>
								</td>
								<td width='250'>
									<?php 
										echo "<a class='btn btn-info' href=display-student.php?Stud_ID=".$row['Stud_ID'].">Profile</a>";
										echo '  <a class="btn btn-primary" href=update-student.php?Stud_ID='.$row['Stud_ID'].'>Update</a>';
										echo '	<a class="btn btn-danger" href=delete.php?Stud_ID='.$row['Stud_ID'].' onClick="return confirm(\'Do you want to delete ?\')">Delete</a>';
									?>
								</td>
							</tr>
							<?php }
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