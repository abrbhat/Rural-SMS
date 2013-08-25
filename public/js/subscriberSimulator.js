$(document).ready(function(){	
	  $("#Start").click(function(){
		var days = 0;
			setInterval(function () {
		  		++days;
				$("#Days").html(days);
				$.ajax({
					type:"GET",
					dataType: "xml",
		  			url: BaseURI+"/scheduledSMS/sendBurstSMS",
					async: true,
					data:{"days":days},
					success:function(xml){
						$("#SMSResponse").empty();
						var data = $('Sms',xml).text();
						var user = $('User',xml).first().text();
						$("#ScheduledSMSResponse").append('</br>');
						$("#ScheduledSMSResponse").append('Day: '+days+' ');				
		  				$("#ScheduledSMSResponse").append('Message: '+data);
			 		},
				});
			}, 100);
			return false;
		
	});
});
		

		
