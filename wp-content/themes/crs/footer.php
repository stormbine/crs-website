            <?php 
            if(!is_page_template('parts-page.php') && !is_page_template('careers-page.php') && !is_page_template('contact-page.php') && !is_singular('post')) 
            { 
                include_once('functions/general-contact.php'); 
            }

            if(!is_page_template('careers-page.php') && !is_page_template('contact-page.php') && !is_singular('post')) 
            { 
                include_once('functions/newsletter-subscribe.php');
            }
            ?>
        </div>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4 col-lg-3">
                        <a href="<?php echo site_url(); ?>"><img src="<?php print IMAGES; ?>/crs-foot-logo.svg" class="img-fluid" /></a>
                        <div class="contact-phone"><?php echo get_field('phone_number', 'option'); ?></div>
                        <div class="social-icons">
                            <a href="https://twitter.com/CRSCrane" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/crs-cranesystems-inc-" target="_blank"><i class="fab fa-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-6">
                        <?php
                        wp_nav_menu( array(
                            'theme_location'	=> 'footer-menu',
                            'depth'				=> 2,
                            'container'			=> 'div',
                            'container_class'	=> '',
                            'container_id'		=> 'menu-wrap',
                            'menu_class'		=> 'footer-nav'
                            )
                        );
                        ?>
                    </div>
                    <div class="col-12 col-md-4 col-lg-3 message-col">
                        <?php if(get_field('customer_login', 'option')) { ?>
                        <a href="<?php echo get_field('customer_login', 'option'); ?>" class="btn">Customer Login</a>
                        <?php } ?>

                        <div class="foot-nsf-logo"><img src="<?php print IMAGES; ?>/nsf_logo.png" class="img-fluid" /></div>
                    </div>
                </div>
            </div>
        </footer>  

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>

        <script src="<?php print JSCRIPTS; ?>/bootstrap.bundle.min.js"></script>
        <script src="<?php print JSCRIPTS; ?>/jquery.waypoints.min.js"></script>
        <script src="<?php print JSCRIPTS; ?>/rellax.min.js"></script> 
        
        <link rel="stylesheet" href="<?php print CSSROOT; ?>/jquery.fancybox.min.css">
        <script src="<?php print JSCRIPTS; ?>/jquery.fancybox.min.js"></script>

        <?php if(is_singular('communities') || is_page_template('project-map.php') || is_page_template('about-page.php')) { ?>
        <script src="<?php print JSCRIPTS; ?>/leaflet/leaflet.js"></script>
        <link rel="stylesheet" href="<?php print JSCRIPTS; ?>/leaflet/leaflet.css">
        <script src="<?php print JSCRIPTS; ?>/leaflet-providers.js"></script>
        <?php } ?>
        
        <script src="<?php print JSCRIPTS; ?>/vue.js"></script>
        <script src="<?php print JSCRIPTS; ?>/vue-scrollto.js"></script>

        <script src="<?php print JSCRIPTS; ?>/main.js"></script>
        <script src="<?php print JSCRIPTS; ?>/main-vue.js"></script>

        <?php wp_footer(); ?>
    </body>
</html>