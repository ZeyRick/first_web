const modal_container = document.getElementById("modal-container");
const close_modal = document.getElementById("close-modal"); 

$("#addnew-btn").click(function(){
	modal_container.classList.add('active');
	$('#input-update').css('display', 'none');
	$('#input-addnew').css('display', 'block');
})



close_modal.addEventListener("click", ()=>{
	modal_container.classList.remove('active');
});


$("input[id=update]").click(function(){
	var cur_id = $(this).val();
	var data = new FormData;
	data.append('select', cur_id);
	alert($(this).val());
	$.ajax({
		beforeSend:function(){alert(cur_id);},
		url: "./index.php",
		type: "POST",
		dataType: "script",
		cache:false,
		contentType: false,
		processData: false,
		data: data,
		success: function(response){
			alert(response);
			res = JSON.parse(response);
			modal_container.classList.add('active');
			$('#input-update').css('display', 'block');
			$('#input-addnew').css('display', 'none');
			$('#input-name').val(res["name"]);
			$('#input-province').val(res["province"]);
			$('#input-duration').val(res["duration"]);
			$('#input-price').val(res["price"]);
			$('#input-description').val(res["description"]);
			var image = res["image"];

			$("#input-update").click(function(){
				alert(cur_id);
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
				data.append('photo-old', image)
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
					success: function(response2){
						alert("0");
						alert("1");
						var test = '<td class="checkbox"><input type="checkbox" name="delete[]" value="'+cur_id+'"></td><td>'+cur_id+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+response2+'" alt="img"></td><td class="delete"><div class="delete-button"Updat<input id="update" type="submit" name="delete[]" value="<?php echo $data["locID"] ?>"></div><div class="delete-button">Delete<input type="submit" name="delete[]" value="'+cur_id+'"></div></td>';
						var target = document.getElementById(cur_id);
						alert(target);
						target.innerHTML = test;
						alert(response2);
						modal_container.classList.remove('active');
					}

	});

	return false;
			});

		}
	});
	return false;
});


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

			var test = '<tr class="data-row" id="'+res["id"]+'"><td class="checkbox"><input type="checkbox" name="delete[]" value="'+res["id"]+'"></td><td>'+res["id"]+' </td><td>'+name+' </td><td>'+province+' </td><td>'+duration+'</td><td >'+price+'$</td><td><img src=" '+res["photo"]+'" alt="img"></td><td class="delete"><div class="delete-button">Update<input id="update" type="submit" name="delete[]" value="<?php echo $data["locID"] ?>"></div><div class="delete-button">Delete<input type="submit" name="delete[]" value="'+res["id"]+'"></div></td></tr>';
			$("tbody").append(test);
			modal_container.classList.remove('active');
		}

	});

	return false;
})


