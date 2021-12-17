<!DOCTYPE html>
<html lang="en">



@include('includes.header')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      
      @include('includes.navbar')

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        

        @include('includes.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

        @yield('content')
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



  @include('includes.scripts')
  @include('includes.footer')

</body>

</html>
