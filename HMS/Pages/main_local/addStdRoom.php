<!-- session -->
<?php 
  include("../../lib/session.php");
  if(!isset($ses_conform))
  {
    header('Location: ../../index.php');
  }
 ?>
 <!-- Page Start -->
<!-- Student View -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Details</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pro_pic')
                        .attr('src', e.target.result)
                        // .width(150)
                        // .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
//        Ajax method for sent option value and take it back as a php
    function 	getStData(key) {
        $.get("../../lib/Hos_fillUpEmpty.php?key="+key, function(data, status){
            document.getElementById("getDetails").innerHTML = data;
        });
    }

  </script>
  <style>
    .upper{
      color:#E2F1FD;
      text-align: center;
    }
  .frame{
    width: 100%;
      height:100%;
    border:none;
    border-radius:10px;
  }
  .iFlip{
    transform:scaleX(-1);
    -moz-transform:scaleX(-1);
    -webkit-transform:scaleX(-1);
    -ms-transform:scaleX(-1);
  }
  .left
  {
    width: 40%;
  }
  .right
  {
    width: 60%;
  }
  td
  {
    padding: 3px;
  }
  </style>
<!-- Php for connecting and get methord -->
<?php 
  include('../../lib/STD_Con.php');
  $key = $_GET['key'];
  $hid=$_SESSION['hostel_id'];

  $sql="SELECT * FROM `student_hostel` WHERE `hostel_id`='$hid' AND `room_no`='0';";
  $result = $conn->query($sql);
  // Select available room
?>
<!-- Methords for btns -->
<script>
    
</script>
</head>

<body>
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="padding-top: 5px">
  <!-- panal start -->
  <div class="panel panel-primary">
    <div class="panel-heading"><h4 align="center">Add Student to Room</h4></div>
    <div class="panel-body">
    <!-- Show Student Data -->
      <form class="form-inline" action="../../lib/STD_addRoom.php" method="POST">
        <table>
          <tr>
            <td class="left">Reg No.</td>
            <td class="right">
               <select name="regNo" class="form-control" style="width:100%">
                  <option selected disabled hidden>Select Student</option>
                  <?php
                

        foreach ($result as $rNo )
        {
        ?>

           <option value="<?php echo $rNo["reg_no"] ; ?>"> <?php echo $rNo["reg_no"] ?></option>
          <?php $_SESSION['$reg_no']=$rNo["reg_no"]; ?>
      <?php
        }
        ?>

    </select>
            </td>
          </tr>
        </table>


        <div id="getDetails"></div>
      <!-- Buttons -->
        <p align="right"><a href="withoutPic.php?" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;Save</button>
        </p>
      </form>
   
    </div>
  </div>
  </div>
  <div class="col-sm-4"></div>
</body>
</html>
