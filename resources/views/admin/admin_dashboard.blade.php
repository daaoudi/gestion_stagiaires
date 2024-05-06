@extends('base.adminLTE')
@section('title')
Admin Dashboard
@endsection

@section('content')

<div class="wrapper">


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item my-3">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item my-3 d-none d-sm-inline-block">
                <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item my-3 d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Navbar Search -->
            <li class="nav-item my-3">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block">
                    <form class="form-inline">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>


            <li class="nav-item my-3">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item my-3">
                <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                    role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="/" class="brand-link">
            <img src="/img/favicon.png" alt="Gestion Stagiaires" class="brand-image rounded-1 elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Gestion Stagiaires</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/img/team/team-1.jpg" width="40px" height="40px"
                        class="img-circle elevation-2" alt={{ Auth::user()->nom }}>
                </div>
                <div class="info d-flex">
                    <a href="#"> {{ Auth::user()->nom }} </a>
                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                    <a href="#" class=" d-block ml-3"  onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();">
                    
                        <span class="material-symbols-outlined">
                            logout
                        </span>
                    </a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2" style="height: 19em;overflow-y: scroll">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item my-3">
                        <a href={{ route('encadrent.index') }} class="nav-link">
                           
                            <p>
                                Encadrant
                            </p>
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a href={{ route('stage.index') }} class="nav-link">
                            
                            <p>
                                Stage
                            </p>
                        </a>
                    </li>

                    <li class="nav-item my-3">
                        <a href={{ route('stagiaire.index') }} class="nav-link">
                            
                            <p>
                                Stagiaires
                            </p>
                        </a>
                    </li>
                    <li class="nav-item my-3">
                        <a href={{ route('absence.index') }} class="nav-link">
                           
                            <p>
                                Marquer Absence
                            </p>
                        </a>
                    </li>
                    
                   
                   
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $nbrEncadrents }}</h3>
                                <p>Encadrants</p>
                            </div>

                            <a href="{{ url('/encadrent') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $nbrStages }}</h3>

                                <p>Stages</p>
                            </div>

                            <a href="{{ url('/stage') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $nbrStagiaires }}</h3>

                                <p>Stagiaires</p>
                            </div>

                            <a href="{{ url('/stagiaire') }}" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    
                    <!-- ./col -->
                </div>
                <!-- /.row -->

                <hr>
               
              
                <!-- Main row -->
               
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2023 <a href="/">Gestion Stagiaire</a>.</strong>
        All rights reserved.

    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->





@endsection