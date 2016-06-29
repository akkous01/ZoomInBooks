$(document).ready(
	function(){
	    $("#ithika").hover(
	    	function(){
	        	$("#ithika").hide();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").show();

	        	$("#ithika_new").show();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	    	}
	    );

	     $("#sindesi").hover(
	    	function(){
	        	$("#ithika").show();
	        	$("#sindesi").hide();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").show();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	    	}
	    );

	     $("#epipleon").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").hide();
	        	$("#analisi").show();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").show();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").hide();
	        	
	    	}
	    );

	     $("#analisi").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").hide();
	        	$("#gramatiki").show();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").show();
	        	$("#gramatiki_new").hide();
	        	
	    	}
	    );

	    $("#gramatiki").hover(
	    	function(){
	    		$("#ithika").show();
	        	$("#sindesi").show();
	        	$("#epipleon").show();
	        	$("#analisi").show();
	        	$("#gramatiki").hide();
	        	
	        	$("#ithika_new").hide();
	        	$("#sindesi_new").hide();
	        	$("#epipleon_new").hide();
	        	$("#analisi_new").hide();
	        	$("#gramatiki_new").show();
	        	
	    	}
	    );

	    var top = $('header').offset().top - parseFloat($('header').css('marginTop').replace(/auto/, 0));
    	$(window).scroll(function (event) {
	        var y = $(this).scrollTop();
	        //if y > top, it means that if we scroll down any more, parts of our element will be outside the viewport
	        //so we move the element down so that it remains in view.
	        if (y >= top) {
	           var difference = y - top;
	           $('header').css("top",difference);
	       }
   		});


   		 $("#ithiki_tab").click(
	    	function(){
	    		$("#ithiki_box").show();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	   
	        	
	    	}
	    );

   		  $("#sindesi_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").show();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	   
	        	
	    	}
	    );

   		 $("#epipleon_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").show();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").hide();
	   
	        	
	    	}
	    );

   		 $("#gramatiki_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").show();
	        	$("#analisi_box").hide();
	   
	        	
	    	}
	    );

   		 $("#analisi_tab").click(
	    	function(){
	    		$("#ithiki_box").hide();
	        	$("#sindesi_box").hide();
	        	$("#epipleon_box").hide();
	        	$("#gramatiki_box").hide();
	        	$("#analisi_box").show();
	   
	        	
	    	}
	    );



	}
	
);