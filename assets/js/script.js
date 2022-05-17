const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal({
    title: "Data Todo ",
    text: "Berhasil " + flashData,
    type: "success",
  });
}

// tombol-hapus
$(".tombol-hapus").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal({
    title: "Apakah anda yakin?",
    text: "data todo akan dihapus",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus Data",
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});

// tombol-keluar
$(".tombol-keluar").on("click", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal({
    title: "Apakah anda yakin?",
    text: "session saat ini akan dihapus",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "keluar",
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  });
});
