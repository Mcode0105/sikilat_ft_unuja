const flashdata = $(".flash-data").data("flashdata");
const flashdataok = $(".flash-dataok").data("flashdata");
if (flashdata) {
  Swal.fire("Mohon Maaf", flashdata, "error");
}
if (flashdataok) {
  Swal.fire("Berhasil", flashdataok, "success");
}
