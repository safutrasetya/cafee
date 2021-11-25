<!-- <script>
  jQuery(function($) {
    $('#divAlertHapus').delay(3000).fadeOut(500);
  });
  var formodal = document.getElementById('hapustransaksi')
  formodal.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var idforhapus = button.getAttribute('data-bs-hapus')
    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalTitle = formodal.querySelector('.modal-title')
    var modalBodyInput = formodal.querySelector('.modal-body input')

    modalTitle.textContent = 'Hapus Transaksi :  ' + idforhapus
    modalBodyInput.value = idforhapus
  })
</script> -->
