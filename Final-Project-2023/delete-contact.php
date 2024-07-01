<?php

// session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location:index.php");
//     exit;
// }

require("dbconnect.php");
    
        $gid = base64_decode($_GET['abc']);

       $sql = "delete from contact where id=$gid";
       $res = mysqli_query($conn, $sql);

       if ($res) {
         echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Category Added  Sucessfully...:)</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
         header("location:Contact-View.php");
       } else {
         echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Failed.... </strong> 
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>  </div>';
       }
     

?>