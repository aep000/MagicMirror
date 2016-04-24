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
function getData(url, data){
	$.ajax({
		type: "GET",
		url: "youtube/index.php",
		data: {
			search : data
		},
		success: function(data, status, xhr) {
			return data;
			console.log(data) //TODO check response type, delegate to functions
		},
		error: function(jqXHR, status, error) {
			console.log(error);
		}
	});
}
function show(data){
	$('.compliment').html(data, 400);
}

function youtube(data){
	if (checkFront(data,"play")){
		data = data.slice(4);
		url = "youtube/index.php";
		show(getData(url,data));
	}
}
function maps(data){
	if (checkFront(data,"how is my commute") || checkFront(data,"how's my commute") || checkFront(data,"how bad is the traffic this morning")){
		url = "maps/index.php"
		show(getData(url,data));
	}
}


var recognition = new webkitSpeechRecognition();
recognition.lang = 'en-EN';
recognition.continuous = false;
recognition.interimResults = true;
recognition.onresult = function(event) {
	if(event.results[0].isFinal==1 && event.results[0][0].transcript.toLowerCase().indexOf("mirror mirror") == 0){
		var data = event.results[0][0].transcript.slice(13);
		console.log(data);
		youtube(data);
		maps(data);
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
