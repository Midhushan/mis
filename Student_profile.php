<!------START DON'T CHANGE ORDER HEAD,MANU,FOOTER----->
<!---BLOCK 01--->
<?php 
   
include_once("config.php");

$title ="STUDENT PROFILE | SLGTI"; //YOUR HEAD TITLE CREATE VARIABLE BEFORE FILE NAME
include_once("head.php");
include_once("menu.php");

?>
<!----END DON'T CHANGE THE ORDER---->


<!---BLOCK 02--->
<!---START YOUR CODER HERE----->


<!-----END YOUR CODE----->
<?php
$stid = $title = $fname = $ininame = $gender = $civil = $email = $nic = $dob = $phone = $address = $zip = $district = $division = $province = $blood = $mode =
$ename = $eaddress = $ephone = $erelation = $enstatus = $coid = $year = $enroll = $exit = $qutype = $index = $yoe = $subject = $results = null;

$username = $_SESSION['user_name'];

$sql = "SELECT user_name,`student_title`,`student_fullname`,`student_ininame`,`student_gender`,`student_civil`,`student_email`,`student_nic`,`student_profile_img`,
`student_dob`,`student_phone`,`student_address`,`student_zip`,`student_district`,`student_divisions`,`student_provice`,`student_blood`,`student_em_name`,`student_em_address`,
`student_em_phone`,`student_em_relation`,`student_status`,`course_name`,`department_name`,`course_mode`,course_nvq_level,`academic_year`,`student_enroll_date`,`student_enroll_exit_date`,
`student_enroll_status` FROM `student` as s, student_enroll as e, user as u, course as c, department as d WHERE user_name=s.student_id and s.student_id=e.student_id 
 and e.course_id=c.course_id and  c.department_id=d.department_id and  user_name='$username'";
$result = mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1)
  {
    echo "success";
    $row =mysqli_fetch_assoc($result);
    //$stid = $row['student_id'];
    $title = $row['student_title'];
    $fname = $row['student_fullname'];
    $ininame = $row['student_ininame'];
    $gender = $row['student_gender'];
    $civil = $row['student_civil'];
    $email = $row['student_email'];
    $nic = $row['student_nic'];
    $dob = $row['student_dob'];
    $phone = $row['student_phone'];
    $address = $row['student_address'];
    $zip = $row['student_zip'];
    $district = $row['student_district'];
    $division = $row['student_divisions'];
    $province = $row['student_provice'];
    $blood = $row['student_blood'];
    $ename = $row['student_em_name'];
    $eaddress = $row['student_em_address'];
    $ephone = $row['student_em_phone'];
    $erelation = $row['student_em_relation'];
    $coid = $row['course_name'];
    $depth = $row['department_name'];
    $level = $row['course_nvq_level'];
    $mode = $row['course_mode'];
    $year = $row['academic_year'];
    $enstatus =$row['student_enroll_status'];
    $enroll = $row['student_enroll_date'];
    $exit = $row['student_enroll_exit_date'];
  }

?>
<!-- form start---->
<div class="col text-center shadow p-5 mb-5 bg-white rounded">
<h1 style="text-align:center"  > SRI LANKA GERMAN TRAINING INSTITUTE  </h1>
<h5 style="text-align:center"> Killinochchi </h5>
</div>

<div class="container">
<form method="POST">

<div class="form-row shadow p-2 mb-4 bg-white rounded">
    <div class="col-md-3 mb-3 " > 
    <img src="img/user.png" alt="..." class="img-thumbnail" style="width:200px;height:200px;">
    <!-- <button type="button" class="btn btn-outline-success">Success</button> -->
    </div>
    <div class="col-md-7 col-sm-4">
        <h5 class="text-muted"><b><?php echo $title.".".$fname; ?></b></h5>
        <h6 class="text-muted"><?php echo $username; ?></h6>
        <h6 class="text-muted"><?php echo $nic; ?></h6>
        <h6 class="text-muted">
        <?php 
        $sql="select d.department_name from department as d, course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and c.department_id=d.department_id and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Department of ".$depth; 
        }
        else
        {
            echo "Course has been Completed";
        }

        ?>
        </h6>
        <h6 class="text-muted">
        <?php 
        $sql="select c.course_name from  course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Department of ".$coid; 
        }
        else
        {
            echo "Course has been Completed";
        }

        ?>
        </h6>
        <p class="text-muted" style="font-size:15px;">
        <?php 
        $sql="select c.course_nvq_level from course as c, student_enroll as e, user as u where user_name=e.student_id and 
        e.course_id=c.course_id and student_enroll_status='Following' and user_name='$username'";
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Department of ".$level; 
        }
        // else
        // {
        //     echo "Course has been Completed";
        // }

        ?>
        </P>
        <h6 class="text-muted">
        <?php 
        $sql="select DISTINCT max(academic_year),`student_enroll_exit_date` from student_enroll WHERE student_id='$username' ORDER BY academic_year DESC";
        
        $result = mysqli_query($con,$sql);

        if(mysqli_num_rows($result)==1)
        {
        echo "Batch: ".$year."( ".$exit." )"; 
        }
        // else
        // {
        //     echo "Course has been Completed";
        // }

        ?>
        </h6>
        <!-- <div class="form-row">
        <div class="col-md-5 col-sm-4"></div>
        <div class="col-md-5 col-sm-4"><h5 class="text-muted" style="flot:left">2018 November 01</h5></div> 
        </div> -->
    </div>
    <!-- <div class="col-md-4 col-sm-4 shadow p-3 mb-5 bg-white rounded">
    <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    <h6 class="text-muted">2017/ICT/BIT-06</h6>
    </div> -->
</div>

<!-- <div class="form-row shadow p-2 mb-4 bg-white rounded"> -->
<nav>
  <div class="nav nav-tabs shadow p-2 mb-4 bg-white rounded" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Password</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Qualification Info</a>
  </div>
</nav>
<div class="tab-content shadow p-2 mb-4 bg-white rounded" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><br>
        <h5 style="border-bottom: 2px solid #aaa;"> Personal Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name with Initials: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Miss.R.Thanujah </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Gender: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Female </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Date of Birth: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 21st April 1996 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Civil Status: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Single </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Enroll Date:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 1st November 2018 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6>Exit Date:</h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 1st November 2018 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Blood Group: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> B+ </h6>
            </div>
        </div><br>

        <h5 style="border-bottom: 2px solid #aaa;"> Contact Information </h5><br>
        <div class="row" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Email: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> thanujah@gmail.com </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 0776452733 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> No-117, Vipulananda South Road, Karaitivu-06 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> District:  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Ampara </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Province: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Eastern </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Zip Code: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 4000 </h6>
            </div>
        </div><br>

        <h5 style="border-bottom: 2px solid #aaa;"> Emergency Contact Information </h5><br>
        <div class="row container" id="personal info">
            <div class="col-md-2 col-sm-4">
            <h6> Name: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Mr.Ravinthiran.Thanujah </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Phone No: </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> 0776452733 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
                <h6> Address: </h6>
            </div>
            <div class="col-md-10 col-sm-4">
                <h6 class="text-muted"> No-117, Vipulananda South Road, Karaitivu-06 </h6>
            </div>

            <div class="col-md-2 col-sm-4">
            <h6> Relationship  </h6>
            </div>
            <div class="col-md-4 col-sm-4">
                <h6 class="text-muted"> Father </h6>
            </div>
        </div>
  </div>

  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <!-- <form role="form" > -->
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Current Password</label>
            <div class="col-lg-6">
                <input class="form-control" type="password" name="password">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">New Password</label>
            <div class="col-lg-6">
                <input class="form-control" type="password" name="npassword">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label">Confirm new password</label>
            <div class="col-lg-6">
                <input class="form-control" type="password" name="cpassword">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-lg-3 col-form-label form-control-label"></label>
            <div class="col-lg-6">
                <input type="button" class="btn btn-primary" value="Save Changes">
                <input type="reset" class="btn btn-light" value="Cancel">
            </div>
        </div>
        <!-- </form>-->
  </div>

  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="form-row">
        <div id="results-student_education" class="form-group table-responsive">               
            <table class="table table-hover" width="100%" id="table">
              <thead>
              <tr>
              <th width="15%"> Qualification Type </th>
              <th width="20%"> Index No </th>
              <th width="15%"> Year of Exam </th>
              <th width="30%"> Subject </th>
              <th width="10%"> Result </th>
              </tr>
              </head>
              <tbody>
              <?php
            //    if(isset($_GET['edit']))
            //    {
                  //$stid =$_GET['edit'];WHERE `qualification_student_id`= '$stid'"
                  //include_once("mysqli_connect.php");
                  $username = $_SESSION['user_name'];
                  $sql ="SELECT`qualification_type`,`qualification_index_no`,`qualification_year`,`qualification_description`,`qualification_results`
                  FROM `user`,student_qualification WHERE `user_name`= qualification_student_id and `user_name`='$username'";
                  $result = mysqli_query ($con, $sql);
                  if (mysqli_num_rows($result)>0)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      echo '
                      <tr style="text-align:left";>
                          <td>'. $row["qualification_type"].'</td>
                          <td>'. $row["qualification_index_no"].'</td>
                          <td>'. $row["qualification_year"].'</td>
                          <td>'. $row["qualification_description"].'</td>
                          <td>'. $row["qualification_results"].'</td>
                      </tr> ';
                    }
                  }
                  else
                  {
                    echo "0 results";
                  }

               ?>
              </tbody>
            </table>  
      </div>
      </div>
  </div>
</div>
</div>


</form>
</div>

<!---BLOCK 03--->
<!----DON'T CHANGE THE ORDER--->
<?php 
include_once("FOOTER.PHP"); 
?>