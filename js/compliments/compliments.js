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
compliments.updateCompliment = function (compliment) {



	$('.compliment').updateWithText(compliment, compliments.fadeInterval);

}

compliments.init = function () {

	this.updateCompliment();

}
