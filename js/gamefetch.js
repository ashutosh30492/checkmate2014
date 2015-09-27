
$(document).ready(function(){
	get_data();
	var user_id;
	$.ajax({
		url: 'get_user_detail.php',
		datatype: 'json',
		success: function(data){
			var dparse = $.parseJSON(data);
			user_id = dparse.user_id;
		}
	});
	
	setInterval(function(){div_refresh()},3000);	

	// setTimeout(setInterval(alert(hi),70),user_id);


});

function get_data(){
	$.ajax({
		url: 'get_user_detail.php',
		datatype: 'json',
		success: function(data){
			var dparse = $.parseJSON(data);
			var j =0;
			var radios = document.getElementsByName('xbid');
			// var dparse1 = data.userDetail.multipliers_left;
			for(var i in dparse.multipliers_left){
				if(dparse.multipliers_left[i]==0){
					radios[j].name = "mul_over";
				}
				j++;
			}
			mul_rdb_disable();
			$('.stat').html("<b>Multipliers Left</b><br />2 X : "+dparse.multipliers_left.x2+" &nbsp;&nbsp;&nbsp; 3 X : "+dparse.multipliers_left.x3+"<br /> 4 X : "+dparse.multipliers_left.x4+" &nbsp;&nbsp;&nbsp; 5 X : "+dparse.multipliers_left.x5+""  );
			$('.navbar-left').html("<h4>Hi "+dparse.team_name+"!! Enjoy Checkmate</h4>");
			$('#score').html("<h4>Your Score: "+Math.round(dparse.point)+"</h4>");

		
			var a = 0;
			while(a<40){
				if(dparse.question_array[a]==1){
					$('.q_tile[id='+(a+1)+']').addClass('q_tile_answered').unbind('click');
				}
				 // $('.qn'+(a+1)).html("<br /><center><h3>Q."+(a+1)+" </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[0]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+dparse.quesPercentage[0]+"% suceeded</h4></center></div></div>");
				a++;

			}
			// $('.qn1').html("<br /><center><h3>Q.1 </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[0]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+dparse.quesPercentage[0]+"% suceeded</h4></center></div></div>");
		}
	});
	div_refresh();
	
}

function div_refresh(){
	$.ajax({
		url: 'div_refresh.php',
		datatype: 'json',
		success: function(data){
			var dparse = $.parseJSON(data);
			var a = 0;
			while(a<40){
				if(a<10){
					$('.qn'+(a+1)).html("<br /><center><h3>Q."+(a+1)+" </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[a]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+Math.round(dparse.quesPercentage[a])+"% suceeded</h4></center></div></div>");
					// $('.qn'+(a+1)).css('background-color','');
					if(dparse.slotsLeft[a]<=0){
						$('.qn'+(a+1)).addClass('q_tile_answered').unbind('click');
					}
				}
				else if(a<30){
					$('.qn'+(a+1)).html("<br /><center><h3>Q."+(a+1)+" </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[a]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+dparse.quesPercentage[a]+"% suceeded</h4></center></div></div>");
					$('.qn'+(a+1)).css('background-color','#D59800');
					if(dparse.slotsLeft[a]<=0){
						$('.qn'+(a+1)).addClass('q_tile_answered').unbind('click');
					}
				}
				else {
					$('.qn'+(a+1)).html("<br /><center><h3>Q."+(a+1)+" </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[a]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+dparse.quesPercentage[a]+"% suceeded</h4></center></div></div>");
					$('.qn'+(a+1)).css('background-color','#810307');
					if(dparse.slotsLeft[a]<=0){
						$('.qn'+(a+1)).addClass('q_tile_answered').unbind('click');
					}	
				}
				// $('.qn'+(a+1)).html("<br /><center><h3>Q."+(a+1)+" </h3></center><div class='row'><div class='col-md-6'><center><h4>"+dparse.slotsLeft[a]+" slots left</h4></center></div><div class='col-md-6'><center><h4>"+dparse.quesPercentage[a]+"% suceeded</h4></center></div></div>");
				// if(dparse.slotsLeft[a]<=0){
				// 	$('.qn'+(a+1)).addClass('q_tile_answered').unbind('click');
				// }
				a++;

			}
		},
		error: function(request,status,error){
			alert(error);
		}
	});
}