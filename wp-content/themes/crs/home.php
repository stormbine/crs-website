<?php 
    get_header();

    $url = wp_get_attachment_url( get_post_thumbnail_id(454));
?>

    <div class="page-hero blog-hero">
        <img src="<?php echo $url; ?>" class="img-fluid" />
        <div class="hero-title">
            <h1><?php echo get_field('hero_title', 454); ?></h1>
        </div>
        <?php include_once('functions/hero-widget.php'); ?>
    </div>

    
    
    <section class="blog-posts">
        <div class="container">
            <?php 
            $postcounter = 0;
            if ( have_posts() ) : while ( have_posts() ) : the_post();  
                $imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
            ?>
            <div class="row b-post">
                <div class="col-12 col-md-5 col-lg-3">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo $imgurl; ?>" class="img-fluid" /></a>
                </div>
                <div id="bpr-<?php echo $postcounter; ?>" class="col-12 col-md-7 col-lg-9">
                    <div class="post-info">
                        <?php echo get_the_date('F j, Y'); ?> | 
                        <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                            }
                            echo trim( $output, $separator );
                        }
                        ?>
                    </div>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php echo get_field('blog_intro', $post->ID); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more"> Read More </a>
                </div>
            </div>
            <?php 
                    $postcounter++;
                endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
    </section>
<?php 
    get_footer(); 
?>