jQuery(document).ready(function($) {
	/* Menu - Superfish */
	$('ul.menu').supersubs({ 
		minWidth:    12,
		maxWidth:    100,
		extraWidth:  1    
	}).superfish({ 
		hoverClass: "sfHover", 
		speed: 'fast', 
		dropShadows: false, 
		delay: 0, 
		animation: {height:'show'}
	});
	/* Pretty Photo */
	$("a[rel^='prettyPhoto']").prettyPhoto({ "overlay_gallery": false, "deeplinking": false, "show_title": false, "social_tools": false });
	
	/* Responsive Videos */
	$(".format-video .postheader, .video_frame").fitVids();
	
	/* Responsive Menu */
	$("#responsive-nav select").change(function() {
			window.location = $(this).find("option:selected").val();
	});

	/* Equal Heights */
	var biggestHeight = 0;
	$('.gallerycolumns li').each(function(){  
	    if($(this).height() > biggestHeight){  
	        biggestHeight = $(this).height();  
	    }  
	});  
	$('.gallerycolumns li').height(biggestHeight); 
	
	/* Responsive Dropdown */
	if (!jQuery.browser.opera) {
        $('select.responsive-select').each(function(){
            var title = $(this).attr('title');
            if( jQuery('option:selected', this).val() != ''  ) title = jQuery('option:selected',this).text();
            $(this)
                .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
                .after('<span class="select">' + title + '</span>')
                .change(function(){
                    val = jQuery('option:selected',this).text();
                    jQuery(this).next().text(val);
                    })
		});

	};
	
	/* Hover Effects */        
    $('a.ffthumbnail').hover(function() {
    	$(this).children('img').stop(true, true).animate({opacity : 0.1}, 500);
		$(this).children('.overlay').stop(true, true).fadeIn('500');
    }, function() {
    	$(this).children('img').stop(true, true).animate({opacity : 1}, 500);
    	$(this).children('.overlay').stop(true, true).fadeOut('500');
    });
    
    
    /* Scroll To Top */
    $('.seperator a').on('click', function () {
    	$('html, body').animate({ scrollTop: 0 }, 'slow');
    	return false;
    });
    
    //Fix z-index youtube video embedding
	$(document).ready(function (){
	    $('iframe').each(function(){
	        var url = $(this).attr("src");
	        $(this).attr("src",url+"?wmode=transparent");
	    });
	});
    
});