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
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="single-info">
                        <h3><?php echo get_the_date('F j, Y'); ?></h3>
                        <h2><?php the_title(); ?></h2>
                    </div>

                    <div class="blog-hero-image">
                        <img src="<?php echo $url; ?>" class="img-fluid" />
                    </div>

                    <div class="blog-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="pagination">
                        <?php previous_post_link('<div class="prev-link">%link</div>', 'Prev'); ?>
                        <?php next_post_link('<div class="next-link">%link</div>', 'Next'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>
<?php 
    get_footer(); 
?>