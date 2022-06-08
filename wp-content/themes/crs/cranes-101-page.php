<?php 
    /**
    * Template Name: Cranes 101
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
    
    <?php 
    $understandingFields = get_field('understanding_section'); 
    if($understandingFields)
    {
        ?>
    <section class="understanding-101">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-8">
                    <h2><?php echo $understandingFields['title']; ?></h2>
                    <?php echo wpautop($understandingFields['content']); ?>
                </div>
            </div>
            <div class="row">
                <?php if($understandingFields['columns']) 
                { 
                    foreach($understandingFields['columns'] as $colItem)
                    {
                        ?>
                <div class="col-12 col-md-6">
                    <h3><?php echo $colItem['title']; ?></h3>
                    <?php echo wpautop($colItem['content']); ?>
                </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
        <?php
    }
    ?>

<?php 
    $needsFields = get_field('needs_section'); 
    if($needsFields)
    {
        ?>
    <section class="products-101">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 col-lg-7">
                    <h2><?php echo $needsFields['title']; ?></h2>
                    <?php echo wpautop($needsFields['content']); ?>
                </div>
            </div>
            <div class="row">
                <?php if($needsFields['product_needs']) 
                { 
                    foreach($needsFields['product_needs'] as $colItem)
                    {
                        $pID = $colItem['product']->ID;
                        $pName = $colItem['product']->post_name;
                        $pGallery = get_field('gallery', $pID);
                        ?>
                <div class="col-12 col-md-6">
                    <div class="needs-101-item">
                        <div class="prod-info">
                            <a href="<?php echo site_url('products/' . $pName); ?>" class="img-wrap"><div style="background-image: url(<?php echo $pGallery[0]['sizes']['medium'] ?>)"></div></a>
                            <a href="<?php echo site_url('products/' . $pName); ?>" class="btn">Learn More</a>
                        </div>
                        <div class="prod-content">
                            <?php echo wpautop($colItem['content']); ?>
                        </div>
                    </div>
                </div>
                        <?php
                    }
                }
                ?>
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