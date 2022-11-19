<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <?php
  include 'inc/cdn.php'; 
  ?>
</head>
<?php include 'inc/header.php'; ?>
<body>

<main class="flex-grow min-h-screen bg-offWhite w-full mt-20">
   <section class="pl-7 pt-4 pr-7 mb-10 h-full">
      <div class="hidden md:block h-full">
         <h2 class="text-2xl ">Notes Modules</h2>
         <div class="w-full h-full flex flex-row gap-6 mt-6">
            <div class="h-full md:w-1/3 lg:w-1/4 bg-white rounded-md">
               <ul class="mt-4 mb-4 mr-2 ml-2">
                  <li class="h-16 mb-0.5 pl-7 pr-5 rounded-lg flex flex-row items-center justify-between cursor-pointer  false hover:bg-hoverGray">
                     <p class="text-lg text-black false">Mains Diamonds - CA Model Answers </p>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="block h-6 w-6 text-black">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </li>
                  <li class="h-16 mb-0.5 pl-7 pr-5 rounded-lg flex flex-row items-center justify-between cursor-pointer  false hover:bg-hoverGray">
                     <p class="text-lg text-black false">Prelims Anatomy</p>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="block h-6 w-6 text-black">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </li>
                  <li class="h-16 mb-0.5 pl-7 pr-5 rounded-lg flex flex-row items-center justify-between cursor-pointer  bg-primary hover:bg-none">
                     <p class="text-lg text-white ">Current Affairs - Question Bank</p>
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="block h-6 w-6 text-white">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                     </svg>
                  </li>
               </ul>
            </div>
            <div class="h-full md:w-2/3 lg:w-3/4 grid lg:grid-cols-2 xl:grid-cols-3 gap-4">
               <div class="h-auto bg-white rounded-lg pt-4 pl-4 pr-4 pb-6 featuresBox">
                  <img src="https://ik.imagekit.io/xnmbjzq8npo/drift_IAS-removebg-preview_fKyfp_Xcj.png?ik-sdk-version=javascript-1.4.3&updatedAt=1666424177851" alt="ConvertIas notes subscription">
                  <h3 class="mt-3 text-base md:text-lg ">Current Affairs Question Bank - Mains 2022</h3>
                  <p class="mt-1 mb-2 text-xs md:text-sm opacity-80">Most Important Questions from Current Affairs</p>
                  <a class="text-sm md:text-base text-primary underline" href="/notes-library/mains_ca_questions_bank">View Library</a>
                  <div class="h-0.5 mt-3.5 mb-3.5 opacity-5 bg-black"></div>
               </div>
            </div>
         </div>
      </div>
      <div class="md:hidden">
         <h2 class="flex flex-row items-center text-lg cursor-pointer noselect">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" class="w-6 h-6 mr-2">
               <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
            </svg>
            Notes Modules
         </h2>
         <div class="mt-6">
            <h3 class="text-base">Current Affairs - Question Bank</h3>
            <ul class="mt-4 space-y-4">
               <li>
                  <div class="h-auto bg-white rounded-lg pt-4 pl-4 pr-4 pb-6 featuresBox">
                     <img src="/images/notes-subscription.svg" alt="ConvertIas notes subscription">
                     <h3 class="mt-3 text-base md:text-lg ">Current Affairs Question Bank - Mains 2022</h3>
                     <p class="mt-1 mb-2 text-xs md:text-sm opacity-80">Most Important Questions from Current Affairs</p>
                     <a class="text-sm md:text-base text-primary underline" href="/notes-library/mains_ca_questions_bank">View Library</a>
                     <div class="h-0.5 mt-3.5 mb-3.5 opacity-5 bg-black"></div>
                  </div>
               </li>
            </ul>
         </div>
      </div>
   </section>

</main>
<?php


include './inc/footer.php';

?>
</body>