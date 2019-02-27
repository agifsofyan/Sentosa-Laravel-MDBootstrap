cutable File  104 lines (90 sloc)  4.82 KB
  
@extends('admins.main')

@section('title', '| Kategori')

@section('breadcrumbUrl')
    <h4 class="mb-2 mb-sm-0 pt-1 float-left">
        <a href="/admin">Dashboard</a>
        <span>/</span>
        <a href="kategori">Kategori</a>
    </h4>
    <a class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#addMyModal">
        <i class="fas fa-plus"></i> Buat Data
    </a>
@endsection

@section('content')


      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-sm-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <!-- Table  -->
              <table id="tableData" class="table table-hover" width="100%">
                <!-- Table head -->
                <thead class="blue-grey lighten-4">
                  <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                    @if ($categories->count())
                    @foreach ($categories as $data)
                    <tr>
                        <td scope="row">{{ $data->id }}</td>
                        <td>{{ $data->category_name }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col-4">
                                    <a class="btn btn-sm btn-info"  data-toggle="popover" type="button" id="show">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="btn btn-sm btn-warning" data-toggle="popover" type="button" id="edit">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="btn btn-sm btn-danger" data-toggle="popover" type="button" id="remove">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table  -->

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->

{{-- Modal --}}

<div class="modal fade" id="addMyModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center text-white primary-color">
        <h4 class="modal-title w-100 font-weight-bold">Buat Data Kategori</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        
         <!-- Form -->
      <form id="addForm" method="POST" action="{{ route('categories.store') }}" class="needs-validation" novalidate>
            @csrf
            <p>Tambahkan data kategori ke database</p>

            <br/>

            <!-- Judul -->
            <div class="mt-3">
                <label for="category_name">Kategori</label>
                <input type="text" id="category_name" name="category_name" class="form-control">
            </div>
    
            <!-- Keterangan -->
            <div>
                <label for="keterangan">Keterangan</label>
                <textarea type="text" id="keterangan" name="keterangan" class="md-textarea form-control" rows="3"></textarea>
            </div>
    
            <!-- Sign in button -->
            <button id="btnSaveIt" type="submit" class="btn btn-primary btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Simpan</button>
            <button id="btnCloseIt" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    
        </form>
        <!-- Form -->

      </div>
    </div>
  </div>
</div>

<div id="popover-content-show">
    Lihat Data
</div>
<div id="popover-content-edit">
    Edit Data
</div>
<div id="popover-content-remove">
    Hapus Data
</div>

<style>

input.error, textarea.error {   
    border-color: rgb(220, 53, 69);
}

input.error:focus, textarea.error:focus {   
    border-color: rgb(220, 53, 69) !important;
  box-shadow: 0 1px 1px rgba(220, 53, 69, 0.075) inset, 0 0 8px rgba(220, 53, 69, 0.6);
  outline: 0 none;
}

input.valid, textarea.valid {   
    border-color: rgb(40, 167, 69);
}

input.valid:focus, textarea.valid:focus {   
    border-color: rgb(40, 167, 69) !important;
  box-shadow: 0 1px 1px rgba(40, 167, 69, 0.075) inset, 0 0 8px rgba(40, 167, 69, 0.6);
  outline: 0 none;
}
</style>

    
    <script>
        $(document).ready(function() {
            $('#tableData').DataTable();
        } );

        $("[data-toggle=popover]").each(function(i, obj) {
            $(this).popover({
                html: true,
                trigger: 'hover',
                placement: 'top',
                content: function() {
                    var id = $(this).attr('id')
                    return $('#popover-content-' + id).html();
                }
            });
        });
    </script>


<script>
$(function() {
    $("#addForm").validate({
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

        wrapper: 'div',
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        }
    });
})();
</script>
    
@endsection