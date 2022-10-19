<?php
    // Author: Mafaz Abrar Jan Chowdhury
    // Description: About page
    // Last Updated: 24-May-2021
?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include_once "includes/html_settings.inc";?>
        <title>About Us</title>
        
    </head>
    <body>
       <?php 
            include_once "includes/header.inc";
            $aboutPage = "id = \"current\"";
            include_once "includes/menu.inc";  
        ?>

        <article id="about_ar">

            <section id="intro">
                <h2>Information about the Author</h2>
            </section>

            <section id="about_me_sec">

                <figure id="my_photo_box">
                    <img src="images/me.png" alt="Photo of Me" id="my_photo" />
                </figure>

                <dl>
                    <dt>Name</dt>
                    <dd>Mafaz Abrar Jan Chowdhury</dd>
                    <dt>Student ID</dt>
                    <dd>s103172407</dd>
                    <dt>Course</dt>
                    <dd>Bachelor of Computer Science</dd>
                    <dt>Email</dt>
                    <dd><a href="mailto:103172407@student.swin.edu.au">103172407@student.swin.edu.au</a></dd>
                </dl>
                
            </section>

            <section id="extra_info">
                <h2>The story of Mafaz..</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sem quam, scelerisque vitae diam nec, imperdiet suscipit lorem. Fusce tempus egestas porttitor. Etiam tempor elit ac magna lobortis luctus sed nec tellus. Cras placerat est vel scelerisque vestibulum. Quisque nec maximus lectus. Donec feugiat scelerisque erat, sit amet sollicitudin enim accumsan in. Aliquam erat volutpat. Nunc eleifend nibh a tellus ullamcorper, ut pellentesque purus lobortis. Sed sed feugiat nunc. Phasellus ultrices rhoncus velit, sed accumsan est ultricies ut. Quisque varius libero ut eros rhoncus, at tincidunt mauris auctor. Donec eget risus commodo, efficitur dolor et, cursus massa. Maecenas vel auctor ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque porttitor ut orci quis finibus. Sed pretium nec ante non blandit.

                Cras mollis velit sed odio facilisis, sed convallis mauris ullamcorper. Proin risus est, semper ut quam in, ornare vehicula felis. Quisque euismod ac ante ut convallis. Integer ac imperdiet dolor. Morbi maximus tempor tortor, ac lacinia nisl sodales quis. Ut porttitor dictum nulla quis auctor. Sed semper, ipsum id mattis facilisis, nibh nulla convallis nunc, at pellentesque tortor diam quis libero. Maecenas ac odio a mauris porttitor lobortis vel a sapien. Fusce ornare velit ac tempus vulputate. Ut sapien ipsum, eleifend eget nisi vitae, eleifend pulvinar urna. Nam eget placerat nulla, non pulvinar quam. Curabitur molestie felis non erat consectetur rhoncus. Quisque sem erat, dignissim eu est auctor, semper porta arcu. Duis convallis tristique ipsum, non consectetur justo finibus sit amet.
                    
                Duis non est a arcu rutrum dapibus imperdiet eget ligula. In sit amet consequat turpis. Proin vel accumsan augue. Ut nec nisl ultrices, consequat urna cursus, vulputate felis. Sed consectetur sagittis dolor at tincidunt. Praesent interdum mi sed nisi ullamcorper vehicula. In hac habitasse platea dictumst. Donec sed nibh vel nisl pretium lobortis tempus nec elit. Mauris at volutpat tellus. Nam feugiat rutrum enim, vel efficitur erat placerat sed.
                    
                Donec vel urna sed dui egestas volutpat at vel lorem. Nulla sit amet dui diam. Donec vel mauris ut lectus mollis iaculis ac ac magna. Sed gravida pretium nibh. Sed blandit ligula in ex mattis porta. Ut viverra, quam sed faucibus egestas, risus ex pellentesque metus, ornare tristique leo tellus eu libero. Duis at augue rutrum, convallis est rhoncus, sagittis arcu. Suspendisse viverra aliquet diam blandit consectetur. Pellentesque a felis vitae orci malesuada luctus. Praesent sodales neque eu ligula consequat tincidunt. Nulla ac bibendum nisi. Mauris ultricies, diam mollis ullamcorper faucibus, mauris odio aliquam ante, sit amet dictum purus diam vel augue. Mauris eu tristique ligula, vitae aliquet lacus. Morbi eget elit diam. Mauris risus turpis, ornare sed dui et, gravida maximus nisi.
                    
                Nulla tincidunt lacus eget feugiat pretium. Donec ultricies libero vel laoreet eleifend. Sed a leo ultrices, condimentum ligula pulvinar, semper urna. Ut at erat a lorem congue blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur purus mauris, hendrerit pharetra quam suscipit vitae. Vestibulum scelerisque tristique mollis. Nam ut elit in purus congue faucibus. Donec hendrerit, nisl sed varius efficitur, nunc dolor tincidunt nulla, id lobortis eros odio ut dui. Pellentesque venenatis quam at porta lacinia.</p>
                
            </section>


            <section id="timetable_sec">
                <table> <!-- border="1" we omit this attribute since it will be done in CSS-->

                    <caption>My Weekly Time Table</caption>
                    
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>8:00 a.m.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td rowspan="2" class="shine">COS10009 Lab 1</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>9:00 a.m.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <!-- <td></td> -->
                            <td></td>
                        </tr>

                        <tr>
                            <td>10:00 a.m.</td>
                            <td></td>
                            <td rowspan="2" class="shine">COS10009 Live Online 1</td>
                            <td></td>
                            <td rowspan="2" class="shine">COS10009 Workshop 1</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>11:00 a.m.</td>
                            <td rowspan="2" class="shine">COS10011 Live Online 1</td>
                            <!-- <td></td> -->
                            <td></td>
                            <!-- <td></td> -->
                            <td></td>
                        </tr>

                        <tr>
                            <td>12:00 p.m.</td>
                            <!-- <td></td> -->
                            <td class="shine">COS10011 Lab 1</td>
                            <td></td>
                            <td rowspan="2" class="shine">COS10009 Workshop 2</td>
                            <td rowspan="2" class="shine">COS10009 Lab 2</td>
                        </tr>

                        <tr>
                            <td>1:00 p.m.</td>
                            <td></td>
                            <td></td>
                            <td rowspan="2" class="shine">COS10003 Live Online 1</td>
                            <!--<td></td>
                            <td></td>-->
                        </tr>

                        <tr>
                            <td>2:00 p.m.</td>
                            <td></td>
                            <td></td>
                            <!--<td></td>-->
                            <td rowspan="2" class="shine">COS10003 Tutorial</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>3:00 p.m.</td>
                            <td rowspan="3" class="shine">TNE10005 Practical</td>
                            <td></td>
                            <td></td>
                            <!--<td></td>-->
                            <td></td>
                        </tr>

                        <tr>
                            <td>4:00 p.m.</td>
                            <!--<td></td>-->
                            <td></td>
                            <td></td>
                            <td rowspan="2" class="shine">TNE10005 Live Online</td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>5:00 p.m.</td>
                            <!--<td></td>-->
                            <td></td>
                            <td></td>
                            <!--<td></td>-->
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </article>
   
       <?php include_once "includes/footer.inc"; ?>
    </body>
</html>