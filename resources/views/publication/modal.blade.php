

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal-delete-{{$an->idmultimedia}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Desea eliminar la publicación?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Confirmar para Eliminar..</p>
      </div>
      <div class="modal-footer">
      	{{Form::open (array('action'=>array('MyPublicationsController@destroy', $an->idmultimedia), 'method'=>'delete'))}}
        {{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{Form::close()}}
      </div>
    </div>
  </div>
</div>