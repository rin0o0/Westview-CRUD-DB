<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `addresstbl` WHERE student_id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
  $sql2 = "DELETE FROM `StudentInfo` WHERE id = $id";
  $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("Location: index.php?msg= Successfully deleted all data for Student No." . $id);
    } if (!$result2){
        header("Failed to insert address: " . mysqli_error($conn));
    }

} else {
  echo "Failed: " . mysqli_error($conn);
}
