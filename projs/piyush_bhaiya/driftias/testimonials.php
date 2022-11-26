



<section  style="background-color: #dabcd1;color:#820b59">
  <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
    <h2 class="text-center text-4xl font-bold tracking-tight sm:text-5xl">
    UPSC CSE 2021 STARS
    </h2>

    <div class="swiper-container mt-12 !overflow-hidden ">
      <div class="swiper-wrapper">
      <?php
          $qr="select * from testimonials order by id desc";
          $exc=mysqli_query($con,$qr);
          while ($data=mysqli_fetch_array($exc)) {
            echo '<div class="swiper-slide">
            <blockquote class="rounded-lg bg-gray-100 p-8">
              <div class="flex items-center">
                <img alt="Man" src="'.$data['image'].'" class="h-16 w-16 rounded-full object-cover"/>
                <div class="ml-4">
                  <div class="flex justify-center gap-0.5 text-green-500">';
                    for($i=1;$i<=$data['star'];$i++){
                      echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor" >
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>';
                    }
                    echo '</div>
                  <p class="mt-1 text-lg font-medium text-gray-700">'.$data['name'].'</p>
                </div>
              </div>
  
              <p class="mt-4 text-gray-500">'.$data['bio'].'</p>
            </blockquote>
          </div>';
          }

        ?>
      </div>
    </div>
  </div>
</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper-container', {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 32,
      centeredSlides: true,
      autoplay: {
        delay: 2000,
      },
      breakpoints: {
        640: {
          slidesPerView: 1.5,
        },
        1024: {
          slidesPerView: 3,
        },
      },
    })
  })
</script>

