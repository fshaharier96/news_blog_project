$('.show').click(function(){
    $('.header-search-side-menu').show();
    $('.hide').show();
    $('.show').hide();
})

$('.hide').click(function(){
    $('.header-search-side-menu').hide();
    $('.hide').hide();
    $('.show').show();
})

// bell-icon js code

$('#bell-id').click(function(){
     $(".header-bell-container").toggle();  
})