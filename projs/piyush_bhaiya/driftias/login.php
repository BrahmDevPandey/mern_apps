<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//index.php
include 'mail.php';

//Include Configuration File
include('google_api.php');
$login_button = '';

if (isset($_GET["code"])) {

    $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


    if (!isset($token['error'])) {

        $google_client->setAccessToken($token['access_token']);


        $_SESSION['access_token'] = $token['access_token'];


        $google_service = new Google_Service_Oauth2($google_client);


        $data = $google_service->userinfo->get();


        if (!empty($data['given_name'])) {
            $_SESSION['user_first_name'] = $data['given_name'];
        }

        if (!empty($data['family_name'])) {
            $_SESSION['user_last_name'] = $data['family_name'];
        }

        if (!empty($data['email'])) {
            $_SESSION['user_email_address'] = $data['email'];
        }

        if (!empty($data['gender'])) {
            $_SESSION['user_gender'] = $data['gender'];
        }

        if (!empty($data['picture'])) {
            $_SESSION['user_image'] = $data['picture'];
        }
        echo "<script>alert('1111111')</script>";
    }
}


if (!isset($_SESSION['access_token'])) {
    $login_button = $google_client->createAuthUrl();
}

?>

<style>
    #partitioned {
        padding-left: 15px;
        letter-spacing: 42px;
        border: 0;
        background-image: linear-gradient(to left, black 70%, rgba(255, 255, 255, 0) 0%);
        background-position: bottom;
        background-size: 50px 1px;
        background-repeat: repeat-x;
        background-position-x: 35px;
        width: 220px;
        min-width: 220px;
    }

    #divInner {
        left: 0;
        position: sticky;
    }

    #divOuter {
        width: 190px;
        overflow: hidden;
        margin: auto;
    }
</style>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-md h-full md:h-auto" id="login-parent">
        <!-- login model -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700" id="login-div">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <div
                    style="display: flex; flex-direction: column; align-items: center; margin-top: 30px; margin-bottom: 15px;">
                    <img src="https://ik.imagekit.io/d12g1stmy/drift_IAS.png?ik-sdk-version=javascript-1.4.3&updatedAt=1668408116341"
                        alt="DriftIAS" style="width: 150px;">
                </div>
                <div class="space-y-6">
                    <div class="flex flex-row justify-center">

                        <a href="<?php echo $login_button; ?>"
                            style="border: 1px solid rgb(101, 112, 251); border-radius: 4px;"
                            class="cursor-pointer text-blue-900   font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px"
                                y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" class="fcGoogle"
                                height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
	c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
	c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
	C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
	c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
	c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                                </path>
                            </svg>
                            <span class="p-2">Continue With Google</span>
                        </a>



                    </div>
                    <p class="flex justify-center">OR</p>
                    <div>
                        <input type="email" id="eml"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="name@company.com" required>
                    </div>
                    <button type="button" onclick="send_otp()" id="send_otp_btn"
                        class="w-full text-white bg-red-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SEND
                        OTP TO MAIL</button>
                </div>
            </div>
        </div>
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 p-5" style="display: none;" id="otp-div">
            <form class="space-y-6" action="validation.php" method="POST">
                <h2 class="flex justify-center mb-2">Enter OTP</h2>
                <div>
                    <div id="divOuter">
                        <div id="divInner">
                            <input id="partitioned" type="text" maxlength="4"
                                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                onKeyPress="if(this.value.length==4) return false;"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[70%] p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white mx-auto"
                                required>
                        </div>
                    </div>
                </div>
                <button type="button" onclick="check_otp()"
                    class="w-full text-white bg-red-900 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SUBMIT</button>
            </form>
        </div>
        <!-- the Register modal -->
    </div>
    <script>
        // call this function when the otp has been sent to email successfully
        function send_otp(){
            var to=document.getElementById('eml').value;
            $.ajax({
                url: "validation.php",
                type: "POST",
                data: { email: to },
                cache: false,
                success: function(res){
                    alert(res); 
                    onOtpSend();
                }
            });
            document.getElementById('send_otp_btn').disabled=true;
        }
        function check_otp(){
            var t=document.getElementById('partitioned').value;
            $.ajax({
                url: "validation.php",
                type: "POST",
                data: { otp: t },
                cache: false,
                success: function(res1){
                    if(res1=="")
                        alert("OTP not match...");
                    else
                        onSuccessfulLogin(res1);
                }
            });
        }
        
        function onOtpSend() {
            
            const login_div = document.getElementById("login-div");
            login_div.style.display = "none"; // hide the login div
            
            const otp_div = document.getElementById("otp-div");
            otp_div.style.display = "block";
            
        }

        function onSuccessfulLogin(url) {
            window.location.href = url;
        }
    </script>
</div>
