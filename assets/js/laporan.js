var modalDelete = document.getElementById("modal-delete");
var btnDelete = document.getElementById("btn-hapus-transaksi");
var btnConfirmDelete = document.getElementById("btn-confirm-hapus");

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