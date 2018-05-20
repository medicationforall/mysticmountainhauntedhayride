$(document).ready(function(){
	console.log('cubeSlider')

	rotation = 0;
    
   /* $(".link").click(function(event){
		event.preventDefault();
		console.log('clicked link')
        calcRotation(roty,rotx);
    });

    function calcRotation(roty,rotx){
		//console.log('translate z is',transform);
		$("#cube").css("transform", "rotateY(-" + roty + "deg) rotateX(" + rotx + "deg)");
    }*/

	var intervalID = window.setInterval(staticCalcRotation, 12000);

    function staticCalcRotation(){
		rotation+=90
		$("#cube").css("transform", "rotateY(-" + rotation + "deg)");
    }
});
