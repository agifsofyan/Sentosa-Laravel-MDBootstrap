cutable File  104 lines (90 sloc)  4.82 KB
  
@extends('admins.main')

@section('title', '| Dashboard')

@section('content')



      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-sm-12 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    Selamat Datang Di Admin Panel Sentosa
                </h4>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->
    {{-- datatables --}}
    <script>
        $(document).ready(function() {
            $('#tableData').DataTable();
        } );
    </script>
@endsection