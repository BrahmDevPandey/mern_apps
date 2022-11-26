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
        <div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">
            <div class="order-last text-lg font-medium text-gray-500 justify-center flex">
            <form method="POST" action="validation.php" enctype="multipart/form-data">
              <input type="file" name="eval_pdf" accept="application/pdf" required>
              <input type="submit" value="Add PDF" name="add_eval_pdf" class="flex items-center w-full px-6 py-1 px-2 text-lg text-white bg-blue-500 rounded-md sm:mb-0 hover:bg-indigo-700 sm:w-auto">
            </form>  
           </a>
          </div>
        </div>
        
        <?php
          $qr="select * from sample_eval order by id desc";
          $exc=mysqli_query($con,$qr);
          while ($data=mysqli_fetch_array($exc)) {
            echo '<div class="flex flex-col rounded-lg border border-gray-100 px-4 py-8 text-center">            
              <div class="order-last text-lg font-medium text-gray-500 justify-center flex">
                <a href="'.$data['pdf'].'">
                  <img src="image/pdf_icon.svg" width="64 " height="64px"></a>        
                  <button class="inline-flex items-center justify-center py-0 px-1 font-sans text-sm leading-none text-center text-white no-underline bg-red-700 border border-b-2 border-white-600 rounded-md cursor-pointer hover:bg-blue-600 hover:border-blue-600 hover:text-white sm:text-base sm:mt-0 md:text-lg"
                         type="button" onclick="'."if(confirm('Sure you want to delete'))location.href='validation.php?del_eval_pdf=".$data['id']."'".'">
                            Delete PDF
                        </button>
              </div>
            </div>';
          }
        ?>
      
    
      </dl>
    </div>
  </div>
</section>
