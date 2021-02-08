var customLabel = {
		restaurant: {
			label: 'R'
		},
		bar: {
			label: 'B'
		}
	};

	function downloadUrl(url, callback) {
		var request = window.ActiveXObject ?
		new ActiveXObject('Microsoft.XMLHTTP') :
		new XMLHttpRequest;

		request.onreadystatechange = function() {
			if (request.readyState == 4) {
				request.onreadystatechange = doNothing;
				callback(request, request.status);
			}
		};

		request.open('GET', url, true);
		request.send(null);
	}

	function doNothing() {}

	var map;
	var directionsService = new google.maps.DirectionsService();
	var info = new google.maps.InfoWindow({maxWidth: 200});

	var marker = new google.maps.Marker({
		title: 'Centro de Arinos-MG',
		icon: '',
		position: new google.maps.LatLng(-15.912127970559457, -46.1028416696963)
	});

	function initialize() {
		var options = {
			zoom: 15,
			center: marker.position,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		map = new google.maps.Map($('#map_content')[0], options);

		var infoWindow = new google.maps.InfoWindow;
		downloadUrl('resultado.php', function(data) {
			var xml = data.responseXML;
			var markers = xml.documentElement.getElementsByTagName('sensor');
			Array.prototype.forEach.call(markers, function(markerElem) {
				var name = markerElem.getAttribute('descricao');
				var address = markerElem.getAttribute('endereco');
				var nivel_son = markerElem.getAttribute('nivel_son');
				var point = new google.maps.LatLng(
					parseFloat(markerElem.getAttribute('lat')),
					parseFloat(markerElem.getAttribute('lng')));

				var infowincontent = document.createElement('div');
				var strong = document.createElement('strong');
				strong.textContent = name
				infowincontent.appendChild(strong);
				infowincontent.appendChild(document.createElement('br'));

				if(nivel_son == 1){
					nivel_son = './img/som-verde.png'
				}else if(nivel_son == 2){
					nivel_son = './img/som-amarelo.png'
				}else{
					nivel_son = './img/som-vermelho.png'
				}

				var text = document.createElement('text');
				text.textContent = address
				infowincontent.appendChild(text);
				var marker = new google.maps.Marker({
					map: map,
					position: point,
					icon: nivel_son
				});
				marker.addListener('click', function() {
					infoWindow.setContent(infowincontent);
					infoWindow.open(map, marker);
				});
			});
		});

	}

	$(document).ready(function() {
		$('#form_route').submit(function() {
			info.close();
			var directionsDisplay = new google.maps.DirectionsRenderer();

			var request = {
				origin: $("#origem").val(),
				destination: $("#destino").val(),
				travelMode: google.maps.DirectionsTravelMode.DRIVING
			};

			directionsService.route(request, function(response, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(response);
					directionsDisplay.setMap(map);
				} else {
					window.alert("Erro ao criar rota: " + status);
				}
			});

			return false;
		});
	});