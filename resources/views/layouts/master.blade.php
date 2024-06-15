
@include("admin.header")
@include("admin.navbar")
@include("admin.sidebar")



 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        @yield("status")

        <div class="row mb-2">
          
          <div class="col-sm-6">
            
            <h1 class="m-0">@yield("currentPage", "Dasboard")</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="{{ route('home') }}" class="inactive">Home</a>
        </li>
                
        <?php $link = "" ?>
        @for($i = 1; $i <= count(Request::segments()); $i++)
            @if($i < count(Request::segments()) & $i > 0)
                <?php $link .= "/" . Request::segment($i); ?>
                @if ($i == 1)
                <li class="breadcrumb-item ">

                  <a href="<?= $link ?>" > {{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a>
                </li>
                {{-- @else
                <li class="breadcrumb-item y">

                  <a href="<?= $link ?>" >{{ ucwords(str_replace('-',' ',Request::segment($i)))}}</a>
                </li > --}}
                @endif
            @else
            <li class="breadcrumb-item active">

              <a >{{ucwords(str_replace('-',' ',Request::segment($i)))}}</a>
            </li>
            @endif
        @endfor
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
        @yield("content")
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @include("admin.script")
  @include("admin.footer")
  