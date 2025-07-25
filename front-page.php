<?php 
    /* TEMPLATE NAME: Home*/
    get_header(); 
    
?>
<div class="content-container">
    <div class="top-items">
        <div class="section-identifier">
            <div class="scroll-identifier-container">
                <span>HOME</span>
                <span>WORKS</span>
                <span>TECHS-TOOLS</span>
                <span>HISTORY & EXP</span>
                <span>CONTACT</span>
            </div>
        </div>
        <div class="h-divider"></div>
        <div class="top-ctas">
            <div class="theme-btn"></div>
            <a target="_blank" href="<?php echo get_home_url(); ?>/wp-content/uploads/2025/07/Ma_Angelica_Arevalo-Resume-2025.pdf" class="resume-btn">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 242.7-73.4-73.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l128 128c12.5 12.5 32.8 12.5 45.3 0l128-128c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L288 274.7 288 32zM64 352c-35.3 0-64 28.7-64 64l0 32c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-32c0-35.3-28.7-64-64-64l-101.5 0-45.3 45.3c-25 25-65.5 25-90.5 0L165.5 352 64 352zm368 56a24 24 0 1 1 0 48 24 24 0 1 1 0-48z"/></svg>
                </span>
                Download my Resume
            </a>
        </div>
    </div>
    <?php get_template_part( 'template-parts/section-hero' ); ?>
    <?php get_template_part( 'template-parts/section-works' ); ?>
    <?php get_template_part( 'template-parts/section-techs' ); ?>
    <?php get_template_part( 'template-parts/section-workexp' ); ?>
</div>
<?php get_footer(); ?>