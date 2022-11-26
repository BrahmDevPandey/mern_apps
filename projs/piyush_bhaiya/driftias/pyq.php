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
            border-collapse: separate;
            /* border-radius: 15px; */
        }

        td,
        th {
            border-left: solid black 1px;
            border-top: solid black 1px;
        }

        th {
            border-top: none;
            border-left: none;
            border-right: 1px solid black;
        }

        td:first-child,
        th:first-child {
            border-top-left-radius: 10px;
        }

        th:last-child {
            border-top-right-radius: 10px;
            border-right: none;
        }

        td:last-child {
            border-top-right-radius: 10px;
            border-right: 1px solid black;
        }

        tr:last-child {
            border-bottom: 1px solid black;
        }

        main {
            margin-top: 90px;
            margin-bottom: 90px;
        }
    </style>
    <?php
    include 'dbcon.php';
    include 'inc/cdn.php';
    ?>
</head>

<body>
    <!-- <header class="bg-gray-800 text-white text-center p-5 fixed top-0 w-full">This is the site header</header> -->
    <?php include 'header.php'; ?>
    <main>
        <?php
        $qr = "select category from question_paper group by category";
        $exc = mysqli_query($con, $qr);
        if (mysqli_num_rows($exc)) {
            while ($data = mysqli_fetch_array($exc)) {
                echo '<div class="bg-red-900 dark:bg-gray-900 dark:text-white py-2 px-5 text-white ml-[10%] my-5 w-[40%] rounded-3xl">' . $data['category'] . '</div>';
                echo '<table class="mb-[50px]">
                    <tbody>
                        <tr class="bg-red-400 dark:bg-gray-600 dark:text-white">
                            <th width="25%" class="p-3">Title</th>
                            <th width="10%" class="p-3">Year</th>
                            <th width="15%" class="p-3">File</th>
                        </tr>';
                $exc1 = mysqli_query($con, "select * from question_paper where category='" . $data['category'] . "'");
                if (mysqli_num_rows($exc1)) {
                    while ($data1 = mysqli_fetch_array($exc1)) {
                        echo '<tr>
                                <td class="p-3">' . $data1['title'] . '</td>
                                <td class="p-3">' . $data1['year'] . '</td>
                                <td class="p-3"><a href="' . $data1['cnt_url'] . '">Show</a></td>
                            </tr>';
                    }
                }
                echo '</tbody></table>';
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