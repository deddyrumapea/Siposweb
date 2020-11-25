var modalSuccess = document.getElementById("modal-transaction-added");

var btnTambahkanProduk = document.getElementById("tambah-produk-dibeli");
var btnCheckOut = document.getElementById("btn-check-out");
var btnConfirmation = document.getElementById("btn-confirmation");

var formIdProduk = document.getElementById("id-produk");
var formNamaProduk = document.getElementById("nama-produk");
var formHargaProduk = document.getElementById("harga");
var formQuantity = document.getElementById("quantity");
var formStockProduk = document.getElementById("stock");
var formSubTotal = document.getElementById("subtotal");
var formTotal = document.getElementById("total");
var formBayar = document.getElementById("bayar");
var formKembalian = document.getElementById("kembalian");

var tableDibeli = document.getElementById("table-dibeli");


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
	formNamaProduk.value = data.nama;
	formHargaProduk.value = data.harga;
	formStockProduk.value = "Stock : " + data.stock;
}

function hitungSubTotal(){
	const quantity = formQuantity.value;
	const harga = formHargaProduk.value;
	var subTotal = (quantity * harga).toLocaleString();
	formSubTotal.value = (subTotal);
}

btnTambahkanProduk.onclick = function() {
	const id = formIdProduk.value;
	const nama = formNamaProduk.value;
	const harga = formHargaProduk.value;
	const quantity = formQuantity.value;
	const subtotal = formSubTotal.value;
	const aksi = "<a href='#!' onclick='this.parentElement.parentElement.remove();' class='action-hapus'><i class='fas fa-trash'></i> Hapus</a>";

	if (quantity != "" && id != "") {
		resetFormProduk();

		var row = tableDibeli.insertRow();
		row.insertCell(0).innerHTML = id;
		row.insertCell(1).innerHTML = nama;
		row.insertCell(2).innerHTML = parseInt(harga).toLocaleString();
		row.insertCell(3).innerHTML = quantity;
		row.insertCell(4).innerHTML = subtotal;
		row.insertCell(5).innerHTML = aksi;

		row.id = `PROD${id}`;
	}
}

btnCheckOut.onclick = function() {
	modalSuccess.style.display = "block";
}

btnConfirmation.onclick = function() {
	modalSuccess.style.display = "none";
}

function resetFormProduk(){
	formIdProduk.value =
	formNamaProduk.value = 
	formHargaProduk.value = 
	formQuantity.value = 
	formStockProduk.value =  
	formSubTotal.value = '';
}