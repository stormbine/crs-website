<?php 
    /**
    * Template Name: Products Landing
    */ 
    get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

    <?php 
    $heroFields = get_field('page_hero'); 
    if($heroFields)
    {
        ?>
    <section class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10">
                    <h1><?php echo $heroFields['title']; ?></h1>
                    <?php echo $heroFields['content']; ?>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>
    
    <section class="product-list">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3 prod-intro">
                    <?php the_content(); ?> 
                </div>
            </div>
            <div class="row">
            <?php
            //get all products
            $prod_args = array(
                'post_type' => 'products',
                'posts_per_page' => -1,
                'orderby' => 'publish_date',
                'order' => 'ASC',
                'post_status' => 'publish',
            );
            $allProducts = get_posts($prod_args);

            foreach($allProducts as $product) 
            {
                $pID = $product->ID;
                $pName = $product->post_name;
                $pGallery = get_field('gallery', $pID);
                ?>
                <div class="col-12 col-md-6 col-lg-4 prod-item-wrap">
                    <div class="prod-item">
                        <a href="<?php echo site_url('products/' . $pName); ?>">
                            <div class="image"><div class="inside" style="background-image: url(<?php echo $pGallery[0]['sizes']['medium'] ?>);"></div></div>
                            <div class="content">
                                <h3><?php echo $product->post_title; ?></h3>
                                <?php echo get_field('excerpt', $pID); ?>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="did-you-know">
                    <?php
                    $allDyk = get_field('did_you_know', 'option');
                    $randDyk = rand(0, (count($allDyk) - 1));
                    echo $allDyk[$randDyk]['content'];
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php 
    $ctaFields = get_field('cta_section'); 
    if($ctaFields)
    {
        ?>
    <section class="text-button-cta">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                    <h2><?php echo $ctaFields['title']; ?></h2>
                    <?php echo $ctaFields['content']; ?>

                    <?php if($ctaFields['button_text'] != "") { ?>
                    <div class="btn-area">
                        <a href="<?php echo $ctaFields['button_link']; ?>" class="btn"><?php echo $ctaFields['button_text']; ?></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
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