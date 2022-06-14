<?php    
	get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	

    <div id="homeSplash" class="home-intro">
        <div class="video-wrap" @click="skipIntro()">
            <video id="herovid" playsinline autoplay muted preload="auto">
                <source src="<?php print VIDEOS; ?>/intro-video.mp4" type="video/mp4">
            </video>
        </div>
    </div>

    <?php 
    $heroFields = get_field('page_hero'); 
    if($heroFields)
    {
        ?>
    <section class="page-hero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $heroFields['title']; ?></h1>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>

    <?php 
    $yctaFields = get_field('yellow_cta'); 
    if($yctaFields)
    {
        ?>
    <section class="yellow-cta">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-9 col-lg-8">
                    <h2><?php echo $yctaFields['title']; ?></h2>
                    <?php echo $yctaFields['content']; ?>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>

    <?php 
    if(have_rows('content_rows')) 
    {
        ?>
    <section class="content-rows">
        <div class="container">
            <?php 
            $rowCount = 0;
            while (have_rows('content_rows')) 
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
    $cloginFields = get_field('customer_login'); 
    if($cloginFields)
    {
        $fieldImage = $cloginFields['image'];
        ?>
    <section class="customer-login-home">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2">
                    <img src="<?php echo $fieldImage['sizes']['medium_large']; ?>" class="img-fluid" />
                </div>
                <div class="col-12 col-md-6 content-area order-md-1">
                    <div class="inner">
                        <h2><?php echo $cloginFields['title']; ?></h2>
                        <?php echo $cloginFields['content']; ?>
                    </div>
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