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
  <link rel="stylesheet" href="style.css">
  
  <!-- Montserrat Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

  <title>WestView Academy Database</title>
</head>

<body>

  <header class="display-3 fw-bold text-center mb-3 title-bg">
          <img src="Header1.png" class="img-fluid page-header" width="800px" alt="Responsive image" >
  </header>

  <div class="modal fade" id="deletemodal" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header bg-danger" id="modal-header">
                  <h1 class="modal-title text-light fs-5">Confirm Delete</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <form action="delete.php" method="POST">

                  <div class="modal-body">
                      <input type="hidden" name="delete_id" id="delete_id">
                      Are you sure you want to delete this record?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="deletedata" class="btn btn-outline-danger">Delete</button>
                  </div>
              </form>
          </div>
      </div>
  </div>



  <div class="container-fluid py-5 px-5 tbl-container">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <a href="add-new.php" class="btn text-light mb-3" style="background-color: rgb(4,35,60);">Add New Student</a>

    <table class="table table-hover text-center table-responsive-md table-sm g-5" width="100%">
      <thead class="text-light" style="background-color: rgb(4,35,60);" width="70%">
        <tr>
          <th scope="col" >Student ID</th> 
          <th scope="col">First Name</th>
          <th scope="col">Middle Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">LRN</th>
          <th scope="col">Email</th>
          <th scope="col">Gender</th>
          <th scope="col">Mobile No.</th>
          <th scope="col">Birthplace</th>
          <th scope="col">Birthdate</th>
          <th scope="col">Civil Status</th>
          <th scope="col">Nationality</th>
          <th scope="col">Program</th>
          <th scope="col">Section</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `StudentInfo`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["middle_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
            <td><?php echo $row["lrn"] ?></td>
            <td><?php echo $row["email"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td><?php echo $row["mobile_no"] ?></td>
            <td><?php echo $row["placeOf_birth"] ?></td>
            <td><?php echo $row["dateOf_birth"] ?></td>
            <td><?php echo $row["civil_status"] ?></td>
            <td><?php echo $row["nationality"] ?></td>
            <td><?php echo $row["program"] ?></td>
            <td><?php echo $row["section"] ?></td>
            
            <td>
              <a href="edit.php?id=<?php echo $row["id"] ?>"  style="color: rgb(4,35,60);"><i class="fa-solid fa-pencil fs-5 me-3"></i></a>
              <!-- <a a href="delete.php?id= ?php echo $row["id"] ?>"  style="color: rgb(4,35,60);"><i class="fa-solid fa-trash fs-5 me-3"></i></a> -->

              <button class="deletebtn bg-transparent border-0" style="color: rgb(4,35,60);"><i class="fa-solid fa-trash fs-5 me-3"></i></button>
              <a href="address.php?id=<?php echo $row["id"] ?>" style="color: rgb(4,35,60);"><i class="fa-solid fa-house fs-5"></i></a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
  <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
    

  <!-- Bootstrap -->
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>