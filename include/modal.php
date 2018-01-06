<!-- Modal -->
<div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Confirmer la suppression</h4>
            </div>
            <div class="modal-body">
                Etes vous sûr de vouloir supprimer cette entrée dans la base de donnée ?
            </div>
            <div class="modal-footer">
              <form role="form" method="post" action="supression.php">
                <input class="idf" type="hidden" name="id" id="id"/>
                <input class="nomidf" type="hidden" name="nomid" id="nomid"/>
                <input class="tablef" type="hidden" name="table" id="table"/>
                <input class="redf" type="hidden" name="red" id="red"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button class="btn btn-primary" type="submit">Confirmer</button>
              </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- MODAL END -->