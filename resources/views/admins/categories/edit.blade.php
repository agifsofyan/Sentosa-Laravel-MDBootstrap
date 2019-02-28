
{{-- @foreach ($categories as $data) --}}
{{-- Modal Edit --}}
<div class="modal fade" id="editMyModal" tabindex="-1" role="dialog" 
aria-labelledby="editMyModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center text-white primary-color">
            <h4 class="modal-title w-100 font-weight-bold">Edit Data Kategori</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body mx-3">
            
            <!-- Form -->
            <form id="editForm" method="POST" action="" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <p>Tambahkan data kategori ke database</p>
    
                <br/>

                <input type="text" id="id_cat" name="id" hidden>
                <!-- Judul -->
                <div class="form-group">
                    <label for="category_name">Kategori</label>
                    <input type="text" id="category_name" name="category_name" class="form-control">
                </div>
        
                <!-- Keterangan -->
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea type="text" id="keterangan" name="keterangan" class="md-textarea form-control" rows="3">{{ old('keterangan') }}</textarea>
                </div>
        
                <!-- Sign in button -->
                <button type="submit" class="btn btn-primary btn-rounded btn-block z-depth-0 my-4 waves-effect">Simpan</button>
        
            </form>
            <!-- Form -->
    
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}

<script>
 $(document).on('click', '.edit', function() {
    $('#editMyModal').modal('show');
        
    var id = $(this).data('id');
    var title = $(this).data('name');
    var desc = $(this).data('descript');
    $('#editForm input#id').val(id);
    $('#editForm input#category_name').val(title);
    $('#editForm textarea#keterangan').val(desc);

    $("#editForm").attr('action', '/admin/categories/'+id);
});
</script>


<script>
$(function() {
    $("#editForm").validate({
        rules: {
            category_name: {
                required: true,
                minlength: 3
            },
            keterangan: {
                required: true,
                minlength: 3
            },
            action: "required"
        },
        messages: {
            category_name: {
                required: "Bidang tidak boleh kosong",
                minlength: "Minimal 3 Karakter"
            },
            keterangan: {
                required: "Bidang tidak boleh kosong",
                minlength: "Minimal 3 Karakter"
            },
            action: "Harap berikan beberapa data"
        },
  
        highlight: function (element, error){
            $(element).closest('.form-group').find('input, textarea').addClass('is-invalid');
            // $(element).closest('.form-group').addClass('text-danger');
        },
            
        unhighlight: function (element, errorClass, validClass){
            $(element).closest('.form-group').find('input, textarea').removeClass('is-invalid').addClass('is-valid');
        }
    });
})();
        </script>