
class ReiMain {

    constructor(){
        this.bindEvents();
        this.contentScroll();
        this.owlcarousel();
    }
    //BindEvents for window scroll
    contentScroll() {
        let prevPlace = 0; // pixel scroll position
        let prevPlacing = 0; // section number

        const secNum = jQuery(".content-container").find("section").length;
        let sectionHeight = jQuery("section").outerHeight();
        window.addEventListener("resize", function () {
          sectionHeight = jQuery("section").outerHeight();
        });

        const indicator = 30;

        jQuery(window).on("scroll", () => {
            const currentPlace = jQuery(window).scrollTop();

            for (let win = 1; win <= secNum; win++) {
            const secPosStart = sectionHeight * (win - 1);
            const secPosEnd = sectionHeight * win;

                if (currentPlace >= secPosStart && currentPlace < secPosEnd) {
                    const currPlacing = win;

                    if (currPlacing !== prevPlacing) {
                        const topindicator = ((indicator * (currPlacing - 1)) * -1) + 'px';

                        jQuery(".scroll-identifier-container")
                            .stop(true, false)
                            .animate({ top: topindicator }, 500);

                        prevPlacing = currPlacing; // update section only AFTER animation
                    }

                    break; // exit loop once matched
                }
            }

            prevPlace = currentPlace; // update scroll position AFTER loop
        });
    }

    //BindEvents for on click
    bindEvents(){
        jQuery(".work-list-items ul").on("click", "li", (e)=>{
            jQuery(".work-list-items ul li").removeClass("active");
            jQuery(e.currentTarget).addClass("active");
            var the_id = jQuery(e.currentTarget).data("value");
            this.workupdate(the_id, "rei_update_work_preview");
        });

        jQuery("#work-exp-list > div").on("click", ".work-exp-item", (e)=>{
            var the_id = jQuery(e.currentTarget).data("value");
            this.workupdate(the_id, "rei_update_exp_details_preview");
        });

        jQuery(".section-links span").on("click", function () {
            const target = jQuery(this).data("target"); // e.g., "#about"
            const offset = jQuery(target).offset().top;

            jQuery("html, body").animate({ scrollTop: offset }, 800);
        });

        jQuery(".menu-toggle").on("click", function () {
            jQuery("ul.section-links").toggleClass("active");
        })
    }
    workupdate(id, dataaction){
        jQuery.ajax({
            type: "POST",
            url: reiAjax.ajaxurl,

            data: {action: dataaction, workid:id},
            success: function(data){
                //If works
                if(dataaction == "rei_update_work_preview"){
                    jQuery(".work-preview").html(data);
                }else{
                    //Else Work Exp
                    jQuery(".work-exp-content").html(data);
                }
            }
        });
    }
    owlcarousel(){
        jQuery('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    }
}

jQuery(() => new ReiMain);
