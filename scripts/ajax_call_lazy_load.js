// Api call start
window.current_post = 6
window.current_page = 4
$('#load_more_button').on('click', function() {

    if (window.current_post >= window.posts_count){
        $("#load_more_button").text("that's all");
        return;
    }
    $.ajax({
        type: "get",
        url: "/wp-json/wp/v2/posts?_embed&per_page=2&order=asc&orderby=title",
        cache: false,
        dataType: "json",
        data: {
            page: current_page,
        },
        contentType: "application/json; charset=UTF-8",
        success: function(data, textStatus, xhr) {            
            window.posts_count = xhr.getResponseHeader("x-wp-total");            

            $.each( data, function( i, item ) {               
    
                var article = document.createElement("div");
                $(article).attr("class", "posts_list__article");
                $('#sec_posts_list').append(article);                        

                if (item._embedded["wp:featuredmedia"]){ // Display thumbnail only if it exists

                    var posts_list_img_wrap = document.createElement("div");
                    $(posts_list_img_wrap).attr("class", "posts_list_img-wrap");
                    $(article).append(posts_list_img_wrap);

                        var link = document.createElement("a");
                        $(link).attr("href", item.link);
                        $(posts_list_img_wrap).append(link);

                            var image = document.createElement("img");
                            var imgsrc='/wp-content/uploads/'+item._embedded["wp:featuredmedia"][0].media_details.file;
                            $(image).attr("src", imgsrc);
                            $(image).attr("class", "posts_list_image");
                            $(link).append(image);
                }

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
            window.current_post = 6
            window.current_page = 4
        }});

    window.current_post = window.current_post + 2;
    window.current_page = window.current_page +1;

});
// Api call end


// Toggle mobile menu START

$(document).ready(function(){
    $("#menu-button").click(function(){
         $("#mobile-menu").slideToggle();
     });    
    $('body').click(function(evt){
        
    if(evt.target.id == "mobile-menu")
        return;
        if(evt.target.id == "menu-button")
        return;

    if($(evt.target).closest('#mobile-menu').length)
        return;
        
    $("#mobile-menu").slideUp();
    }); 
 });
// Toggle mobile menu END
 


// Lazy load start
// Plugin for lazy loading images
'use strict';var images=document.querySelectorAll('.js-lazy-image'),config={rootMargin:'50px 0px',threshold:0.01},imageCount=images.length,observer;if(!('IntersectionObserver'in window))loadImagesImmediately(images);else{observer=new IntersectionObserver(onIntersection,config);for(var image,i=0;i<images.length;i++)(image=images[i],!image.classList.contains('js-lazy-image--handled'))&&observer.observe(image)}function fetchImage(a){return new Promise(function(b,c){var d=new Image;d.src=a,d.onload=b,d.onerror=c})}function preloadImage(a){var b=a.dataset.src;return b?fetchImage(b).then(function(){applyImage(a,b)}):void 0}function loadImagesImmediately(a){for(var d,b=Array.from(a),c=0;c<a.length;c++)d=a[c],preloadImage(d)}function disconnect(){observer&&observer.disconnect()}function onIntersection(a){0===imageCount&&observer.disconnect();for(var c,b=0;b<a.length;b++)c=a[b],0<c.intersectionRatio&&(imageCount--,observer.unobserve(c.target),preloadImage(c.target))}function applyImage(a,b){a.classList.add('js-lazy-image--handled'),a.src=b,a.classList.add('fade-in')}
// Lazy load end 
