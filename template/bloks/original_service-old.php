<div class="row span9 artists-content">
	<?=getOriginalServiceBlock()?>
</div>
<script type="text/javascript">
	$(window).load(function() {
		$('#slider').nivoSlider({
	        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
	        slices: 8, // For slice animations
	        boxCols: 4, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: 900, // Slide transition speed
	        pauseTime: 5000, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: false, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: true, // Start on a random slide
    	});
        $("a.grouped_elements").fancybox({
            maxHeight   : '600',
            prevEffect  : 'fade',
            nextEffect  : 'fade',
            nextClick   : true,
            helpers : {
                title   : {
                    type: 'inside'
                },
                thumbs  : {
                    width   : 100,
                    height  : 50
                }
            }
        });
        $('.art-view').click(function(){
            var id = $(this).attr('id');
            var sub = id.slice(3,5);
            var block_id = '#add-'+id;
            var curr = $(block_id).css('display');
            var block = $(this).next();

            if(curr=='none'){
                $(this).text('Свернуть');
                if(block.hasClass('flagged')==false){
                    block.addClass('flagged');
                    getInfo(sub,block_id);
                }
                else{$(block_id).fadeIn('slow');}
            }
            else{
                $(this).text('Подробнее...');
                $(block_id).fadeOut();
            }
        });
        function addBlock(block_id,sub,full_img,tumb_img){
            var folder = 'orig_service'; 
            $(block_id).append("<div class='span2 artist-add-photo'><a href='img/"+folder+"/"+sub+"/"+full_img+"' class='grouped_elements' rel='group"+sub+"'><img src='img/"+folder+"/"+sub+"/"+tumb_img+"' alt=''></a></div>");
        }
        function getInfo(sub,block_id){
            $.ajax({
                type: "POST",
                url: "jquery/jq_photoblock.php",
                data: ({
                    id : sub,
                    type: '5'
                    }),
                success: function(msg){
                    var arr_ph = JSON.parse(msg);
                    for(var i=0; i<arr_ph.length; i++) {
                        addBlock(block_id,sub,arr_ph[i]['photo'],arr_ph[i]['photo_t']);
                    }
                    $(block_id).fadeIn('slow');
                }
            });
        }

	});
</script>