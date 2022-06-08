<?php 
    /**
    * Template Name: Parts Page
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
                <div class="col-12">
                    <h1><?php echo $heroFields['title']; ?></h1>
                    <?php echo $heroFields['content']; ?>
                    <div class="btn-area">
                        <div class="btn" v-scroll-to="'.parts-form'">Order Parts</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>
    
    <section class="parts-equipment">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 pe-intro">
                    <h2><?php echo get_field('equipment_title'); ?></h2>
                    <?php echo get_field('equipment_content'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                <?php
                if(have_rows('suppliers')) 
                { 
                    ?>
                    <ul class="equip-supply-list">
                    <?php
                    while (have_rows('suppliers')) 
                    { 
                        the_row(); 
                        $supplier_logo = get_sub_field('logo');
                        ?>
                        <li><img src="<?php echo $supplier_logo['sizes']['medium'] ?>" class="img-fluid" /></li>
                        <?php
                    }
                    ?>
                    </ul>
                    <?php
                }
                ?>
                </div>
            </div>
        </div>
    </section>

    <?php 
        $genFormFields = get_field('parts_form'); 
        if($genFormFields)
        {
            ?>
    <section class="general-contact parts-form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 content-area">
                    <div class="inner">
                        <h2><?php echo $genFormFields['title']; ?></h2>
                        <?php echo $genFormFields['content']; ?>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="contact-form">
                        <?php echo do_shortcode('[contact-form-7 id="' . $genFormFields['form'] . '"]'); ?>
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