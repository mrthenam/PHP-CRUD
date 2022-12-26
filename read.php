<?php
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))){ 
  require_once 'config1.php';
  //$id = trim($_GET["id"]);
  $sql= "SELECT * FROM employees WHERE id = ?";
    if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "i", $param_id);
      $param_id = trim($_GET["id"]);
      if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) == 1){
          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $name = $row["name"];
          $address = $row["address"];
          $salary = $row["salary"];
        }else{

          header("Location: index.php");
          exit();
        }
        // Records created successfully. Redirect to landing page header header: "location: index.php");
      } else{
        echo "Something went wrong. Please try again later.";
      }

    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Record</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> 
  <style type="text/css">
    .wrapper{
    width: 500px;
    margin: 0 auto;
    }
  </style>
</head>
<body>
<div class="wrapper">
      <div class="container-fluid">
            <div class="row">
                  <div class="col-md-12">
                        <div class="page-header">
                              <h2>View Record</h2>
                        </div>
                        <div class="form-group">
                              <h2>Name</h2>
                              <p class="form-control-static"><?php echo $row["name"]; ?></p>
                        </div>
                        <div class="form-group">
                              <h2>Address</h2>
                              <p class="form-control-static"><?php echo $row["address"]; ?></p>
                        </div>
                        <div class="form-group">
                              <h2>Salary</h2>
                              <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                        </div>
                        <p><a href="index.php" class="btn btn-primary">Back</a></p>
                  </div>
            </div>
      </div>
</div>
</body>
</html>