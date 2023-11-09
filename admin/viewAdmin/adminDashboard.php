<!DOCTYPE html>
<html>

<head>
  <title>Admin</title>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../../dist/output.css">
    <link rel="shortcut icon" type="x-icon" href="img/sti-logo.png">
    </link>
  </head>
</head>

<body>
  <?php
            include "../controller/adminIncharge.php";
            include "../adminHeader.php";
            include "../sidebar.php";
           
            include_once "../config/dbconnect.php";

            if (isset($_GET['acc-created'])) {
              include("../../php_tabs/includes/admin-email-modal.php");
            }
        ?>

  <p>Welcome, <?php echo $admin_first_name; ?>!</p>

  <div id="main-content" class="container allContent-section py-4">
    <div class="row">
      <div class="col-sm-3">
        <div class="card">
          <i class="fa fa-users  mb-2" style="font-size: 70px;"></i>
          <h4 style="color:white;">Total Users</h4>
          <h5 style="color:white;">
            <?php
                        $sql = "SELECT COUNT(*) as user_count from users where type='guest' and deleted_at is null";
                        $result = $conn->query($sql);
                        $count = 0;

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $count = $row['user_count'];
                        }

                        echo $count;
                    ?>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <i class="fa fa-th mb-2" style="font-size: 70px;"></i>
          <h4 style="color:white;">Total Results</h4>
          <h5 style="color:white;">
            <?php
                       
                       $sql="SELECT * from result";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
          </h5>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="card">
          <i class="fa fa-list mb-2" style="font-size: 70px;"></i>
          <h4 style="color:white;">Total Admins</h4>
          <h5 style="color:white;">
            <?php
                       
                       $sql="SELECT * from users where type='admin'";
                       $result=$conn-> query($sql);
                       $count=0;
                       if ($result-> num_rows > 0){
                           while ($row=$result-> fetch_assoc()) {
                   
                               $count=$count+1;
                           }
                       }
                       echo $count;
                   ?>
          </h5>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/script.js"></script>
</body>

</html>