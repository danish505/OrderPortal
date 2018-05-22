<div class="row p-5 text-center">
	<div class="w-100 pb-5">
		<div class="col-12">
			<h3><strong>OUR LOCATION MAP</strong></h3>
		</div>
		<div class="col-12">
			<h4>Get in Touch with us</h4>
		</div>
	</div>
	<div class="w-100 pl-5 pr-5">
	<div id="infowindow" class="col-12" style="height:20em">
	</div>
</div>
</div>
</div>
<script type="text/javascript">
	function initMap() {
		var houton = {
			lat: 29.729573351257226,
			lng: -95.51792374390914
		};
		var map = new google.maps.Map(document.getElementById('infowindow'), {
			zoom: 20,
			center: houton
		});
		var marker = new google.maps.Marker({
			position: houton,
			map: map
		});
	}

</script>
<script async defer type='text/javascript' src='http://maps.googleapis.com/maps/api/js?key=AIzaSyAzqI_CafN4-jMhc21XlFa6OKrlalPjGv8&callback=initMap'></script>
