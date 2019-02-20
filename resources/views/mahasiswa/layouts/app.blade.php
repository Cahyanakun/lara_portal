<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">

 @include('mahasiswa.layouts.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('mahasiswa.layouts.header')
    @include('mahasiswa.layouts.sidebar')
    @section('main')
        @show

    @include('mahasiswa.layouts.footer')


</div>
<!-- ./wrapper -->
@include('mahasiswa.layouts.script')
@section('main-script')
    @show

</body>
</html>
