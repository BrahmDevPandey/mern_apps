<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <?php
    include 'inc/cdn.php';
    ?>
</head>
<?php include 'dbcon.php';
include 'header.php';


$qr = "select * from header where id=1";
$exc = mysqli_query($con, $qr);
$data = mysqli_fetch_array($exc);

?>

<body>
    <div>
        <div class="w-[70%] mx-auto my-[5%] p-6 overflow-hidden rounded-lg shadow dark:bg-gray-900 dark:text-gray-100">
            <div class="flex items-center my-8 space-x-4 justify-between">
                <div class="flex items-center space-x-4">
                    <img src="https://source.unsplash.com/100x100/?portrait" alt=""
                        class="w-30 h-30 rounded-full dark:bg-gray-500">
                    <div>
                        <h3 class="text-lg font-large font-bold">author_name</h3>
                        <time datetime="2021-02-18" class="text-sm dark:text-gray-400">blog_date</time>
                    </div>
                </div>

                <div class="collapse md:visible">
                    <button>
                        <h1><i class="fa fa-thumbs-up text-lg mx-2" title="Like" area-hidden="true"></i></h1>
                    </button>
                    <button>
                        <h1><i class="fa fa-save text-lg mx-5" area-hidden="true" title="Save"></i></h1>
                    </button>
                </div>
            </div>
            <article>
                <h2 class="text-xl font-bold">blog_title_here</h2>
                <p class="mt-4 dark:text-gray-400">blog_content_here <br>
                    Morbi porttitor mi in diam scelerisque commodo. Proin sed laoreet
                    libero. Fusce faucibus porttitor lacus, at blandit mauris blandit eget. Donec facilisis lorem et
                    risus commodo, quis auctor nulla varius. Pellentesque facilisis feugiat turpis, id molestie augue
                    semper quis. Nunc ornare eget est sit amet elementum.</p>
            </article>
            <div class="md:collapse mt-4 w-full text-end">
                <button>
                    <h1><i class="fa fa-thumbs-up text-lg mx-2" title="Like" area-hidden="true"></i></h1>
                </button>
                <button>
                    <h1><i class="fa fa-save text-lg mx-5" area-hidden="true" title="Save"></i></h1>
                </button>
            </div>
        </div>

    </div>
    <?php
    include 'footer.php';
    ?>

</body>

</html>