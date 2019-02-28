
{{-- Modal --}}
<div class="modal fade" id="addMyModal" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header text-center text-white primary-color">
                <h4 class="modal-title w-100 font-weight-bold">Buat Data Artikel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
             
                <!-- Form -->
                <form id="addForm" method="POST" action="{{ route('articles.store') }}" class="needs-validation" novalidate>
                    @csrf
                    <p>Tambahkan data Artikel ke database</p>
      
                    <br/>

                    <input type="hidden" name="id"/>
                    {{-- <input type="hidden" name="author_ID" value="{{ Auth::id() }}" /> --}}
                    <input type="hidden" name="author_ID" value="1" />
                    
                    <div class="form-row">
                        <!-- Judul -->
                        <div class="form-group col-md-5 mb-3">
                            <label for="post_title">Artikel</label>
                            <input type="text" id="post_title" name="post_title" class="form-control">
                        </div>
                        <!-- Kategori -->
                        <div class="form-group col-md-5 mb-3">
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
                            {{-- <div class="invalid-feedback">Example invalid custom select feedback</div> --}}
                        </div>
                        <!-- Status -->
                        <div class="form-group col-md-2 mb-3">
                            <label for="statuses">Status</label>
                            <!-- Material switch -->
                            <div class="material-switch pull-right bord">
                                @if ($data->statuses === 1)
                                    <input type="checkbox" name="statuses" checked="" value="hidden">
                                @else
                                    <input id="statuses" type="checkbox" name="statuses" value="publish" {{ old('statuses') ? 'checked' : '' }} >
                                @endif
                                <label for="statuses" class="label-info"></label>
                            </div>
                        </div>
                    </div>
          
                    <!-- post_content -->
                    <div class="form-group">
                        <label for="post_content">post_content</label>
                        <textarea type="text" id="post_content" name="post_content" class="md-textarea form-control" rows="8"></textarea>
                    </div>
          
                    <!-- Sign in button -->
                    <button type="submit" class="btn btn-primary btn-rounded btn-block z-depth-0 my-4 waves-effect">Simpan</button>
        
                </form>
                <!-- Form -->
            </div>
        </div>
    </div>
</div>


<script>
$(function() {
    $("#addForm").validate({
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
            
        // wrapper: 'div',
        // errorPlacement: function (error, element) {
        //     error.addClass("invalid-feedback");
        //     error.insertAfter(element);
        // }
            
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


<style>

.bord{
    background: silver;
    border: 11px solid silver;
    padding-top: 6px;
}

.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: brown;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    /* background: inherit; */
    background: rgb(13, 71, 161);
    left: 20px;
}

</style>