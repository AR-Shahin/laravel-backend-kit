const log = (el = "Ok") => console.log(el);
const base_url = window.location.origin;
const base_url_admin = `${window.location.origin}/admin`;
const $$ = (el) => document.querySelector(el);

const deleteDataWithAlert = (url,callback) => {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
      })

      swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true,
        margin : '5em',
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete(url).then(res => {
         callback();
      })
          swalWithBootstrapButtons.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            'Cancelled',
            'Your imaginary file is safe :)',
            'error'
          )
        }
      })
}

const setSuccessMessage = (title = 'Data Save Successfully!') => {
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: title
      })
}

function selectPermission(param){
    $('input[id='+param+']').prop('checked', $('.'+param+'').prop('checked'));
}
$(document).ready(function () {
    $("#selectAll").click(function(){
    var clicks = $(this).data('clicks');
    $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
    if (clicks) {
        $('#replace').html('Select All');
    } else {
        $('#replace').html('Reset All');
    }
        $(this).data("clicks", !clicks);
    });
});
$(document).ready(function () {
  const forms = document.querySelectorAll('.needs-validation');
  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
});


$("body").on("click",".show_confirm",function(event){
  var form =  $(this).closest("form");
  event.preventDefault();
  swal({
      title: `Do you want to delete it?`,
      text: "If you delete this, it will be gone forever.",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      form.submit();
    }
  });
});

