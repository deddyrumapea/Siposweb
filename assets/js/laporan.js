var modalDelete = document.getElementById("modal-delete");
var btnDelete = document.getElementById("btn-hapus-transaksi");
var btnConfirmDelete = document.getElementById("btn-confirm-hapus");
var modalDetail = document.getElementById("modal-laporan");
var btnCloseModal = document.getElementById("close-modal");
var tabelProdukDibeli = document.getElementById("tabel-produk-dibeli");


// function collectTransactionData() {
// 	var transaksi = new Object();
// 	transaksi.id_transaksi = formIdTransaksi.value;
// 	transaksi.tanggal = formTanggal.value;
// 	transaksi.total = parseInt(formTotal.value);
// 	transaksi.bayar = parseInt(formBayar.value);
// 	transaksi.kembalian = parseInt(formKembalian.value);

// 	var produk = new Array();
// 	var rows = document.getElementsByClassName("produk-dibeli");
// 	for (var i = 0; i < rows.length; i++) {
// 		var row = new Object();
// 		row.id_produk = rows[i].children[0].innerText;
// 		row.quantity = parseInt(rows[i].children[3].innerText);
// 		produk.push(row);
// 	}
// 	transaksi.produk = produk;
// 	return JSON.stringify(transaksi);
// }

// function checkOut() {
// 	$.ajax({
// 		type: "POST",
// 		url: 'functions/check_out_transaksi.php',
// 		data:{transaksi: collectTransactionData()},
// 		success: function(result) {
// 			if (result == 1) {
// 				modalSuccess.style.display = "block";
// 			} else {
// 				alert('Gagal menambahkan transaksi');
// 			}
// 		}
// 	});
// }

function showDetail(id){
	$.ajax({
		type: "POST",
		url: 'functions/detail_transaksi.php',
		data: {id_transaksi : id},
		success: function(result){
			try{
				console.log(result);
				result = JSON.parse(result);
				populateModalDetail(result);
			} catch (e) {
				alert(e);
			}
		}
	});
}

function populateModalDetail(transaksi) {
	document.getElementById("id-transaksi").value = transaksi.id_transaksi;
	document.getElementById("tanggal").value = transaksi.tanggal;
	document.getElementById("total").value = transaksi.total;
	document.getElementById("bayar").value = transaksi.bayar;
	document.getElementById("kembalian").value = transaksi.kembalian;

	var produk = transaksi.produk;

	for (var i = 0; i < produk.length; i++) {
		var row = tabelProdukDibeli.insertRow();
		row.insertCell(0).innerHTML = produk[i].id_produk;
		row.insertCell(1).innerHTML = produk[i].nama;
		var quantity = row.insertCell(2);
		quantity.innerHTML = produk[i].quantity;
		quantity.style.textAlign = "center";
	}

	modalDetail.style.display = "block"; // Tampilkan modal box
}

// Sembunyikan modal box jika area di luar box diklik
window.onclick = function(event) {
	tutupModal();
}

function tutupModal(){
	modalDetail.style.display = "none";
	document.getElementById("id-transaksi").value = 
	document.getElementById("tanggal").value =
	document.getElementById("total").value = 
	document.getElementById("bayar").value = 
	document.getElementById("kembalian").value = "";
	var rowCount = tabelProdukDibeli.rows.length; 
	while(--rowCount) tabelProdukDibeli.deleteRow(rowCount);
}

function hapusTransaksi(id) {
	modalDelete.style.display = "block";
	btnConfirmDelete.href = "functions/hapus_transaksi.php?id=" + id;
}

// Copy id transaksi
function copyIdTransaksi(transaksi){
	var idTransaksi = document.createElement("textarea");
	document.body.appendChild(idTransaksi);
	idTransaksi.value = transaksi.innerText;
	idTransaksi.select();
	document.execCommand("copy");
	document.body.removeChild(idTransaksi);
}