<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Process Order Page
    // Last Updated: 24-May-2021
?>

<?php
    session_set_cookie_params(300); // session ends automatically after 5 mins
    session_start(); // start the session

    if (!isset($_POST["fname"])) { // if POST not set (i.e if not coming via form submit from payment)
        header("location: index.php"); // redirect
    } else {

    include_once "settings.php";

    foreach ($_POST as $key => $value) { // sanitise all POST values using included function
        $_POST[$key] = sanitise_input($value);
    }
      
    // Put all POST variables in Session
    foreach ($_POST as $key => $value) { // store all sanitised POST values in SESSION for sending to fix order
        $_SESSION[$key] = $_POST[$key];
    } 

    

    if (!$conn) { // if connection to DB not OK
        header("location: index.php?error=true#intro"); // redirect to index
    } else {
        // initialize error variables

        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $street = $_POST["street"];
        $suburb = $_POST["suburb"];
        $state = $_POST["state"];
        $code = $_POST["code"];
        $contact = $_POST["contact"];
        
        $product = $_POST["product"];
        $quantity = $_POST["quantity"];
        $options = $_POST['options'];
        $comments = ($_POST["comments"]);

        $creditCardName = $_POST["creditCardName"];
        $buyerName = $_POST["buyerName"];
        $creditCardNumber = $_POST["creditCardNumber"];
        $cardExpiryDate = $_POST["cardExpiryDate"];
        $cardVerification = $_POST["cardVerification"];
        
        $totalCost = 0;
        
        ////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////// PERFORM VAR VALIDATION ////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////
    
        if (strlen($fname) > 25 || strlen($fname) == 0 || !preg_match("/^[a-zA-Z]+$/", $fname)) {
            $appendedString[] = "fname_error=true";
        }

        if (strlen($lname) > 25 || strlen($lname) == 0 || !preg_match("/^[a-zA-Z]+$/", $lname)) {
            $appendedString[] = "lname_error=true";
        }

        if (strlen($email) == 0) {
            $appendedString[] = "email_error=true";
        }

        if (strlen($phone) > 10 || strlen($phone) == 0 || !preg_match("/^[0-9]+$/", $phone)) {
            $appendedString[] = "phone_error=true";
        }
        
        if (strlen($street) > 40 || strlen($street) == 0) {
            $appendedString[] = "street_error=true";
        }

        if (strlen($suburb) > 20 || strlen($suburb) == 0) {
            $appendedString[] = "suburb_error=true";
        }

        if (strlen($code) != 4 || !preg_match("/^[0-9]+$/", $code)) {
            $appendedString[] = "code_error=true";
        }

        switch ($state) {
            case "vic":
                if ($code[0] != 3 && $code[0] != 8) {
                    // errMsg += "Post Code for VIC can only start with 3 or 8\n";
                    $appendedString[] = "state_vic_error=true";
                }
                break;
            case "nsw":
                if ($code[0] != 1 && $code[0] != 2) {
                    // errMsg += "Post Code for NSW can only start with 1 or 2\n";
                    $appendedString[] = "state_nsw_error=true";
                }
                break;
            case "qld":
                if ($code[0] != 4  && $code[0] != 9) {
                    // errMsg += "Post Code for QLD can only start with 4 or 9\n";
                    $appendedString[] = "state_qld_error=true";
                }
                break;
            case "nt":
                if ($code[0] != 0) {
                    // errMsg += "Post Code for NT can only start with 0\n";
                    $appendedString[] = "state_nt_error=true";
                }
                break;
            case "wa":
                if ($code[0] != 6) {
                    // errMsg += "Post Code for WA can only start with 6\n";
                    $appendedString[] = "state_nt_error=true";
                }
                break;
            case "sa":
                if ($code[0] != 5) {
                    // errMsg += "Post Code for SA can only start with 5\n";
                    $appendedString[] = "state_sa_error=true";
                }
                break;
            case "tas": 
                if ($code[0] != 7) {
                    // errMsg += "Post Code for TAS can only start with 7\n";
                    $appendedString[] = "state_tas_error=true";
                }
                break;
            case "act":
                if ($code[0] != 0) {
                    // errMsg += "Post Code for ACT can only start with 0\n";
                    $appendedString[] = "state_act_error=true";
                }
                break;
            default:
                if (strlen($state) == 0) {
                    $appendedString[] = "state_error=true";
                }
                break;
        }

        if (!isset($contact)) {
            $appendedString[] = "contact_error=true";
        }

        if (strlen($product) == 0) {
            $appendedString[] = "product_error=true";
        }

        if ($quantity < 1 || $quantity > 10 || !preg_match("/^[0-9]+$/", $quantity)) {
            $appendedString[] = "quantity_error=true";
        }

        /////////////////////// CREDIT CARD VAR VALIDATIONS /////////////////////////////


        if (strlen($creditCardNumber) == 0 || strlen($creditCardName) == 0 ) {
            $appendedString[] = "cardnumber_error=true";
            $appendedString[] = "cardname_error=true";

        } else {
         
        switch ($creditCardName) { 
            case "visa":
                if (strlen($creditCardNumber) != 16 || $creditCardNumber[0] != 4 || !preg_match("/^[0-9]+$/", $creditCardNumber)) { // check length and 1st digit
                    // errMsg = "Visa cards must have 16 digits AND begin with 4\n";
                    $appendedString[] = "visa_error=true";
                }
                break;
            case "mastercard":
                if (strlen($creditCardNumber) != 16 || $creditCardNumber[0] != 5 || !preg_match("/^[0-9]+$/", $creditCardNumber)) { // check length and 1st digit
                    // errMsg = "Master cards must have 16 digits AND begin with 51 through 55 (1)\n";
                    $appendedString[] = "mastercard_error=true";
                }
                
                for ($i = 1; $i <= 5; $i++) { // cycles from 1 to 5, checks if 2nd digit has a match
                    if ($creditCardNumber[1] == $i) {
                    $tempCount = 1; 
                    }
                }

                if ($tempCount == 0) { // if no match, throw error
                    // errMsg = "Master cards must have 16 digits AND begin with 51 through 55 (2)\n";
                    $appendedString[] = "mastercard_error=true";
                }
                break;

            case "amex":
                if (strlen($creditCardNumber) != 15 || $creditCardNumber[0] != 3 || !preg_match("/^[0-9]+$/", $creditCardNumber)) { // check length and 1st digit
                    // errMsg = "AmEx cards must have 15 digits and begin with 34 or 37\n";
                    $appendedString[] = "amex_error=true";
                }

                if ($creditCardNumber[1] != 4 && $creditCardNumber[1] != 7) { // check 2nd digit
                    //errMsg = "AmEx cards must have 15 digits and begin with 34 or 37\n";
                    $appendedString[] = "amex_error=true";
                }
                break;

        }
        }


        if (strlen($buyerName) > 40 || strlen($buyerName) == 0 || !preg_match("/^[a-z A-Z]+$/", $buyerName)) {
            $appendedString[] = "buyername_error=true";
        }

      

        if (strlen($cardExpiryDate) == 0 || !preg_match("/^[0-9]{2}\-[0-9]{2}$/", $cardExpiryDate)) {
            $appendedString[] = "cardexpiry_error=true";
        }

        if (strlen($cardVerification) == 0 || !preg_match("/^[0-9]{3}$/", $cardVerification)) {
            $appendedString[] = "cardverify_error=true";
        }


        ////////////////////////////// READING WHICH OPTIONS WERE SELECTED /////////////////////////


        // $options is a string that contains all the option names
        // search the string for a specific name
        // if found, option selected
        // if not found, option was not selected
        // for selected options, add their value to total cost (avoids repeating code)

        if(strpos($options,"Bodyguards") !== false) { 
            $_SESSION['features_bodyg'] = "Bodyguards";
            $totalCost += 40000;
        } 

        if(strpos($options,"Free-Drinks") !== false) { 
            $_SESSION['features_drinks'] = "Free-Drinks";
            $totalCost += 35;
        } 

        if(strpos($options,"Waiters") !== false) { 
            $_SESSION['features_wait'] = "Waiters";
            $totalCost += 60;
        } 

        if(strpos($options,"Open-Air") !== false) { 
            $_SESSION['features_open'] = "Open-Air";
            $totalCost += 200;
        } 

        if(strpos($options,"Personal-Violinist") !== false) { 
            $_SESSION['features_violin'] = "Personal-Violinist";
            $totalCost += 45000;
        } 

        if(strpos($options,"Free-Replica-Sword") !== false) { 
            $_SESSION['features_sword'] = "Free-Replica-Sword";
        } 
    
       

        if (isset($appendedString)) { // if the array exists

            $queryString = implode("&", $appendedString);
            header("location: fix_order.php?" . $queryString); // send to fix_order with all errors imploded into a query string

        } else {

        ////////////////////////////////////////////////////////////////////////////////////
        ///////////////////////////// VARIABLES  VALID ////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////
            
            // finish total cost calculation
            switch ($product) {
                case "super_premium":
                    $totalCost += 50000 * $quantity;
                    break;
                case "premium":
                    $totalCost += 49999 * $quantity;
                    break;
                case "elite":
                    $totalCost += 49998 * $quantity;
                    break;
                case "basic":
                    $totalCost += 1999 * $quantity;
                    break;
                case "single_with_benefits":
                    $totalCost += 2 * $quantity;
                    break;
                case "single":
                    $totalCost += 1 * $quantity;
                    break;
            }

        ////////////////////////////////////////////////////////////////////////////////////
        //////////////////////////////// SQL QUERIES ///////////////////////////////////////
        //////////////////////////////////////////////////////////////////////////////////// 
        
        
        // NOTE:
        // msqli_query will return:
        // for SELECT, SHOW, DESCRIBE, EXPLAIN - mysqli_result object
        // for any other operation - TRUE
        // for ANY failure - FALSE

        // if a table does not exist in our db:
        
        // running a query for "show tables like "table_name";
        // will return in an Empty Dataset (i.e. a mysqlo_result object - neither TRUE nor FALSE)
        // then we can use fetch_assoc() to retrieve the first row of the Empty Set
        // all rows of Empty Set will give NULL for fetch_assoc()
        // so fetch_assoc() NULL will be transformed to FALSE in an if statement


        // again, running a query  "select * from "table_name";
        // will return a fail code "table does not exist"
        // now, mysqli_query() will return FALSE
        // so no need to use fetch_assoc()
        // plug $result directly into an if statement


            $sql_table = "orders"; // set table name

            $query = "SHOW TABLES LIKE '$sql_table';"; // set query
            
            $result = @mysqli_query($conn, $query); // execute query; if no table, empty set is returned

            $row = @mysqli_fetch_assoc($result); // get the first row of the query
            

            if (!$row) { // if empty set, first row is NULL, so this checks if table exists
                
                // no table exists, create table
                $query = "CREATE TABLE orders(
                    order_id                  INT AUTO_INCREMENT PRIMARY KEY,
                    order_cost                INT, 
                    order_time                DATE, 
                    order_status              VARCHAR(30) DEFAULT 'PENDING',
                    product                   VARCHAR(20),
                    quantity                  INT,
                    options                   VARCHAR(400),
                    credit_card_name          VARCHAR(20),
                    buyer_name                VARCHAR(40),
                    credit_card_number        VARCHAR(17),
                    credit_card_expiry        VARCHAR(5),
                    credit_card_verification  INT,
                    fname                     VARCHAR(40),
                    lname                     VARCHAR(40),
                    email                     VARCHAR(40),
                    phone                     VARCHAR(10),
                    street                    VARCHAR(40),
                    suburb                    VARCHAR(20),
                    state_                    VARCHAR(3),
                    postcode                  VARCHAR(4),
                    preferred_contact         VARCHAR(15),
                    comments                  VARCHAR(500)
                    );"  
                ;

             
              
                $result = @mysqli_query($conn, $query) or die("<p>Unable to create table. Error ". mysqli_errno($conn) . ": " .  mysqli_error($conn) . "</p>" . "<p><a href=\"index.php\">Return</a></p>"); // table creation error for debugging (if needed)

           
            } else {
               
                @mysqli_free_result($result); // clear the resultset for other operations
            }

            // create BIG query to INSERT
            $query = "INSERT INTO $sql_table VALUES(
                NULL, '$totalCost', CURDATE(), 'PENDING', '$product', '$quantity', '$options', '$creditCardName', '$buyerName', '$creditCardNumber', '$cardExpiryDate', '$cardVerification', '$fname', '$lname', '$email', '$phone', '$street', '$suburb', '$state', '$code', '$contact', '$comments');"
            ;

                
            // execute query or die
            $result = @mysqli_query($conn, $query) or die("<p>Unable to add order. Error ". mysqli_errno($conn) . ": " .  mysqli_error($conn) . "</p>" . "<p><a href=\"index.php\">Return</a></p>"); // query error for debugging (if needed)

            mysqli_close($conn); // only closing the connection if it was successfully opened

            header("location: receipt.php"); // after processing complete, go to receipt
            
           
        }
    }
}

?>