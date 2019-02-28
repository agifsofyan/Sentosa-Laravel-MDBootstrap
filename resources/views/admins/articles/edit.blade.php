
{{-- @foreach ($categories as $data) --}}
{{-- Modal Edit --}}
<div class="modal fade" id="editMyModal" tabindex="-1" role="dialog"
aria-labelledby="editMyModalLabel">
    <div class="modal-dialog modal-xl" role="document">
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

                <input type="hidden" name="id"/>
                    {{-- <input type="hidden" name="author_ID" value="{{ Auth::id() }}" /> --}}
                    <input type="hidden" name="author_ID" value="1" />

                    <div class="form-row">
                        <!-- Judul -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="post_title">Artikel</label>
                            <input type="text" id="post_title" name="post_title" class="form-control">
                        </div>
                        <!-- Kategori -->
                        <div class="form-group col-md-6 mb-3">
                            <label for="category_ID">Kategori</label>
                            {{-- <input type="text" id="category_ID" name="category_ID" class="form-control"> --}}
                            <select class="custom-select browser-default" id="category_ID" name="category_ID">
                                <option value="">Pilih Kategori</option>
                                <?php $categories = Helper::get_categories();
                                    if ($categories) {
                                        foreach($categories as $data){
                                        ?>
                                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                        <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- post_content -->
                    <div class="form-group">
                        <label for="post_content">Konten</label>
                        <textarea type="text" id="post_content" name="post_content" class="md-textarea form-control" rows="8">{{ old('post_content') }}</textarea>
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

    var id     = $(this).data('id');
    var title  = $(this).data('name');
    var desc   = $(this).data('descript');
    var cat    = $(this).data('cat');
    var status = $(this).data('status');
    $('#editForm input#id').val(id);
    $('#editForm input#post_title').val(title);
    $('#editForm textarea#post_content').val(desc);
    $('#editForm select#category_ID').val(cat);
    $('#editForm input[type=checkbox]').val(status);

    $("#editForm").attr('action', '/admin/articles/'+id);
});
</script>


<script>
$(function() {
    $("#editForm").validate({
        rules: {
            post_title: {
                required: true,
                minlength: 3
            },
            post_content: {
                required: true,
                minlength: 3
            },
            category_ID: {
                required: true
            },
            action: "required"
        },
        messages: {
            post_title: {
                required: "Bidang tidak boleh kosong",
                minlength: "Minimal 3 Karakter"
            },
            post_content: {
                required: "Bidang tidak boleh kosong",
                minlength: "Minimal 3 Karakter"
            },
            category_ID: {
                required: "Kamu belum memilih kategorinya"
            },
            action: "Harap berikan beberapa data"
        },

        highlight: function (element, error){
            $(element).closest('.form-group').find('input, textarea, select').addClass('is-invalid');
            // $(element).closest('.form-group').addClass('text-danger');
        },

        unhighlight: function (element, errorClass, validClass){
            $(element).closest('.form-group').find('input, textarea, select').removeClass('is-invalid').addClass('is-valid');
        }
    });
})();
        </script>
