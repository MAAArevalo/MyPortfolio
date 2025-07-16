<?php $home_url = get_home_url(); ?>
<section id="tech" class="tech-tools portfolio-content">
    <div class="tech-title">
        <h2>TECHS & TOOLS <span>I USE</span></h2>
    </div>
    <div class="tech-content">
        <div class="tech-logos">
            <?php
                $query = new WP_Query(array(
                    'post_type'         => 'tech-tool',
                    'posts_per_page'    => -1,
                    'orderby'           => 'date',
                    'order'             => 'ASC'
                ));
                if($query->have_posts( )):
                    while($query->have_posts( )): $query->the_post(  );
            ?>
            <div class="tech-logo">
                <?php the_post_thumbnail( "full"); ?>
            </div>
            <?php 
                    endwhile;
                    wp_reset_postdata(  );
                endif;
            ?>
        </div>
    </div>
</section>