<?php
ob_start();
session_start();
include 'conn.php';

$sql = "SELECT students.first_name,
       students.last_name,
       courses.course_name,
       majors.major_name,
       specializations.specialization_name,
       exams.exam_name,
       exams.date,
       grades.grade_value
    FROM grades
    LEFT JOIN exams ON exams.exam_id = grades.exam_id
    LEFT JOIN courses ON courses.course_id = grades.course_id
    LEFT JOIN majors ON majors.major_id = grades.major_id
    LEFT JOIN students ON  students.student_id = grades.student_id
    LEFT JOIN specializations ON specializations.specialization_id = grades.specialization_id
 ";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Join 3 Table Level 1</title>
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/dataTables.dataTables.min.css"/>
</head>
<body>

<div class="container">
    <h3 align="center">1st Level Join Tables</h3>
    <div class="position-relative">
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">4</a></li>
                    <li><a class="dropdown-item" href="#">8</a></li>
                    <li><a class="dropdown-item" href="#">12</a></li>
                </ul>
            </div>
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    </div>
        <div class="table-responsive">
        <table id="student_data" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Course</th>
                    <th>Major</th>
                    <th>specialization</th>
                    <th>Exam Name</th>
                    <th>Date</th>
                    <th>Grade Value</th> 
                </tr>
              
            </thead>
                <?php  
		
                    while ($row = mysqli_fetch_array($result)) 
                    {
                        echo '
                        <tr >
                            <td> '.$row["first_name"].' </td>
                            <td> '.$row["last_name"].' </td>
                            <td> '.$row["course_name"].' </td>
                            <td> '.$row["major_name"].' </td>
                            <td> '.$row["specialization_name"].' </td>
                            <td> '.$row["exam_name"].' </td>
                            <td> '.$row["date"].' </td>
                            <td> '.$row["grade_value"].' </td>

                        </tr>
                        ';
                    }

		        ?>
       </table>
        
    </div>
    <nav aria-label="Page navigation example">
     <ul class="pagination">
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
     </ul>
    </nav>
    
    
</div>

	


		<!-- <a href="index2.php">Insert Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="search_filter_print.php">Search Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="update.php">Update Data Here</a>&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="index.php">Go to Home</a>&nbsp;&nbsp;&nbsp;&nbsp; -->


</body>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/dataTables.min.js"></script>
let table = new DataTable('#myTable');
</html>


