<?php include 'check_login.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <title>DriftIAS Admin Panel</title>
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
            <!-- The Reply Modal -->
            <div class="modal fade" id="replyModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Reply</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form id="reply_to_user">
                                <div class="form-group">
                                    <label for="user_name">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="value_from_db"
                                        name="user_name" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="user_email">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="value_from_db"
                                        name="user_email" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="message">Reply Message:</label>
                                    <textarea type="text" class="form-control" id="reply-msg"
                                        placeholder="Enter your message here..." name="message" required>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Send</button>
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
        <!-- Main Content -->
        <div id="content">
            <?php include 'topbar.php'; ?>
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Enquiry</h1>
                </div>
                <!-- Content Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Enquiry</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Operation</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Subject</th>
                                                <th>Message</th>
                                                <th>Operation</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            include '../inc/dbcon.php';

                                            $q = "SELECT * FROM `enquiry`order by id desc";
                                            $r = mysqli_query($con, $q);
                                            if ($r) {
                                                $count = 0;
                                                $x = array();
                                                while ($data = mysqli_fetch_assoc($r)) {

                                                    echo '<tr>
                                                                 <td>' . $data['email'] . '</td>
                                                                 <td>' . $data['mobile'] . '</td>
                                                                 <td>' . $data['subject'] . '</td>
                                                                 <td>' . $data['message'] . '</td>
                                                                 <td><a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#replyModal">Reply</a></td>
                                                                 <td><button type="button" onclick="' . "if(confirm('Sure you want to delete'))location.href='validation.php?del_enq=" . $data['id'] . "'" . ';">Delete</button></td>
                                                                 </tr>';
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

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>
<script>
    $(document).ready(function () {
        $('#alertsDropdown').click(function () {

        })
    });
    function load_unseen_notification(view) {

        $.ajax({
            url: "fetch.php",
            method: "POST",
            data: { view: view },
            success: function (data) {
                var obj = JSON.parse(data);
                var length = Object.keys(obj).length;
                var html = "";

                while (length > 0) {
                    var val = obj[length - 1];
                    var name = val["name"];
                    html += "<a class='dropdown-item d-flex align-items-center  class='card'' href='#' style='color:blue'>" + name.toUpperCase() + " &nbsp;Visited Website</a>";
                    $('#noticication').html(html);
                    length--;
                    // break;
                }
            }
        });

    }
    setInterval(function () {
        load_unseen_notification('YES');
    }, 5000);

</script>

</html>