<?php
include "bootstrap_cdn.php";
include "navbar.html";
include "connection.php";
error_reporting(0);
?>
<style>
  .form-control {
            width: 100%;
        }
  .width {
    width: 70%;
  }
</style>


<!-- Displaying Books info -->
<div class="container my-5">
    <h2 style="font-family:tahoma;">Available Books</h2><br>
    <form action="books_info.php" method="POST">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Search for books</label>
            <input type="text" name="search" class="form-control width" id="exampleFormControlInput1" placeholder="Search by book name or author name"><br>
            <button type="submit" name="searchbtn" class="btn btn-primary">Search</button>
        </div>
      </form>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Book Name</th>
            <th scope="col">Book Author</th>
            <th scope="col">Book Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        <?php
        // ****************************
        // SEARCH DATA
        $search_btn = $_POST['searchbtn'];
        $search = $_POST['search'];
        if(isset($search_btn)){
            $sql = "SELECT * FROM `bookstb`
            WHERE `book_name` = '$search' || `book_author` = '$search'";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              $sno = $row['s_no'];
              $book_name = $row['book_name'];
              $book_author = $row['book_author'];
              $book_price = $row['book_price'];
              echo " <tr>
              <td>$book_name</td>
              <td>$book_author</td>
              <td>$book_price</td>
              <td><a href='edit.php?sno=$sno' class='btn btn-sm btn-primary'>Edit</a>
                  <a href='#?sno=$sno' id='del' class='btn btn-sm btn-primary'>Delete</a></td>
            </tr>";
            }
          }
        else{ 
          // DISPLAY DATA
            $sql = "SELECT * FROM `bookstb`";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows > 0){
              while($row = mysqli_fetch_assoc($result)){
                $sno = $row['s_no'];
                $book_name = $row['book_name'];
                $book_author = $row['book_author'];
                $book_price = $row['book_price'];
                echo " <tr>
                <td>$book_name</td>
                <td>$book_author</td>
                <td>$book_price</td>
                <td><a href='edit.php?sno=$sno' class='btn btn-sm btn-primary'>Edit</a>
                    <a class='btn btn-sm btn-primary' onclick='delete_record($sno)'>Delete</a></td>
              </tr>";
              }
            }            
      }
        // ****************************
        ?>
        </tbody>
      </table>
</div>

<!-- JAVASCRIPT CODE -->
<script>
    function delete_record(delrecord){
        if(confirm('Are your sure to delete the record')){
            window.location.href = "delete.php?sno=" + delrecord;
        }else{
            window.location.href = "books_info.php";
        }
    }
</script>


