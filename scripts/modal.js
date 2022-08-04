const modal_container = document.getElementById("modal-container");
const close_modal = document.getElementById("close-modal"); 

$("#addnew-btn").click(function(){
	modal_container.classList.add('active');
	$('#input-update').css('display', 'none');
	$('#input-addnew').css('display', 'block');
})

var cur_id = "0";
var image = "0";
var loading = false;
loading = false;
close_modal.addEventListener("click", ()=>{
	modal_container.classList.remove('active');
});

//multi delete
$("#delete-btn").click(function(){
	if (loading	== true) {return	false;};
	loading	= true;
	$("#loading").addClass("active");
	var ids = $("input:checkbox:checked").map(function(){
		return $(this).val()
	}).get();
  	var data = new FormData;
  	for (var i = 0; i < ids.length; i++) {
  		data.append('delete[]',ids[i]);
  	};
  	data.append('delete[]', ids);
  $.ajax({
    url: "./index.php",
    type: "POST",
    cache: false,
    dataType: "script",
    contentType: false,
    processData: false,
    data: data,
    success: function() {
    	$("#loading").removeClass("active");
    	loading	= false;
      for (var i = 0; i < ids.length; i++) {
  				$("#"+ ids[i] + "n").remove();
  		};
  		
    },
    error: function	(){

    		loading	= false;
    		$("#loading").removeClass("active");
    }
  });
  return false;
});



//single delete
$("#table").on("click","#delete",function(){
	if (loading	== true) {return	false;};
	loading	= true;
	$("#loading").addClass("active");
  var cur_id = $(this).val();
  var data = new FormData;
  data.append('delete[]', cur_id);
  $.ajax({
    url: "./index.php",
    type: "POST",
    cache: false,
    dataType: "script",
    contentType: false,
    processData: false,
    data: data,
    success: function() {
	  loading = false;
      $("#loading").removeClass("active");
      $("#"+cur_id + "n").remove();

    },
    error:function	(){
    	
    	loading = false	;
    	$("#loading").removeClass("active");
    }
  });
  return false;
});



//commit update
$("#input-update").click(function(){
	if (loading	== true || 	!check_empty()) {return false;};
	loading	= true;
	$("#loading").addClass("active");
	var name = $('#input-name').val();
	var province = $('#input-province').val();
	var duration = $('#input-duration').val();
	var price = $('#input-price').val();
	var description = $('#input-description').val();
	var	photo = $('#input-photo')[0].files[0];
	var data = new FormData();
	data.append('photo',photo);
	data.append('name',name);
	data.append('province',province);
	data.append('duration',duration);
	data.append('price',price);
	data.append('description',description);
	data.append('update', cur_id);
	data.append('photo-old', image);
	
	$.ajax({
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response2){
			modal_container.classList.remove('active');
			loading = false;
			$("#loading").removeClass("active");
			clear_input();
			var test = '<tr class="data-row" id="'+cur_id+'n"><td class="checkbox"><input type="checkbox" name="delete[]" value="'+cur_id+'"></td><td>'+cur_id+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+response2+'" alt="img"></td><td class="delete"><div class="delete-button">Update<input id="update" type="submit" name="delete[]" value="'+cur_id +'"></div><div class="delete-button">Delete<input id = "delete" type="submit" name="delete[]" value="'+cur_id+'"></div></td></tr>';
			var target = document.getElementById(cur_id+"n");
			target.innerHTML = test;
		},
		error:function	(){
			clear_input();
			loading = false;
			$("#loading").removeClass("active");
		}
	});
	return false;
});


//update 
$("#table").on("click","#update",function(){
	if (loading	== true) {return;};
	loading	= true;
	$("#loading").addClass("active");
	cur_id = $(this).val();
	var data = new FormData;
	data.append('select', cur_id);
	$.ajax({
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response){
			loading = false;
			$("#loading").removeClass("active");
			res = JSON.parse(response);
			modal_container.classList.add('active');
			$('#input-update').css('display', 'block');
			$('#input-addnew').css('display', 'none');
			$('#input-name').val(res["name"]);
			$('#input-province').val(res["province"]);
			$('#input-duration').val(res["duration"]);
			$('#input-price').val(res["price"]);
			$('#input-description').val(res["description"]);
			image = res["image"];

		},
		error:function(){
		
			loading = false;
			$("#loading").removeClass("active");
		}
	});
	return false;
});


//head addnew
$("#input-addnew").click(function(){

	loading = true;
	$("#loading").addClass("active");
	var name = $('#input-name').val();
	var province = $('#input-province').val();
	var duration = $('#input-duration').val();
	var price = $('#input-price').val();
	var description = $('#input-description').val();
	var	photo = $('#input-photo')[0].files[0];
	var data = new FormData();
	data.append('photo',photo);
	data.append('name',name);
	data.append('province',province);
	data.append('duration',duration);
	data.append('price',price);
	data.append('description',description);
	data.append('addnew', 'addnew');

	$.ajax({
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response){
			modal_container.classList.remove('active');
			loading = false;
			$("#loading").removeClass("active");
			clear_input();
			var res = JSON.parse(response);
			var test = '<tr class="data-row" id="'+res["id"]+'n"><td class="checkbox"><input type="checkbox" name="delete[]" value="'+res["id"]+'"></td><td>'+res["id"]+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+res["photo"]+'" alt="img"></td><td class="delete"><div class="delete-button">Update<input id="update" type="submit" name="delete[]" value="'+ res["id"] +'"></div><div class="delete-button">Delete<input id="delete" type="submit" name="delete[]" value="'+res["id"]+'"></div></td></tr>';
			$("tbody").append(test);
	
		},
		error: function(){
			clear_input();
			loading = false;
			$("#loading").removeClass("active");
			
		}

	});

	return false;
})

//clearinput
function clear_input(){
	$('#input-name').val("");
	$('#input-province').val("");
	$('#input-duration').val("");
	$('#input-price').val("");
	$('#input-description').val("");
}

//check if empty
function check_empty(){
	
	if ($('#input-name').val().trim() == "") {alert("Name Is Empty"); return false}
	else if ($('#input-province').val().trim() == "") {alert("Province Is Empty"); return false}
	else if ($('#input-duration').val().trim() == "") {alert("Duration Is Empty"); return false}
	else if ($('#input-price').val().trim() == "") {alert("Price Is Empty"); return false}
	else if ($('#input-description').val().trim() == "") {alert("Description Is Empty"); return false}
	else {return true}
}