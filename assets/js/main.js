
class ReiMain {

    constructor(){
        this.bindEvents();
    }

    bindEvents(){
        jQuery(".work-list-items ul").on("click", "li", (e)=>{
            jQuery(".work-list-items ul li").removeClass("active");
            jQuery(e.currentTarget).addClass("active");
            var the_id = jQuery(e.currentTarget).data("value");
            this.workupdate(the_id);
        });
    }
    workupdate(id){
        jQuery.ajax({
            type: "POST",
            url: reiAjax.ajaxurl,

            data: {action: 'rei_update_work_preview', workid:id},
            success: function(data){
                jQuery(".work-preview").html(data);
                console.log(data);
            }
        });
    }
}

jQuery(() => new ReiMain);
