var viewportWidth = $(window).width();

$( window ).resize(function() {
    viewportWidth = $(window).width();
});
  
$(document).ready(function(){
    $('.has-dropdown > .nav-link, .navbar-toggler').on('click', function(e){
        e.preventDefault();
        if(viewportWidth < 1200){
            $('.nav-dropdown-hoverable').slideUp();
            $(this).siblings('.nav-dropdown-hoverable').slideDown();
        }
    });
}); 