var recognition = new webkitSpeechRecognition();
recognition.continuous = false;
recognition.interimResults = true;
recognition.onresult = function(event) {
  if(event.results[0].isFinal==1){
  console.log(event.results[0][0].transcript)
  }
}
recognition.onend = function(){
  recognition.start();
}
recognition.start();
