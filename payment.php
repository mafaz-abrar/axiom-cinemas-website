<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Payments Page
    // Last Updated: 24-May-2021
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc"; ?>
        <script src="scripts/part2.js"></script>
        <script src="scripts/enhancements.js"></script>
        <title>Special Features</title>
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            include_once "includes/menu.inc";  
        ?>
    
        <article id="payment_ar">
            <section id="confirmDetails">
                <h2>Order Summary</h2>
                <h3>Personal Details:</h3>
                <p>Name: <span id="confirmName"></span></p>
                <p>Email: <span id="confirmEmail"></span></p>
                <p>Phone Number: <span id="confirmPhone"></span></p>
                <p>Address: <span id="confirmAddress"></span></p>
                <p>Preferred Contact Method: <span id="confirmContactMethod"></span></p>
            </section>

            <section>
                <h3>Product Details:</h3>
                <p>Product Selected: <span id="confirmProduct"></span></p>
                <p>Quantity: <span id="confirmQuantity"></span></p>
                <p>Optional Features Selected: <span id="confirmOptions"></span></p>
                <p>Total: <span id="total"></span></p>
            </section>

            <section id="paymentFormSection">
                <form id="paymentFormForm" method="post" action="process_order.php" novalidate="novalidate">
                <fieldset id="creditCardDetails">
                    <legend>Payment Method:</legend>
                    <p>
                        Select a Payment Method: <br/> <br />
                        <label for="visaCard"><input type="radio" name="creditCardName" value="visa" id="visaCard" required="required" />Visa</label>
                        <label for="masterCard"><input type="radio" name="creditCardName" value="mastercard" id="masterCard" />MasterCard</label>
                        <label for="americanCard"><input type="radio" name="creditCardName" value="amex" id="americanCard" required="required"/>American Express</label>
                    </p>

                    <p>
                        <label for="buyerName">
                            Name on Credit Card:
                            <input type="text" name="buyerName" id="buyerName" required="required" pattern="^[a-z A-Z]{1,40}$" placeholder="characters, spaces only" size="25" />
                        </label>
                    </p>

                    <p>
                        <label for="creditCardNumber">
                            Enter Credit Card Number:
                            <input type="text" name="creditCardNumber" id="creditCardNumber" required="required" pattern="^\d{15,16}$" placeholder="15-16 digits" />
                        </label>
                    </p>

                    <p>
                        <label for="cardExpiryDate">
                            Enter Credit Card Expiry Date:
                            <input type="text" name="cardExpiryDate" id="cardExpiryDate" required="required" pattern="^\d{2}-\d{2}$" placeholder="mm-yy" />
                        </label>
                    </p>

                    <p>
                        <label for="cardVerification">
                            Enter Credit Card Verification Value::
                            <input type="text" name="cardVerification" id="cardVerification" required="required" pattern="^\d{3}$" placeholder="XXX" />
                        </label>
                    </p>
                    <p>Session Timeout : <span id="timeOut"></span></p>
                </fieldset>


                <!-- hidden form inputs -->
                <input type="hidden" name="fname" id="fname" />
                <input type="hidden" name="lname" id="lname" />
                <input type="hidden" name="email" id="email" />
                <input type="hidden" name="phone" id="phone" />
                <input type="hidden" name="street" id="street" />
                <input type="hidden" name="suburb" id="suburb" />
                <input type="hidden" name="state" id="state" />
                <input type="hidden" name="code" id="code" />
                <input type="hidden" name="contact" id="contact" />
                <input type="hidden" name="product" id="product" />
                <input type="hidden" name="quantity" id="quantity" />
                <input type="hidden" name="options" id="options" />
                <input type="hidden" name="totalCost" id="totalCost" />
                <input type="hidden" name="comments" id="comments" />
                
                


                <fieldset>
                    <input type="submit" value="Checkout" />
                    <input type="reset" value="Reset Data" />
                    <input type="button" value="Cancel Order" id="cancel" />
                </fieldset>

                </form>
            </section>
        </article>
       
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>