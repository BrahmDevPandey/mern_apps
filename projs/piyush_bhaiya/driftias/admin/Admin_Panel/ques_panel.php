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
                        <a href="add_question.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" ><i class="fas fa-users fa-sm text-white-50"></i> Add Question</a>

<!-- Button trigger modal -->

  <!-- Button to Open the Modal -->


                    </div>
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                          <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        <?php
                        include 'dbcon.php';
                            $qr="select distinct category from question_paper order by category";
                            $exc=mysqli_query($con,$qr);
                            if(mysqli_num_rows($exc)){
                                while($data=mysqli_fetch_array($exc)){
                                    echo '<div class="table-responsive">
                                    <h3>Category: '.$data['category'].'</h3>
                                <table class="table" width="100%" style="caption-side: bottom;">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Year</th>
                                            <th>Content</th>
                                            <th>Content PDF</th>
                                            <th>Other PDF</th>
                                            <th>Operation</th>
                                            
                                        </tr>
                                    </thead>
                                    
                                    <tbody>';
                                    $q="select * from question_paper where category='".$data['category']."'order by year";
                                    if($r=mysqli_query($con,$q)){
                                       while($data1=mysqli_fetch_assoc($r)){
                                            echo '<tr>
                                                    <td>'.$data1['title'].'</td>
                                                    <td>'.$data1['year'].'</td>
                                                    <td>'.$data1['content'].'</td>
                                                    <td><a href="'.$data1['content_url'].'">Show</a>        <button type="submit" value="'.$data1['id'].'" name="upd_cnt_pdf">Update</button></td>
                                                    <td><a href="'.$data1['file_url'].'">Show</a>        <button type="submit" value="'.$data1['id'].'" name="upd_qus_pdf">Update</button></td>
                                                    <td><button type="submit" value="'.$data1['id'].'" name="del_ppr">Delete</button></td>


                                            </tr>';
                                             
                                               
                                        }
                                    }
                                    echo '</tbody>
                                    </table>
                                     </div>';
                         }
                        }
                    ?>
                                       
                                    
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