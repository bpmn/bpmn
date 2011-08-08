
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

                        <style type="text/css">
                            p.textboopinn { color: #0066aa }
                        </style>

                        <h2>
                            <p class="textboopinn">Join Boopinn today, and grow your creativity and innovation</p>
                            <p class="textboopinn">potential in a open and borderless network!</p>
                        </h2>
                        <img src="<?php echo $vars['url']; ?>mod/BoopinnTheme_white/_graphics/network.png" alt="Network"class="floatRight">	

                        </p> 
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-wrapper">
                        <h2 class="title">Register</h2>
                        <p>
                            <h6>
                                <p>Register, and create</p>
                                <p>  your "team" : to showcase your company or your project </p>
                                <p>  your "open lab" : to collaborate on ideas you would like to develop creative</p>
                                <p>                    and innovate solutions</p>
                                <p>View you CIS (Creative and Innovation Score)</p>
                            </h6>                  
                        </p>
                    </div>
                </div>
            </div><!-- .coda-slider -->
        </div><!-- .coda-slider-wrapper -->

    </div>
