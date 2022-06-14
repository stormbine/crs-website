<?php 
    /**
    * Template Name: Project Map Page
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
        
    ?>	

    <?php $map_markers = get_field('project_pins', 316); ?>
    <section class="proj-map">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="proj-map-wrap">
                        <div class="map-toggles">
                            <div class="region-toggle" @click="showProductType(0)" v-bind:class="[ mapProductType === 0 ? 'active' : '' ]">View All</div>
                        <?php
                        $region_counter = 1;
                        foreach ($map_markers as $prod_types) 
                        {
                            ?>
                            <div class="region-toggle" @click="showProductType(<?php echo $region_counter; ?>)" v-bind:class="[ mapProductType === <?php echo $region_counter; ?> ? 'active' : '' ]"><?php echo $prod_types['industry_name']; ?></div>
                            <?php
                            $region_counter++;
                        }
                        ?>
                        </div>

                        <div id="projectmap" class="map"></div>

                        <div class="project-markers">
                            <?php
                            $marker_counter = 1;
                            $region_counter = 1;

                            //print_r($map_markers);

                            foreach ($map_markers as $prod_types) 
                            {
                                if($prod_types['projects'])
                                {
                                    $all_markers = $prod_types['projects'];
                                    
                                    foreach($all_markers as $proj_mark)
                                    {
                                        $latlong = explode(",", str_replace(" ", "", $proj_mark['lat_long']))
                                        ?>
                            <div class="smarker" data-latitude="<?php echo $latlong[0]; ?>" data-longitude="<?php echo $latlong[1]; ?>" data-product-type="<?php echo $region_counter; ?>" data-project-number="<?php echo $marker_counter; ?>"></div>
                                        <?php
                                        $marker_counter++;
                                    }
                                }

                                $region_counter++;
                            }
                            ?>
                        </div>

                        <?php
                        $project_counter = 1;
                        foreach ($map_markers as $prod_types) 
                        {
                            if($prod_types['projects'])
                            {
                                $all_markers = $prod_types['projects'];
                                
                                foreach($all_markers as $proj_mark)
                                {
                                    ?>
                        <div class="project-popup" v-bind:class="[ projectPopup === <?php echo $project_counter; ?> ? 'active' : '' ]">
                            <div class="close-btn" @click="closeProjectPop()"><img src="<?php print IMAGES; ?>/close-btn.png"></div>
                            <h3><?php echo $proj_mark['title']; ?></h3>
                            <?php echo $proj_mark['hover_copy']; ?>
                        </div>
                                    <?php
                                    $project_counter++;
                                }
                            }
                        }
                        ?>
                        </div>
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