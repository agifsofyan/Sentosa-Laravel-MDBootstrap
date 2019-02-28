<!-- Button trigger modal-->
<!--Modal: modalConfirmDelete-->
<div class="modal fade modalConfirmDelete" id="modalConfirmDelete{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-notify modal-danger" role="document" style="height: 50%;">
        <!--Content-->
        <div class="modal-content text-center">
            <!--Header-->
            <div class="modal-header d-flex justify-content-center">
                <p class="heading">Hapus data {{ $data->category_name }}</p>
            </div>
            <!--Body-->
            <div class="modal-body">
                <i class="fas fa-times fa-4x animated rotateIn"></i>
            </div>
            <!--Footer-->
            <div class="modal-footer flex-center">
                {{ Form::open(array(
                    'action' => ['CategoriesController@destroy', $data->id],
                    'method' => 'DELETE',
                    'id'     => $data->id,
                    'style'  => 'display-inline'
                )) }}

                <button type="submit" class="btn btn-outline-danger">Yes</button>

                {{ Form::close() }}
                <button class="btn  btn-danger waves-effect" data-dismiss="modal">No</button>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: modalConfirmDelete-->


<script>
$("#modalConfirmDelete{{ $data->id }}").data('bs.modal').handleUpdate(50)
</script>

<style>
.modalConfirmDelete{
    /* position: fixed !important; */
    /* transition: 0s !important; */
    z-index: 5000 !important;
}
</style>
