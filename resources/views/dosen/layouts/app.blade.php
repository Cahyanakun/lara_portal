<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">

 @include('dosen.layouts.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('dosen.layouts.header')
    @include('dosen.layouts.sidebar')
    @section('main')
        @show

    @include('dosen.layouts.footer')


</div>
<!-- ./wrapper -->
@include('dosen.layouts.script')
@section('main-script')
    @show

</body>
</html>
