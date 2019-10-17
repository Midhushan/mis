<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "Home | SLGTI";
include_once("config.php");
include_once("head.php");
include_once("menu.php");
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!-- <h1 class="text-center">SLGTI Hostel Management</h1>
<p  class="text-center display-4"  style="font-size:25px;">Welcome to SLGTI Hostel Management <br> -->




          <!-- Content here -->
          
          <?php
          
        if(isset($_POST['allo'])){
         
         
        
          
          $id=$_POST['id'];
          $name =$_POST['name'];
          $dept =$_POST['dept'];
          $address =$_POST['address'];
          $dist =$_POST['dist'];
          $dis =$_POST['dis'];
          $gender =$_POST['title'];
          $block =$_POST['block'];
          $room =$_POST['room'];
          $date =$_POST['date'];
          $leave =$_POST['leave'];
          $sql= "INSERT INTO `hostel` (`student_id`, `fullname`, `department_name`, `address`, `district`, `distance`, `gender`, `block_no`, 
          `room_no`, `date_of_addmission`, `date_of_leaving`) VALUES ('$id', '$name', '$dept', '$address', '$dist', '$dis', '$gender', '$block', '$room', '$date', '$leave')";
          if(mysqli_query($con,$sql)){
              echo "new record create sucessfully ";
          }else{
              echo "error :".$sql."<br>".mysqli_error($con);
          }
        }
  
        
      
        ?>

        <?php
        $student_id=$name=$dept=$addr =$dist =$dis =$title = $block =$room =$date =$leave =null;
        if(isset($_GET['edit'])){
          $student_id = $_GET['edit'];
          $sql ="SELECT * FROM `hostel` WHERE `student_id` = $student_id";
          $result = mysqli_query($con ,$sql);
          if(mysqli_num_rows($result)== 1){
              $row = mysqli_fetch_assoc($result);
              $student_id = $row['student_id'];
              $name = $row['fullname'];
              $dept = $row['department_name'];
              $addr = $row['address'];
              $dist = $row['district'];
              $dis = $row['distance'];
              $title = $row['gender'];
              $block = $row['block_no'];
              $room = $row['room_no'];
              $date = $row['date_of_addmission'];
              $leave = $row['date_of_leaving'];
              
              
          }
      }
      
       
        if(isset($_POST['upt'])){
           
           $student_id = $_GET['edit'];
           $name =$_POST['name'];
           $dept =$_POST['dept'];
           $address =$_POST['address'];
           $dist =$_POST['dist'];
           $dis =$_POST['dis'];
           $gender =$_POST['title'];
           $block =$_POST['block'];
           $room =$_POST['room'];
           $date =$_POST['date'];
           $leave =$_POST['leave'];
         
          $sql = "UPDATE `hostel` 
          SET `fullname` = ' $name', 
          `department_name` = '$dept',
          `address` = ' $addr',`district` = ' $dist',`distance` = ' $dis',`gender` = ' $title',`block_no` = ' $block',`room_no` = ' $room',
          `date_of_addmission` = ' $date',`date_of_leaving` = ' $leave'
          WHERE `hostel`.`student_id` = $student_id";
        
          if(mysqli_query($con,$sql)){
              echo "new record update sucessfully ";
          }else{
              echo "error :" .$sql."<br>".mysqli_error($con);
          }
      }
   


        ?>
        

          <br>
          <div class="shadow p-3 mb-5 bg-white rounded">
        
            <blockquote class="blockquote ">
                <p class="display-4 text-center" >Hostel Management System</p>
                <footer class="blockquote-footer text-center"">Hostel Allocation <cite title="Source Title"></cite></footer>
            </blockquote>
        
</div>
        
     
<div class="row">

<div class=" col-sm-6 mt-4">
<small class="h5" >Hostel Accomadation </small>

</div>
<div class="col-sm-3 " > 

<form class="form-inline md-form form-sm mt-4 ">
 
 
</form>
</div>
</div>
<div class="row">

<div class="col-sm-12" >

<hr  >
</div>

</div>



<div class="form-row">
       
       <div class="form-group col-md-4 ">
      
<form method="POST">
<label for="id"><i class="fas fa-user-graduate"></i> Student ID&nbsp;</label> <br>
  <input type="text" class="form-control " id="id" value="<?php echo $student_id; ?>" name="id" required <?php if(isset($_GET['edit'])) echo 'disabled'; ?>  >


      
       </div>

       
    
       
       <div class="form-group col-md-4  ">
       <label for="name"><i class="far fa-id-card"></i>&nbsp;Full Name</label> <br>
       <input type="text" class="form-control " name="name" value="<?php echo $name; ?>" id="name" required >
       </div>
       <div class="form-group col-md-4  ">
       <label for="name"><i class="fas fa-university"></i>&nbsp;Department</label> <br>
       <input type="text" class="form-control " id="name" value="<?php echo $dept; ?>" name="dept" required >
       </div>
       </div>

       
<div class="form-row">

<div class="form-group col-md-6  ">
       <label for="ad"><i class="fas fa-map-marked-alt"></i>&nbsp;Address</label> <br>
       <textarea name="address" class="rounded  form-control  text-black"  type="text"  id="add" value="" placeholder="House-No, Street, Hometown." cols="15" rows="3" required > <?php echo $addr; ?> </textarea>
        </div>


        <div class="col-md-4 mb-3">
            <label for="district"><i class="fas fa-map-marker-alt"></i>&nbsp;District</label>
            <input type="text" class="form-control" id="district" value="<?php echo $dist; ?>" name="dist"  required>
          </div>

          <div class="col-md-2 mb-3">
            <label for="dis"><i class="fas fa-map-signs"></i>&nbsp;Distance
             <label class="note" style="font-size: 13px; margin-bottom: 0; color:#aaa;padding-left: 14px;">Home to SLGTI </label>
            </label>
            <input type="text" class="form-control" id="dis" value="<?php echo $dis; ?>" name="dis" placeholder="in km"  required>
          </div>

       </div>


<div class="form-row">


<div class="form-group col-md-3  ">
<label for="hostel"><i class="fas fa-transgender"></i>&nbsp;Gender :</label>
<select name="title" id="gender" value="<?php echo $title; ?>"  class="form-control" required >
               <option value="" selected disabled>---Select---</option>
               
               <option value="Male" <?php if($title=="Male") echo 'selected'; ?>>  Male </option>
                    <option value="Female" <?php if($title=="Female") echo 'selected'; ?>> Female </option>
                    
         </select>
         </div>


         
         <div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Block No:</label>
        
         <input type="text" class="form-control" id="block"value="<?php echo $block; ?>" name="block"  required>
</div>

<div class="form-group col-md-3  ">
         <label for="hostel"><i class="fas fa-list-ol"></i>&nbsp; Room No:</label>
        
         <input type="text" class="form-control" id="room" value="<?php echo $room; ?>" name="room"  required>
</div>
</div>






<div class="form-row">
<div class="col-md-3 mb-3">
            <label for="add"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Addmission</label>
            <input type="date" class="form-control" id="add" value="<?php echo $date; ?>" name="date" placeholder=""  required>
          </div>

          <div class="col-md-3 mb-3">
            <label for="leave"><i class="fas fa-calendar-alt"></i>&nbsp;Date of Leaving</label>
            <input type="date" class="form-control" id="leave" value="<?php echo $leave; ?>" name="leave" placeholder=""  required>
          </div>
          
        
          </div>
         
        <div class="row">
    <div class="col-md-3 col-sm-12 ">
    <br> <br>
   
    <?php
 if(isset($_GET['edit'])){
  
      echo'<input type="submit" value="update" name="upt" class="btn btn-primary rounded-pill btn-block waves-effect">';

 }else{
  echo'<input type="submit" value="Allocation" name="allo" class="btn btn-primary rounded-pill btn-block waves-effect">';
 }
 
?>
    </div>
    
   
    
    <div class="col-md-3 col-sm-12">
    <br><br>
    <input type="reset" class="btn btn-outline-danger rounded-pill btn-block waves-effect  ">
        

</div>
</div>
   
</form>

</form>

          
        















<!--END OF YOUR COD-->

<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->
