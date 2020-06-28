
$(document).on("click", "#hapus", function(e) {
           e.preventDefault();
            var href = $(this).attr('href');
swal({
  title: "Are you sure?",
  text: href + "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
  
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
    window.location = href;
      } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});


});


const flashData = $(".flash-data").data("flashdata");
if (flashData) {
	swal({
		title: "Administrator",
		text: "" + flashData,
		type: "success",
    timer: 1500,
    showConfirmButton: false
	});
}

// $("div.subtab_left li.notebook a").click(function(e) {
    // e.stopImmediatePropagation();
// });

// Swal.fire({
  // ...
// }).then(function (result) {
  // if (result.value) {
    // handle confirm
  // } else {
    // handle cancel
  // }
// })
