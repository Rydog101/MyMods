$(document).ready(function(){
	$("#sys-config").click(function(){
		$.ajax({url:"database-config.php",success:function(result){
			$("div#content").html(result);
		}});
	});
});