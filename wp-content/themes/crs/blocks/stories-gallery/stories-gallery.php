<?php
    /*** Block Name: Stories Gallery **/
    $fields = get_fields(); 
?>
                
    <section class="stories-gallery">
    <?php 
    $proGallery = $fields['gallery'];

    if($proGallery) 
    {   
        foreach($proGallery as $galItem) 
        {
            ?>
        <div class="st-gallery-item">
            <a href="<?php echo $galItem['sizes']['fullhd']; ?>" data-fancybox="prodGal" <?php if($galItem['caption'] != "") { ?>data-caption="<?php echo $galItem['caption']; ?>"<?php } ?>>
                <div class="image" style="background-image: url('<?php echo $galItem['sizes']['medium_large']; ?>');"></div>
            </a>
            
            <?php if($galItem['caption'] != "") { ?>
            <div class="caption"><?php echo $galItem['caption']; ?></div>
            <?php } ?>
        </div>
            <?php
        }
    }
    ?>
    </section>