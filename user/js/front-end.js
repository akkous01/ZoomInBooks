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


	}
	
);