<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Manager page
    // Last Updated: 24-May-2021
?>

<?php
    session_start();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include_once "includes/html_settings.inc"; 
        ?>
        <title>Manager</title>
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            $managerPage = "id = \"current\"";
            include_once "includes/menu.inc"; 
            include_once "settings.php"; 
        ?>

    
        <article id="enhance_ar">
            <section id="intro">
            <h2 class="manager_t">Welcome, Managers!</h2>

            <p class="manager_t">Sort and View customer data:</p>

            <form id="search_form" method="POST" action="manager.php">
                <fieldset>
                    <legend>Select your search criteria:</legend>
                    <p>
                        <label for="search_all"><input type="radio" name="criteria" value="search_all" id="search_all" required="required"/>Display all orders</label>
                    
                    </p>

                    <p>
                        <label for="search_customer"><input type="radio" name="criteria" value="search_customer" id="search_customer" />Search by Customer Name:</label>

                        <label for="customer_name"><input type="text" name="customer_name" size="25" id="customer_name" /></label>
                    </p>

                    <p>
                        <label for="search_product"><input type="radio" name="criteria" value="search_product" id="search_product" />Search by Product Name:</label>

                        <label for="product_name"><input type="text" name="product_name" size="25" id="product_name" /></label>
                    </p>

                    <p>
                        <label for="search_pending"><input type="radio" name="criteria" value="search_pending" id="search_pending" />Display all pending orders</label>
                    
                    </p>

                    <p>
                        <label for="search_cost"><input type="radio" name="criteria" value="search_cost" id="search_cost" />Display all orders by cost</label>
                    
                    </p>

                    <p>
                        <label for="search_popular"><input type="radio" name="criteria" value="search_popular" id="search_popular" />Display all orders for Most Popular Product</label>
                    </p>

                    <p>
                        <label for="search_date"><input type="radio" name="criteria" value="search_date" id="search_date" />Display Fulfilled Orders between Dates:</label>

                        <label for="start_date"><input type="text" name="start_date" size="8" id="start_date" placeholder="yyyy-mm-dd"/> And:</label>

                        <label for="end_date"><input type="text" name="end_date" size="8" id="end_date" placeholder="yyyy-mm-dd"/></label>
                    </p>

                    <p>
                        <label for="average"><input type="radio" name="criteria" value="average" id="average" />Calculate Average Number of Orders per Day from first order: </label>    
                    </p>


                    <p><a href="manager.php?clear_table=true">Clear Table</a></p>


                    <p><input type="submit" value="Search" /></p>
                    
                </fieldset>
            </form>
            

            <?php
                if (isset($_GET['clear_table'])) {
                    $_SESSION = array(); // destroy the session 
                    session_destroy();
                }
              
                
                if ($conn) { // if connection OK

                    if (isset($_GET['order_id'])) { // if order_id GET set, i.e. user wants to query

                        $_GET['order_id'] = sanitise_input($_GET['order_id']);

                        $_SESSION = array(); // destroy the session in this branch
                        session_destroy();

                        $query = ""; // create query
                        $delete = ""; // init delete

                        if (isset($_GET['pending'])) { // if pending, set query pending
                            $query = "UPDATE orders SET order_status='PENDING' WHERE order_id='{$_GET['order_id']}';";
                        }
                        if (isset($_GET['fulfilled'])) { // if fulfilled, set query fulfilled
                            $query = "UPDATE orders SET order_status='FULFILLED' WHERE order_id='{$_GET['order_id']}';";
                        }
                        if (isset($_GET['paid'])) { // if paid, set query paid
                            $query = "UPDATE orders SET order_status='PAID' WHERE order_id='{$_GET['order_id']}';";
                        }
                        if (isset($_GET['archived'])) { // if archived, set query archived
                            $query = "UPDATE orders SET order_status='ARCHIVED' WHERE order_id='{$_GET['order_id']}';";
                        }

                        if (isset($_GET['delete'])) { // if delete, set query delete
                            $query = "DELETE FROM orders WHERE order_status='PENDING' AND order_id='{$_GET['order_id']}';";
                            $delete = "delete"; // set delete string
                        }

                        if (isset($_GET['order_status'])) { //if order status GET set
                            if ($_GET['order_status'] != "PENDING") { // and that status is pending
                                echo "<p class=\"fix_error\">Order is not Pending. Cancellation Not Possible.</p>"; // error message print
                            } 
                        }
                        
                        $result = mysqli_query($conn, $query); // Only Query execution
                        
                        // Only Query Results

                        if ($result) { // query worked
                            if ($delete == "") {
                                echo "<p class=\"good\">Order Status for ORDER ID: ", $_GET['order_id'], " updated. Affected ", mysqli_affected_rows($conn), " order(s).</p>";
                            } else {
                                echo "<p class=\"good\">Delete Query Accepted. Affected ", mysqli_affected_rows($conn), " order(s).</p>";
                            }

                        } else { // query did not work
                            echo "<p class=\"fix_error\">Query Failure.</p>";
                        }

                        echo "<p class=\"fix_error\">Please Select a Criteria to view a data table.</p>"; // if order_id GET set, print this line ALWAYS, since no table


                    } else { // If order_id GET not set, so either user just arrived or wants to see table

                        $query = ""; // create shared query variable
                        $criteria = ""; // create shared criteria variable

                        if (isset($_POST['criteria'])) { // if search term POSTed

                            $criteria = $_POST['criteria']; // set criteria according to POST
                            $_SESSION['criteria'] = $criteria;// set criteria in SESSION

                            if (!isset($_SESSION['order_number'])) { // write POST vars to session vars if not written
                                $_SESSION['order_counter'] = -1;
                            }
                            
                            switch ($criteria) { // set query depending on selected POST value
                                case "search_all":
                                    $query = "SELECT * FROM orders ORDER BY order_id;";
                                    break;
                                case "search_customer":
                                    $input = sanitise_input($_POST['customer_name']);
                                    $_SESSION['customer_name'] = $_POST['customer_name'];
                                    $str = explode(" ", $input);
                                   
                                    
                                    if (!isset($str[1]) || !isset($str[0])) { // testing for lenghth of input to customize query
                                        $query = "SELECT * FROM orders WHERE fname LIKE '%{$str[0]}%' OR lname LIKE '%{$str[0]}%';";
                                    } else {
                                        $query = "SELECT * FROM orders WHERE fname LIKE '%{$str[0]}%' OR lname LIKE '%{$str[1]}%';";
                                    }

                                    break;
                                case "search_product":
                                    $input = sanitise_input($_POST['product_name']);
                                    $_SESSION['product_name'] = $_POST['product_name'];
                                    $query = "SELECT * FROM orders WHERE product LIKE '%$input%';";
                                    break;
                                case "search_pending":
                                    $query = "SELECT * FROM orders WHERE order_status='PENDING';"; 
                                    break;
                                case "search_cost":
                                    $query = "SELECT * FROM orders ORDER BY order_cost DESC;";
                                    break;   
                                case "search_popular":
                                    include_once "extra_queries_1.php";
                                    break;
                                case "search_date":
                                    include_once "extra_queries_2.php";
                                    break;
                                case "average":
                                    include_once "extra_queries_3.php";
                            
                                    if (isset($stringDiv)) {
                                        echo "<p class=\"good\">", $stringDiv, "</p>";
                                    } 

                                    break;
                             
                            
                                                 
                            } 

                        }
                        
                        if (!isset($_POST['criteria']) && isset($_SESSION['criteria'])) { // if SESSION set

                            $orderTerm = "order_id"; // init orderTerm, default order_id

                            if ($_SESSION['order_counter'] == 1) { // not checking since if SESSION criteria not set, this branch won't be active
                                $ordering = ""; // sort normal
                            } else if ($_SESSION['order_counter'] == -1) {
                                $ordering = "DESC"; // sort reverse
                            }

                            // depending on selected column change orderTerm and order_counter sessvar, which will reverse direction on next page load
                            if (isset($_GET['sort_id'])) {
                                $orderTerm = "order_id";
                                $_SESSION['order_counter'] *= -1;
                            }
                            if (isset($_GET['sort_date'])) {
                                $orderTerm = "order_time";
                                $_SESSION['order_counter'] *= -1;
                            }
                            if (isset($_GET['sort_product'])) {
                                $orderTerm = "product";
                                $_SESSION['order_counter'] *= -1;
                            }
                            if (isset($_GET['sort_cost'])) {
                                $orderTerm = "order_cost";
                                $_SESSION['order_counter'] *= -1;
                            }
                            if (isset($_GET['sort_customer'])) {
                                $orderTerm = "fname";
                                $_SESSION['order_counter'] *= -1;
                            }
                            if (isset($_GET['sort_status'])) {
                                $orderTerm = "order_status";
                                $_SESSION['order_counter'] *= -1;
                            }

                            echo "<p class=\"good\">Viewing results for: ", $_SESSION['criteria'], "</p>"; 
                            echo "<p class=\"good\">Sort by: ", $orderTerm, " in order: ", $ordering, "</p>";

                            switch ($_SESSION['criteria']) { // set query depending on SESSION value (which is got from previous POST)

                                case "search_all":
                                    $query = "SELECT * FROM orders ORDER BY $orderTerm $ordering";
                                    break;

                                case "search_customer":
                                    $input = sanitise_input($_SESSION['customer_name']);
                                    $str = explode(" ", $input);
                                    
                                    if (!isset($str[1]) || !isset($str[0])) {
                                        $query = "SELECT * FROM orders WHERE fname LIKE '%{$str[0]}%' OR lname LIKE '%{$str[0]}%' ORDER BY $orderTerm $ordering;";
                                    } else {
                                        $query = "SELECT * FROM orders WHERE fname LIKE '%{$str[0]}%' OR lname LIKE '%{$str[1]}%' ORDER BY $orderTerm $ordering;";
                                    }

                                    break;
                                case "search_product":
                                    $input = sanitise_input($_SESSION['product_name']);
                                    $query = "SELECT * FROM orders WHERE product LIKE '%$input%' ORDER BY $orderTerm $ordering;";
                                    break;
                                case "search_pending":
                                    $query = "SELECT * FROM orders WHERE order_status='PENDING' ORDER BY $orderTerm $ordering;"; 
                                    break;
                                case "search_cost":
                                    $query = "SELECT * FROM orders ORDER BY $orderTerm $ordering;";
                                break;
                                case "search_popular":
                                    include_once "extra_queries_1.php";
                                    break;    
                                case "search_date":
                                    include_once "extra_queries_2.php";
                                    break;  
                                // no case for average since the value should only be calculated if POSTed from the form 
                            }
                        }

                        
                        $result = @mysqli_query($conn, $query); // execute query

                        if ($result) {
                    
            ?>

            <table>
                <thead>
                    <tr>
                        <th><a href="manager.php?sort_id=true">Order ID</a></th>
                        <th><a href="manager.php?sort_date=true">Order Date</a></th>
                        <th><a href="manager.php?sort_product=true">Product Name and Options</a></th>
                        <th><a href="manager.php?sort_cost=true">Cost($)</a></th>
                        <th><a href="manager.php?sort_customer=true">Customer Name</a></th>
                        <th><a href="manager.php?sort_status=true">Order Status</a></th>
                        <th>Change Status</th>
                        <th>CANCEL ORDER</th>
                    </tr>
                </thead>
                <tbody>
                <?php
               
                while ($row = mysqli_fetch_assoc($result)) { // assign and check
                    echo "<tr>\n";
                    echo "<td>", $row['order_id'], "</td>\n";
                    echo "<td>", $row['order_time'], "</td>\n";
                    echo "<td>", $row['product'], "; options: ", $row['options'], "</td>\n";
                    echo "<td>", $row['order_cost'], "</td>\n";
                    echo "<td>", $row['fname'], " ", $row['lname'], "</td>\n";
                    echo "<td>", $row['order_status'], "</td>\n";
                    echo "<td><a href=\"manage2.php?pending=true&order_id={$row['order_id']}\">PENDING</a> | <a href=\"manager.php?fulfilled=true&order_id={$row['order_id']}\">FULFILLED</a> | <a href=\"manager.php?paid=true&order_id={$row['order_id']}\">PAID</a> | <a href=\"manager.php?archived=true&order_id={$row['order_id']}\">ARCHIVED</a>\n";
                    echo "<td><a href=\"manager.php?delete=true&order_id={$row['order_id']}&order_status={$row['order_status']}\">CANCEL</a></td>\n";
                    echo "</tr>";
                }
                
           
                ?>
                </tbody>
            </table>

            <?php
                            mysqli_free_result($result); // free the result

                        } else {

                            echo "<p class=\"fix_error\">No Criteria Selected OR No Tables Created.</p>";

                        } //end if Result 

                    } // end if GET

                } else { // if connection not OK

                    echo "<p class=\"fix_error\">Database Connection Failure.</p>";

                } 

             
            ?>
              

            
            </section>
        </article>
       
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>