// MODAL TAMBAH PRODUK START
var btnTambahProduk = document.getElementById("btn-tambahkan-produk");
var modalTambahProduk = document.getElementById("modal-tambah-produk");

// Tampilkan modal box jika tombol diklik
btnTambahProduk.onclick = function (event) {
	modalTambahProduk.style.display = "block";
}


// MODAL TAMBAH PRODUK END

// MODAL EDIT PRODUK START
var modalEditProduk = document.getElementById("modal-edit-produk");

function editProduk(data){
	modalEditProduk.style.display = "block"; // Tampilkan modal box
	var inputs = modalEditProduk.getElementsByTagName('input');

	// Populate form dengan data lama
	for (var i = 0; i < inputs.length; i++) {
		inputs[i].value = data[i];
	}
}
// MODAL EDIT PRODUK END

// MODAL NOTIFICATIONS START
var modalSuccess = document.getElementById("modal-product-added");
var modalFailed = document.getElementById("modal-product-add-failed");
var btnConfirmation = document.getElementById("btn-confirmation");

function closeModal() {
	modalSuccess.style.display = "none";
	modalFailed.style.display = "none";
}

// MODAL NOTIFICATIONS END

// MODAL DELETE START
var modalDelete = document.getElementById("modal-delete");
var btnDelete = document.getElementById("btn-hapus-produk");
var btnConfirmDelete = document.getElementById("btn-confirm-hapus");

function hapusProduk(id) {
	modalDelete.style.display = "block";
	btnConfirmDelete.href = "functions/hapus_produk.php?id=" + id;
}

// MODAL DELETE END

// Sembunyikan modal box jika area di luar box diklik
window.onclick = function(event) {
	var modals = document.getElementsByClassName("modal");
	for (var i = 0; i < modals.length; i++) {
		if (event.target == modals[i]) {
			modals[i].style.display = "none";
		}
	}
}

// Copy id produk
function copyIdProduk(produk){
	var idProduk = document.createElement("textarea");
    document.body.appendChild(idProduk);
    idProduk.value = produk.innerText;
    idProduk.select();
    document.execCommand("copy");
    document.body.removeChild(idProduk);
}