var modalTambahProduk = document.getElementById("modal-tambah-produk");
var btnTambahkanProduk = document.getElementById("btn-tambahkan-produk");
var btnClose = document.getElementById("submit-produk");

btnTambahkanProduk.onclick = function() {
	modalTambahProduk.style.display = "block";
}

btnClose.onclick = function() {
	modalTambahProduk.style.display = "none";
	submitProduk();
}

window.onclick = function(event) {
	if (event.target == modalTambahProduk) {
		modalTambahProduk.style.display = "none";
	}
}

var modalSuccess = document.getElementById("modal-product-added");
var btnConfirmation = document.getElementById("btn-confirmation");

btnConfirmation.onclick = function() {
  modalSuccess.style.display = "none";
}

function submitProduk(){
	modalSuccess.style.display = "block";
}