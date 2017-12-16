function togglesidebar() {
	document.getElementById("menu").classList.toggle('active');
}

var count=1;
        var total=5;
		function slide(x) {
			var image = document.getElementById("image");
            count+=x;
            if(count>total){           	
              count=1;
            }
            if (count<1) {
            	count=total;
            }
            image.src= count+".jpg";
		}

	  window.setInterval(function sliderA(){
			var image = document.getElementById("image");
            count+=1;
            if(count==1){           	
              count=total;
            }
            if (count==total) {
            	count=1;
            }
            image.src= count+".jpg";
		}, 4000);