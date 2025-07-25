<?php
    $projectCount;
    $projectArray = array();

    $query = new WP_Query(array(
        'post_type' => 'my-work',
        'posts_per_page' => -1, 
    ));
    if($query->have_posts(  )):
        while($query->have_posts()): $query->the_post();
            $projID = get_the_ID();

            array_push($projectArray, $projID);

        endwhile;
        wp_reset_postdata( );
    endif;
    $projectCount = wp_count_posts( 'my-work' )->publish;


?>

<section id="works" class="my-works portfolio-content">
    <div class="work-preview">
        <?php
            $previewID = $projectArray[0];
            $title = get_the_title( $previewID );
            $categories = get_the_category( $previewID );
            $tags = get_the_tags( $previewID );
            $catCount = count($categories);
            /**
             * Check if in category Personal Project: 0 - false 1- true
             */
            $personalProj = 0;
            
        ?>
        <div class="work-preview-img">
            <?php echo get_the_post_thumbnail( $previewID, 'full' ); ?>
        </div>
        <div class="work-preview-details">
            <div class="work-title"><h2><?php echo $title; ?></h2></div>
            <div class="work-tags">
                <?php foreach($tags as $tag): ?>
                <span class="work-tag"><?php echo esc_html( $tag->name );?></span>
                <?php endforeach; ?>
            </div>
            <div class="work-types">
                <p>
                    <strong>Project Type: </strong>
                    <?php
                        $count = 1;
                        foreach($categories as $cat): 
                            echo esc_html( $cat->name );
                            echo $count != $catCount ? ", " : "";
                            $personalProj = $cat->name == "Personal Project" ? 1 : 0;
                            $count++;
                        endforeach; 
                    ?>
                </p>
            </div>
            <div class="work-cta">
                <?php if($personalProj == 1): ?>
                    <a target="_blank" href="<?php echo esc_attr( get_post_meta( $previewID, '_works_proj_link', true ) ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"/></svg>
                        Github
                    </a>
                <?php else: ?>
                    <a target="_blank" href="<?php echo esc_attr( get_post_meta( $previewID, '_works_proj_link', true ) ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg>
                        View Site
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="work-lists">
        <div class="work-list-items">
            <h2>Projects List</h2>
            <ul>
                <?php for($work = 0; $work < $projectCount; $work++): ?>
                <li data-value="<?php echo esc_attr( $projectArray[$work] ); ?>" class="<?php echo $work == 0 ? "active" : ""; ?>"><span><?php echo get_the_title($projectArray[$work]); ?></span></li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
</section>