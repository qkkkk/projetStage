/**
 * Created by Hp on 2015/6/16.
 */
$(function(){
    $('#search').focus();
    $('#search_form').submit(function(e){ //also $('#search_form').on("submit",function(e){
        e.preventDefault();
    });

    $('#search').keyup(function(){
        var sent = $('#search').val();
        $('#logo').html('<h2>Manuel ATENCIA\'s search engine</h2><hr />');
        $('#results').html('<h2><img src="images/loading.gif" width="22" alt="" />Loading</h2>');

        $.ajax({
            type: 'POST',
            url: 'php/mes depots.php',
            data: {search : sent},
            success: function(resp){
                if(resp!=''){
                    $('#mesDepots').html(resp);
                }
            }
        });
    });
});