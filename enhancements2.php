<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Enhancements 2 page
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
            $enhance2Page = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

    
        <article id="enhance_ar">
            <section id="intro">
                <h2>Enhancements 2</h2>
                
                <p>I used two enhancements in JS for this part: implementing a time limit on the payments.html page and limiting the user's ability to pick certain options when a particular product is selected</p>

                <p> For Limiting the user's optional features, this was done in the <a href="enquire.html#productOrderDetails">Enquire Page</a>. A large chunk of code was needed to allow for this process. When a user selects a product from the select input, my code will do three things: 1. find out which optional features are available for the selected product, and strike through the others (and set the value to false), 2. find out which checkboxes have been checked and display their prices next to them, 3.calculate and display and estimated total from all the options chosen.</p>

                <p>The code here is simple enough. This function is triggered whenever the user clicks anywhere inside the fieldset that contains product details' options. This ensures that whenever the user clicks near an option, all the values in the box will update.</p>

                <p>First get user's select input value, and get all the checkboxes and store them in an array using .querySelectorAll() (<a href="https://www.w3schools.com/jsref/met_document_queryselectorall.asp">Source: w3schools</a>). Then using a for loop, cycle through checkboxes, and using if statement, check if value is true (if (checkbox.value){...}). If value is true, display price next to checkbox. Then using consecutive if statements, match user's product value to checkboxes, again using the for loop, but with different conditions depending on user's product chosen.</p>

                <p>The timing function was much easier to implement on the <a href="payment.html#timeOut">payment.html</a> page. I added a span near the bottom of the page to display a timer. This timer is triggered on loading the payment.html window, and a setInterval() (<a href="https://www.w3schools.com/jsref/met_win_setinterval.asp">Source: w3schools</a>) function is used to continually call the showTimer() function every second.</p>
                
                <p>In enhancements page, a global variable timeOut is defined (currently timeOut=600), with a hardcoded timeOut value. showTimer() function decrements timeOut value by 1, then displays remaining time formatted in minutes and seconds. when timeOut = 0 or lower, cancelForm2() is called; this clears session data and drops the user on the home page.</p>
                
            </section>
        </article>
       
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>