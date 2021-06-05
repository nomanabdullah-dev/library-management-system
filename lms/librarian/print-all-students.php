<?php
require_once '../dbcon.php';

$result = mysqli_query($db, "SELECT * FROM students");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Students</title>
    <style>
        body {
            margin: 0;
            font-family: kalpurush;
        }
        .print-area {
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header, .page-info {
            text-align: center;
        }
        .header h3 {
            margin: 0;
        }
        .data-info {}
        .data-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-info th, .data-info td {
            border: 1px solid #000;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<body onload="window.print()">
<?php
$sl = 1;
$page = 1;
$total = mysqli_num_rows($result);
$per_page = 35;
while ($row = mysqli_fetch_assoc($result)) {
    if ($sl % $per_page == 1) {
        echo page_header();
    }
    ?>
    
    <tr>
        <td><?= $sl;?></td>
        <td><?= ucwords($row['fname'].' '.$row['lname']);?></td>
        <td><?= $row['roll'];?></td>
        <td><?= $row['reg'];?></td>
        <td><?= $row['phone'];?></td>
    </tr>
    
    <?php
    if ($sl % $per_page == 0 || $total == $per_page) {
        echo page_footer($page++);
    }
    $sl++;
}

?>



<?php

function page_header(){
    $data = '
    <div class="print-area">
    <div class="header">
        <h3>Noman Abdullah</h3>
        <h4>জেমস বন্ড হতে চান স্পাইডারম্যান</h4>
    </div>
    <div class="data-info">
        <table>
            <tr>
                <th>Sl No</th>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Reg. No</th>
                <th>Phone</th>
            </tr>
    ';
    return $data;
}
function page_footer($page){
    $data = '
    </table>
    <div class="page-info">Page :- '.$page.'</div>
</div>
</div>

</body>
</html>
    ';
    return $data;
}
?>