<?php 
    get_header();
?>
	
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        $productGallery = get_field('gallery'); 
        $galleryCount = count($productGallery);
    ?>	

    <section class="page-hero product-hero">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="row">
                <?php if($galleryCount == 3 || $galleryCount >= 5) { ?>
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
                <?php } else { ?>
                <div class="col-12 col-md-6">
                    <?php the_content(); ?>
                </div>
                <div class="col-12 col-md-6">
                    <?php if($galleryCount > 1) { ?>
                    <section class="prod-gallery-half">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="gallery-wrap">
                                    <?php foreach($productGallery as $pGal) { ?>
                                        <div class="gal-img">
                                            <a href="<?php echo $pGal['sizes']['fullhd']; ?>" data-fancybox="prodGal" <?php if($pGal['caption'] != "") { ?>data-caption="<?php echo $pGal['caption']; ?>"<?php } ?>>
                                                <div class="image" style="background-image: url('<?php echo $pGal['sizes']['medium_large']; ?>');"></div>
                                                <?php if($pGal['caption'] != "") { ?>
                                                <div class="caption"><?php echo $pGal['caption']; ?></div>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } else { ?>
                    <div class="gal-img-single">
                        <a href="<?php echo $productGallery[0]['sizes']['fullhd']; ?>" data-fancybox="prodGal" <?php if($productGallery[0]['caption'] != "") { ?>data-caption="<?php echo $productGallery[0]['caption']; ?>"<?php } ?>>
                            <img src="<?php echo $productGallery[0]['sizes']['medium_large']; ?>');" />
                            <?php if($productGallery[0]['caption'] != "") { ?>
                            <div class="caption"><?php echo $productGallery[0]['caption']; ?></div>
                            <?php } ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
    
    <?php if($galleryCount == 3 || $galleryCount >= 5) { ?>
    <section class="prod-gallery-full <?php if($galleryCount == 3) { echo "three"; } ?>">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="gallery-wrap">
                    <?php foreach($productGallery as $pGal) { ?>
                        <div class="gal-img">
                            <a href="<?php echo $pGal['sizes']['fullhd']; ?>" data-fancybox="prodGal" <?php if($pGal['caption'] != "") { ?>data-caption="<?php echo $pGal['caption']; ?>"<?php } ?>>
                                <div class="image" style="background-image: url('<?php echo $pGal['sizes']['medium_large']; ?>');"></div>
                                <?php if($pGal['caption'] != "") { ?>
                                <div class="caption"><?php echo $pGal['caption']; ?></div>
                                <?php } ?>
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>

    <?php 
    $ctaFields = get_field('cta_section', 14); 
    if($ctaFields)
    {
        ?>
    <section class="text-button-cta yellow">
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