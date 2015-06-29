/**
 * Created by Hp on 2015/6/16.
 */
//$(function(){
   // $('#depot').focus();
    //$('#depot').click(function(e){ //also $('#search_form').on("submit",function(e){
      // e.preventDefault();
   // });

    $("#depot").click(function(){
        var d = $(this).attr('alt');
        //$('#logo').html('<h2>Manuel ATENCIA\'s search engine</h2><hr />');
        //$('#results').html('<h2><img src="images/loading.gif" width="22" alt="" />Loading</h2>');

        $.ajax({

            type: 'POST',
            url: "../entreprise/mes depots.php",
            data: d,
            success: function(resp){
                if(resp!=''){
                    $("#mesDepots").html(resp);
                }
            }
        });
        return false;
   // });
});