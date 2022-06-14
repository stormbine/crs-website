<?php 
    /**
    * Template Name: Contact Page
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
                </div>
            </div>
        </div>
    </section>
        <?php
    }
    ?>

    <?php 
        $genFormFields = get_field('contact_form'); 
        if($genFormFields)
        {
            ?>
    <section class="general-contact contact-form">
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

    <section class="locations-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Locations</h2>
                    <p><?php echo get_field('locations', 'option'); ?></p>
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