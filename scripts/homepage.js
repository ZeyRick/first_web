var loading = false;
var this_id = "";
$("#close-btn").click(function(){
	$(".modal-details").removeClass("active");
});


$(".clicker").click(function(){
	if (loading	== true) {return	false;};
	loading	= true;
	$("#loading").addClass("active");
	this_id = $(this).closest(".content").attr("id");
	var data = new FormData;
	data.append('select',this_id);
	$.ajax({
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data:data,
		success: function(response){
			loading	= false;
			$("#loading").removeClass("active");
			var res = JSON.parse(response);
			$(".modal-details").addClass("active");
			$("#info-name")[0].innerHTML = res['name'];
			$("#info-province")[0].innerHTML = res['province'];
			$("#info-duration")[0].innerHTML = res['duration'];
			if (res['price'] == 0) {
				$("#info-price")[0].innerHTML = "Contact us for inquiry";
			}
			else{
				$("#info-price")[0].innerHTML = res['price'];
			}
			
			$("#info-description")[0].innerHTML = res['description'];
			$("#info-image").attr("src", res["image"]);

		},
		error:function(){
			loading	= false;
			$("#loading").removeClass("active");
		}
	});


});


$("#send").click(function(){
	if (loading	== true) {return	false;};
	loading	= true;
	$("#loading").addClass("active");
	var data = new FormData;
	data.append("send", this_id);
	$.ajax({
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data:data,
	});
});