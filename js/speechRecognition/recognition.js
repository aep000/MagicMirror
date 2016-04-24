var recognition = new webkitSpeechRecognition();
recognition.lang = 'en-EN';
recognition.continuous = false;
recognition.interimResults = true;
recognition.onresult = function(event) {
  if(event.results[0].isFinal==1 && event.results[0][0].transcript.toLowerCase().indexOf("mirror mirror") == 0){
<<<<<<< HEAD:js/speechRecognition/recognition.js
  retval = commands.init(event.results[0][0].transcript);
  compliments.updateCompliment(retval);
}
else{
  compliments.updateCompliment("");
=======
  console.log(event.results[0][0].transcript)
		$.ajax({
			type: "GET",
			url: "./backend/speech.php",
			data: {
				speech : event.results[0][0].transcript
			},
			success: function(data, status, xhr) {
				console.log(data) //TODO check response type, delegate to functions
			},
			error: function(jqXHR, status, error) {
				console.log(error);
			}
		});


>>>>>>> e62f45c4ad9b1143cefe502c8cf3b19bc07e5ce0:speechRecognition/js/index.js
}
}
recognition.onend = function(){
  recognition.start();
}
recognition.start();
