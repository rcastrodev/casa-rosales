$('.toggle').click(function(e){
    e.preventDefault()
    $(this).siblings('ul').toggle();
})