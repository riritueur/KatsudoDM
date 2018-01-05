<!-- /#wrapper -->

<!-- jQuery -->
<script src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../dist/js/sb-admin-2.js"></script>


<script>
  $('#modalDel').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('id')
    var nomid = button.data('nomid')
    var table = button.data('table')
    var red = button.data('red')

    var modal = $(this)
    modal.find('.idf').val(id)
    modal.find('.nomidf').val(nomid)
    modal.find('.tablef').val(table)
    modal.find('.redf').val(red)
})
</script>