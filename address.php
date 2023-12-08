<?php
include "db_conn.php";

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
          <h3>STUDENT ADDRESS</h3>
          <p>Click update to change any information</p>
      </div>


      <!-- MAIN FORM CONTENT -->
      <div class="container d-flex justify-content-center">
          <form method="post" style="width:50vw; min-width:300px;">

            <div class="row mb-3">

                <div class="pt-3"></div>
                  <!-- House No. -->
                <div class="mb-3 col-md-4">
                    <label>House/Block No.</label>
                    <input type="text" class="form-control" placeholder="Enter House No" id="house_no" name="house_no" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>

                <!-- Street -->
                <div class="mb-3 col-md-4">
                    <label>Street</label>
                    <input type="text" class="form-control" placeholder="Enter Street" id="street" name="street" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>
                
                <!-- Subdivision -->
                <div class="mb-3 col-md-4">
                    <label>Subdivision</label>
                    <input type="text" class="form-control" placeholder="Enter Subdivision" id="sudb" name="sudb" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>
              

                <!-- Barangay -->
                <div class="mb-3 col-md-6">
                    <label>Barangay</label>
                    <input type="text" class="form-control" placeholder="Enter Barangay" id="barangay" name="barangay" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>
                

                <!-- City -->
                <div class="mb-3 col-md-6">
                    <label>City</label>
                    <input type="text" class="form-control" placeholder="Enter City" id="city" name="city" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>

                <!-- Province/Region -->
                <div class="mb-3 col-md-4">
                    <label>Province/Region</label>
                    <input type="text" class="form-control" placeholder="Enter Province" id="province" name="province" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>          

                <!-- Country -->
                <div class="mb-3 col-md-4">
                    <label>Country</label>
                    <input type="text" class="form-control" placeholder="Enter Country" id="country" name="country" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>

                <!-- Zip Code -->
                <div class="mb-3 col-md-4">
                    <label>Zip Code</label>
                    <input type="text" class="form-control" placeholder="Enter Zip Code" id="zip_code" name="zip_code" autocomplete="off" disabled>
                    <div class="valid-feedback">Valid</div>
                </div>
            </div>

            <div class="text-center pt-4 pb-2">
              <button type="submit" class="btn btn-lg bg-green text-light" name="submit">Update</button>
              <a href="index.php" class="btn btn-lg text-light" style="background-color: rgb(4,35,60);">Go Back</a>
            </div>
            </div>
          </form>
      </div>


  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>