
class reiMain {
    workupdate(id){
        jQuery.ajax({
            type: "POST",
            url: '/wp-admin/admin-ajax.php?action=update_work_preview',

            data: {workid:id},
            success: function(data){
                jQuery(".work-preview-img").html(data);
            }
        });
    }
}

jQuery(document).ready(function(){
    var reimain = new reiMain();
    jQuery(".work-list-items ul li").click(function(){
        var the_id = jQuery(this).data("value");
        console.log(the_id);
        reimain.workupdate(the_id);
    });
});
