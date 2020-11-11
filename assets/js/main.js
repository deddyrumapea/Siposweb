var modalTambahProduk = document.getElementById("modal-tambah-produk");
var btnTambahkanProduk = document.getElementById("btn-tambahkan-produk");
var btnClose = document.getElementsByClassName("close")[0];

btnTambahkanProduk.onclick = function() {
  modalTambahProduk.style.display = "block";
}

btnClose.onclick = function() {
  modalTambahProduk.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modalTambahProduk.style.display = "none";
  }
}