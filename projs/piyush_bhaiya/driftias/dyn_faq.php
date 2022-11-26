<section class="bg-white" id="faq">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-3xl font-bold underline text-red-900 sm:text-4xl">
      Frequently Asked Questions
      </h2>
    </div>
    <button class="items-center justify-center py-3 px-2 font-sans text-sm leading-none text-center text-white-600 no-underline bg-blue-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-900 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg" 
      onclick="document.getElementById('adfaq').style.display='block';">Add FAQ</button>
<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
  <form method="POST" action="validation.php" id="adfaq" style="display:none;">
    <h2 id="accordion-flush-heading-0">
      <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-accordion-target="#accordion-flush-body-0" aria-expanded="true" aria-controls="accordion-flush-body-0">
        <span><input type="text" name="ques" placeholder="Question ?" required><b>?</b></span>
        <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
      </button>
    </h2>
    <div id="accordion-flush-body-0" class="" aria-labelledby="accordion-flush-heading-0">
      <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
        <p class="mb-2 text-gray-500 dark:text-gray-400"><input type="text" name="ans1" placeholder="Answer 1" required><b>.</b></p>
        <p class="text-gray-500 dark:text-gray-400"><input type="text" name="ans2" placeholder="Answer 2" required><b>.</b></p>
      </div>
    </div>
    <button class="inline-flex items-center justify-center py-1 px-2 font-sans text-sm leading-none text-center text-white-600 no-underline bg-blue-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg"
      type="submit" name="add_faq">Add FAQ</button>    
    <button class="inline-flex items-center justify-center py-1 px-1 font-sans text-sm leading-none text-center text-white-600 no-underline bg-red-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-8 md:text-lg" type="button" 
      onclick="document.getElementById('adfaq').style.display='none';">
        Cancel
    </button>
  </form>
  <?php
    $qr="select * from faques order by id desc";
    $exc=mysqli_query($con,$qr);
    while ($data=mysqli_fetch_array($exc)) {
      echo '<h2 id="accordion-flush-heading-'.$data['id'].'">
            <button type="button" class="flex items-center justify-between w-full py-5 font-medium text-left border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-accordion-target="#accordion-flush-body-'.$data['id'].'" aria-expanded="true" aria-controls="accordion-flush-body-'.$data['id'].'">
              <span>'.$data['question'].'?</span>
              <svg data-accordion-icon="" class="w-6 h-6 rotate-180 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </h2>
          <div id="accordion-flush-body-'.$data['id'].'" class="hidden" aria-labelledby="accordion-flush-heading-'.$data['id'].'">
            <div class="py-5 font-light border-b border-gray-200 dark:border-gray-700">
              <p class="mb-2 text-gray-500 dark:text-gray-400">'.$data['answer1'].'.</p>
              <p class="text-gray-500 dark:text-gray-400">'.$data['answer2'].'.</p>
            </div>
            <button class="inline-flex items-center justify-center py-1 px-1 font-sans text-sm leading-none text-center text-white-600 no-underline bg-red-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-0 md:text-lg"
              type="button" onclick="'."if(confirm('Sure you want to delete'))location.href='validation.php?del_faq=".$data['id']."'".'">
                Delete FAQ</button>
          </div>';
    }
  ?>
  
  
</div>

  </div>
</section>
