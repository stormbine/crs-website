<?php 
    /**
    * Template Name: Approach Page
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
    
    <section class="page-intro">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
    
    <section class="crane-services-image">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="<?php echo get_field('crane_lifecycle'); ?>" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <?php 
    if(have_rows('new_crane_services')) 
    {
        ?>
    <section class="crane-services new">
        <div class="container">
        <?php 
            $rowCount = 0;
            while (have_rows('new_crane_services')) 
            { 
                the_row(); 

                $fieldImage = get_sub_field('image');
                ?>
            <div class="row">
                <div class="col-12 col-md-6 <?php if($rowCount % 2 != 1) { echo "order-md-2"; } ?>">
                    <img src="<?php echo $fieldImage['sizes']['medium_large']; ?>" class="img-fluid" />
                </div>
                <div class="col-12 col-md-6 content-area <?php if($rowCount % 2 != 1) { echo "order-md-1"; } ?>">
                    <div class="inner">
                        <h2><?php echo get_sub_field('title'); ?></h2>
                        <?php echo get_sub_field('content'); ?>

                        <?php if(get_sub_field('button_text') != "") { ?>
                        <div class="btn-area">
                            <a href="<?php echo get_sub_field('button_link'); ?>" class="btn"><?php echo get_sub_field('button_text'); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
                <?php
                $rowCount++;
            }
            ?>
        </div>
    </section>
        <?php
    }
    ?>

<?php 
    if(have_rows('aftermarket_services')) 
    {
        ?>
    <section class="crane-services aftermarket">
        <div class="container">
        <?php 
            $rowCount = 0;
            while (have_rows('aftermarket_services')) 
            { 
                the_row(); 

                $fieldImage = get_sub_field('image');
                ?>
            <div class="row">
                <div class="col-12 col-md-6 <?php if($rowCount % 2 == 1) { echo "order-md-2"; } ?>">
                    <img src="<?php echo $fieldImage['sizes']['medium_large']; ?>" class="img-fluid" />
                </div>
                <div class="col-12 col-md-6 content-area <?php if($rowCount % 2 == 1) { echo "order-md-1"; } ?>">
                    <div class="inner">
                        <h2><?php echo get_sub_field('title'); ?></h2>
                        <?php echo get_sub_field('content'); ?>

                        <?php if(get_sub_field('button_text') != "") { ?>
                        <div class="btn-area">
                            <a href="<?php echo get_sub_field('button_link'); ?>" class="btn"><?php echo get_sub_field('button_text'); ?></a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
                <?php
                $rowCount++;
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