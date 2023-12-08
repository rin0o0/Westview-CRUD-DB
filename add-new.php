<?php
include "db_conn.php";

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
   $house_no = $_POST['house_no'];
   $street = $_POST['street']; 
   $sudb = $_POST['sudb'];
   $barangay = $_POST['barangay'];
   $city = $_POST['city'];
   $province = $_POST['province'];
   $country = $_POST['country'];
   $zip_code = $_POST['zip_code'];


   $sql = "INSERT INTO `StudentInfo`(`id`,`first_name`, `middle_name`,`last_name`, `lrn`, `email`, `gender`,`mobile_no`,`placeOf_birth`,`dateOf_birth`,`civil_status`,`nationality`,`program`,`section` ) VALUES (NULL,'$first_name','$middle_name','$last_name','$lrn','$email','$gender','$mobile_no ','$placeOf_birth ','$dateOf_birth ','$civil_status ','$nationality','$program','$section')";
   $result = mysqli_query($conn, $sql);

   if ($result) {
         $student_id = mysqli_insert_id($conn);
         $sql2 = "INSERT INTO `addresstbl`(`id`,`house_no`,`street`, `sudb`, `barangay`, `city`,`province`,`country`,`zip_code`,`student_id`) VALUES (NULL,'$house_no','$street','$sudb','$barangay','$city','$province','$country ','$zip_code','$student_id')";
         
         $result2 = mysqli_query($conn, $sql2);
         
         if ($result2) {
            header("Location: index.php?msg= Successfully added student record: Student No." . $student_id);
         } if (!$result2){
            header("Failed to insert address: " . mysqli_error($conn));
         }
         
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

   <!-- MAIN CONTENT -->
   <div class="container form-container pt-5">
      <div class="text-center mb-4">
         <h2 class ="fw-bold">ADD NEW STUDENT</h2>
         <p>Complete the form below to add a new student</p>
      </div>
      <!-- STUDENT INFORMATION SECTION -->
      <div class="divider mb-2"></div>
      <h3 class="text-center py-3">Student Information</h3>

      <div class="container d-flex justify-content-center pt-2">
         
         <form class="was-validated" method="post" style="width:50vw; min-width:300px;">

            <div class="row mb-3">

               <!-- First Name -->
               <div class="mb-3 col-md-4">
               <label>First Name</label>
               <input type="text" class="form-control" placeholder="Enter your First Name" id="first_name" name="first_name" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Middle Name -->
               <div class="mb-3 col-md-4">
               <label>Middle Name</label>
               <input type="text" class="form-control" placeholder="Enter your Middle Name" id="middle_name" name="middle_name" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- last Name -->
               <div class="mb-3 col-md-4">
               <label>Last Name</label>
               <input type="text" class="form-control" placeholder="Enter your Last Name" id="last_name" name="last_name" autocomplete="off" required>
               <div class="valid-feedback">Valid</div>
               </div>

               <!-- LRN -->
               <div class="mb-3 col-md-5">
                  <label>LRN</label>
                  <input type="tel" class="form-control" pattern=".{12}" placeholder="Enter 12 Digit LRN Number" id="lrn" name="lrn" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Date of Birth -->
               <div class="mb-3 col-md-4">
                  <label>Date of Birth</label>
                  <input type="date" class="form-control" placeholder="Enter Date of Birth" id="dateOf_birth" name="dateOf_birth" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- gender -->
               <div class="form-group mb-3 col-md-3">
                  <label>Gender:</label>
                  &nbsp;
                  <div class="pt-2">
                     <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
                     <label for="male" class="form-input-label">Male</label>
                     &nbsp;
                     <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
                     <label for="female" class="form-input-label">Female</label>
                  </div>
               </div>

               <!-- Place of Birth -->
               <div class="mb-3 col-md-6">
                  <label>Place of Birth</label>
                  <input type="text" class="form-control" placeholder="Enter Place of Birth" id="placeOf_birth" name="placeOf_birth" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Civil Status -->
               <div class="mb-3 col-md-6">
                  <label>Civil Status</label>
                  <div class="form-group">
                     <select class="selectpicker form-control is-invalid" id="civil_status"  name="civil_status" required>
                        <option selected></option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Widowed</option>
                     </select>
                     </div>
               </div>

               <!-- Email Address -->
               <div class="mb-3 col-md-6">
                  <label>Email Address</label>
                  <input type="email" class="form-control" placeholder="Enter Email Address" id="email" name="email" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Mobile Number -->
               <div class="mb-3 col-md-6">
                  <label>Mobile Number</label>
                  <input type="tel" class="form-control" pattern=".{11}" placeholder="Enter 11 Digit Mobile Number" id="mobile_no" name="mobile_no" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Nationality -->
               <div class="mb-3 col-md-4">
                  <label>Nationality</label>
                  <input type="text" class="form-control" placeholder="Enter Nationality" id="nationality" name="nationality" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Enrolled Program -->
               <div class="mb-3 col-md-4">
                  <label>Enrolled Program</label>
                  <div class="form-group">
                     <select class="selectpicker form-control" id="program"  name="program" required>
                        <option selected></option>
                        <option>BSIT</option>
                        <option>BMMA</option>
                        <option>BSA</option>
                        <option>BSBA</option>
                        <option>BSED</option>
                     </select>
                     </div>
               </div>

               <!-- Section -->
               <div class="mb-3 col-md-4">
                  <label>Section</label>
                  <input type="text" class="form-control" placeholder="Enter Section" id="section" name="section" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>
            

               <!-- STUDENT ADDRESS SECTION -->
               <div class="divider mb-2"></div>
               <h3 class="text-center py-3">Student Address</h3>

               <!-- House No. -->
               <div class="mb-3 col-md-4">
                  <label>House/Block No.</label>
                  <input type="text" class="form-control" placeholder="Enter House No" id="house_no" name="house_no" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Street -->
               <div class="mb-3 col-md-4">
                  <label>Street</label>
                  <input type="text" class="form-control" placeholder="Enter Street" id="street" name="street" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>
               

               <!-- Subdivision -->
               <div class="mb-3 col-md-4">
                  <label>Subdivision</label>
                  <input type="text" class="form-control" placeholder="Enter Subdivision" id="sudb" name="sudb" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>
            

               <!-- Barangay -->
               <div class="mb-3 col-md-6">
                  <label>Barangay</label>
                  <input type="text" class="form-control" placeholder="Enter Barangay" id="barangay" name="barangay" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>
               

               <!-- City -->
               <div class="mb-3 col-md-6">
                  <label>City</label>
                  <input type="text" class="form-control" placeholder="Enter City" id="city" name="city" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Province/Region -->
               <div class="mb-3 col-md-4">
                  <label>Province/Region</label>
                  <input type="text" class="form-control" placeholder="Enter Province" id="province" name="province" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>          

               <!-- Country -->
               <div class="mb-3 col-md-4">
                  <label>Country</label>
                  <input type="text" class="form-control" placeholder="Enter Country" id="country" name="country" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <!-- Zip Code -->
               <div class="mb-3 col-md-4">
                  <label>Zip Code</label>
                  <input type="text" class="form-control" placeholder="Enter Zip Code" id="zip_code" name="zip_code" autocomplete="off" required>
                  <div class="valid-feedback">Valid</div>
               </div>

               <div class="text-center pt-5">
                  <button type="submit" class="btn btn-lg bg-green text-light px-4" name="submit">SAVE</button>
                  <a href="index.php" class="btn bg-red btn-lg text-light px-4">CANCEL</a>
               </div>
            </div>
         </div>
      </form>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
   
</body>

</html>