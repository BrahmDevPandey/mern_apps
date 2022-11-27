<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <?php
  include 'cdn.php';
  ?>
  <script defer="defer" src="./static/js/main.9a8d3238.js"></script>
  <link href="./static/css/main.56f09460.css" rel="stylesheet">
</head>
<?php
include('google_api.php');
include 'student_dashboard_header.php';
?>

<body>
  <section class="px-2 py-32 md:px-0">
    <section class="w-full grid gap-4 pb-7 md:pt-2 md:pb-24 flex justify-center">
      <a type="button" href="course_selected.php?gstype1=type1"
        class="shadow-lg text-red-900 border-2   bg-none hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
        GS Questions
      </a>

    </section>
    <?php
    if (isset($_GET['gstype1'])) { ?>
    <div class="input-page mb-5 " id="root">
    </div>
    <?php
    }
    ?>
  </section>
</body>

</html>