 $(".hapus-tombol").click(function(event) {
// $('.hapus-tombol').on('click', function (e) {
    event.preventDefault();
    // event.stopImmediatePropagation();
    // return false;
    
    const href = $(this).attr('href');
    	sweetAlert({
			  title: "Are you sure?",
			  text: "You will not be able to recover this imaginary file!",
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
  								document.location.href = href
   								 sweetAlert("Deleted!", "Your imaginary file has been deleted.", "success");
  								} else {
   							 sweetAlert("Cancelled", "Your imaginary file is safe :)", "error");
  						}
			});

  		});

// $("div.subtab_left li.notebook a").click(function(e) {
    // e.stopImmediatePropagation();
// });

$('#sendButton').click(function(AnswerComment) {

    var userID = $('#user_id').val();
    var postID = $('#comment_post').val();
    var groupID = $('#user_group').val();
    var desc = $('#comment_body').val();

// $(".hapus-tombol").click(function(event){

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
