@extends('main')
@section('body')
<div id="topRow" class="row">
	<div class="col-sm-6 col-sm-push-6">
		<div class="panel panel-default">
			<div class="panel-heading">Contact Information</div>
			<!-- Table -->
			<table class="table table-striped">
				<thead>
					<td><span class="glyphicon glyphicon-envelope"></span> Email</td>
					<td><span class="glyphicon glyphicon-earphone"></span> Cell Phone</td>
					<td><span class="glyphicon glyphicon-print"></span> Fax</td>
				</thead>
				<tbody>
					<td><a href="mailto:wjbuilders@gmail.com">wjbuilders@gmail.com</a></td>
					<td>1 (973) 615 4458</td>
					<td>(Upon request)</td>
				</tbody>
			</table>
		</div>
	</div> <!-- END panel -->

	<div class="col-sm-6 col-sm-pull-6">
		<form id="contact-form" class="panel panel-default" method="post" action="process-contact.php">
			<div class="panel-heading">
				<h2 class="panel-title">Contact form</h2>
			</div>
			<div id="contact-body" class="panel panel-body">
				<div class="row">
					<div class="col-sm-12">
						<div class="input-group">
							<h4>Your info</h4>
							<input id="input-first" class="form-control" type="text" name="first" placeholder="First name"/>
							<input id="input-last" class="form-control" type="text" name="last" placeholder="Last name"/>
							<br/>
							<input id="input-email" class="form-control" type="email" name="email" placeholder="Email address"/>
							<input id="input-number" class="form-control" type="tel" name="number" placeholder="Phone #"/>
						</div>
					</div>	
				</div>
				<hr/>

				<div class="input-group">
					<h4>Project type (select one)</h4>
					<p><input id="input-type" type="radio" name="job" value="0" required> New Construction</input></p>
					<p><input id="input-type"type="radio" name="job" value="1" required> Addition</input></p>
					<p><input id="input-type"type="radio" name="job" value="2" required> Renovation</input></p>
					<p><input id="input-type"type="radio" name="job" value="3" required> New Development</input></p>
					<hr/>
				</div>
				<div id="select-county"class="input-group">	
					<p>County: <select name="county">
						<option>Atlantic County</option>
						<option>Bergen County</option>
						<option>Burlington County</option>
						<option>Camden County</option>
						<option>Cape May County</option>
						<option>Cumberland County</option>
						<option>Essex County</option>
						<option>Gloucester County</option>
						<option>Hudson County</option>
						<option>Hunterdon County</option>
						<option>Mercer County</option>
						<option>Middlesex County</option>
						<option>Monmouth County</option>
						<option>Morris County</option>
						<option>Ocean County</option>
						<option>Passaic County</option>
						<option>Salem County</option>
						<option>Somerset County</option>
						<option>Sussex County</option>
						<option>Union County</option>
						<option>Warren County</option>
					</select></p>
				</div>	
				<div class="input-group">
					<p>Intended start date: <input id="input-date" type="date" name="date"></p>
				</div>
				<hr/>
				
				<!-- <h4>Additional info (optional)</h4> -->
				<!-- <input type="text" name="info" placeholder="Special requests..."/> -->
				<!-- <div>
  					<input type="text" name="details" style="width: 90%; min-height: 100px;"></textarea>
				</div> -->
				<!-- <hr/> -->
				<div class="row">
					<div class="col-xs-4 col-xs-offset-4">
						<p><input id="btn-submit" class="btn btn-primary" style="width: 100%;" type="submit"></input></p>
					</div>
				</div>	
			</div>
		</form>
	</div>
</div> <!-- END row -->

<!-- for dynamic textarea -->
<script type="text/javascript">
	// function makeExpandingArea(container) {
	// 	var area = container.querySelector('textarea');
	// 	var span = container.querySelector('span');
	// 	if (area.addEventListener) {
	// 		area.addEventListener('input', function() {
	// 	 	span.textContent = area.value;
	// 	}, false);
	// 	span.textContent = area.value;
	// 	} else if (area.attachEvent) {
	// 	// IE8 compatibility
	// 	area.attachEvent('onpropertychange', function() {
	// 		span.innerText = area.value;
	// 		});
	// 		span.innerText = area.value;
	// 	}
	// 	// Enable extra CSS
	// 	container.className += "active";
	// }
	// var areas = document.querySelectorAll('.expandingArea');
	// var l = areas.length;while (l--) {
	// 	makeExpandingArea(areas[l]);
	}

	// $('#btn-submit').on('click', function () {
	// 	// $(this).button('complete')
	// 	var dataString = "email=" + $("#input-email").val() + "&job=" + $("#input-type").val() + "&date=" + 
	// 	$("#input-date").val() + "&first=" + $("#input-first").val() + "&last=" + $("#input-last").val() + 
	// 	"&number=" + $("#input-number").val() + "&county=" + $("#select-county").val();

	// 	$.ajax({
	// 		type: "POST",
	// 	    url: "process-contact.php",
	// 	    data: dataString  
	// 	});
	// 	return false;
	// }
</script>

<!-- Success modal -->
<div id="successModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>Please allow at least 48 hours for a response from Woody Jones.</p>
				<p>We appreciate your business and look forward to working with you!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop