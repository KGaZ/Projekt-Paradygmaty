var button;
var image;
var searchBar;
var options = [];


function saveData() {

	var elements = document.querySelectorAll('.customCheckbox');
	for(var i = 0; i < elements.length; i++) {

		var item = elements[i];

		localStorage.setItem(item.name, item.checked);

	}

}

function loadSettings() {

	document.addEventListener('keydown', (event) => {

		var name = event.key;
		var code = event.code;

		
	}, false);

	if(localStorage.getItem("defined3") == undefined) {

		localStorage.setItem("defined3", true);

		localStorage.setItem('Trójkąt warszawski', true);
		localStorage.setItem('Umowa o dzieło', true);
		localStorage.setItem('Wosk', true);
		localStorage.setItem('Marmur', true);
		localStorage.setItem('Szprycer', true);
		localStorage.setItem('Soma 0.5', true);
		localStorage.setItem('Soma 0.25', true);
		localStorage.setItem('Café Belga', true);
		localStorage.setItem('Flagey', true);
		localStorage.setItem('Pocztówka z WWA, lato `19', true);
		localStorage.setItem('Jarmark', true);
		localStorage.setItem('Europa', true);

	}

	var elements = document.querySelectorAll('.customCheckbox');
	for(var i = 0; i < elements.length; i++) {

		var item = elements[i];

		//console.log(localStorage.getItem(item.name));

		if(localStorage.getItem(item.name) === "false") continue;

		item.checked = localStorage.getItem(item.name);

	}

	reset();

}

function checkAll() {

	var elements = document.querySelectorAll('.customCheckbox');
	for(var i = 0; i < elements.length; i++) {

		var item = elements[i];

		//console.log(localStorage.getItem(item.name));

		if(localStorage.getItem(item.name) === "false") continue;

		return true;

	}

	return false;

}

function reset() {

	var mainFrame = document.getElementById("mainBlock");

	image = document.getElementById("albumImage");

	image.innerHTML = "";

	if(button != undefined) mainFrame.appendChild(button);

	var sele = document.getElementsByClassName("cos123");

	for(var i = sele.length-1; i >= 0; i--) {

		sele[i].remove();

	}

	if(searchBar != null) {

		document.body.appendChild(searchBar);

	}

	if(options.length != 0) {

		var elements = document.querySelectorAll('.track');
		for(var i = 0; i < elements.length; i++) {

			var item = elements[i];

			item.remove();

		}

		var datalist = document.getElementById("texts");

		options.forEach(function(item) {

			datalist.appendChild(item);

		});

		options = [];

	}

	var keyDiv = document.getElementById("pokoj");

	var string = httpGet("http://146.59.52.219/getRandom.php");

	if(!(keyDiv === null)) {

		var key = keyDiv.getAttribute('name');
		var points = (document.getElementById("punkty").innerHTML);
		var url = 'http://146.59.52.219/getRandom.php?keyId='+String(key)+String(points);
		string = httpGet(url);

	}

	var split = string.split("&");

	if(!checkAll()) {

		split[0] = "¯\\_(ツ)_/¯";
		split[1] = "Nie ma";
		split[2] = "Nie ma";
		split[3] = "albums/trollface.jpg";

	}

	var additional = 0;

	while(localStorage.getItem(split[2]) === "false") {

		additional++;
		
		var string = httpGet("http://146.59.52.219/getRandom.php");

		if(!(keyDiv === null)) {

			var key = keyDiv.getAttribute('name');
			var points = (document.getElementById("punkty").innerHTML);
			var url = 'http://146.59.52.219/getRandom.php?keyId='+String(key)+String(points)+String(additional);
			string = httpGet(url);

		}

		var split = string.split("&");

	}

	var citation = document.getElementById("citation");

	// Z jakiego utworu pochodzi:</br></br>

	var dailyTrack = document.getElementById("dailyTrack");
	var dailyAlbum = document.getElementById("dailyAlbum");
	var dailyImage = document.getElementById("dailyImage");

	dailyTrack.setAttribute('name', split[1]);
	dailyAlbum.setAttribute('name', split[2]);
	dailyImage.setAttribute('name', split[3]);

	dailyTrack.setAttribute('gdzieSiePatrzysz', 'Nie oszukuj!');

	dailyTrack.remove();
	dailyAlbum.remove();
	dailyImage.remove();

	citation.innerHTML = ' Z jakiego utworu pochodzi:</br></br>'+split[0];

	document.body.appendChild(dailyTrack);
	document.body.appendChild(dailyAlbum);
	document.body.appendChild(dailyImage);
	

}

function showHint() {

	button = document.getElementById("podpowiedz");
	button.remove();
	
	image = document.getElementById("albumImage");
	var dailyImage = document.getElementById("dailyImage");

	image.innerHTML = '<img src = "' + dailyImage.getAttribute('name') + '" width=30% height=30% class="zdjencie"/>';

	var dailyAlbum = document.getElementById("dailyAlbum");

	var elements = document.querySelectorAll('.track');
	for(var i = 0; i < elements.length; i++) {

		var item = elements[i];

		options.push(item);

		if(item.classList.contains(dailyAlbum.getAttribute("name").replaceAll(' ', ''))) continue;

		item.remove();

	}

	//image.innerHTML = httpGet("http://146.59.52.219/getRandom.php");

}

function httpGet(theUrl) {

    var xmlHttp = new XMLHttpRequest();

    xmlHttp.open( "GET", theUrl, false );
    
    xmlHttp.send( null );

    return xmlHttp.responseText;

}

var maxParticleCount = 150; //set max confetti count

function search() {

	var input = document.getElementById("wyszukajKGaZ");

	var goal = document.getElementById("dailyTrack").getAttribute('name');

	if(input.value == "") return;

	if(input.value.toLowerCase() + ".txt" == goal.toLowerCase()) {

		input.backgroundColor = "red";
	
		var newDiv = document.createElement("div");
		var content = document.createTextNode(input.value);
		newDiv.appendChild(content);
		newDiv.classList.add("right");
		newDiv.classList.add("cos123");
		document.getElementById("wrongList").insertBefore(newDiv, document.getElementById("wrongList").firstChild);

		document.getElementById("punkty").innerHTML = parseInt(document.getElementById("punkty").innerHTML)+1;

		searchBar = document.getElementById("search");

		searchBar.remove();

		reset();

		maxParticleCount = 30 + (15 * parseInt((document.getElementById("punkty").innerHTML)));

		startConfetti();
		setTimeout(
			function() {
				stopConfetti();
			}, 1200);

	} else {

		var newDiv = document.createElement("div");
		var content = document.createTextNode(input.value);
		newDiv.appendChild(content);
		newDiv.classList.add("wrong");
		newDiv.classList.add("cos123");

		document.getElementById("punkty").innerHTML = "0";

		document.getElementById("wrongList").insertBefore(newDiv, document.getElementById("wrongList").firstChild);

	}

	input.value = "";

}

var particleSpeed = 2; //set the particle animation speed
var startConfetti; //call to start confetti animation
var stopConfetti; //call to stop adding confetti
var toggleConfetti; //call to start or stop the confetti animation depending on whether it's already running
var removeConfetti; //call to stop the confetti animation and remove all confetti immediately

(function() {
	startConfetti = startConfettiInner;
	stopConfetti = stopConfettiInner;
	toggleConfetti = toggleConfettiInner;
	removeConfetti = removeConfettiInner;
	var colors = ["DodgerBlue", "OliveDrab", "Gold", "Pink", "SlateBlue", "LightBlue", "Violet", "PaleGreen", "SteelBlue", "SandyBrown", "Chocolate", "Crimson"]
	var streamingConfetti = false;
	var animationTimer = null;
	var particles = [];
	var waveAngle = 0;
	
	function resetParticle(particle, width, height) {
		particle.color = colors[(Math.random() * colors.length) | 0];
		particle.x = Math.random() * width;
		particle.y = Math.random() * height - height;
		particle.diameter = Math.random() * 10 + 5;
		particle.tilt = Math.random() * 10 - 10;
		particle.tiltAngleIncrement = Math.random() * 0.07 + 0.05;
		particle.tiltAngle = 0;
		return particle;
	}

	function startConfettiInner() {
		var width = window.innerWidth;
		var height = window.innerHeight;
		window.requestAnimFrame = (function() {
			return window.requestAnimationFrame ||
				window.webkitRequestAnimationFrame ||
				window.mozRequestAnimationFrame ||
				window.oRequestAnimationFrame ||
				window.msRequestAnimationFrame ||
				function (callback) {
					return window.setTimeout(callback, 16.6666667);
				};
		})();
		var canvas = document.getElementById("confetti-canvas");
		if (canvas === null) {
			canvas = document.createElement("canvas");
			canvas.setAttribute("id", "confetti-canvas");
			canvas.setAttribute("style", "display:block;top:0;left:0;pointer-events:none;position:fixed;");
			document.body.appendChild(canvas);
			canvas.width = width;
			canvas.height = height;
			window.addEventListener("resize", function() {
				canvas.width = window.innerWidth;
				canvas.height = window.innerHeight;
			}, true);
		}
		var context = canvas.getContext("2d");
		while (particles.length < maxParticleCount)
			particles.push(resetParticle({}, width, height));
		streamingConfetti = true;
		if (animationTimer === null) {
			(function runAnimation() {
				context.clearRect(0, 0, window.innerWidth, window.innerHeight);
				if (particles.length === 0)
					animationTimer = null;
				else {
					updateParticles();
					drawParticles(context);
					animationTimer = requestAnimFrame(runAnimation);
				}
			})();
		}
	}

	function stopConfettiInner() {
		streamingConfetti = false;
	}

	function removeConfettiInner() {
		stopConfetti();
		particles = [];
	}

	function toggleConfettiInner() {
		if (streamingConfetti)
			stopConfettiInner();
		else
			startConfettiInner();
	}

	function drawParticles(context) {
		var particle;
		var x;
		for (var i = 0; i < particles.length; i++) {
			particle = particles[i];
			context.beginPath();
			context.lineWidth = particle.diameter;
			context.strokeStyle = particle.color;
			x = particle.x + particle.tilt;
			context.moveTo(x + particle.diameter / 2, particle.y);
			context.lineTo(x, particle.y + particle.tilt + particle.diameter / 2);
			context.stroke();
		}
	}

	function updateParticles() {
		var width = window.innerWidth;
		var height = window.innerHeight;
		var particle;
		waveAngle += 0.01;
		for (var i = 0; i < particles.length; i++) {
			particle = particles[i];
			if (!streamingConfetti && particle.y < -15)
				particle.y = height + 100;
			else {
				particle.tiltAngle += particle.tiltAngleIncrement;
				particle.x += Math.sin(waveAngle);
				particle.y += (Math.cos(waveAngle) + particle.diameter + particleSpeed) * 0.5;
				particle.tilt = Math.sin(particle.tiltAngle) * 15;
			}
			if (particle.x > width + 20 || particle.x < -20 || particle.y > height) {
				if (streamingConfetti && particles.length <= maxParticleCount)
					resetParticle(particle, width, height);
				else {
					particles.splice(i, 1);
					i--;
				}
			}
		}
	}
})();