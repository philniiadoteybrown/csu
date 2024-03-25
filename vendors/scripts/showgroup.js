const groupselect = document.getElementById("groupselect");

const group = document.getElementById("group");

groupselect.addEventListener("change", function (event){

	if(event.target.value=='group'){
		group.style.display='block'
	}else{
		group.style.display='none'
	}
})