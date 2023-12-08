<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $lrn = $_POST['lrn'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $mobile_no = $_POST['mobile_no'];
  $placeOf_birth = $_POST['placeOf_birth'];
  $dateOf_birth = $_POST['dateOf_birth'];
  $civil_status = $_POST['civil_status'];
  $nationality = $_POST['nationality'];
  $program = $_POST['program'];
  $section = $_POST['section'];

  $sql = "UPDATE `StudentInfo` SET `first_name`='$first_name',`middle_name`='$middle_name',`last_name`='$last_name',`lrn`='$lrn',`email`='$email',`gender`='$gender',`mobile_no`='$mobile_no',`placeOf_birth`='$placeOf_birth',`dateOf_birth`='$dateOf_birth',`civil_status`='$civil_status',`nationality`='$nationality',`program`='$program',`section`='$section' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=Successfully updated data for Student No." . $id);
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- CSS -->
  <link href='style.css?version=1' rel='stylesheet'></link>
  
  <!-- Montserrat Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <title>WestView Academy Database</title>
</head>

<body>
  <!-- Header -->
  <header class="text-center">
            <img src="Header1.png" class="img-fluid page-header" width="800px" alt="Responsive image" >
  </header>

  <div class="container form-container pt-5 px-5">
      <div class="text-center mb-4">
          <h3>EDIT STUDENT INFORMATION</h3>
          <p>Click update after changing any information</p>
      </div>

      <?php
      $sql = "SELECT * FROM `StudentInfo` WHERE id = $id LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>

      <!-- MAIN FORM CONTENT -->
      <div class="container d-flex justify-content-center">
          <form method="post" style="width:50vw; min-width:300px;">

            <div class="row mb-3">

                <!-- First Name -->
                <div class="mb-3 col-md-4">
                <label>First Name</label>
                <input type="text" class="form-control" placeholder="Enter your First Name" id="first_name"  name="first_name" value="<?php echo $row['first_name'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Middle Name -->
                <div class="mb-3 col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" placeholder="Enter your Middle Name" id="middle_name" name="middle_name" value="<?php echo $row['middle_name'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- last Name -->
                <div class="mb-3 col-md-4">
                  <label>Last Name</label>
                  <input type="text" class="form-control" placeholder="Enter your Last Name" id="last_name" name="last_name" value="<?php echo $row['last_name'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Gender -->
                <div class="form-group mb-3 col-md-4">
                  <label>Gender:</label>
                  &nbsp;
                  <div class="pt-2">
                      <input type="radio" class="form-check-input" name="gender" id="male" value="Male" <?php echo ($row["gender"] == 'Male') ? "checked" : ""; ?>>
                      <label for="male" class="form-input-label">Male</label>
                      &nbsp;
                      <input type="radio" class="form-check-input" name="gender" id="female" value="Female" <?php echo ($row["gender"] == 'Female') ? "checked" : ""; ?>>
                      <label for="female" class="form-input-label">Female</label>
                  </div>
                </div>

                <!-- LRN -->
                <div class="mb-3 col-md-4">
                  <label>LRN</label>
                  <input type="tel" class="form-control" pattern=".{12}" placeholder="Enter 12 Digit LRN Number" id="lrn" name="lrn" value="<?php echo $row['lrn'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Date of Birth -->
                <div class="mb-3 col-md-4">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control" placeholder="Enter Date of Birth" id="dateOf_birth" name="dateOf_birth" value="<?php echo $row['dateOf_birth'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Place of Birth -->
                <div class="mb-3 col-md-6">
                  <label>Place of Birth</label>
                  <input type="text" class="form-control" placeholder="Enter Place of Birth" id="placeOf_birth" name="placeOf_birth" value="<?php echo $row['placeOf_birth'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Civil Status -->
                <div class="mb-3 col-md-6">
                  <label>Civil Status</label>
                  <input type="text" class="form-control" placeholder="Enter Civil Status Name" id="civil_status" name="civil_status" value="<?php echo $row['civil_status'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                
                <!-- Email Address -->
                <div class="mb-3 col-md-6">
                  <label>Email Address</label>
                  <input type="email" class="form-control" placeholder="Enter Email Address" id="email" name="email" value="<?php echo $row['email'] ?>"autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Mobile Number -->
                <div class="mb-3 col-md-6">
                  <label>Mobile Number</label>
                  <input type="tel" class="form-control" pattern=".{11}" placeholder="Enter 11 Digit Mobile Number" id="mobile_no" name="mobile_no" value="<?php echo $row['mobile_no'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Nationality -->
                <div class="mb-3 col-md-4">
                  <label>Nationality</label>
                  <input type="text" class="form-control" placeholder="Enter Nationality" id="nationality" name="nationality" value="<?php echo $row['nationality'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Enrolled Program -->
                <div class="mb-3 col-md-4">
                  <label>Enrolled Program</label>
                  <input type="text" class="form-control" placeholder="Enter Civil Status Name" id="program" name="program" value="<?php echo $row['program'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>

                <!-- Section -->
                <div class="mb-3 col-md-4">
                  <label>Section</label>
                  <input type="text" class="form-control" placeholder="Enter Section" id="section" name="section" value="<?php echo $row['section'] ?>" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>

            <div class="text-center pt-4 pb-2">
              <button type="submit" class="btn btn-lg bg-green text-light px-4" name="submit">Update</button>
              <a href="index.php" class="btn bg-red btn-lg text-light px-4">Cancel</a>
            </div>
            </div>
          </form>
      </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>