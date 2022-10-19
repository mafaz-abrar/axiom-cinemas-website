<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: extra_queries_3 page for Enhancements3
    // Last Updated: 24-May-2021
?>


<?php
    // 2 queries: 1 to get all orders, 1 to get earliest order
    $queryDiv[] = "SELECT * FROM orders";
    $queryDiv[] = "SELECT * FROM orders ORDER BY order_time LIMIT 1";

    // get the number of rows from all orders, i.e. total number of orders
    $resultDiv = mysqli_query($conn, $queryDiv[0]);
    $rowDiv = mysqli_num_rows($resultDiv);
    mysqli_free_result($resultDiv);

    // get the order_time of earliest order
    $resultDiv = mysqli_query($conn, $queryDiv[1]);
    $dayDiv = mysqli_fetch_assoc($resultDiv);
    $divisorDiv = $dayDiv['order_time'];
    mysqli_free_result($resultDiv);

    
    $dateNow = date_create(date("Y-m-d")); // get today's date
    $dateThen = date_create($divisorDiv); // And convert previous order_time to DateTime object
    $diff = date_diff($dateNow, $dateThen); // get a DateInterval object from difference of 2 dates

    /**
     * For the above code, I sourced:
     * For date_create(): https://www.w3schools.com/php/func_date_date_create.asp
     * For date(): https://www.w3schools.com/php/php_date.asp
     * For date_diff(): https://www.w3schools.com/php/func_date_date_diff.asp
    */



    $numberOfDivstr = $diff->format("%a"); // format DateInterval object as number of days
    $numberOfDivint = intval($numberOfDivstr); // convert days number to integer
    
    echo "<p class=\"good\">Total Number of Unique Orders (Not Quantity): $rowDiv </p>";
    echo "<p class=\"good\">Number of days since first order: $numberOfDivint </p>";
    
    if ($numberOfDivint > 0) { 
        $averageDiv = ceil($rowDiv / $numberOfDivint); // do final calculation
        $stringDiv = "The average number of orders per day (rounded up) is $averageDiv.";
    } else {
        $stringDiv = "Division by 0 or negative integers not allowed. Please enter new orders until enough data available for calculation.";
    }

?>