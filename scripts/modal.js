const modal_container = document.getElementById("modal-container");
const close_modal = document.getElementById("close-modal"); 

$("#addnew-btn").click(function(){
	modal_container.classList.add('active');
	$('#input-update').css('display', 'none');
	$('#input-addnew').css('display', 'block');
})

var cur_id = "0";
var image = "0";

close_modal.addEventListener("click", ()=>{
	modal_container.classList.remove('active');
});

//multi delete
$("#delete-btn").click(function(){
	var ids = $(".checkbox");
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
      $("#"+cur_id + "n").remove();
    }
  });
  return false;
});



//single delete
$("#table").on("click","#delete",function(){
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
      $("#"+cur_id + "n").remove();
    }
  });
  return false;
});



//commit update
$("#input-update").click(function(){
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
		beforeSend: function(){alert("this is before")},
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response2){
			alert("0");
			alert(cur_id);
			var test = '<tr class="data-row" id="'+cur_id+'n"><td class="checkbox"><input type="checkbox" name="delete[]" value="'+cur_id+'"></td><td>'+cur_id+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+response2+'" alt="img"></td><td class="delete"><div class="delete-button">Update<input id="update" type="submit" name="delete[]" value="'+cur_id +'"></div><div class="delete-button">Delete<input id = "delete" type="submit" name="delete[]" value="'+cur_id+'"></div></td></tr>';
			var target = document.getElementById(cur_id+"n");
			alert("2");
			target.innerHTML = test;
			alert("3");
			modal_container.classList.remove('active');
		}
	});
	return false;
});


//update 
$("#table").on("click","#update",function(){
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

		}
	});
	return false;
});


//head addnew
$("#input-addnew").click(function(){
	alert("working1");
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
	alert(province);
	
	$.ajax({
		beforeSend:function(){alert("working3");},
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response){

			alert(response);
			var res = JSON.parse(response);

			var test = '<tr class="data-row" id="'+res["id"]+'n"><td class="checkbox"><input type="checkbox" name="delete[]" value="'+res["id"]+'"></td><td>'+res["id"]+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+res["photo"]+'" alt="img"></td><td class="delete"><div class="delete-button">Update<input id="update" type="submit" name="delete[]" value="'+ res["id"] +'"></div><div class="delete-button">Delete<input id="delete" type="submit" name="delete[]" value="'+res["id"]+'"></div></td></tr>';
			$("tbody").append(test);
			modal_container.classList.remove('active');
		}

	});

	return false;
})


