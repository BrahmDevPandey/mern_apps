<?php include'check_login.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>Medhaj Astro-Dashboard Admin</title>
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Philosopher' rel='stylesheet'>
    <!-- Custom styles for this template-->
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            <?php include 'topbar.php';?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#myModal"><i
                                class="fas fa-users fa-sm text-white-50"></i> Add Users</a>

<!-- Button trigger modal -->

  <!-- Button to Open the Modal -->


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <form id="admin_user_add">
        <div class="form-group">
      <label for="email">Name:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter Name" name="user_name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter Email" name="user_email" required>
    </div>
    <div class="form-group">
      <label for="email">User Type:</label>
        <select class="form-control" name="user_type" required>
            <option></option>
            <option>Accounts</option>
            <option>Operation</option>
            <option>IT</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        include '../inc/dbcon.php';
                                      
                                                        $q="SELECT * FROM `user_mngt`order by id DESC";
                                                        $r=mysqli_query($con,$q);
                                                        if($r){
                                                       
                                                           while($data=mysqli_fetch_assoc($r)){
                                                                  ?>
                                                                   <tr>
                                                                 <td><?php echo $data['name'];?></td>
                                                                 <td><?php echo $data['email'];?></td>
                                                                 <td><?php echo $data['user_type'];?></td>
                                                                 </tr>
                                                                  <?php
                                                                   
                                                                 }
                                                            }
                                        ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-dark text-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Medhaj Astro 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
     <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/imp.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
<script>
   $(document).ready(function(){
    $('#admin_user_add').submit(function(e){
        e.preventDefault();
        $.ajax({
  url:"fetch.php",
  method:"POST",
  data:$(this).serialize(),
  success:function(data)
  {
    alert(data);
    $('#admin_user_add').trigger("reset");
  }
 });

    });
    });
</script>
</html>