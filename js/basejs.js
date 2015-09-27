$('.q').click(function(){
	var id = $(this).attr('id');
	$('.q_content').attr('id',id);
	var mul;
	var act_id = $('.q_active').attr('id');
	$('#'+act_id).removeClass('q_active');
	$(this).addClass('q_active');
	tb_disable();
	$.ajax({
		url: 'get_user_detail.php',
		datatype: 'json',
		success: function(data){
			var dparse = $.parseJSON(data);

			mul = dparse.multiplier[id-1];
			if(mul!=0){
				var radios = document.getElementsByName('xbid');
				radios[mul-2].checked = true;
				$.ajax({
					url: 'qfetch.php',
					method: 'GET',
					data: ({qno:id}),
					dataType: 'json',
					success: function(data1) {
						
						tb_enable();
						$('.q_content').html(data1.content);
						
						$('.tick').html('');
						rdb_disable();

					},
					error: function(request,status,error) {
						alert(error);
					}
				});	
			}
			else {
				$('.q_content').html('<center><b><h3>Select the multiplier and click on Bid</h3></b></center>');
				
				$('.tick').html('');
				rdb_enable();

			}
			
			// rdb_disable();
		}
	});
	
	// $.ajax({
	// 	url: 'qfetch.php',
	// 	method: 'GET',
	// 	data: ({qno:id}),
	// 	dataType: 'json',
	// 	success: function(data) {
	// 		// $('.q_content').html(data[3]);
	// 		$('.q_content').html('<center><b><h3>Select the multiplier and click on Bid</h3></b></center>');
	// 		$('.q_content').attr('id',id);
	// 		$('.tick').html('');
	// 		// rdb_enable();

	// 	},
	// 	error: function(request,status,error) {
	// 		alert(status);
	// 	}
	// });
});

function tb_enable() {
	var radios = document.getElementById('ansval');
	radios.disabled = false;
	// for (var i = 0; i< radios.length;i++) {
	//     radios[i].disabled = true;
	// }
}
function tb_disable() {
	var radios = document.getElementById('ansval');
	radios.disabled = true;
	// for (var i = 0; i< radios.length;i++) {
	//     radios[i].disabled = true;
	// }
}

function rdb_disable() {
	var radios = document.getElementsByName('xbid');
	for (var i = 0; i< radios.length;  i++) {
	    radios[i].disabled = true;
	}
}
function mul_rdb_disable() {
	var radios = document.getElementsByName('mul_over');
	for (var i = 0; i< radios.length;  i++) {
	    radios[i].disabled = true;
	    radios[i].checked = false;
	}
}

function rdb_enable() {
	var radios = document.getElementsByName('xbid');
	for (var i = 0; i< radios.length;  i++){
	    radios[i].disabled = false;
	}
}

function rdcheck(){
	if (($('#rd1').prop("checked")) || ($('#rd2').prop("checked")) || ($('#rd3').prop("checked")) || ($('#rd4').prop("checked")) ) {
		alert("radio button is checked");
	}
	else {
		alert("no radio button is checked");
	}
}
// $('input:radio[name=xbid]').change(function(){
// 	alert("radio clicked");
// });


// $('#submit').click(function(){
// 	// rdcheck();
// 	if (($('#rd1').prop("checked")) || ($('#rd2').prop("checked")) || ($('#rd3').prop("checked")) || ($('#rd4').prop("checked")) ) {
// 		var ans = $('#ansval').val();
// 		var id = $('.q_content').attr('id');
// 		$.ajax({
// 			url: 'qfetch.php',
// 			method: 'GET',
// 			data: ({qno:id}),
// 			dataType: 'json',
// 			success: function(data) {
// 				if(data[4]==ans) {
// 					$('.tick').html("<span class='glyphicon glyphicon-ok form-control-feedback'></span>");
// 				}
// 				else {
// 					$('.tick').html("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
// 				}
// 				$('.q_content').html('');
// 				$('#ansval').html(' ');
				
// 				$('.q_tile[id='+id+']').addClass('q_tile_answered').unbind('click');

// 			},
// 			error: function(request,status,error) {
// 				alert(status);
// 			}
// 		});
// 	}
// 	else{
// 		alert("check radio button");
// 	}
	
// });
$('#bid_submit').click(function(){
	var radios = document.getElementsByName('xbid');
	var id = $('.q_content').attr('id');
	var mul;
	if(confirm('Are you sure??')){
		for (var i = 0; i< radios.length;  i++){
	    if(radios[i].checked) {
	    	mul = i+2;
	    	// $('#bid_submit').attr('disabled','true');
	    }
	    else{
	    	// alert('bid first');
	    }
	}

	rdb_disable();

	$.ajax({
		url: 'bid_submit.php',
		data: ({ qno:id,multiplier:mul}),
		dataType: 'json',
		success: function(dparse){
			// var dparse = $.parseJSON(data);
			
			var j=0;
			$('.stat').html("<b>Multipliers Left</b><br />2 X : "+(dparse.multiplier_left.x2)+" &nbsp;&nbsp;&nbsp; 3 X : "+(dparse.multiplier_left.x3)+"<br /> 4 X : "+(dparse.multiplier_left.x4)+" &nbsp;&nbsp;&nbsp; 5 X : "+(dparse.multiplier_left.x5)+""  );
			for(var i in dparse.multiplier_left){
				if(dparse.multiplier_left[i]<=1){
					radios[j].name = "mul_over";
					// $('.stat').html("<b>Multipliers Left</b><br />2 X : "+(dparse.multiplier_left.x2-1)+" &nbsp;&nbsp;&nbsp; 3 X : "+(dparse.multiplier_left.x3-1)+"<br /> 4 X : "+(dparse.multiplier_left.x4-1)+" &nbsp;&nbsp;&nbsp; 5 X : "+(dparse.multiplier_left.x5-1)+""  );
				}
				j++;
			}
			mul_rdb_disable();
		},
		error: function(request,status,error){
			alert(error);
		}
	});

	
	$.ajax({
		url: 'qfetch.php',
		method: 'GET',
		data: ({qno:id}),
		dataType: 'json',
		success: function(data) {
			tb_enable();
			$('.q_content').html(data.content);
			// $('.q_content').attr('id',id);
			$('.tick').html('');
			rdb_disable();

		},
		error: function(request,status,error) {
			alert(status);
		}
	});
	}
	
});

$('#ans_submit').click(function(e){
	e.preventDefault();
	
	ans_submit();
});

// 

function ans_submit(){
	var ans = $('#ansval').val();
	var id = $('.q_content').attr('id');
	if(confirm("Are u sure??")){
		tb_disable();
		$.ajax({
			url: 'ans_submit.php',
			method: 'GET',
			data: ({q_no:id,ans:ans}),
			success: function(data) {
				var dparse = $.parseJSON(data);
				// alert(dparse.point);
				if(dparse.result==1) {
					$('.tick').html("<span class='glyphicon glyphicon-ok form-control-feedback'></span>");
				}
				if(dparse.result==2) {
					$('.tick').html("<span class='glyphicon glyphicon-remove form-control-feedback'></span>");
				}
				$('.q_content').html('');
				$('#ansval').html(' &nbsp;');
				
				$('.q_tile[id='+id+']').addClass('q_tile_answered').unbind('click');
				$('#score').html("<h4>Your Score: "+dparse.point+"</h4>");

				//window.reload();
			},
			error: function(request,status,error) {
				alert(error);
			}
		});	
	}	
}
