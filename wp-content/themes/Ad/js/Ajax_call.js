


$('#load_more_button').on('click', function() {
    $.ajax({
        type: "GET",
        url: "/wp-json/wp/v2/posts?per_page=2&order=asc&orderby=title"+dataString+"&callback=?",
        dataType: 'JSONP',
        success: function(data){
            console.log(data);
    }
})
});
