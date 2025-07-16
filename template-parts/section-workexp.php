<?php
    $fulltime = array();
    $parttime = array();
    $tagarray = array();
    $datefrom;
    $dateto;

    $query = new WP_Query(array(
        'post_type'         => 'work-exp',
        'posts_per_page'    => -1,
    ));
    if($query->have_posts()):
        while($query->have_posts()):$query->the_post();
            $theid = get_the_ID();
            $tags = get_the_tags( $theid );
            if(!empty($tags) && is_array($tags)):
                foreach($tags as $tag){
                    array_push($tagarray, $tag->slug);
                }
                if(!empty($tagarray && in_array("fulltime", $tagarray))):
                    array_push($fulltime, $theid);
                else:
                    array_push( $parttime, $theid);
                endif;
            else:
                array_push( $parttime, $theid);
            endif;
            
        endwhile;
        wp_reset_postdata(  );
    endif;
?>
<section id="work-exp" class="work-exp portfolio-content">
    <div id="work-exp-list">
        <div id="ft">
            <h2>Full-Time</h2>
            <div class="h-divider"></div>
            <?php 
                for($workitem = 0; $workitem < count($fulltime); $workitem++):
                    $theid = $fulltime[$workitem]; 
                    $title = get_the_title( $theid );
                    if(!empty(get_post_meta( $theid, '_exp_from', true ))){
                        $datefrom = get_post_meta( $theid, '_exp_from', true );
                    }
                    if(!empty(get_post_meta( $theid, '_exp_to', true ))){
                        $dateto = get_post_meta( $theid, '_exp_to', true );
                    }else{
                        $dateto = "Present";
                    }
                    
            ?>
                
            <div id="full-time-list" data-value="<?php echo esc_attr($theid); ?>" class="work-exp-item">
                <h3><?php echo esc_html($title); ?></h3>
                <?php if(!empty($datefrom) || !empty($dateto)): ?>
                    <p><?php echo esc_html( $datefrom )." - ". esc_html( $dateto ); ?></p>
                <?php endif;?>
            </div>
            <?php endfor; ?>
        </div>
        <div id="pt">
            <h2>Part-Time</h2>
            <div class="h-divider"></div>
                    <?php 
                for($workitem = 0; $workitem < count($parttime); $workitem++):
                    $theid = $parttime[$workitem]; 
                    $title = get_the_title( $theid );
            ?>
                
            <div id="part-time-list" data-value="<?php echo esc_attr($theid); ?>" class="work-exp-item">
                <h3><?php echo esc_html($title); ?></h3>
            </div>
            <?php endfor; ?>
        </div>
    </div>
    <div class="work-exp-content">
        <p><---- Click the company name to get details.</p>
    </div>
    
</section>