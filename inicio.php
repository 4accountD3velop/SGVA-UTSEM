<?php 
  session_start();
      if(@!$_SESSION['idUsuario']){
      header("location:index.php");

  }  
  


 require 'plantilla.php' ?>
  <!-- Navbar <body class="hold-transition sidebar-mini layout-fixed">-->
  <body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>-->


  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6"><hr>
            <h5 class="m-0">Registro de visitas académicas</h5><hr>
          </div><!-- /.col -->
          <div class="col-sm-6">
           
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
<?php
require'conexion.php';
     $sql="SELECT * from visitas WHERE estatusVisita ='Archivado' ";
          $result=mysqli_query($mysqli,$sql); 
         $count2 ='';
          while($mostrar=mysqli_fetch_array($result)){  
            $count2++;
          }
        
      ?>  
                <h3><?php echo($count2); ?></h3>

                <p>Archivadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-file"></i>
              </div>
              <a href="mostrar_visitas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
    <?php
require'conexion.php';
     $sql="SELECT * from visitas WHERE estatusVisita ='Realizadas' ";
          $result=mysqli_query($mysqli,$sql); 
         $count1 ='';
          while($mostrar=mysqli_fetch_array($result)){  
            $count1++;
          }
      ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo($count1); ?><sup style="font-size: 20px"></sup></h3>

                <p>Realizadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="mostrar_visitas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <?php
require'conexion.php';
     $sql="SELECT * from visitas WHERE estatusVisita ='En proceso' ";
          $result=mysqli_query($mysqli,$sql); 
         $count ='';
          while($mostrar=mysqli_fetch_array($result)){  
            $count++;
          }
      ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo($count); ?></h3>

                <p>En proceso</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="mostrar_visitas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
              <?php
require'conexion.php';
     $sql="SELECT * from visitas WHERE estatusVisita ='No realizadas' ";
          $result=mysqli_query($mysqli,$sql); 
         $count3 ='';
          while($mostrar=mysqli_fetch_array($result)){  
            $count3++;
          }
      ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo($count3); ?></h3>

                <p>No realizadas</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="mostrar_visitas.php" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar 
  <aside class="control-sidebar control-sidebar-dark">
   
  </aside> -->
  <!-- /.control-sidebar-->
</div>

<?php require'footer.php';
?>