<?php
include "connection.php";
include "bootstrap_cdn.php";
include "navbar.html";


$sno = $_GET['sno'];
$sql = "DELETE FROM `bookstb` WHERE `s_no` = $sno";
if(mysqli_query($conn, $sql)){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation!</strong> Record has been Deleted successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>'; 
    // header('Location: books_info.php');
}else{
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Failed to Delete Record
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
}

?>