if(!Modernizr.svg) {
    $('img[src$=".svg"]').attr('src', function() {
        return $(this).attr('src').replace('.svg', '.png');
    }); // suport for png. no forgar !
}



$('.sm-box').delay( 800 ).slideUp( );

$('.add-to-cart').on('click', function(){
  
  $.ajax({
    url: BASE_URL + "store/add_to_cart",
    type: "get",
    dataType: "html",
    data: { id: $(this).data('id') },
    success: function (response) {
      location.reload();
    }
  });
  
  





});

$('.apdate-cart-btn').on('click', function(){
    $.ajax({
        url: BASE_URL + "store/update_cart" ,
        type: "get",
        dataType: "html",
        data: {"id": $(this).data('id'), "op": $(this).data('op')},
        success: function (response) {
            location.reload();
        }
    }); 
});