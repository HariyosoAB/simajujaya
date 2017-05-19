<!DOCTYPE html>
<html>
  <head>
    <title>Auto +</title>
    @include('master.head')
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('master.sidebar')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content" style="padding: 5% 10%;">
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Kelompok 1</strong>
      </footer>
    </div><!-- ./wrapper -->
  </body>
</html>
