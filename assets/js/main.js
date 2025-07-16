
class ReiMain {

    constructor(){
        this.bindEvents();
    }

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
    }
    workupdate(id, dataaction){
        jQuery.ajax({
            type: "POST",
            url: reiAjax.ajaxurl,

            data: {action: dataaction, workid:id},
            success: function(data){
                if(dataaction == "rei_update_work_preview"){
                    jQuery(".work-preview").html(data);
                    console.log(data);
                }else{
                    jQuery(".work-exp-content").html(data);
                    console.log(data);
                }
            }
        });
    }

}

jQuery(() => new ReiMain);
