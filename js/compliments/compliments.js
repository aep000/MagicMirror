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
compliments.updateCompliment = function () {
	$.post("http://172.31.168.171/MagicMirror/Speech Part/backendGet.php",{
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




	$('.compliment').updateWithText(compliments.currentCompliment, compliments.fadeInterval);

}

compliments.init = function () {

	this.updateCompliment();

	this.intervalId = setInterval(function () {
		this.updateCompliment();
	}.bind(this), this.updateInterval)

}
