<header class="main-header">
  <!-- Logo -->
  <a href="../../index2.html" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>SI</b>MJ</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SI</b>MajuJaya</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

  </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{url('/')}}/dist/img/avatar.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{Auth::user()->hak_akses}}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        @if(Auth::user()->hak_akses=="sekretaris")
        <li class="header">Sekretaris</li>
        <li>
          <a href="{{url('/')}}/quotation">
            <i class="fa fa-th"></i> <span>Quotation</span>
          </a>
        </li>
        <li>
          <a href="{{url('/')}}/purchaseorder">
            <i class="fa fa-th"></i> <span>Purchase Order</span>
          </a>
        </li>
        <li>
          <a href="{{url('/')}}/paymentreceipt">
            <i class="fa fa-th"></i> <span>Payment Receipt</span>
          </a>
        </li>
        @else
       <li class="header">Koor Pergudangan</li>
       <li>
          <a href="{{url('/')}}/deliveryorder">
            <i class="fa fa-th"></i> <span>Delivery Order</span>
          </a>
        </li>
        <li>
          <a href="{{url('/')}}/proofitemreceipt">
            <i class="fa fa-th"></i> <span>Proof of Item Receipt</span>
          </a>
        </li>
        <li>
          <a href="{{url('/')}}/tabelbarang">
            <i class="fa fa-th"></i> <span>Mengelola Barang</span>
          </a>
        </li>
        @endif
        <li>
          <a href="{{url('/')}}/logout">
            <i class="fa fa-th"></i> <span>logout</span>
          </a>
        </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
