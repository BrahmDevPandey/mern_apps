<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <?php
  include 'inc/cdn.php'; 
  ?>
  
</head>
<?php   include 'dbcon.php';
        include 'header.php'; 
        
        
        $qr="select * from header where id=1";
        $exc=mysqli_query($con,$qr);
        $data=mysqli_fetch_array($exc);

?>
<body>

<section class="px-2 py-32 md:px-0">
  <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
    <div class="flex flex-wrap items-center sm:-mx-3">
      <div class="w-full md:w-1/2 md:px-3">
          <div class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                <input type="text" placeholder="Header 1" value="<?php echo $data['header1'];?>" id="hed1"><br>
                <input type="text" placeholder="Header 2" value="<?php echo $data['header2'];?>" id="hed2" style="color:#830e5e">
            
            </h1>
            <p class="mx-auto text-base text-gray-500 sm:max-w-md lg:text-xl md:max-w-3xl"><input type="text" placeholder="Write hear" value="<?php echo $data['para'];?>" id="para"></p>
            <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                <a href="javascript:void(0)" id='upd_hd' class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white  rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto" style="background-color: #830e5e;">
                    Update
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
                <a href="#_" style="background-color:#ac8c94;color:black"  class=" font-extrabold flex items-center px-6 py-3 text-black-500  rounded-md hover:bg-gray-200 hover:text-gray-600">
                    Learn More
                </a>
            </div>
          </div>
       </div>
      <div class="w-full md:w-1/2">
        <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
            <img src="https://images.unsplash.com/photo-1498049860654-af1a5c566876?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80">
          </div>
      </div>
    </div>
  </div>
</section>
<!-- ====== Blog Section Start -->
<section class="w-full   pb-7 md:pt-2 md:pb-24">
   <div class="container">
      <div class="flex flex-wrap justify-center -mx-4">
         <div class="w-full px-4">
            <div class="text-center mx-auto mb-[60px] lg:mb-20 max-w-[510px]">
            <span class="font-semibold text-lg text-primary mb-2 block">
            Our Recent Blogs
               </span>
               <h2 class="font-bold text-3xl sm:text-4xl md:text-[40px] text-dark mb-4">
                  <button class="items-center justify-center py-3 px-2 font-sans text-sm leading-none text-center text-white-600 no-underline bg-blue-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-900 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg" onclick="document.getElementById('adb').style.display='block';">Add Blogs</button>
               </h2>
            </div>
         </div>
      </div>
      <div class="flex flex-wrap -mx-4">
        <!-- Add Blog -->
         <div class="w-full md:w-1/2 lg:w-1/3 px-4 border border-b-2 border-blue-600 rounded-md" style="display:none" id="adb">
          <form method="POST" action="validation.php" enctype="multipart/form-data">
            <div class="max-w-[370px] mx-auto mb-10">
               <div class="rounded overflow-hidden mb-8">
                  <input type="file" name="blog_img" accept="image/*" required>
               </div>
               <div>
                  <span class="bg-red-900 rounded inline-block text-center py-1 px-4 text-xs leading-loose font-semibold text-black mb-5">
                      <input type="date" name="blog_date" required>
                  </span>
                  <h3>
                     <a href="javascript:void(0)" class=" font-semibold text-xl sm:text-2xl lg:text-xl xl:text-2xl mb-4 inline-block text-dark hover:text-primary ">
                        <input type="text" placeholder="Write hear" name="blog_para1" required>
                     </a>
                  </h3>
                  <p class="text-base text-body-color">
                     <input type="text" placeholder="Write hear" name="blog_para2" required>
                  </p>
               </div>
                <button class="inline-flex items-center justify-center py-1 px-2 font-sans text-sm leading-none text-center text-white-600 no-underline bg-blue-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    type="submit" name="add_blog">Add Blog</button>
                <button class="inline-flex items-center justify-center py-1 px-1 font-sans text-sm leading-none text-center text-white-600 no-underline bg-red-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-0 md:text-lg" onclick="document.getElementById('adb').style.display='none';">
                    Cancel
                </button>
            </div>
          </form>
         </div>
         <?php
         $qr="select * from blogs order by id desc";
         $exc1=mysqli_query($con,$qr);
         while ($data1=mysqli_fetch_array($exc1)) {
            echo '<div class="w-full md:w-1/2 lg:w-1/3 px-4">
                    <div class="max-w-[370px] mx-auto mb-10">
                    <div class="rounded overflow-hidden mb-8">
                        <img src="'.$data1['image'].'" alt="image" class="w-full" />
                    </div>
                    <div>
                        <span class="bg-red-900 rounded inline-block text-center py-1 px-4 text-xs leading-loose font-semibold text-white mb-5">
                            '.$data1['date'].'</span>
                        <h3>
                            <a href="javascript:void(0)" class=" font-semibold text-xl sm:text-2xl lg:text-xl xl:text-2xl mb-4 inline-block text-dark hover:text-primary ">
                                '.$data1['para1'].'
                            </a>
                        </h3>
                        <p class="text-base text-body-color">
                            '.$data1['para2'].'
                        </p>
                    </div>
                    <button class="inline-flex items-center justify-center py-1 px-1 font-sans text-sm leading-none text-center text-white no-underline bg-red-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-0 md:text-lg"
                         type="button" onclick="'."if(confirm('Sure you want to delete'))location.href='validation.php?del_blog=".$data1['id']."'".'">
                            Delete Blog
                        </button>
                    </div>
                </div>';
         }
         
         ?>
         
      </div>
     
   </div>
   <div class="flex justify-center">
            <a href="#_" class="flex items-center w-full px-6 py-3 mb-3 text-lg text-white  rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto" style="background-color: #830e5e;">
              View More
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12.75 15l3-3m0 0l-3-3m3 3h-7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>

            </a>
           
          </div>
</section>
<!-- ====== Blog Section End -->
<!-- section end -->
<section class="w-full   pb-7 md:pt-2 md:pb-24">
    <div class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">
        <!-- Image -->
        <div class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
           
            <img src="https://img.icons8.com/external-xnimrodx-lineal-color-xnimrodx/512/000000/external-interview-communication-xnimrodx-lineal-color-xnimrodx.png" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 "/>
        
        </div>

        <!-- Content -->
        <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
            <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
            Interview-Appeared Faculty
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                Build an atmosphere that creates productivity in your organization and your company culture.
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Maximize productivity and growth
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Speed past your competition
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Learn the top techniques
                </li>
            </ul>
        </div>
        <!-- End  Content -->
    </div>
    <div class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">
        <!-- Content -->
        <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32">
            <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
            Evaluation within 48 hours
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                Save time and money with our revolutionary services. We are the leaders in the industry.
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Automated task management workflow
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Detailed analytics for your data
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Some awesome integrations
                </li>
            </ul>
        </div>
        <!-- End  Content -->

        <!-- Image -->
        <div class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
            <img src="https://img.icons8.com/nolan/512/clock.png" class="pl-4 sm:pr-10 xl:pl-10 lg:pr-32">
           
        </div>
    </div>
</section>


<!-- Section 5 -->
<section class="w-full   pb-7 md:pt-2 md:pb-24">
    <div class="box-border flex flex-col items-center content-center px-8 mx-auto leading-6 text-black border-0 border-gray-300 border-solid md:flex-row max-w-7xl lg:px-16">
        <!-- Image -->
        <div class="box-border relative w-full max-w-md px-4 mt-5 mb-4 -ml-5 text-center bg-no-repeat bg-contain border-solid md:ml-0 md:mt-0 md:max-w-none lg:mb-0 md:w-1/2 xl:pl-10">
           
            <img src="https://img.icons8.com/external-flaticons-lineal-color-flat-icons/512/000000/external-affordable-cleaning-flaticons-lineal-color-flat-icons-2.png" class="p-2 pl-6 pr-5 xl:pl-16 xl:pr-20 "/>
        
        </div>

        <!-- Content -->
        <div class="box-border order-first w-full text-black border-solid md:w-1/2 md:pl-10 md:order-none">
            <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
            Super Affordable
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-12 xl:pr-32 lg:text-lg">
                Build an atmosphere that creates productivity in your organization and your company culture.
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Maximize productivity and growth
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Speed past your competition
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Learn the top techniques
                </li>
            </ul>
        </div>
        <!-- End  Content -->
    </div>
    <div class="box-border flex flex-col items-center content-center px-8 mx-auto mt-2 leading-6 text-black border-0 border-gray-300 border-solid md:mt-20 xl:mt-0 md:flex-row max-w-7xl lg:px-16">
        <!-- Content -->
        <div class="box-border w-full text-black border-solid md:w-1/2 md:pl-6 xl:pl-32">
            <h2 class="m-0 text-xl font-semibold leading-tight border-0 border-gray-300 lg:text-3xl md:text-2xl">
            Personal Dashboard
            </h2>
            <p class="pt-4 pb-8 m-0 leading-7 text-gray-700 border-0 border-gray-300 sm:pr-10 lg:text-lg">
                Save time and money with our revolutionary services. We are the leaders in the industry.
            </p>
            <ul class="p-0 m-0 leading-6 border-0 border-gray-300">
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Automated task management workflow
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Detailed analytics for your data
                </li>
                <li class="box-border relative py-1 pl-0 text-left text-gray-500 border-solid">
                    <span class="inline-flex items-center justify-center w-6 h-6 mr-2 text-white bg-red-900 rounded-full"><span class="text-sm font-bold">✓</span></span> Some awesome integrations
                </li>
            </ul>
        </div>
        <!-- End  Content -->

        <!-- Image -->
        <div class="box-border relative w-full max-w-md px-4 mt-10 mb-4 text-center bg-no-repeat bg-contain border-solid md:mt-0 md:max-w-none lg:mb-0 md:w-1/2">
            <img src="https://img.icons8.com/pastel-glyph/512/000000/estimated-growth.png" class="pl-4 sm:pr-10 xl:pl-10 lg:pr-32">
           
        </div>
    </div>
</section>

<?php include 'how_it_works.php'; ?>
<?php include 'dyn_sample_evolutions.php'; ?>
<!-- Section 6 -->

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
    <?php
        $qr="select * from eval_plan";
        $exc2=mysqli_query($con,$qr);
        $data2=mysqli_fetch_all($exc2);


    ?>
    <!-- first evolution plan start  -->
    <div class="grid max-w-md mx-auto mt-6 overflow-hidden leading-7 text-gray-900 border border-b-4 border-gray-300 border-blue-600 rounded-xl md:max-w-lg lg:max-w-none sm:mt-10 lg:grid-cols-3">
            <div class="box-border px-4 py-8 mb-6 text-center bg-white border-solid lg:mb-0 sm:px-4 sm:py-8 md:px-8 md:py-12 lg:px-10">

                <h3 class="m-0 text-2xl font-semibold leading-tight tracking-tight text-black border-0 border-solid sm:text-3xl md:text-4xl">
                    Basic
                </h3>
                <p class="mt-3 leading-7 text-gray-900 border-0 border-solid">
                    The basic plan is a good fit for smaller teams and startups
                </p>
                <div class="flex items-center justify-center mt-6 leading-7 text-gray-900 border-0 border-solid sm:mt-8">
                    <p class="box-border m-0 text-6xl font-semibold leading-normal text-center border-0 border-gray-200">
                        $<input type="text" value="<?php echo $data2[0][3];?>" id="eb" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('essay','basic','eb')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[1][3];?>" id="epl" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('essay','plus','epl')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[2][3];?>" id="ep" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('essay','pro','ep')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[3][3];?>" id="ob" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('optional','basic','ob')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[4][3];?>" id="opl" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('optional','plus','opl')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[5][3];?>" id="op" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('optional','pro','op')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[6][3];?>" id="cb" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>

                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('combo','basic','cb')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[7][3];?>" id="cpl" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-left border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-white no-underline bg-blue-600 border-b-4 border-blue-700 rounded cursor-pointer hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('combo','plus','cpl')">Update Plan Price
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
                        $<input type="text" value="<?php echo $data2[8][3];?>" id="cp" style="width:100px">
                    </p>
                    <p class="box-border my-0 ml-4 mr-0 text-xs text-center border-0 border-gray-200">
                        per user <span class="block">per month</span>
                    </p>
                </div>
                <button class="inline-flex items-center justify-center w-full py-3 mt-6 font-sans text-sm leading-none text-center text-blue-600 no-underline bg-transparent border border-b-2 border-blue-600 rounded cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
                    onclick="update_plan('combo','pro','cp')">Update Plan Price
                </button>
            </div>
        </div>
    </div>
    </div>
     

    <!-- third tab ends -->

</div>


       
    </div>
</section>
<?php
include 'dyn_faq.php';
include 'dyn_testimonials.php';
include './inc/footer.php';

?>

 <script type="text/javascript">
    $(document).ready(function(){
        $('#upd_hd').click(function(){
            var hed1 = $('#hed1').val();
            var hed2 = $('#hed2').val();
            var para = $('#para').val();
            if(hed1!="" && hed2!="" && para!=""){
                $.ajax({
                    url: "validation.php",
                    type: "POST",
                    data: {
                        updhead: "",
                        hed1: hed1,
                        hed2: hed2,
                        para: para				
                    },
                    cache: false,
                    success: function(res){
                        alert(res);                        
                    }
                });
                
            }else
        		alert('Please fill all the field !');

        });
        
    });
    function update_plan(content,category,price){
        var prs=document.getElementById(price).value;
        $.ajax({
            url: "validation.php",
            type: "POST",
            data: {
                updplan: "",
                cnt: content,
                cat: category,
                prs: prs				
            },
            cache: false,
            success: function(res){
                alert(res);                        
            }
        });
    }
    
</script>
<script src="js/sweetalert.min.js"></script>
</body>
</html>