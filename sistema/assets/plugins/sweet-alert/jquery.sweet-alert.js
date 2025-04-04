$(function(e) {
	
	//Basic
	$('#swal-basic').on('click', function () {
		$('body').removeClass('timer-alert');
		swal('Welcome to Your Admin Page')
	});
	
	//A title with a text under
	$('#swal-title').click(function () {
		$('body').removeClass('timer-alert');
		swal(
			{
				title: 'Here is  a title!',
				text: 'All are available in the template',
			}
		)
	});
	
	//Success Message
	$('#swal-success').click(function () {
		$('body').removeClass('timer-alert');
		swal(
			{
				title: 'Well done!',
				text: 'You clicked the button!',
				type: 'success',
				confirmButtonColor: '#57a94f'
			}
		)
	});
	
	//Warning Message
	function excluirtest(id) {
		$('body').removeClass('timer-alert');
		swal({
		  title: "Tem certeza?",
		  text: "Você não conseguirá recuperar esse arquivo novamente!",
		  type: "error",
		  showCancelButton: true,
		  confirmButtonClass: "btn btn-danger",
		  confirmButtonText: "Sim, Deletar!",
		  closeOnConfirm: false
			
		},
		function(){
			excluir(id)
		  swal("Excluído(a)!", "Seu arquivo imaginário foi excluído.", "success");
		});
	}
	
	//Parameter
	$('#swal-parameter').click(function () {
		$('body').removeClass('timer-alert');
		swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this imaginary file!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonClass: "btn-danger",
		  confirmButtonText: "Yes, delete it!",
		  cancelButtonText: "No, cancel plx!",
		  closeOnConfirm: false,
		  closeOnCancel: false
		},
		function(isConfirm) {
		  if (isConfirm) {
			swal("Deleted!", "Your imaginary file has been deleted.", "success");
		  } else {
			swal("Cancelled", "Your imaginary file is safe :)", "error");
		  }
		});
	});
	
	//Custom Image
	$('#swal-image').click(function () {
		$('body').removeClass('timer-alert');
		swal({
			title: 'Lovely!',
			text: 'your image is uploaded.',
			imageUrl: '../assets/img/faces/6.jpg',
			animation: false,
		})
	});
	

	
	
	//Ajax with Loader Alert
	$('#swal-ajax').click(function () {
		$('body').removeClass('timer-alert');
		swal({
		  title: "Ajax request example",
		  text: "Submit to run ajax request",
		  type: "info",
		  showCancelButton: true,
		  closeOnConfirm: false,
		  showLoaderOnConfirm: true
		}, function () {
		  setTimeout(function () {
			swal("Ajax request finished!");
		  }, 2000);
		});
	});
	
});