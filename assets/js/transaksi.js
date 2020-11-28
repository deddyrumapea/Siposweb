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

var formIdTransaksi = document.getElementById("id-transaksi");
var formTanggal = document.getElementById("tanggal");
var formTotal = document.getElementById("total");
var formBayar = document.getElementById("bayar");
var formKembalian = document.getElementById("kembalian");

var tableDibeli = document.getElementById("table-dibeli");

var hargaProduk = 0;
var subtotalProduk = 0;
var totalTransaksi = 0;
var kembalianTransaksi = formKembalian.value;

var idTransaksi = formIdTransaksi.value;

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
	hargaProduk = parseInt(data.harga);
	formHargaProduk.value =  hargaProduk;
	formStockProduk.value = `Stock : ${data.stock}`;
	formQuantity.max = data.stock;
}

function hitungSubTotal() {
	const quantity = formQuantity.value;
	subtotalProduk = quantity * hargaProduk;
	formSubTotal.value = subtotalProduk;
}

function hitungKembalian() {
	const bayar = formBayar.value;
	kembalianTransaksi = bayar - totalTransaksi;
	formKembalian.value = kembalianTransaksi;
}

function hitungTotalTransaksi() {
	totalTransaksi += parseInt(subtotalProduk);
	formTotal.value = totalTransaksi;
	formKembalian.value = formBayar.value = '';
	formBayar.min = totalTransaksi;
}

btnTambahkanProduk.onclick = function() {
	const idProduk = formIdProduk.value;
	const nama = formNamaProduk.value;
	const harga = hargaProduk;
	const quantity = formQuantity.value;
	const subtotal = subtotalProduk;
	const aksi = "<a href='#!' onclick='this.parentElement.parentElement.remove();' class='action-hapus'><i class='fas fa-trash'></i> Hapus</a>";

	if (quantity != "" && idProduk != "") {
		resetFormProduk();

		var row = tableDibeli.insertRow();
		row.className = "produk-dibeli";
		row.insertCell(0).innerHTML = idProduk;
		row.insertCell(1).innerHTML = nama;
		row.insertCell(2).innerHTML = `Rp${harga.toLocaleString()}`;
		row.insertCell(3).innerHTML = quantity;
		row.insertCell(4).innerHTML = `Rp${subtotal.toLocaleString()}`;
		row.insertCell(5).innerHTML = aksi;
	}

	hitungTotalTransaksi();
}

function resetFormProduk(){
	formIdProduk.value =
	formNamaProduk.value = 
	formHargaProduk.value = 
	formQuantity.value = 
	formStockProduk.value =  
	formSubTotal.value = '';
}

btnCheckOut.onclick = function() {
	checkOut();
}

function collectTransactionData() {
	var transaksi = new Object();
	transaksi.id_transaksi = formIdTransaksi.value;
	transaksi.tanggal = formTanggal.value;
	transaksi.total = parseInt(formTotal.value);
	transaksi.bayar = parseInt(formBayar.value);
	transaksi.kembalian = parseInt(formKembalian.value);

	var produk = new Array();
	var rows = document.getElementsByClassName("produk-dibeli");
	for (var i = 0; i < rows.length; i++) {
		var row = new Object();
		row.id_produk = rows[i].children[0].innerText;
		row.quantity = parseInt(rows[i].children[3].innerText);
		produk.push(row);
	}
	transaksi.produk = produk;
	return JSON.stringify(transaksi);
}

function checkOut() {
	$.ajax({
		type: "POST",
		url: 'functions/check_out_transaksi.php',
		data:{transaksi: collectTransactionData()},
		success: function(result) {
			if (result == 1) {
				modalSuccess.style.display = "block";
			} else {
				alert('Gagal menambahkan transaksi');
			}
		}
	});
}

btnConfirmation.onclick = function() {
	location.reload();
}