<?php $roll_no = $_SESSION['LoginStudent'];
$max_semester = "select max(semester) as semester from student_courses where roll_no = '$roll_no'";
$max_run = mysqli_query($con, $max_semester);
$row = mysqli_fetch_array($max_run);
$semester = $row['semester'];
$query = "select sc.subject_code,cs.subject_name,sc.semester,cs.credit_hours, sc.roll_no, sc.semester from student_courses sc inner join course_subjects cs on sc.subject_code=cs.subject_code where sc.roll_no='$roll_no' and sc.semester = $semester";
$run = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($run)) { ?>
    <tr>
        <td><?php echo $row['subject_code'] ?></td>
        <td><?php echo $row['subject_name'] ?></td>
        <td><?php echo $row['semester'] ?></td>
        <td><?php echo $row['credit_hours'] ?></td>
    </tr>
<?php } ?>