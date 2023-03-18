

const form = document.querySelector(".typing-area"),
inputField = document.querySelector(".input-field"),
sendBtn = document.querySelector(".btn-send"),
chatBox = document.querySelector(".message-box");

form.onsubmit = ()=>{
	e.preventDefault();
}

sendBtn.onclick = ()=>{
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "insert-chat-ajax.php", true);
	xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				inputField.value = "";
			}
		}
	}

	let formData = new FormData(form);
	xhr.send(formData);
}

setInterval(()=>{

	let xhr = new XMLHttpRequest();
	xhr.open("POST", "get-chat-ajax.php", true);
	xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				chatBox.innerHTML = data;
			}
		}
	}

	let formData = new FormData(form);
	xhr.send(formData);

}, 500);