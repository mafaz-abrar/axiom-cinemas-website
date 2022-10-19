<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: Product Page
    // Last Updated: 24-May-2021
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc"; ?>
        <title>Purhcase Tickets</title>
        
    </head>
    <body>
        <?php 
            include_once "includes/header.inc";
            $productPage = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

            <aside id="aside">
                    <h3>Recent News</h3>
                  
                    <ul>
                        <li>Super Premium Package not availabe this Saturday</li>
                        <li>Due to an unexpected tsunami, theaters in Brazil are currently closed</li>
                        <li>COVID-19 vaccinations have begun. Please ensure that you are vaccinated before visiting an affiliated theater</li>
                        <li>Due to an unexpected out break of polio, Theater A165 in Santa Fe is indefinitely closed. If you have already booked a ticket at Santa Fe A165, please know that there we maintain a strict no refund policy</li>
                        <li>Many theater staff have complained about COVID safe regulations being ingnored in recent showings. Please maintain all mandatory COVID safe guidelines during showings. Our staff reserve the right to cancel subscriptions as penalty</li>
                        <li>Theater goers in Dhaka are advised to be on high alert when visiting theaters. Due to the unexpected results of a football game, the streets are currently packed by upset fans</li>
                        <li>Halloween and Christmas are right around the corner, and we are preparing to launch limited edition season themed packages for some lucky customers.</li>
                        <li>On account of our 50th anniversary, the Basic Pack will be made free of cost for a limited time next week. Stay tuned for further information/li>
                        <li>Super Premium Package not availabe next Saturday either</li>
                    </ul>
            </aside>

            <article id="product_ar">
                <section id="intro">
                    <h2> It&#39;s never been easier to buy movie tickets.</h2>
                    <p> Here at Axiom, we are committed to providing a seamless, hassle-free experience for all our customers. Booking your next big blockbuster sesh is as easy as 1, 2, 3 (and 4): </p>
                    <ol>
                        <li>Scroll through our products to find what best suits your needs</li>
                        <li>Select as many optional features as you like</li>
                        <li>Click BUY and you're done! No money required!</li>
                        <li> Head on down to our helpful <a href="product.html#compare_ar">Comparison Table</a> if you&#39;re not sure what to buy</li>
                    </ol>
                </section>

                <section id="catalogue_sec">
                    <h2>Looking for the best? We've got that, and more.</h2>

                    <div id="catalogue">
                        <div class="item" id="item_super">
                            <h3>Super Premium</h3>
                            <img class="sample" src="images/super_premium.png" alt="Super Premium Sample Image" />
                            <p>Holy Cow! It&#39;s Super Premium! Expect nothing short of the best. With five star restaurant food, classical music on cue and professionally trained wait staff, this is the ultimate master class in relishing film.</p>
                            <a class="source" target="_blank" href="https://wallhere.com/fr/wallpaper/1301169">Source wallhere For above image</a>
                        </div>
                        
                        <div class="item" id="item_prem">
                            <h3>Premium</h3>
                            <img class="sample" src="images/premium.png" alt="Premium Sample Image">
                            <p>Here it is, the Premium subscription package. Not as many features as Super Premium, but it has its upsides. For one thing, free desert! For another, you get bodyguards.</p>
                            <a class="source" target="_blank" href="https://luxurylaunches.com/travel/manhattan-gets-its-own-luxury-movie-theater-and-it-also-serves-gourmet-meals.php">Source luxurylaunches For above image</a>
                        </div>

                        <div class="item" id="item_elite">
                            <h3>Elite</h3>
                            <img class="sample" src="images/elite.png" alt="Elite Sample Image">
                            <p>The Elite Sub Pack. Ever wanted to swim in a chocolate river? Well that might not be possible, but the elite sub pack is. Not only do you get the best in movie experience, but you also enjoy a free sword (perfect replica of the Excalibur) and a personal Violinist. Sweet.</p>
                            <a class="source" target="_blank" href="https://www.indiewire.com/2016/07/luxury-theater-chain-cinepolis-expanding-us-cinemas-1201707606/">Source indiewire For above image</a>
                        </div>

                        <div class="item" id="item_basic">
                            <h3>Basic</h3>
                            <img class="sample" src="images/basic.png" alt="Basic Sample Image" />
                            <p>For those who want to enjoy all the benefits of a major cinema hall subscription, but without any of the costs, this is the ultimate low cost, affordable package for you! At only $19.99, you won't get as many of the luxury features as the rest of the pack, but you CAN enjoy an unlimited number of movies, at any affiliated theaters around the world. So there is no reason to keep waiting. Buy Now!</p>
                            <a class="source" target="_blank" href="https://chicagocrusader.com/cmx-cinemas-launches-two-new-luxury-cinemas-with-delicious-food-options/">Source chiacgo crusader For above image</a>
                        </div>
                        <div class="item">
                            <h3>Single Ticket+</h3>
                            <img class="sample" src="images/movie_theater_screen.jpg" alt="Single + Sample Image" />
                            <p>Buy a Single Ticket for a Single Movie, but with the extra benefit of a 1% discount on food. Costs vary depending on movie.</p>
                            <a class="source" target="_blank" href="https://psicologia.laguia2000.com/general/el-cine-como-recurso-psicoterapeutico">Source laguia For above image</a>
                        </div>
                        <div class="item">
                            <h3>Single Ticket</h3>
                            <img class="sample" src="images/movie_theater_screen.jpg" alt="Single Sample Image" />
                            <p>Buy a Single Ticket for a Single Movie. Costs vary depending on movie.</p>
                            <a class="source" target="_blank" href="https://psicologia.laguia2000.com/general/el-cine-como-recurso-psicoterapeutico">Source laguia For above image</a>
                        </div>
                    </div>
                </section>
           
            </article>    

            <article id="compare_ar">
                <table>
                    <caption>A Detailed Breakdown of our Product Range</caption>
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Seating</th>
                            <th>Food</th>
                            <th>Experience</th>
                            <th>Optional Features</th>
                            <th>Total Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Super Premium</td>
                            <td><ul>
                                <li>5 Front Row Seats</li>
                                <li>5 Center Row Seats</li>
                                <li>Luxury Seating</li>
                            </ul></td>
                            <td><ul>
                                <li>Three course meal from our partner company, Creme De Chauffer</li>
                                <li>Free food from concession stands</li>
                            </ul></td>
                            <td><ul>
                                <li>Normal</li>
                            </ul></td>
                            <td><ul>
                                <li>Bodyguards</li>
                                <li>Wait Staff</li>
                                <li>Free Drinks</li>
                                <li>Open Air Viewing</li>
                            </ul></td>
                            <td>$50,000</td>
                        </tr>

                        <tr>
                            <td>Premium</td>
                            <td><ul>
                                <li>10 Front Row Seats</li>
                                <li>Luxury Seating</li>
                                <li>Absorbo-shock technology for 3D</li>
                            </ul></td>
                            <td><ul>
                                <li>Single course meal from our partner company, Creme De Chauffer</li>
                                <li>Free food from concession stands</li>
                            </ul></td>
                            <td><ul>
                                <li>Normal</li>
                                <li>3D</li>
                            </ul></td>
                            <td><ul>
                                <li>Bodyguards</li>
                                <li>Free Drink (1)</li>
                            </ul></td>
                            <td>$49,999</td>
                        </tr>

                        <tr>
                            <td>Elite</td>
                            <td><ul>
                                <li>1 Front Row Seat, or</li>
                                <li>10 Center Row Seats</li>
                            </ul></td>
                            <td><ul>
                                <li>Free food from concession stands</li>
                            </ul></td>
                            <td><ul>
                                <li>Normal</li>
                                <li>3D Mode</li>
                                <li>5D Mode</li>
                            </ul></td>
                            <td><ul>
                                <li>Bodyguards</li>
                                <li>Open Air Viewing</li>
                                <li>Personal Violinist</li>
                                <li>Free Replica Sword</li>
                            </ul></td>
                            <td>$49,998</td>
                        </tr>

                        <tr>
                            <td>Basic</td>
                            <td><ul>
                                <li>1 Seat</li>
                                <li>At the back of the theater</li>
                            </ul></td>
                            <td>
                                No Free Food
                            </td>
                            <td><ul>
                                <li>Normal</li>
                                <li>3D</li>
                            </ul></td>
                            <td>
                                No Other Options
                            </td>
                            <td>$1,999</td>  
                        </tr>
                    </tbody>
                </table>
            </article>
           
        
    
        <?php include_once "includes/footer.inc"; ?>
    </body>
</html>