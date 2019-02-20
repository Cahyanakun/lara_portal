<!DOCTYPE html>
<html lang="{{ app()->getlocale() }}">

 @include('super.layouts.head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    @include('super.layouts.header')
    @include('super.layouts.sidebar')
    @section('main')
        @show

    @include('super.layouts.footer')


</div>
<!-- ./wrapper -->
@include('super.layouts.script')
@section('main-script')
    @show

</body>
</html>
