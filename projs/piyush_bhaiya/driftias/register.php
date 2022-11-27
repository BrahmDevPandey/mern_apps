<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <?php session_start();
    if(!isset($_SESSION['user_email_address'])) header('location:index.php');
    include 'inc/cdn.php';
    ?>
    <title>New User Registration</title>
</head>

<body>
    <?php include 'header.php'; ?>
    <section>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
                <div class="flex justify-center h-10">
                </div>
                <h3 class="text-2xl font-bold text-center">Registration</h3>
                <form action="validation.php" method="POST">
                    <div class="mt-4">
                        <div>
                            <label class="block" for="Name">Name<label>
                                    <input type="text" placeholder="Name" name="name"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label class="block" for="email">Email<label>
                                    <input type="text" placeholder="Email" name="email" value="<?php if(isset($_SESSION['user_email_address'])) echo $_SESSION['user_email_address']; ?>"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" readonly>
                        </div>
                        <div class="mt-4">
                            <label class="block" for="phone">Phone no.<label>
                                    <input type="number" placeholder="Phone" name="phone" id="phone-no"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <span class="text-xs text-red-400" id="ph-inf">Phone number must be a valid 10 digit number</span>
                        <div class="mt-4">
                            <label class="block">Password<label>
                                    <input type="password" placeholder="Password" name="password" id="pass"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <div class="mt-4">
                            <label class="block">Confirm Password<label>
                                    <input type="password" placeholder="Password" id="cpass" oninput="checkpass();"
                                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        </div>
                        <span class="text-xs text-red-400" id="inf">Passwords must be same!</span>
                        <div class="flex">
                            <button id="btn_r" type="submit" name="reg_btn"
                                class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900" disabled>Register
                                Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        function checkpass(){
            var a=document.getElementById('pass').value;
            var b=document.getElementById('cpass').value;
            var phone = document.getElementById('phone-no').value;
            const phoneRegex = /^[6-9][0-9]{9}$/;
            
            if(a==b){
                document.getElementById('inf').innerHTML="Password match";
                if(phoneRegex.test(phone)) {
                    document.getElementById('btn_r').disabled=false;
                    document.getElementById('ph-inf').innerHTML="";
                }
                else {
                    document.getElementById('btn_r').disabled=true;
                    document.getElementById('ph-inf').innerHTML="*Invalid phone number";
                }
            }
            else{
                document.getElementById('btn_r').disabled=true;
                document.getElementById('inf').innerHTML="*Passwords must be same!";
            }
        }
        
    </script>    
    <?php
    include 'footer.php';
    ?>
</body>

</html>