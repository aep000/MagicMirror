<html>
<head>
	<title>Magic Mirror</title>
	<style type="text/css">
		<?php include('css/main.css') ?>
	</style>
	<link rel="stylesheet" type="text/css" href="css/weather-icons.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<script type="text/javascript">
		var gitHash = '<?php echo trim(`git rev-parse HEAD`) ?>';
	</script>
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="icon" href="data:;base64,iVBORw0KGgo=">
</head>
<body>

	<div class="top right"><div class="windsun small dimmed"></div><div class="temp"></div><div class="forecast small dimmed"></div></div>
	<div class="top left"><div class="date small dimmed"></div><div class="time" id="time"></div><div class="calendar xxsmall"></div></div>
	<div class="center-ver center-hor"><!-- <div class="dishwasher light">Vaatwasser is klaar!</div> --></div>
	<div class="lower-third center-hor"><div class="compliment light"></div></div>
	<div class="bottom center-hor"><div class="news medium"></div></div>

</div>

<script src="js/jquery.js"></script>
<script src="js/jquery.feedToJSON.js"></script>
<script src="js/ical_parser.js"></script>
<script src="js/moment-with-locales.min.js"></script>
<script src="js/config.js"></script>
<script src="js/rrule.js"></script>
<script src="js/version/version.js"></script>
<script src="js/calendar/calendar.js"></script>
<script src="js/weather/weather.js"></script>
<script src="js/time/time.js"></script>
<script src="js/news/news.js"></script>
<script src="js/main.js?nocache=<?php echo md5(microtime()) ?>"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.3.0/annyang.min.js"></script>
<script>
function speak(text){
	var speech = new SpeechSynthesisUtterance();
	var voices = window.speechSynthesis.getVoices();
	speech.voice = voices[2];
	speech.voiceURI = 'native';
	speech.volume = 1;
	speech.rate = 1;
	speech.lang = 'en-US';
	speech.text = text;

	speechSynthesis.speak(speech);
}
function checkFront(inp, val){
	return inp.indexOf(val) == 0;
}

function getData(url, data,func){
var retval = "";
	$.ajax({
		type: "GET",
		url: url,
		data: {
			search : data
		},
		success: function(data, status, xhr) {
			retval = data;
			func(retval);
			 //TODO check response type, delegate to functions
		},
		error: function(jqXHR, status, error) {
			return (error);
		}
	});
	return retval
}
function show(data){
	$('.compliment').html(data, 400);
}

function youtube(data){
	if (checkFront(data,"play")){
		data = data.slice(5);
		url = "youtube/index.php";
		var func = function(data){
			show(data);
		}
		retval = getData(url,data,func);
	}
}
function maps(data){
	if (checkFront(data,"how is my commute") || checkFront(data,"how's my commute") || checkFront(data,"how bad is the traffic this morning")){
		url = "maps/index.php"
		func = function(data){
			show(data);
		}
		show(getData(url,data,func));
	}
}
function halt(data){
	if (data == "stop"){
		show(" ");
	}
}
function snowWhite(data){
	if(data=="on the wall who's the fairest of them all"){
		show("Snow White");
		speak("Snow White");
		setTimeout(function(){
			halt("stop");
}, 2000);
	}
}

function sendIFTTT(val1,val2,val3,type,func){
var retval = "";
	$.ajax({
		type: "GET",
		url: "IFTTT/index.php",
		data: {
			val1 : val1,
			val2 : val2,
			val3 : val3,
			type : type
		},
		success: function(data, status, xhr) {
			retval = data;
			func(retval);
			 //TODO check response type, delegate to functions
		},
		error: function(jqXHR, status, error) {
			return (error);
		}
	});
	return retval
}

/*
IAN
sendIFTTT() should work for texting
so val1 should be the phone number
val2 should be the message you want to send
type you want to set to be "text_someone"
and val3 can be left as " "
func is the function you want to execute on completion. so go like the following:
func = function(data) and inside the function you can do what you want on completion of the text
maybe do something like speak("Text sent")

 */

function text(data){
	var vals = data.split(" ");
	if(vals[0]=="text"){
		var text = data.replace("text "+vals[1]+" ","");
		sendIFTTT(contacts[vals[1]],text,"","text_someone",function(data){
			speak("Text Sent");
		})
	}
}

var contacts = {
	"Jake":"+19087527625",
	"Ian":"+19083433025"
}


var recognition = new webkitSpeechRecognition();
recognition.lang = 'en-EN';
recognition.continuous = false;
recognition.interimResults = true;
recognition.onresult = function(event) {
	if(event.results[0].isFinal==1 && event.results[0][0].transcript.toLowerCase().indexOf("mirror mirror") == 0){
		var data = event.results[0][0].transcript.slice(14).toLowerCase();
		console.log(data);
		youtube(data);
		maps(data);
		halt(data);
		snowWhite(data);
		text(data);
}
}
recognition.onend = function(){
	recognition.start();
}
recognition.start();



</script>
<?php  include(dirname(__FILE__).'/controllers/modules.php');?>
</body>
</html>
