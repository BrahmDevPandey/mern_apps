<?php 
session_start();
if(!isset($_SESSION['access_token'])){
    header('location:index.php');
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <?php
  include 'cdn.php'; 
  ?>
  
</head>
<?php 
 include('google_api.php');
include 'student_dashboard_header.php' ;
?>
<body>
<section id="Evaluation" class="box-border py-8 leading-7 text-gray-900  border-0 border-gray-200 border-solid sm:py-12 md:py-16 lg:py-24">
    <div class="box-border max-w-6xl px-4 pb-12 mx-auto border-solid sm:px-6 md:px-6 lg:px-4">
        <div class="flex flex-col items-center leading-7 text-center text-gray-900">
            <h2 class="box-border underline dark:text-white decoration-blue-500 m-0 text-3xl font-semibold leading-tight tracking-tight text-black border-solid sm:text-4xl md:text-5xl">
            Evaluation Plans
            </h2>
            <p class="box-border mt-4 text-sm leading-normal text-gray-900 border-solid">
                Offer Conetent
            </p>
        </div>
        
<div class="mb-4 border-b border-gray-200 flex justify-center  dark:border-gray-700">
<ul class="flex flex-wrap -mb-px text-lg font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">GS/ESSAY</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Optional</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Combo</button>
        </li>

    </ul>
</div>
<div id="myTabContent">
    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <!-- first evolution plan start  -->
    <div class="grid max-w-md mx-auto mt-6 overflow-hidden leading-7 text-gray-900 border border-b-4 border-gray-300 border-blue-600 rounded-xl md:max-w-lg lg:max-w-none sm:mt-10 lg:grid-cols-3">
            <div class="box-border px-4 py-8 mb-6 text-center bg-white border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">

                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Basic
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    Correct
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <a href="#" class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                    ₹200
                    </a>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <a class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_KfeuAVyuhNlyz3" async> </script> </form>
                </a>
            </div>
            <div class="box-border px-4 py-8 mb-6 text-center bg-gray-100 border border-gray-300 border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Plus
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The plus plan is a good fit for medium-size to larger companies
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                    ₹200
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
            <div class="box-border px-4 py-8 text-center bg-white border-solid sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Pro
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The pro plan is a good fit for larger and enterprise companies.
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $59
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
        </div>
    </div>

<!-- first section div ends  -->
    <!-- second tab start  -->
    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="grid max-w-md mx-auto mt-6 overflow-hidden leading-7 text-gray-900 border border-b-4 border-gray-300 border-blue-600 rounded-xl md:max-w-lg lg:max-w-none sm:mt-10 lg:grid-cols-3">
            <div class="box-border px-4 py-8 mb-6 text-center bg-white border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">

                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                   Second
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The basic plan is a good fit for smaller teams and startups
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $19
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
            <div class="box-border px-4 py-8 mb-6 text-center bg-gray-100 border border-gray-300 border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Plus
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The plus plan is a good fit for medium-size to larger companies
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                    ₹200
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
            <div class="box-border px-4 py-8 text-center bg-white border-solid sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Pro
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The pro plan is a good fit for larger and enterprise companies.
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $59
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
        </div>
    </div>
   
    </div>
     <!-- second tab ends  -->
     <!-- third tab start -->
    <div class="hidden p-4 bg-gray-50 rounded-lg dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
    <div class="grid max-w-md mx-auto mt-6 overflow-hidden leading-7 text-gray-900 border border-b-4 border-gray-300 border-blue-600 rounded-xl md:max-w-lg lg:max-w-none sm:mt-10 lg:grid-cols-3">
            <div class="box-border px-4 py-8 mb-6 text-center bg-white border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">

                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                   Third
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The basic plan is a good fit for smaller teams and startups
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                    ₹200
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
            <div class="box-border px-4 py-8 mb-6 text-center bg-gray-100 border border-gray-300 border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Plus
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The plus plan is a good fit for medium-size to larger companies
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $39
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
            <div class="box-border px-4 py-8 text-center bg-white border-solid sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">
                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Pro
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The pro plan is a good fit for larger and enterprise companies.
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $59
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg">
                    Select Plan
                </button>
            </div>
        </div>
    </div>
    </div>
    <!-- third tab ends -->
</div>
    </div>
</section>
</body>

</html>