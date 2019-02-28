cutable File  104 lines (90 sloc)  4.82 KB

@extends('admins.main')

@section('title', '| Artikel')

@section('breadcrumbUrl')
    <h4 class="mb-2 mb-sm-0 pt-1 float-left">
        <a href="/admin">Dashboard</a>
        <span>/</span>
        <a href="Artikel">Artikel</a>
    </h4>
    <a class="float-right btn btn-sm btn-primary" data-toggle="modal" data-target="#addMyModal">
        <i class="fas fa-plus"></i> Buat Data
    </a>
@endsection

@section('content')

@include('admins.articles.create')
@include('admins.articles.edit')

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
                            <th>Penulis</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table head -->

                    <!-- Table body -->
                    <tbody>

                        @if ($data->count())
                        @foreach ($data as $field)

                        <tr class="data-row">
                            <td>{{ $field->id }}</td>
                            <td>{{ $field->author_ID }}</td>
                            <td>{{ $field->post_title }}</td>
                            <td>{{ $field->calledItems->category_name }}</td>
                            <td>{{ $field->updated_at }}</td>
                            <td>
                                <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                    <button type="button" class="show btn stylish-color" pop="show" id="show" ><i class="fas fa-eye text-info"></i></button>
                                    <button
                                        type="button" class="edit btn stylish-color"
                                        pop="edit"
                                        data-id="{{ $field->id }}"
                                        data-name="{{ $field->post_title }}"
                                        data-descript="{{ $field->post_content }}"
                                        data-cat="{{ $field->category_ID }}"
                                        data-status="{{ $field->statuses }}"
                                    >
                                        <i class="fas fa-marker text-warning"></i>
                                    </button>
                                    <button type="button" class="remove btn stylish-color" pop="remove" id="remove" data-toggle="modal" data-target="#modalConfirmDelete{{ $field->id }}"><i class="fas fa-trash-alt text-danger"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        @include('admins.articles.remove')

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

<style>

.error{
    color: #dc3545;
    font-size: 14px;
}
</style>


<script>
    $(document).ready(function() {
        $('#tableData').DataTable();
    } );

    $(".show, .edit, .remove").each(function(i, obj) {
        $(this).popover({
            html: true,
            trigger: 'hover',
            placement: 'top',
            content: function() {
                var pop = $(this).attr('pop');
                var title = $(this).attr('data-name');
                return $('#popover-content-' + pop).html();
            }
        });
    });

    // on modal hide
    $(document).ready(function(){
        $('.modal').on('hidden.bs.modal', function(e){
          $(this).find('form')[0].reset();
          $('.form-group').find('label.error').hide();
          $('input, textarea, select').removeClass('is-invalid is-valid');
        });
    });
</script>

<div id="popover-content-show" style="display: none;">
    Lihat Data
</div>
<div id="popover-content-edit" style="display: none;">
    Edit Data
</div>
<div id="popover-content-remove" style="display: none;">
    Hapus Data
</div>

@endsection
