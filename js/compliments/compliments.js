var compliments = {
	complimentLocation: '.compliment',
	currentCompliment: '',
	lastCompliment: '',
	complimentList: {
		'morning': config.compliments.morning,
		'afternoon': config.compliments.afternoon,
		'evening': config.compliments.evening
	},
	updateInterval: config.compliments.interval || 300,
	fadeInterval: config.compliments.fadeInterval || 400,
	intervalId: null
};

/**
 * Changes the compliment visible on the screen
 */
<<<<<<< HEAD
compliments.updateCompliment = function (compliment) {
=======
compliments.updateCompliment = function () {
	$.post("./backend/index.php",{
        text: "NOTHING"
    }
    ,function(data, status){
				console.log(compliments.currentCompliment);
        if(data == compliments.currentCompliment || compliments.lastCompliment == data){
					compliments.currentCompliment = " ";
					compliments.lastCompliment = data;
				}
				else{
					compliments.currentCompliment = data;
				}
    });
>>>>>>> e62f45c4ad9b1143cefe502c8cf3b19bc07e5ce0



	$('.compliment').updateWithText(compliment, compliments.fadeInterval);

}

compliments.init = function () {

	this.updateCompliment();

}
