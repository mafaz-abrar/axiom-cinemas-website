<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Enhancements 3 page
    // Last Updated: 24-May-2021
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc"; ?>
        <title>Special Features</title>
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            $enhance3Page = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

    
        <article id="enhance_ar">
            <section id="intro">
                <h2>Enhancements 3</h2>

                <p>I have used 2 PHP Enhancements in Assignment 3.</p>
                
                <p>The first Enhancement to my PHP is the Column based ordering achieved in the <a href="manager.php">manager</a> page. Selecting one column header first sorts the displayed table by the selected column name, then selecting the same column again sorts it in reverse. I kept track of the sorting by echoing the sorting criteria. (green sentences on the page).</p>

                <p>How This Was Achieved: In the Manager page, there is a form to store search criteria for all available orders. When a user loads this page, a sesssion is started. The session vars store the search criteria selected by the User, .</p>

                <p>When a user clicks on a column header, the POST variable 'criteria' is set. This reads the search criteria and then a switch() is used to select from a list of prewritten SQL queries. When user clicks on a column name, the name is actually a link with a query string attached, calling the manager.php page again.</p>
                
                
                <p>When link is clicked, then the SQL query is selected from a different SQL query list, where we have 2 variables in the SQL query - $orderTerm and $ordering. $orderTerm keeps of track of which column the result set should be sorted by. $ordering keeps track of whether the results are sorted ascendingly or descendingly.
                The value corresponding to the $orderTerm is set using a key-value pair in the GET query string and defaults to "order_id". The value corresponding to $ordering is stored in SESSION.</p>

                <p>The page checks if POST vars are set. If they are set, this means user clicked form submit button. So POST vars are used to display data using prewritten sql strings. If POST vars are not set, then page checks if SESSION vars are set. If SESSION vars are set (these are set the first time the user clicks form submit), then the displayed table is resorted according to which column name is clicked, for the same resultset as before.</p>

                <p>The SESSION vars created here are destroyed in 2 cases. Firstly, if the Clear Table Link is selected, which is a self call with a query string, that destroys session (and also unsets POST vars since it's not a form). The other way is to execute an UPDATE or DELETE query using options provided on the displayed table. If rows are UPDATED or DELETED, the SESSION is destroyed.</p>

                <p>PLease note that when clicking from one column name to an other column name for different sorting, results displayed might not change order if the rows are in the same order according to the other column. When the new column name is clicked again, the results will definitely change since order will be reversed. So please click a column twice if the order has not changed after clicking once when sorting from one column name to another column name.</p>

                <p>The second enhancement is the addition of 3 extra search criteria for the manager on the  <a href="manager.php">manager</a> page. These are: 1. Display Most Popular Product 2. Display FULFILLED orders between certain dates and 3. Calculate Average Orders per Day.</p>

                <p>For 1, I considered the Product with greatest total Quantity value to be most popular. Using for loops and foreach, and an array, I created a list of queries to get  orders for each product, then add up the quantity values in the resultsets of each product, then compare to find largest Quantity value, and display the final resultset of all orders whose product matches Most Popular Product.</p>

                <p>For 2, I captured input from the user in a form, sanitised it and used it in an sql query to comapare against dates stored in the database. Extra code has been included to: initialize variables as empty strings, so that if only the start date or end date has been given, query still executes. No validation is performed here as input is sanitised. So any weird inputs simply give no table.</p>

                <p>For 3, I converted the earliest date in order_time to DateTime objects and calculated difference between dates using date_diff() and current date using date(). These objects and functions were sourced from <a href="https://www.w3schools.com/php/php_date.asp">W3S's website</a>. I also created a query to find the total number of unique orders (i.e. quantity is ignored) using mysqli_num_rows. Then divide to give average orders per day.</p>


                
            </section>
        </article>
       
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>