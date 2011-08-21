
<div id="custom_index" style ="witdh:100%">

    <!-- left column content -->
    <div id="index_left">
        <!-- welcome message -->
        <!--<div id="index_welcome"> -->
        <?php
        if (isloggedin()) {
            echo "<h2>" . elgg_echo("welcome") . " ";
            echo $vars['user']->name;
            echo "</h2>";
        }
        ?>
        <?php
        //include a view that plugins can extend
        //echo elgg_view("index/lefthandside");
        ?>
        <?php
        //this displays some content when the user is logged out
        if (!isloggedin()) {
            //display the login form
            echo $vars['area1'];
            //echo "<div class=\"clearfloat\"></div>";
        }
        ?>
        <!--</div>-->


    </div>

    <!-- right hand column -->
    <div id="index_right" >
        <!-- more content -->

        <div class="coda-slider-wrapper">
            <div class="coda-slider preload" id="coda-slider-1">
                <div class="panel">
                    <div class="panel-wrapper">
                        <h2 class="title">Welcome</h2>
                           <p>
                        <img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/Boopinn_platform4.png" alt="Network"class="floatRight">	

                        <style type="text/css">
                            p.textboopinn { color: #0066aa }
                        </style>

                        <h2>
                            <p class="textboopinn">Join Boopinn today, and grow your creativity and innovation</p>
                            <p class="textboopinn">potential in a open and borderless network!</p>
			</h2>

                                <p>Register, and create</p>
                                <p>  your "team" : to showcase your company or your project </p>
                                <p>  your "open lab" : to collaborate on ideas you would like to develop creative</p>
                                <p>                    and innovate solutions</p>
                                <p>View you CIS (Creative and Innovation Score)</p>


                        </p> 
                    </div>
                </div>


                 <div class="panel">
                    <div class="panel-wrapper">
                        <h2 class="title">Blog</h2>
                           <p>

                        <style type="text/css">
                            p.textboopinn { color: #0066aa }
                        </style>

                        <h2>
                            <p class="textboopinn">Visit our Blog !</p>
                        </h2>
                        <a href="http://blog.boopinn.com"><img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/blog2.PNG" alt="Network"class="floatRight"></img></a>

                        </p> 
                    </div>
                </div>

               <div class="panel">
                    <div class="panel-wrapper">
                        <h2 class="title">Teams</h2>
                           <p>

                        <style type="text/css">
                            p.textboopinn { color: #0066aa }
                        </style>

                        <h2>
                            <p class="textboopinn">Teams explained</p>
			</h2>

                            <p>
The Team module allows innovation to converge. 
The Teams feature represents an organized team project, which can benefit from solutions 
derived from the chaotic exchange in our OpenLabs. 
A Team is a closed module where Boopinn users (teams members) who
work together on the same project have the opportunity to showcase and advertise the
fruit of their labor. Team members can upload files in the team library for a more detailed
project explanation and/or advertisement. A team can represent any group of people working
together: university students, company labs, start up projects and much more.
  
			    </p>

                        </p> 
                    </div>
                </div>

              <div class="panel">
                    <div class="panel-wrapper">
                        <h2 class="title">Open labs</h2>
                           <p>

                        <style type="text/css">
                            p.textboopinn { color: #0066aa }
                        </style>

                        <h2>
                            <p class="textboopinn">Open labs explained</p>
			</h2>

<p>The OpenLab is the element placing chaos in the innovative process by pushing our
users to debate, challenge ideas, agree, disagree, and finally collaborate to become more
creative. Openlabs allow you to post a problem seeking a solution or subject matter to be
debated upon through an open exchange module similar to internet forums. 
An efficient discussion tool used by members to exchange ideas and solutions related to the openlab topic.
Our Openlab library allows members to upload files, providing a convenient way to post
thorough solutions and articles corresponding to the OpenLab subject. 
By using an invitation joinrequest process, you are in control of your openlab members and decide which users will
be allowed to participate. In each openlab, every members contribution can be assessed by
other members using a vote ranking system. A leaderboard displays the strongest contributors
to the Boopinn platform.

(You can start already joining the Boopinn Platform Open lab, to bring feedback to Boopinn)</p>
  
			     

                        </p> 
                    </div>
                </div>


            </div><!-- .coda-slider -->
        </div><!-- .coda-slider-wrapper -->

    </div>
