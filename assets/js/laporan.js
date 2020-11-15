var modalDelete = document.getElementById("modal-delete");
var btnDelete = document.getElementById("btn-hapus-produk");
var btnConfirmDelete = document.getElementById("btn-confirm-hapus");

function hapusTransaksi(id) {
	modalDelete.style.display = "block";
	btnConfirmDelete.href = "hapus_transaksi.php?id=" + id;
}