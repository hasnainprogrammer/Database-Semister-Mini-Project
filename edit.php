<?php
include "bootstrap_cdn.php";
include "navbar.html";
include "connection.php";
error_reporting(0);

// DISPLAY DATA
$sno = $_GET['sno'];
$sql = "SELECT * FROM `bookstb` WHERE `s_no` = $sno";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$book_name = $row['book_name'];
$book_author = $row['book_author'];
$book_price = $row['book_price'];

// GETTING INPUT DATA
$bn = $_POST['bookname'];
$ba = $_POST['bookauthor'];
$bp = $_POST['bookprice'];
$submit = $_POST['submit'];
if(isset($submit)){
    if(empty($bn) || empty($ba) || empty($bp)){
        $empty_field_error = "Fill out the fields";
    }
    else{
        // UPDATE DATA
        $sql = "UPDATE `bookstb`
        SET `book_name`='$bn',
            `book_author`='$ba',
            `book_price`='$bp' WHERE `s_no` = $sno";
        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Record has been Updated successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';  
        }else{
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Failed to update Record
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    }
}

?>



<!-- Form -->
<br>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container">
        <h2 class="heading">Edit Data</h2>
        <p style='color:red;font-family:cursive;'><?php echo $empty_field_error ?></p>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Name</label>
            <input type="text" name="bookname" class="form-control" id="exampleFormControlInput1" placeholder="Book Name" value="<?php echo $book_name ?>">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Author</label>
            <input type="text" name="bookauthor" class="form-control" id="exampleFormControlInput1" placeholder="Book Author"  value="<?php echo $book_author ?>">
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Price</label>
            <input type="number" name="bookprice" class="form-control" id="exampleFormControlInput1" placeholder="Book Price"  value="<?php echo $book_price ?>">
        </div>

        <div class="mb-3">
            <input type="submit" name="submit" value="Save" class="form-control bg-primary text-white" id="exampleFormControlInput1">
        </div>
    </div>
</form>




