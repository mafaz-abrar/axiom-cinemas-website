<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: extra_queries_1 page for Enhancements3
    // Last Updated: 24-May-2021
?>


<?php

    // list queries for all orders of X product
    $queryArr[] = "SELECT * FROM orders WHERE product = 'super_premium'";
    $queryArr[] = "SELECT * FROM orders WHERE product = 'premium'";
    $queryArr[] = "SELECT * FROM orders WHERE product = 'elite'";
    $queryArr[] = "SELECT * FROM orders WHERE product = 'basic'";
    $queryArr[] = "SELECT * FROM orders WHERE product = 'single_with_benefits'";
    $queryArr[] = "SELECT * FROM orders WHERE product = 'single'";

    // execute each query and store resultsets in array resultArr
    foreach ($queryArr as $data) {
        $resultArr[] = mysqli_query($conn, $data);
    }

    foreach ($resultArr as $data) { // for every resultset in resultArr
        $size = 0; // init size

        while ($row_for_quantity = mysqli_fetch_assoc($data)) { // go through every row
            $quan = $row_for_quantity['quantity']; // take quantity 
            $size += $quan; // add quantity to size until no more rows
        }
        
        $numbers[] = $size; // add final value of size as entry in numbers, after this, make size 0 for next loop (in line 14)
    }

    $biggest = $numbers[0]; // init biggest

    for ($i = 0; $i < count($numbers) - 1; $i++) { // for every entry in numbers except last
    
        if ($numbers[$i + 1] > $biggest) { // check if next entry is bigger than $biggest
            $biggest = $numbers[$i + 1]; // if it is, set that entry as $biggest
            $biggestPos = $i + 1; // set the index number of $biggest to $biggestPos
        }
    }

    foreach ($resultArr as $data) { // free the resultset
        mysqli_free_result($data);
    }
   
    $query = $queryArr[$biggestPos]; // use biggestPos as index number to find most popular product

    if (!isset($_POST['criteria']) && isset($_SESSION['criteria'])) {
        $query = $query . " ORDER BY $orderTerm $ordering;"; // for reordering
    }

?>