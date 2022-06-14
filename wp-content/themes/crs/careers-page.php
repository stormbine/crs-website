<?php 
    /**
    * Template Name: Careers Page
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
        $genFormFields = get_field('careers_form'); 
        if($genFormFields)
        {
            ?>
    <section class="general-contact careers-form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 content-area">
                    <div class="inner">
                        <h2><?php echo get_field('phone_number', 'option'); ?></h2>
                        <?php echo $genFormFields['content']; ?>
                        <p><?php echo get_field('locations', 'option'); ?></p>
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

    <section class="careers-current">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Careers</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="current-job-postings">
                    <?php 
                    if(have_rows('jobs')) 
                    {
                    
                        $rowCount = 0;
                        while (have_rows('jobs')) 
                        { 
                            the_row(); 
                            ?>
                        <div class="job-post">
                            <div class="details">
                                <h3><?php echo get_sub_field('title'); ?></h3>
                                <span class="location"><?php echo get_sub_field('location'); ?></span>
                            </div>
                            <div class="btn-area">
                                <a href="<?php echo get_sub_field('link'); ?>" class="btn" target="_blank">Read More</a>
                            </div>
                        </div>
                            <?php 
                        } 
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="dyk-full-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <?php
                    $allDyk = get_field('did_you_know', 'option');
                    $randDyk = rand(0, (count($allDyk) - 1));
                    echo $allDyk[$randDyk]['content'];
                    ?>
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