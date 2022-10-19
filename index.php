<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Index (Home) Page
    // Last Updated: 24-May-2021
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once "includes/html_settings.inc"; ?>
        <title>Axiom Cinemas Home</title>
    </head>

    <body>
        <?php 
            include_once "includes/header.inc";
            $indexPage = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

        

        <article id="index_ar">

            <section id="promotional">
                <div id="transbox">
                    <h2>Thousands of Movies.<br /> Hundreds of Halls.<br /> One subscription.</h2>
                    <a class="source" target="_blank" href="https://redmoonjedi.wordpress.com/2019/11/20/10-best-places-to-watch-free-movies-online/">Source redmoonjedi via wordpress for above background image</a>
                </div>
            </section>

            <section id="intro">
                <h2>Axiom Cinemas: </h2>
                <?php
                    if (isset($_GET['error'])) {
                        echo "<p class=\"fix_error\">DATABASE CONNECTION FAILURE. CHECK YOUR INTERNET.</p>";
                    }
                ?>
                
                <ul>
                    <li>Why choose Axiom over other companies?<br />
                        Because we are simply the best at what we do. Period</li>
                    <li>Why can&#39;t I just get a normal ticket?<br/>
                        Here at Axiom, we believe that every consumer deserves our loyalty. That&#39;s why we have setup a subscription based payment model for all our ticketing services. You only need to pay once per year - and watch as many movies as you want, as many times as you want, for free</li>
                    <li>But it&#39;s so expensive!<br />
                        Tight on cash? We have you covered. We provide affordable alternatives to our luxury products. You might want to check out the <a href="product.html#basic" title="Product Page">Basic</a> package.</li>
                </ul>
            </section>

           
            <section id="img_sec">
                <div id="img_box">
                    <figure>
                        <img src="images/movie_theater_small.jpg" alt="Movie Theater Map" />
                        <figcaption><a class="source" target="_blank" href="https://www.gettyimages.com/detail/photo/movie-night-out-royalty-free-image/641868174?adppopup=true/">Source Getty Images For above image</a></figcaption>
                    </figure>
                </div>
                <div id="img_text">
                    <h2>Looking for something specific?</h2>
                   
                    <p>At Axiom Cinemas, we always try to fulfill our customers&#39; wishes, no matter how specific. Looking for the best seats in the house? Or the most immersive cinema experience? Or perhaps, you wish to enjoy five star meals with your movie? No matter the desire, we have a subscription package for you. And, with our one size fits all strategy of product pricing, we can further guarantee that you will never be disappointed with our product range. Just look at the next image. See how happy he is? You can be too, only at Axiom.</p>
                </div>
                
                
                
            </section>
        </article>


        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>