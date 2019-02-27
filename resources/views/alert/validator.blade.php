<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.min.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\CategoriesStoreRequest', '#addDataCategory') !!}