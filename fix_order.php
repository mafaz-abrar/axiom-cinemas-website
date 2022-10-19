<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Fix Order page to fix errors with order
    // Last Updated: 24-May-2021
?>


<?php 
    session_start(); // start session
    if (!isset($_SESSION['fname'])) { // if process_order did not send data, go back to process_order
        header("location: process_order.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc";?>
        <title>Fix Order</title>
        
    </head>
    <body>
       <?php 
            include_once "includes/header.inc";
            include_once "includes/menu.inc";  
        ?>

    <article id="enquire_ar">
        <section id="intro">
            <h2>Fix Your order NOW to finalize your purchase!</h2>
        </section>


        <!-- PUTTING VALUE="string" in the attributes WORKS -->
        <!-- No issues changing value for submission of form -->
        
        <section id="form_sec">
        <form id="enquire" method="post" action="process_order.php" novalidate="novalidate">

        <!-- FOR EACH form control, write value from SESSION and if there is error, show pre written error message -->

            <fieldset>
                <legend>Personal Information</legend>
                <p>
                    <label for="fname">
                        First Name:
                        <input type="text" name="fname" id="fname" required="required" pattern="^[a-z A-Z]{1,25}$" <?php echo "value=\"{$_SESSION['fname']}\""; ?> />
                    </label>
                    <?php
                        if (isset($_GET['fname_error'])) {
                            echo "<p class=\"fix_error\">First Name can only have a maximum of 25 characters and they must all be alphabetical! (No Spaces)</p>";
                        }
                    ?>
                </p>

                <p>
                    <label for="lname">
                        Last Name:
                        <input type="text" name="lname" id="lname" required="required" pattern="^[a-z A-Z]{1,25}$" <?php echo "value=\"{$_SESSION['lname']}\""; ?>/>
                    </label>
                    <?php
                        if (isset($_GET['lname_error'])) {
                            echo "<p class=\"fix_error\">Last Name can only have a maximum of 25 characters and they must all be alphabetical! (No Spaces)</p>";
                        }
                    ?>
                </p>

                <p>
                    <label for="email">
                        Email:
                        <input type="email" name="email" id="email" required="required" placeholder="e.g. someone@somewhere.com" <?php echo "value=\"{$_SESSION['email']}\""; ?>/>
                    </label>
                    <?php
                        if (isset($_GET['email_error'])) {
                            echo "<p class=\"fix_error\">You must provide an Email</p>";
                        }
                    ?>
                </p>
                <p>
                    <label for="phone">
                        Phone Number:
                        <input type="text" name="phone" id="phone" maxlength="10" pattern="^\d{0,10}$" required="required" placeholder="e.g. 0123456789" <?php echo "value=\"{$_SESSION['phone']}\""; ?>/>
                    </label>
                    <?php
                        if (isset($_GET['phone_error'])) {
                            echo "<p class=\"fix_error\">You must provide a Phone Number. Phone Numbers can have a maximum of 10 characters and they must all be numbers.</p>";
                        }
                    ?>
                </p>
            </fieldset>

            <fieldset>
                <legend>Address:</legend>
                <p><label for="street">
                    Street Address:
                    <input type="text" name="street" id="street" maxlength="40" required="required" <?php echo "value=\"{$_SESSION['street']}\""; ?> />
                </label>
                <?php
                    if (isset($_GET['street_error'])) {
                        echo "<p class=\"fix_error\">You must provide a Street Address. These can have a maximum of 40 characters.</p>";
                    }
                ?>
                </p>

                <p><label for="suburb">
                    Suburb/Town:
                    <input type="text" name="suburb" id="suburb" maxlength="20" required="required" <?php echo "value=\"{$_SESSION['suburb']}\""; ?>/>
                </label>
                <?php
                    if (isset($_GET['suburb_error'])) {
                        echo "<p class=\"fix_error\">You must provide a Suburb Address. These can have a maximum of 40 characters.</p>";
                    }
                ?>
                </p>

                <p><label for="state">
                    State:
                    <select name="state" id="state" required="required">
                        <option value=""<?php if($_SESSION['state'] == "") { echo "selected=\"selected\"";} ?>>Choose a State</option>
                        <option value="vic" <?php if($_SESSION['state'] == "vic") { echo "selected=\"selected\"";} ?>>VIC</option>
                        <option value="nsw" <?php if($_SESSION['state'] == "nsw") { echo "selected=\"selected\"";} ?>>NSW</option>
                        <option value="qld" <?php if($_SESSION['state'] == "qld") { echo "selected=\"selected\"";} ?>>QLD</option>
                        <option value="nt" <?php if($_SESSION['state'] == "nt") { echo "selected=\"selected\"";} ?>>NT</option>
                        <option value="wa" <?php if($_SESSION['state'] == "wa") { echo "selected=\"selected\"";} ?>>WA</option>
                        <option value="sa" <?php if($_SESSION['state'] == "sa") { echo "selected=\"selected\"";} ?>>SA</option>
                        <option value="tas" <?php if($_SESSION['state'] == "tas") { echo "selected=\"selected\"";} ?>>TAS</option>
                        <option value="act" <?php if($_SESSION['state'] == "act") { echo "selected=\"selected\"";} ?>>ACT</option>
                    </select>
                </label>
                <?php
                    if (isset($_GET['state_error'])) {
                        echo "<p class=\"fix_error\">You must provide a State.</p>";
                    } 
                ?>
                </p>

                <p><label for="code">
                    Post Code:
                    <input type="text" name="code" id="code" maxlength="4" pattern="^\d{4}$" required="required" placeholder="XXXX" <?php echo "value=\"{$_SESSION['code']}\""; ?>/>
                </label>
                <?php
                    if (isset($_GET['state_vic_error'])) {
                        echo "<p class=\"fix_error\">Post Code for VIC can only start with 3 or 8</p>";
                    } else if (isset($_GET['state_nsw_error'])) {
                        echo "<p class=\"fix_error\">Post Code for NSW can only start with 1 or 2</p>";
                    } else if (isset($_GET['state_qld_error'])) {
                        echo "<p class=\"fix_error\">Post Code for QLD can only start with 4 or 9</p>";
                    } else if (isset($_GET['state_nt_error'])) {
                        echo "<p class=\"fix_error\">Post Code for NT can only start with 0</p>";
                    } else if (isset($_GET['state_wa_error'])) {
                        echo "<p class=\"fix_error\">Post Code for WA can only start with 6</p>";
                    } else if (isset($_GET['state_sa_error'])) {
                        echo "<p class=\"fix_error\">Post Code for SA can only start with 5</p>";
                    } else if (isset($_GET['state_tas_error'])) {
                        echo "<p class=\"fix_error\">Post Code for TAS can only start with 7</p>";
                    } else if (isset($_GET['state_act_error'])) {
                        echo "<p class=\"fix_error\">Post Code for ACT can only start with 0</p>";
                    } else if (isset($_GET['code_error'])) {
                        echo "<p class=\"fix_error\">You must enter a valid 4-digit Post Code</p>";
                    } 
                ?>        
                </p>
            </fieldset>

            
            <fieldset>
                <legend>Preferred Contact Method:</legend>
                <p>
                    <label for="contact_email"><input type="radio" name="contact" id="contact_email" value="email" required="required" checked="checked"/>Email</label>
                    <label for="contact_post"><input type="radio" name="contact" id="contact_post" value="post" />Post</label>
                    <label for="contact_phone"><input type="radio" name="contact" id="contact_phone" value="phone" />Phone</label>
                </p>
                <?php
                    if (isset($_GET['contact_error'])) {
                        echo "<p class=\"fix_error\">You must provide a Contact Option</p>";
                    }
                ?>
            </fieldset>
            
            <fieldset id="productOrderDetails">
                <legend>Product</legend>
                <p><label for="product">
                    Select Product:
                    <select name="product" id="product" required="required">
                        <option value="" <?php if($_SESSION['product'] == "") { echo "selected=\"selected\"";} ?>>Choose a Package</option>
                        <option value="super_premium" <?php if($_SESSION['product'] == "super_premium") { echo "selected=\"selected\"";} ?>>Super Premium ($50,000)</option>
                        <option value="premium" <?php if($_SESSION['product'] == "premium") { echo "selected=\"selected\"";} ?>>Premium ($49,999)</option>
                        <option value="elite" <?php if($_SESSION['product'] == "elite") { echo "selected=\"selected\"";} ?>>Elite ($49,998)</option>
                        <option value="basic" <?php if($_SESSION['product'] == "basic") { echo "selected=\"selected\"";} ?>>Basic ($1999)</option>
                        <option value="single_with_benefits" <?php if($_SESSION['product'] == "single_with_benefits") { echo "selected=\"selected\"";} ?>>Single With Benefits ($2)</option>
                        <option value="single" <?php if($_SESSION['product'] == "single") { echo "selected=\"selected\"";} ?>>Single ($1)</option>
                    </select>
                </label>
                <?php
                    if (isset($_GET["product_error"])) {
                        echo "<p class=\"fix_error\">You must choose a Product</p>";
                    }    
                    
                ?>
                </p>

                <label for="quantity">Quantity (upto 10):</label>
                <input type="number" id="quantity" name="quantity" min="1" max="10" required="required" <?php echo "value=\"{$_SESSION['quantity']}\""; ?>> 
                <?php
                    if (isset($_GET["quantity_error"])) {
                        echo "<p class=\"fix_error\">You must choose a Quantity between 1 and 10</p>";
                    }    
                ?>
                
                <p>Optional Features Included:</p>

                <!-- For the following, if option selected (from SESSION), select option by default-->
                
                <ul>
                    <li><label for="features_bodyguard" id="bodyg_label"><input type="checkbox" name="features_bodyg" id="features_bodyguard" value="bodyg" class="features" <?php if (isset($_SESSION['features_bodyg'])) {echo "checked=\"checked\"";}?> />Bodyguards</label><span class="prices">: $40,000</span></li>

                    <li><label for="features_drinks" id="drinks_label"><input type="checkbox" name="features_drinks" id="features_drinks" value="freed" class="features" <?php if (isset($_SESSION['features_drinks'])) {echo "checked=\"checked\"";}?> />Free drinks</label><span class="prices">: $35</span></li>

                    <li><label for="features_wait" id="wait_label"><input type="checkbox" name="features_wait" id="features_wait" value="wait" class="features"  <?php if (isset($_SESSION['features_wait'])) {echo "checked=\"checked\"";}?> />Wait Staff</label><span class="prices">: $60</span></li>

                    <li><label for="features_open" id="open_label"><input type="checkbox" name="features_open" id="features_open" value="open-air" class="features"  <?php if (isset($_SESSION['features_open'])) {echo "checked=\"checked\"";}?>/>Open Air Viewing</label><span class="prices">: $200</span></li>

                    <li><label for="features_violin" id="violin_label" class=""><input type="checkbox" name="features_violin" id="features_violin" value="violin" class="features"  <?php if (isset($_SESSION['features_violin'])) {echo "checked=\"checked\"";}?>/>Personal Violinist</label><span class="prices">: $45,000</span></li>

                    <li><label for="features_sword" id="sword_label"><input type="checkbox" name="features_sword" id="features_sword" value="sword" class="features"  <?php if (isset($_SESSION['features_sword'])) {echo "checked=\"checked\"";}?> />Free Replica Sword</label><span class="prices">: FREE</span></li>

                </ul>

                <input type="hidden" name="options" value="
                    <?php

                        // write new option values

                        $options = "";
                        if (isset($_SESSION['features_bodyg'])) {
                            $options .= " Bodyguards ";
                        }
                        if (isset($_SESSION['features_drinks'])) {
                            $options .= " Free-Drinks ";
                        }
                        if (isset($_SESSION['features_wait'])) {
                            $options .= " Waiters ";
                        }
                        if (isset($_SESSION['features_open'])) {
                            $options .= " Open-Air ";
                        }
                        if (isset($_SESSION['features_violin'])) {
                            $options .= " Personal-Violinist ";
                        }
                        if (isset($_SESSION['features_sword'])) {
                            $options .= " Free-Replica-Sword ";
                        }

                        echo $options;
                    ?>
                ">

                <p id="estimate">Estimate: <span id="total"></span> </p>

            </fieldset>

            <fieldset>
                <legend>Additional Comments</legend>
                <label for="comments">
                    <textarea cols="30" rows="8" name="comments" id="comments" required="required" placeholder="Write your comments here..."><?php echo "{$_SESSION['comments']}"; ?></textarea>
                </label>
            </fieldset>

            <fieldset id="creditCardDetails">
                <legend>Payment Method:</legend>
                <p>
                    Select a Payment Method: <br/> <br />
                    <label for="visaCard"><input type="radio" name="creditCardName" value="visa" id="visaCard" required="required" />Visa</label>
                    <label for="masterCard"><input type="radio" name="creditCardName" value="mastercard" id="masterCard" />MasterCard</label>
                    <label for="americanCard"><input type="radio" name="creditCardName" value="amex" id="americanCard" required="required"/>American Express</label>
                </p>
                <?php 
                    if (isset($_GET['cardname_error'])) {
                        echo "<p class=\"fix_error\">You must choose a Payment Option and enter Payment Details</p>";
                    }
                ?>

                <p>
                    <label for="buyerName">
                        Name on Credit Card:
                        <input type="text" name="buyerName" id="buyerName" required="required" pattern="^[a-z A-Z]{1,40}$" placeholder="characters, spaces only" size="25" />
                    </label>
                    <?php
                        if (isset($_GET['buyername_error'])) {
                            echo "<p class=\"fix_error\">Buyer Name can only have a maximum of 40 characters and they must all be alphabetical! (Spaces Allowed)</p>";
                        }
                    ?>
                </p>

                <p>
                    <label for="creditCardNumber">
                        Enter Credit Card Number:
                        <input type="text" name="creditCardNumber" id="creditCardNumber" required="required" pattern="^\d{15,16}$" placeholder="15-16 digits" />
                    </label>
                    <?php

                        if (isset($_GET['cardnumber_error'])) {
                            echo "<p class=\"fix_error\">You must enter Payment Details</p>";
                        }
                        if (isset($_GET['visa_error'])) {
                            echo "<p class=\"fix_error\">Visa cards must have 16 digits AND begin with 4</p>";
                        } else if (isset($_GET['mastercard_error'])) {
                            echo "<p class=\"fix_error\">Master cards must have 16 digits AND begin with 51 through 55</p>";
                        } else if (isset($_GET['amex_error'])) {
                            echo "<p class=\"fix_error\">AmEx cards must have 15 digits and begin with 34 or 37</p>";
                        }
                    ?>
                </p>

                <p>
                    <label for="cardExpiryDate">
                        Enter Credit Card Expiry Date:
                        <input type="text" name="cardExpiryDate" id="cardExpiryDate" required="required" pattern="^\d{2}-\d{2}$" placeholder="mm-yy"/>
                    </label>
                    <?php
                        if (isset($_GET['cardexpiry_error'])) {
                            echo "<p class=\"fix_error\">Please Match the given format: mm-yy</p>";
                        }
                    ?>
                </p>

                <p>
                    <label for="cardVerification">
                        Enter Credit Card Verification Value::
                        <input type="text" name="cardVerification" id="cardVerification" required="required" pattern="^\d{3}$" placeholder="XXX" />
                    </label>
                    <?php
                        if (isset($_GET['cardverify_error'])) {
                            echo "<p class=\"fix_error\">Please Match the given format: XXX</p>";
                        }
                    ?>
                </p>
            </fieldset>

            <fieldset>
                <legend>Submit</legend>
                <input type="submit" id="submitButton" value="Pay Now" />
            </fieldset>

        </form>
        </section>
        </article>
   
        <?php 
            include_once "includes/footer.inc"; 

            // destroy the session after this page completes processing, so SESSIONs do not interfere
            $_SESSION = array();
            session_destroy();
        ?>
    </body>
</html>