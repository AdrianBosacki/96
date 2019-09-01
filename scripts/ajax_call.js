
window.current_post = 4
window.current_page = 3
$('#load_more_button').on('click', function() {

    

    window.current_post = window.current_post + 2;
    window.current_page = window.current_page +1;

    console.log("START c post");
    console.log(window.current_post)
    console.log(window.current_page)


    if (window.current_post >= window.posts_count){
        $("#load_more_button").text("that's all");
        return;
    }
  

    //var API_url = "http://localhost/wp-json/wp/v2/posts?_embed&";

    $.ajax({
        type: "get",
        url: "http://localhost/wp-json/wp/v2/posts?_embed&per_page=2&order=asc&orderby=title",        
        cache: false,
        dataType: "json",
        data: {
            page: current_page,
        },
        contentType: "application/json; charset=UTF-8",        
        success: function(data, textStatus, xhr) {
            console.log(data);
            console.log("ile postów:");
            window.posts_count = xhr.getResponseHeader("x-wp-total");
            console.log(window.posts_count);

            $.each( data, function( i, item ) {
                window.kk=item;
    
                var article = document.createElement("div");
                $(article).attr("class", "posts_list__article");
                $('#sec_posts_list').append(article);
    
                    var posts_list_img_wrap = document.createElement("div");
                    $(posts_list_img_wrap).attr("class", "posts_list_img-wrap");
                    $(article).append(posts_list_img_wrap);
    
                        var link = document.createElement("a");
                        $(link).attr("href", item.link);
                        $(posts_list_img_wrap).append(link);
    
                            var image = document.createElement("img");
                            var imgsrc='/wp-content/uploads/'+window.kk._embedded["wp:featuredmedia"][0].media_details.file
                            $(image).attr("src", imgsrc);
                            $(image).attr("class", "posts_list_image");
                            $(link).append(image);
    
                    var small_text1 = document.createElement("div");
                    $(small_text1).attr("class", "small_text1");
                    $(article).append(small_text1);
                        $(small_text1).append("LIFESTYLE");
    
                    var posts_list__h2 = document.createElement("h2");
                    $(posts_list__h2).attr("class", "posts_list__h2");
                    $(article).append(posts_list__h2);
    
                        var link2 = document.createElement("a");
                        $(link2).attr("href", item.link);
                        $(posts_list__h2).append(link2);
                        $(link2).append(item.title.rendered);
    
                    var posts_p = document.createElement("posts_p");                
                    $(article).append(posts_p);
                    $(posts_p).append(item.excerpt.rendered); 
            });


        },
        error: function (xhr, textStatus, errorThrown) {
            console.log(errorThrown);
        }});

});
