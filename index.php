<?php
// ****************************
include "bootstrap_cdn.php";
include "navbar.html";
include "connection.php";
error_reporting(0);
// ****************************

// ****************************
$book_name = $_POST['bookname'];
$book_author = $_POST['bookauthor'];
$book_price = $_POST['bookprice'];
$submit = $_POST['submit'];
if(!isset($submit) && empty($book_name) || empty($book_author) || empty($book_price)){
    $empty_field_error = "Fill out the fields";
}else{
    $sql = "INSERT INTO `bookstb`(`book_name`, `book_author`, `book_price`)
            VALUES('$book_name', '$book_author', '$book_price')    
    "; 
    if(mysqli_query($conn, $sql)){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulation!</strong> Record has been inserted successfully
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }else{
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Sorry!</strong> Failed to insert Record
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
}
// ****************************



?>

<!-- Form -->
<!-- <br> -->
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <div class="container my-5">
        <h2 class="heading">Add books to the Library</h2><br>
            <p style='color:red;font-family:cursive;'><?php echo $empty_field_error ?></p>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Name</label>
            <input type="text" name="bookname" class="form-control" id="exampleFormControlInput1" placeholder="Book Name">
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Author</label>
            <input type="text" name="bookauthor" class="form-control" id="exampleFormControlInput1" placeholder="Book Author">
        </div>
        
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Book Price</label>
            <input type="number" name="bookprice" class="form-control" id="exampleFormControlInput1" placeholder="Book Price">
        </div>

        <div class="mb-3">
            <input type="submit" name="submit" value="Save" class="form-control bg-primary text-white" id="exampleFormControlInput1">
        </div>
    </div>
</form>
