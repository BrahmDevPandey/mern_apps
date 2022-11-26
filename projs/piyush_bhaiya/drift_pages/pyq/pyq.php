<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

    <!-- from piyush bhaiya -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
    <script src="https://unpkg.com/downloadjs@1.4.7"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- from piyush bhaiya -->

    <title>Previous Year Question Papers</title>

    <style>
        body {
            font-size: 20px;
        }

        table {
            padding: 20px;
            width: 80%;
            margin: auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 2px solid black;
        }

        main {
            margin-top: 90px;
            margin-bottom: 90px;
        }
    </style>
    <?php
    include 'inc/cdn.php';
    ?>
</head>
<?php include("..\Admin_Panel\dbcon.php");
if (isset($_POST['del_ppr'])) {
    $id = $_POST['del_ppr'];
    $rs = mysqli_fetch_array(mysqli_query($con, "select * from question_paper where id=" . $id));
    $exc = mysqli_query($con, "delete from question_paper where id=" . $id);
    if ($exc) {
        $r = explode("drift_pages", $rs['file_url']);
        unlink("../" . end($r));
        echo "<script>alert('Data deleted..')</script>";
    }

}

?>

<body>
    <!-- <header class="bg-gray-800 text-white text-center p-5 fixed top-0 w-full">This is the site header</header> -->
    <?php include 'header.php'; ?>
    <main>
        <?php
        $qr = "select category from question_paper group by category";
        $exc = mysqli_query($con, $qr);
        if (mysqli_num_rows($exc)) {
            while ($data = mysqli_fetch_array($exc)) {
                echo '<div class="bg-green-600 p-5 text-white m-3 w-[90%]">' . $data['category'] . '</div>';
                echo '<form method="POST">
                    <table class="">
                    <tbody>
                        <tr>
                            <th width="25%">Title</th>
                            <th width="10%">Year</th>
                            <th width="40%">Content</th>
                            <th width="15%">File</th>
                        </tr>';
                $exc1 = mysqli_query($con, "select * from question_paper where category='" . $data['category'] . "'");
                if (mysqli_num_rows($exc1)) {
                    while ($data1 = mysqli_fetch_array($exc1)) {
                        echo '<tr>
                                <td>' . $data1['title'] . '</td>
                                <td>' . $data1['year'] . '</td>
                                <td>' . $data1['content'] . '</td>
                                <td><a href="' . $data1['file_url'] . '">Show</a>        <button type="submit" value="' . $data1['id'] . '" name="del_ppr">Delete</button></td>
                            </tr>';
                    }
                }
                echo '</tbody></table></form>';
            }
        }
        ?>


    </main>
    <!-- <footer class="bg-gray-800 text-white text-center p-5 fixed bottom-0 w-full">This is the site footer</footer> -->
    <?php
    include 'footer.php';
    ?>
</body>

</html>