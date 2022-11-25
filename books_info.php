<?php
include "bootstrap_cdn.php";
include "navbar.html";
include "connection.php";


?>

<style>
  .form-control {
            width: 100%;
        }
</style>


<!-- Displaying Books info' -->
<div class="container my-5">
    <h2 style="font-family:tahoma;">Available Books</h2><br>
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
                <a href='delete.php?sno=$sno' class='btn btn-sm btn-primary'>Delete</a></td>
          </tr>";
          }
        }else{
          echo "NO ROW TO DISPLAY";
        }
        // ****************************



        ?>
        </tbody>
      </table>
</div>