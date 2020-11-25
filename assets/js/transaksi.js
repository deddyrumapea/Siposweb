var modalSuccess = document.getElementById("modal-transaction-added");

var btnCheckOut = document.getElementById("btn-check-out");
var btnConfirmation = document.getElementById("btn-confirmation");

var formNamaProduk = document.getElementById("nama-produk");
var formHargaProduk = document.getElementById("harga");
var formQuantity = document.getElementById("quantity");
var formStockProduk = document.getElementById("stock");
var formSubTotal = document.getElementById("subtotal");
var formTotal = document.getElementById("total");
var formBayar = document.getElementById("bayar");
var formKembalian = document.getElementById("kembalian");

btnCheckOut.onclick = function() {
	modalSuccess.style.display = "block";
}

btnConfirmation.onclick = function() {
	modalSuccess.style.display = "none";
}

function searchProduk() {
	$.ajax({
		type: "POST",
		url: 'functions/search_produk.php',
		data:{query: $("#id-produk").val()},
		success: function(result) {
			try {
				result = JSON.parse(result);
				populateFormProduk(result);
			} catch (e) {
				alert("Produk tidak ditemukan");
			}
		}
	});
}

function populateFormProduk(data) {
	document.getElementById("nama-produk").value = data.nama;
	document.getElementById("harga").value = data.harga;
	document.getElementById("stock").value = "Stock : " + data.stock;
}

function hitungSubTotal(){
	var subTotal = (document.getElementById("quantity").value * document.getElementById("harga").value).toLocaleString();
	document.getElementById("subtotal").value = (subTotal);
}