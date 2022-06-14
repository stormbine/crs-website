<?php 
    get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        if(has_post_thumbnail()) { 
            $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
        }
        $cats = get_the_category();
    ?>	
    
    <section class="single-content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-info">
                        <h3>Uplifting Stories by CRS</h3>
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <div class="blog-hero-image">
                        <img src="<?php echo $url; ?>" class="img-fluid" />
                    </div>
                </div>
            </div>
            <div class="row blog-info-cols">
                <div class="col-12 col-md-4">
                    <h3>INDUSTRY</h3>
                    <p><?php echo $cats[0]->cat_name; ?></p>
                </div>
                <div class="col-12 col-md-4">
                    <h3>CRANE TYPE</h3>
                    <p><?php echo get_field('crane_type'); ?></p>
                </div>
                <div class="col-12 col-md-4">
                    <h3>LOCATION</h3>
                    <p><?php echo get_field('location'); ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    
    <?php if(have_rows('bottom_videos')) 
    { 
        ?>
    <section class="stories-video-block">
        <div class="container">    
        <?php
        while (have_rows('bottom_videos')) 
        { 
            the_row(); 
            ?>
            <div class="row bot-video">
                <div class="col-12">
                    <div class="video">
                        <video preload="auto" controls>
                            <source src="<?php echo get_sub_field('video'); ?>" type="video/mp4">
                        </video>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="vid-caption"><?php echo get_sub_field('caption'); ?></div>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
    </section>
        <?php 
    } 
    ?>
    
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php 
    get_footer(); 
?>