
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
<section class="px-2 py-32 md:px-0">
<div class="flex justify-center ">
<div class=" pb-2 mb-10 mx-auto lg:max-w-lg h-auto sm:h-auto bg-white rounded-lg border border-gray-200 shadow-md lg:p-5 sm:py-10 sm:p-10 md:p-10 dark:bg-gray-800 dark:border-gray-700 p-3">
<span class="text-red-900 font-semibold ">Welcome to your Free Trial</span><br>
You can submit 2 GS questions and 1 Optional questions for demo evaluation
</div>
</div>
<!-- Section 5 --> 
<section class="w-full grid gap-4 pb-7 md:pt-2 md:pb-24 flex justify-center">
<a type="button" href="course_selected.php?question_type=GS" class="shadow-lg text-red-900 border-2   bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
GS Questions
</a>
<a type="button" href="course_selected.php?question_type=optional" class="shadow-lg text-red-900 border-2  bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
Optional
</a>
</section>
<div class="input-page mb-5 " style="display: none;" id="input-page">
        <div class="flex  justify-center items-center w-full choose-file">
    <label for="dropzone-file" class="flex flex-col mx-auto justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
        <div class="flex flex-col justify-center items-center pt-5 pb-6">
            <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
        </div>
        <input type="file" id="upload-file" onChange={encodeImageFileAsURL(this)} multiple accept="image/*"/>
    </label>
</div> 
  </div>
        <div class="pdf-page" id="pdf-page">             
            <div class="create-pdf" id="create-pdf"> 
            </div>
        </div>
        <div id="btns" class="flex flex-col      cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            <button type="button" style="display: none;" onClick={embedImages()} id="convertBtn" convertBtn={convertBtn} class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
  UPLOAD
</button>
        </div>
</section>
</body>
</html>