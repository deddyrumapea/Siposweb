var modalSuccess = document.getElementById("modal-transaction-added");
var btnCheckOut = document.getElementById("btn-check-out");
var btnConfirmation = document.getElementById("btn-confirmation");

btnCheckOut.onclick = function() {
	modalSuccess.style.display = "block";
}

btnConfirmation.onclick = function() {
	modalSuccess.style.display = "none";
}


// AJAX
// $(document).ready(function(){
// 	$("#btn-search").click(function(){
// 		$.ajax({
// 			url: 'search_produk.php',
// 			type: 'post',
// 			data: {search: $("#id-produk").val()}
// 			success: function(result){
// 				$("#result").html(result);
// 			}
// 		})
// 	})
// });

function searchProduk() {
	$.ajax({
		type: "POST",
		url: 'search_produk.php',
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
	document.getElementById("stock").value = data.stock;
}
