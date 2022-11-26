<section class="bg-white" id="faq">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-3xl font-bold underline text-red-900 sm:text-4xl">
      Frequently Asked Questions
      </h2>
    </div>
<div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
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
          </div>';
    }
  ?>
</div>

  </div>
</section>
