var modalSuccess = document.getElementById("modal-transaction-added");
var btnCheckOut = document.getElementById("btn-check-out");
var btnConfirmation = document.getElementById("btn-confirmation");

btnCheckOut.onclick = function() {
	modalSuccess.style.display = "block";
}

btnConfirmation.onclick = function() {
	modalSuccess.style.display = "none";
}