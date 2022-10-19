<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Enhancements page
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
            $enhancePage = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

    
        <article id="enhance_ar">
            <section id="intro">
                <h2>Enhancements</h2>
                <p>I've used a number of enhancements for my code - my primary goal was to hit the the two targets of adding in a number of new CSS properties and creating a responsive CSS page to fit lower resolution devices.</p>

                <p>The CSS properties I used the most were the animation and transformation properties, and another css value I used was the linear-gradient() function for background-images. I have used the linear-gradient() function in various different situations including the nav (see above), as a background for this section, as well as some on <a href="index.html#intro" >the Home page</a>, <a href="product.html#intro" >the Product page</a>, and some others. However, the linear-gradient() was used mainly for stylistic purposes and not specifically as an enhancement. I sourced this property from the <a href="https://www.w3schools.com/css/css3_gradients.asp">W3Schools website</a>.</p>

                <p>I used animations and transformations to offset the suddenness between transitioning pages. These were used on the article and aside tags. First I used transform and opacity properties in the rule to move the articles and aside out of the viewport (using translateX) and also made them invisible. Then I used an animation with keyframes to move them back into the viewport and used the forwards value in the animation property so that the elements retain their new positions. The most easily spotted use of this technique is the <a href="product.html#aside">article and aside</a> in the product page, but this has been implemented for all article elements. I sourced this technique from <a href="https://webdesign.tutsplus.com/tutorials/quick-tip-how-to-enhance-a-page-with-css-animations--cms-32100" target="_blank">web design.tutplus</a>. I believe that this is more user-friendly than the static and abrupt change that usually results when we go to a hyperlink. This change helps the reader adjust to the new page element by element and take in the necessary information slowly and more concretely. </p>

                <p> A further note on the <a href="product.html#aside">aside</a>, the link given here does not showcase the aside in its full glory. I have deliberately not applied the opcaity property to the aside (which I did for the articles), so that if anyone arrives from the <a href="index.html#image_for_map">image map</a> from the home page, then they will not miss the aside, since it still remains in view. This problem arises due to the short height of the aside. The aside has also been highlighted using an animation for changing the background color smoothly. This was done in order to call attention to the aside since it contains important information regarding the products, and can easily be skipped over by the user. I sourced the use of the animation property in this way from <a href="https://www.w3schools.com/css/css3_animations.asp">W3Schools website</a>.</p>

                <p>For help with my presentation I used the grid css property. I sourced this from the <a href="https://www.w3schools.com/css/css_grid.asp">W3Schools</a> website. By laying out the range of <a href="product.html#catalogue_sec" >products</a> in a grid format, I am able to better adapt the properties for mobile view, since css does the bulk of the work. Due to the presence of the aside, I feel like this is an important feature for a smooth user experience, especially for mobile users. I also implemented a grid layout for the nav(see above) so that it adapts better for mobile view. I have also made some other preparations in my css using media queries for mobile users. This includes omitting the <a href="index.html#image_for_map">image map</a> and the <a href="product.html#catalogue">paragraphs inside the items in the grid </a> when the screen gets too small, and moving the <a href="product.html#aside">aside</a> back into flow (removing float) </p>

                <p>I also tried to optimize the tables in <a href="product.html#compare_sec">product</a> and <a href="about.html">about</a> for mobile view. I attempted this by using position sticky on the first items in each row to make for easier navigation.</p>

                <p>I used transform: scale() in the <a href="product.html#aside"> product</a> page on the items in the grid, so that they would pop out on hover. This was done to make the items more attractive and also to distract the user from the exorbitant prices on the table below</p>
            </section>
        </article>
       
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>