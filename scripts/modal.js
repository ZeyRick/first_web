const addnew_btn = document.getElementById("addnew-btn");
const modal_container = document.getElementById("modal-container");
const close_modal = document.getElementById("close-modal"); 

addnew_btn.addEventListener("click", ()=>{
	modal_container.classList.add('active');
});

close_modal.addEventListener("click", ()=>{
	modal_container.classList.remove('active');
});