<section class="bg-dark text-white" id="sample_evolutions">
  <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 md:py-16 lg:px-8">
    <div class="mx-auto max-w-3xl text-center">
      <h2 class="text-3xl font-bold underline text-white sm:text-4xl">
      Sample Evaluations
      </h2>

      <p class="mt-4 text-white sm:text-xl">
      Click on the PDF to check out sample evaluations
      </p>
    </div>

    <div class="mt-8 sm:mt-12">
      <dl class="grid grid-cols-1 gap-4 sm:grid-cols-3">
      <?php
          $qr="select * from sample_eval order by id desc";
          $exc=mysqli_query($con,$qr);
          while ($data=mysqli_fetch_array($exc)) {
            echo '<div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">            
              <div class="order-last text-lg font-medium text-gray-500 justify-center flex">
                <a href="'.$data['pdf'].'">
                  <img src="image/pdf_icon.svg" width="64 " height="64px"></a>
              </div>
            </div>';
          }
        ?>
      </dl>
    </div>
  </div>
</section>
