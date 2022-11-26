<?php include 'check_login.php';?>
<?php 

include '../inc/dbcon.php';
include '../mail.php';

                if($_POST['view']=='YES'){
                $q="SELECT * FROM `enquiry`order by id desc LIMIT 3";
                $r=mysqli_query($con,$q);
                if($r){
                    $count=0;
                    $x=array();
                   while($data=mysqli_fetch_assoc($r)){
                           $x[$count]=$data;
                            $count++;
                         }
                         echo json_encode($x);
                        }
                    }
                    if($_POST['update_status']=="Yes"){
                                 $name=$_SESSION['name'];
                                 $email=$_SESSION['email'];
                            $q="UPDATE `badge_counter` SET `view_status`='1' WHERE `Name`='$name' and `email`='$email'";
                            $r=mysqli_query($con,$q);
                    }
                    if($_POST['feedback_update_status']=="Yes"){
                        $name=$_SESSION['name'];
                        $email=$_SESSION['email'];
                        $quf="UPDATE `feedback_badge_counter` SET `view_status`='1' WHERE `Name`='$name' and `email`='$email'";
                         $ruf=mysqli_query($con,$quf);
           }


                    if(isset($_POST['replyid']) && isset($_POST['reply']))
                    {
                        $feedback_answer=$_POST['reply'];
                        $feedback_id=$_POST['replyid'];
                        $feedback_id;
                       $q="UPDATE `feedback` SET `answer`='$feedback_answer' WHERE id='$feedback_id'";
                       $qr=mysqli_query($con,$q);
                       if($qr){
                            echo "Answer Updated Successfully";
                       }

                    }
                    if(isset($_POST['user_name'])&& isset($_POST['user_type'])&& isset($_POST['user_email']))
                    {
                        function generateRandomString($length = 25) {
                            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@_*^$&%';
                            $charactersLength = strlen($characters);
                            $randomString = '';
                            for ($i = 0; $i < $length; $i++) {
                                $randomString .= $characters[rand(0, $charactersLength - 1)];
                            }
                            return $randomString;
                        }
                      // Function to get the client IP address
                    function get_client_ip() {
                    $ipaddress = '';
                    if (isset($_SERVER['HTTP_CLIENT_IP']))
                     $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
                    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                     $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
                    else if(isset($_SERVER['HTTP_X_FORWARDED']))
                      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
                    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                       $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
                    else if(isset($_SERVER['HTTP_FORWARDED']))
                      $ipaddress = $_SERVER['HTTP_FORWARDED'];
                    else if(isset($_SERVER['REMOTE_ADDR']))
                       $ipaddress = $_SERVER['REMOTE_ADDR'];
                    else
                         $ipaddress = 'UNKNOWN';
                    return $ipaddress;
                                            }
                      
                        $user_name=$_POST['user_name'];
                        $user_type=$_POST['user_type'];
                        $user_email=$_POST['user_email'];
                        $user_pass= generateRandomString(8);
                        $qs="select * from user_mngt where email='$user_email'";
                        $row_count=mysqli_num_rows(mysqli_query($con,$qs));
                        if($row_count<=0){
                            $q="INSERT INTO `user_mngt` (`name`, `email`, `user_type`, `password`) VALUES ( '$user_name', '$user_email', '$user_type', '$user_pass')";
                            $r=mysqli_query($con,$q);
                            if($r){
                                $html="Dear ".$user_name.",";
                                $html.="Please Click on given link to access Medhaj Astro Portal";
                                $short=base64_encode("user_email=".$user_email."&user_name=".$user_name."&user_ip=".get_client_ip());
 
                                $link="<a href='dummy.medhajastro.com/Admin_Panel/reset-password.php?key=".$short."'>Click To Reset password</a>";
                                $html.=$link;
                            
                                 $mail_response=smtp_mailer($user_email,"Password Reset!!",$html);
                                echo "Data Saved Succcessfully";
                               
                            }
                            else{
                                echo mysqli_error($con);
                            }
                        }
                        else{
                            echo "User Already Exist";
                        }
                       

                    }
                        
                
                ?>