<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Receipts Page
    // Last Updated: 24-May-2021
?>

<?php 
    session_start();
    if (!isset($_SESSION['fname'])) {
        $_SESSION = array();
        session_destroy();
        header("location: index.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php 
            include_once "includes/html_settings.inc"; 
        ?>
        <title>Receipt</title>
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            include_once "includes/menu.inc"; 
            include_once "settings.php"; 
        ?>

    
        <article>
            <section id="intro">
                <h2>Order Placement Successful!</h2>
                <p>Here is your receipt. Please print your copy:</p>

                <?php
                    if ($conn) {

                        // the below query technique sourced from:
                        //https://stackoverflow.com/questions/5191503/how-to-select-the-last-record-of-a-table-in-sql


                        $query = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1;";
                        $result = mysqli_query($conn, $query);

                        if ($result) {

                            $row = mysqli_fetch_assoc($result);

                            if ($row) {
                                
                            $options = array();
                                if(isset($_SESSION['features_bodyg'])) {
                                    $options[]  = $_SESSION['features_bodyg'];
                                }
                                if(isset($_SESSION['features_drinks'])) {
                                    $options[] = $_SESSION['features_drinks'];
                                }
                                if(isset($_SESSION['features_wait'])) {
                                    $options[] = $_SESSION['features_wait'];
                                }
                                if(isset($_SESSION['features_open'])) {
                                    $options[] = $_SESSION['features_open'];
                                }
                                if(isset($_SESSION['features_violin'])) {
                                    $options[] = $_SESSION['features_violin'];
                                }
                                if(isset($_SESSION['features_sword'])) {
                                    $options[] = $_SESSION['features_sword'];
                                }

                            $optionsString = implode(" , ", $options);


                            echo "<p>ORDER ID: ", $row['order_id'], "<p>"; 
                            echo "<p>ORDER TOTAL COST: $", $row['order_cost'], "<p>";
                            echo "<p>ORDER DATE: ", $row['order_time'], "<p>";
                            echo "<p>ORDER STATUS: ", $row['order_status'], "<p>";
                            echo "<p>PRODUCT NAME: ", $row['product'], "<p>";
                            echo "<p>QUANTITY: ", $row['quantity'], "<p>";
                            echo "<p>OPTIONS: ", $optionsString, "<p>";
                            echo "<p>CREDIT CARD: ", $row['credit_card_name'], "<p>";
                            echo "<p>NAME ON CARD: ", $row['buyer_name'], "<p>";
                            echo "<p>CARD NUMBER: ", $row['credit_card_number'], "<p>";
                            echo "<p>CARD EXPIRY: **** <p>";
                            echo "<p>CVV: *** <p>";
                            echo "<p>NAME: ", $row['fname'], " ", $row['lname'], "<p>";
                            echo "<p>EMAIL: ", $row['email'], "<p>";
                            echo "<p>PHONE: ", $row['phone'], "<p>";
                            echo "<p>ADDRESS: ", $row['street'], " ", $row['suburb'], " ", $row['state_'], " ", $row['postcode'], "<p>";
                            echo "<p>PREFERRED CONTACT: ", $row['preferred_contact'], "<p>";
                            echo "<p>COMMENTS: ", $row['comments'], "<p>";

                            } else {
                                header("location: index.php?error=true#intro");
                            }
                        } else {
                            header("location: index.php?error=true#intro");
                        }
                    } else {
                        header("location: index.php?error=true#intro");
                    }

                    mysqli_close($conn); // only closing the connection if it was successfully opened
                ?>
            </section>
        </article>
       
        <?php 
            include_once "includes/footer.inc";
        
            $_SESSION = array();
            session_destroy();
        ?>
    </body>
</html>