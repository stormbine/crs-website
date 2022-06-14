<?php 
    /**
    * Template Name: About Page
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

    <section class="reach-section">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3 reach-intro">
                    <h2><?php echo get_field('reach_title'); ?></h2>
                    <?php echo get_field('reach_content'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
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
                </div>
            </div>
        </div>
    </section>

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

    <section class="values-title">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><?php echo get_field('team_title'); ?></h2>
                </div>
            </div>
        </div>
    </section>

    <section class="values-intro">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <img src="<?php echo get_field('team_image'); ?>" class="img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <section class="values-section">
        <div class="container">
        <?php 
        if(have_rows('values')) 
        {
            while (have_rows('values')) 
            { 
                the_row(); 
                ?>
            <div class="row">
                <div class="col-12 col-md-10 col-lg-7">
                    <h2><?php echo get_sub_field('title'); ?></h2>
                    <?php echo get_sub_field('content'); ?>
                </div>
            </div>
                <?php
            }
        }
        ?>
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 val-bot">
                    <h2><?php echo get_field('value_bottom_title'); ?></h2>
                    <?php echo get_field('value_bottom_content'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="industry-stories">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <h2>We don't just lift things. We lift entire industries.</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="stories-cat-list">
                    <?php 
                    $categories = get_categories(array(
                        'hide_empty' => 0,
                        'show_count' => 1,
                        'meta_key' => 'order',
                        'orderby' => 'meta_value',
                        'order'	=> 'ASC'
                    ));

                    foreach($categories as $cat)
                    {
                        $catimage = get_field('category_image', $cat);
                        ?>
                        <div class="story-cat">
                            <div class="inside">
                                <img src="<?php echo $catimage['sizes']['medium_large']; ?>" class="img-fluid" />
                                <div class="title"><?php echo $cat->name; ?></div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 stories-btn">
                    <a href="<?php echo site_url('stories'); ?>" class="btn">View Stories</a>
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