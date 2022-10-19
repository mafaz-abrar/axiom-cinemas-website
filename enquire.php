<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Enquire page
    // Last Updated: 24-May-2021
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc"; ?>
        <script src="scripts/part2.js"></script>
        <script src="scripts/enhancements.js"></script>
        <title>Ask Us Anything</title>
        
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            $enquirePage = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

        <article id="enquire_ar">
            <section id="intro">
                <h2>Looking to Buy? Just a few clicks away...</h2>
            </section>
            
            <section id="form_sec">
                <form id="enquire" method="post" action="payment.php" novalidate="novalidate">

                    <fieldset>
                        <legend>Personal Information</legend>
                        <p>
                            <label for="fname">
                                First Name:
                                <input type="text" name="fname" id="fname" required="required" pattern="^[a-z A-Z]{1,25}$" />
                            </label>
                        </p>

                        <p>
                            <label for="lname">
                                Last Name:
                                <input type="text" name="lname" id="lname" required="required" pattern="^[a-z A-Z]{1,25}$" />
                            </label>
                        </p>

                        <p>
                            <label for="email">
                                Email:
                                <input type="email" name="email" id="email" required="required" placeholder="e.g. someone@somewhere.com"/>
                            </label>
                        </p>
                        <p>
                            <label for="phone">
                                Phone Number:
                                <input type="text" name="phone" id="phone" maxlength="10" pattern="^\d{0,10}$" required="required" placeholder="e.g. 0123456789" />
                            </label>
                        </p>
                    </fieldset>

                    <fieldset>
                        <legend>Address:</legend>
                        <p><label for="street">
                            Street Address:
                            <input type="text" name="street" id="street" maxlength="40" required="required" />
                        </label></p>
                        <p><label for="suburb">
                            Suburb/Town:
                            <input type="text" name="suburb" id="suburb" maxlength="20" required="required" />
                        </label></p>
                        <p><label for="state">
                            State:
                            <select name="state" id="state" required="required">
                                <option value="" selected="selected">Choose a State</option>
                                <option value="vic">VIC</option>
                                <option value="nsw">NSW</option>
                                <option value="qld">QLD</option>
                                <option value="nt">NT</option>
                                <option value="wa">WA</option>
                                <option value="sa">SA</option>
                                <option value="tas">TAS</option>
                                <option value="act">ACT</option>
                            </select>
                        </label></p>
                        <p><label for="code">
                            Post Code:
                            <input type="text" name="code" id="code" maxlength="4" pattern="^\d{4}$" required="required" placeholder="XXXX"/>
                        </label></p>
                    </fieldset>

                    
                    <fieldset>
                        <legend>Preferred Contact Method:</legend>
                        <p>
                            <label for="contact_email"><input type="radio" name="contact" id="contact_email" value="email" required="required" checked="checked"/>Email</label>
                            <label for="contact_post"><input type="radio" name="contact" id="contact_post" value="post" />Post</label>
                            <label for="contact_phone"><input type="radio" name="contact" id="contact_phone" value="phone" />Phone</label>
                        </p>
    
                    </fieldset>
                    
                    <fieldset id="productOrderDetails">
                        <legend>Product</legend>
                        <p><label for="product">
                            Select Product:
                            <select name="product" id="product" required="required">
                                <option value="" selected="selected">Choose a Package</option>
                                <option value="super_premium">Super Premium ($50,000)</option>
                                <option value="premium">Premium ($49,999)</option>
                                <option value="elite">Elite ($49,998)</option>
                                <option value="basic">Basic ($1999)</option>
                                <option value="single_with_benefits">Single With Benefits ($2)</option>
                                <option value="single">Single ($1)</option>
                            </select>
                        </label></p>

                        <label for="quantity">Quantity (upto 10):</label>
                        <input type="number" id="quantity" name="quantity" min="1" max="10" required="required"> 
                        
                        <p>Optional Features Included:</p>
                        
                        <ul>
                            <li><label for="features_bodyguard" id="bodyg_label"><input type="checkbox" name="features_bodyg" id="features_bodyguard" value="bodyg" class="features" checked="checked"/>Bodyguards</label><span class="prices">: $40,000</span></li>

                            <li><label for="features_drinks" id="drinks_label"><input type="checkbox" name="features_drinks" id="features_drinks" value="freed" class="features" checked="checked"/>Free drinks</label><span class="prices">: $35</span></li>

                            <li><label for="features_wait" id="wait_label"><input type="checkbox" name="features_wait" id="features_wait" value="wait" class="features" checked="checked"/>Wait Staff</label><span class="prices">: $60</span></li>

                            <li><label for="features_open" id="open_label"><input type="checkbox" name="features_open" id="features_open" value="open-air" class="features" checked="checked"/>Open Air Viewing</label><span class="prices">: $200</span></li>

                            <li><label for="features_violin" id="violin_label" class=""><input type="checkbox" name="features_violin" id="features_violin" value="violin" class="features" checked="checked"/>Personal Violinist</label><span class="prices">: $45,000</span></li>

                            <li><label for="features_sword" id="sword_label"><input type="checkbox" name="features_sword" id="features_sword" value="sword" class="features" checked="checked"/>Free Replica Sword</label><span class="prices">: FREE</span></li>

                        </ul>

                        <p id="estimate">Estimate: <span id="total"></span> </p>

                    </fieldset>

                    <fieldset>
                        <legend>Additional Comments</legend>
                        <label for="comments">
                            <textarea cols="30" rows="8" name="comments" id="comments" required="required" placeholder="Write your comments here..." ></textarea>
                        </label>
                    </fieldset>

                    <fieldset>
                        <legend>Submit</legend>
                        <input type="submit" id="submitButton" value="Pay Now" />
                        <input type="reset" value="Reset All Fields" />
                    </fieldset>

                </form>
            </section>
        </article>
   
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>