<?php 
    /**
    * Template Name: Contact Page
    */ 
    get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        if(has_post_thumbnail()) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
        }
    ?>	

    <div class="page-hero">
        <div class="rellax" style="background-image: url(<?php echo $url; ?>);" data-rellax-speed="-10"></div>
    </div>
    
    <section class="contact-main">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div id="gc1" class="col-12 col-lg-5 hide-start">
                    <?php the_content(); ?>
                </div>
                <div id="gc2" class="col-12 col-lg-5 offset-lg-2 hide-start">
                    <div class="contact-form">
                        <h2>General Inquiries</h2>
                        <div class="cta">
                            <p>Looking for a more detailed inquiry?</p>
                            <a href="<?php echo site_url('get-started'); ?>" class="btn">Plan Your Event</a>
                        </div>
                        
                        <?php echo do_shortcode('[contact-form-7 id="5"]'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-par-sep">
        <div class="inside" style="background-image: url(<?php print IMAGES; ?>/get_in_touch_mid_banner.jpg);"></div>
    </section>

    
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php 
    get_footer(); 
?>