var recognition = new webkitSpeechRecognition();
recognition.lang = 'en-EN';
recognition.continuous = false;
recognition.interimResults = true;
recognition.onresult = function(event) {
  if(event.results[0].isFinal==1){
  console.log(event.results[0][0].transcript)
  $.post("http://172.31.168.171/MagicMirror/Speech Part/backendAdd.php",{
        text: event.results[0][0].transcript
    }
    ,function(data, status){
        console.log("Data: " + data + "\nStatus: " + status);
    });
  }
}
recognition.onend = function(){
  recognition.start();
}
recognition.start();
