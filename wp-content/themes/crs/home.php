<?php 
    get_header();
?>

    <?php 
    $heroFields = get_field('page_hero', 22); 
    if($heroFields)
    {
        ?>
    <section class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-9">
                    <h1><?php echo $heroFields['title']; ?></h1>
                    <?php echo $heroFields['content']; ?>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>

    <section class="blog-posts">
        <div class="container">
            <div class="row b-post">
                <?php 
                $postcounter = 0;
                if ( have_posts() ) : while ( have_posts() ) : the_post();  
                    $imgurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                ?>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="b-post-item">
                        <a href="<?php the_permalink(); ?>" class="post-img"><div class="image" style="background-image:url(<?php echo $imgurl; ?>)"></div></a>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="content"><?php the_excerpt(); ?></div>
                        <div class="btn-area">
                            <a href="<?php the_permalink(); ?>" class="btn">Read More</a>
                        </div>
                    </div>
                </div>
                <?php 
                    $postcounter++;
                endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="pagination-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="pagination-link-wrap">
                    <?php the_posts_pagination(array(
                        'prev_text' => __( '<i class="fa fa-chevron-left"></i>', 'textdomain' ),
                        'next_text' => __( '<i class="fa fa-chevron-right"></i>', 'textdomain' ),
                    )); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
    get_footer(); 
?>