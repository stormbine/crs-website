<?php 
    $genFormFields = get_field('general_contact_form', 'option'); 
    if($genFormFields)
    {
        ?>
<section class="general-contact">
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