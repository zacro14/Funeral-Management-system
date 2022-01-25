<?php
  session_start();
  if(isset($_SESSION['admin']) && isset($_SESSION['branch'])){
    header('location:homepage.php');
  }
?>
<?php require_once 'includes/db-connection.php' ?>
<?php include 'includes/header.php'; ?>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-primary">    
                        <div class="panel-heading">
                            <h3 class="panel-title">Admin | Login</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="login-query.php" method="POST" autocomplete="off">
                                <fieldset>
                                    <?php
                                        if(isset($_SESSION['error-login'])){
                                            echo "
                                            <div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                ".$_SESSION['error-login']. ' '."<i class='fa fa-exclamation'></i>
                                            </div>
                                            ";
                                            unset($_SESSION['error-login']);
                                            }
                                    ?>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Email/username" name="username" type="text" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" >
                                    </div>
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <select name="branch" id="" class="form-control" required>
                                            <option value="" selected>-- Select Branch --</option>
                                            <?php
                                                $branch_query = "SELECT * FROM branches where branch_id = 1";
                                                $query = $conn->query($branch_query);
                                                while($branch_row = $query->fetch_assoc())
                                                {
                                                    echo "<option value='".$branch_row['branch_id']."'>".$branch_row['branch_name']."</>";
                                                }
                                            ?>
                                        </select>
                                    </div>

                                    <button class="btn btn-primary btn-block" type="submit" name="btn-login">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'includes/scripts.php' ?>
    </body>
</html>
