<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: extra_queries_2 page for Enhancements3
    // Last Updated: 24-May-2021
?>


<?php

if (isset($_POST['criteria'])) { // if POSTed values

    if (strlen($_POST['end_date']) != 0) { // unless end date not provided
        $dateEnd = sanitise_input($_POST['end_date']); // sanitise end date
        $_SESSION['end_date'] = $dateEnd; //  store end date in session for reordering
        $dateEndAppend = "order_time <= '$dateEnd' AND"; // append to query 
        
        // date comparison technique sourced from:
        // https://stackoverflow.com/questions/3847736/how-can-i-compare-two-dates-in-php

    } else {
        $dateEndAppend = ""; // nothing gets appended to query
    }

    // similarly for start date values
    if (strlen($_POST['start_date']) != 0) {
        $dateStart = sanitise_input($_POST['start_date']);
        $_SESSION['start_date'] = $dateStart;
        $dateStartAppend = "order_time >= '$dateStart' AND";
    } else {
        $dateStartAppend = "";
    }
    
    // final query, which will be passed to mysqli_query on manager.php
    $query = "SELECT * FROM orders WHERE $dateStartAppend $dateEndAppend order_status='FULFILLED'";
   
    
}

if (!isset($_POST['criteria']) && isset($_SESSION['criteria'])) { // if re-ordering
    if (isset($_SESSION['end_date'])) { // use end date only if set
        $dateEnd = $_SESSION['end_date'];
        $dateEndAppend = "order_time <= '$dateEnd' AND";
    } else {
        $dateEndAppend = "";
    }

    if (isset($_SESSION['start_date'])) { // use start date only if set
        $dateStart = $_SESSION['start_date'];
        $dateStartAppend = "order_time >= '$dateStart' AND";
    } else {
        $dateStartAppend = "";
    }

    // final query, which will be passed to mysqli_query on manager.php
    $query = "SELECT * FROM orders WHERE $dateStartAppend $dateEndAppend order_status='FULFILLED'";
}



?>