<?php session_start();

if (!isset($_SESSION["acces"]))
    header("Refresh:0; url='../index.html'");
    include_once "../config/Database.php";
    include_once  "../models/Functions.php";
 
?>
    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="..static/img/logo/logo.jpeg" rel="icon">
  <title>WANDTECH</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader 
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="../static/img/logo/logo.jpeg">
  </div>-->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../PHP/sessionManagement/sessionEnd.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
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

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../static/img/logo/logo1.png" alt="" class="brand-image elevation-3" style="opacity: .8">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src=<?php echo  "../". $_SESSION["image"] ?> class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo  $_SESSION["prenom"] . " " . $_SESSION["nom"] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
             
            </ul>
          </li>
     
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enregistrement des Produits</p>
                </a>
              </li>
             
          
            
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Tables
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Produits</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Commandes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">PLUS</li>
          <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
      
          
             <!-------------mails box----------------->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>
          <!-------------pages----------------->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
             
            </ul>
          </li>
     
          
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) OK -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">WANDTECH Board</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../PHP/sessionManagement/sessionEnd.php">Home</a></li>
              <li class="breadcrumb-item active">WANDTECH Board</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!------------------------OK--------------------------------------------------->
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Info boxes -->
            
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <div class="col-md-8">
                <!-- TABLE: LISTE DE MESSAGE RECUS -->
                <div class="card">
                  <div class="card-header border-transparent">
                    <h3 class="card-title">Messages Reçus</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                                
                  <div class="card-body p-0">
                    <div class="table-responsive">
                    
                      <table class="table m-0">
   
                        <thead>
                        <tr>
                          <th>Nom</th>
                          <th>Sujet</th>
                          <th>Message</th>
                          <th>Date</th>
                          <th>Email</th>
                          <th>Efacez msg</th>
                        </tr>
                        </thead>
                       
                        <tbody>
                        <?php 
                                      $message= file_get_contents('../json/message.json');
                                      $message= json_decode($message,true);

                                      for( $i=0; $i<count($message);$i++) :

                                      ?>
                        <tr>
                          <td><a href="pages/examples/invoice.html"><?php  echo $message[$i]['nom'];?></a></td>
                          <td><?php  echo $message[$i]['subj'];?></td>
                          <td><p class="wrap"><?php  echo $message[$i]['msg'];?></p></td>
                          <td>
                            <div class="sparkbar" data-color="#f39c12" data-height="20"><?php  echo $message[$i]['date'];?></div>
                          </td>
                          <td><?php  echo $message[$i]['email'];?></td>
                          <td><a href='../controller/AppsController.php?delmsg=<?php  echo $message[$i]['id'];?>' class='btn btn-sm0 btn-danger float-right'>Delet msg</a></td>
                        </tr>
                       
                        </tbody>
                        <?php  endfor; ?>
                      </table>
                    </div>
                    <!-- /.table-responsive -->
                  </div>
                  
                  <!-- /.card-body -->
                  <div class="card-footer clearfix">
                  
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Delet All Messages</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->

              <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Liste des produits en ligne</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">Samsung TV
                            <span class="badge badge-warning float-right">$1800</span></a>
                          <span class="product-description">
                            Samsung 32" 1080p 60Hz LED Smart HDTV.
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">Bicycle
                            <span class="badge badge-info float-right">$700</span></a>
                          <span class="product-description">
                            26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">
                            Xbox One <span class="badge badge-danger float-right">
                            $350
                          </span>
                          </a>
                          <span class="product-description">
                            Xbox One Console Bundle with Halo Master Chief Collection.
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <li class="item">
                        <div class="product-img">
                          <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                        </div>
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">PlayStation 4
                            <span class="badge badge-success float-right">$399</span></a>
                          <span class="product-description">
                            PlayStation 4 500GB Console (PS4)
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    </ul>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    <!----------------section categorie images------>
    <section class="content">
      <div class="row">
      <div class="col-md-8">
          <!-- TABLE: LISTE IMAGES -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">LISTE DE IMAGE EN LIGNE</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
                          
            <div class="card-body p-0">
              <div class="table-responsive">
              
                <table class="table m-0">

                  <thead>
                  <tr>
                    <th>Image</th>
                    <th>Categorie</th>
                    <th>description</th>
                    <th>modifier</th>
                    <th>Efacez msg</th>
                  </tr>
                  </thead>
                  
                  <tbody>
                  <?php 
              
                  $img = new Functions();
                  $imgLis= $img->getAllImage();

                  $i = 0;
                  while ($i <= (count($imgLis) - 1)) {
                      $id_prod = $imgLis[$i]->get_idImg_ImgWorck();
                    echo "
                        <tr>
                       
                          <td><img src= '../".$imgLis[$i]->getImgWorck()."' style='max-width:20%;height:auto'></td>
                          <td>".$imgLis[$i]->getCategorieImgWorck()."</td>
                          <td><p class='wrap'>".$imgLis[$i]->getDescImgWorck()."</p></td>
                          <td><a href='' class='btn btn-sm0 btn-primary float-right'>Update</a> </td>
                           <td><a href='../controller/AppsController.php?delImg=".$imgLis[$i]->get_idImg_ImgWorck()."' class='btn btn-sm0 btn-danger float-right'>Delet</a> </td>

                          
                        
                        </tr>
                      ";
                       $i++;
                      } 
                    ?>
                      
                      
                  </tbody>
                   
                      
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            
              <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Delet All Messages</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card IMAGE -->
        </div>
        <div class="col-md-4">
          <!-- Form Element sizes -->
          <div class="card card-success">
            <div class="card-header">
              <h3 class="card-title">Charger des images </h3>
            </div>
            <form action="../controller/AppsController.php"  method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label>Chargement d'un fichier</label>
                  <div class="input-grou">
                      <div class="col-md-6">
                      <input type="file" class="form-control" name="image"  placeholder="votre image" required>
                   </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Description</label>
                    <input type="text" class="form-control" name="desc" placeholder="Description">
                  </div>
                  <!------->
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- select -->
                      <div class="form-group">
                        <label>Cathegorie image</label>
                        <select class="custom-select" name="select">
                          <option>Travaux executes</option>
                          <option>conception</option>
                          <option>Travaux en curs</option>
                          <option>baniere</option>
                          <option>autre</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!---->              
                </div>
               
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary form-control" name="sendImg0">Chargez</button>
              </div>
            </form>
            <!-- /.card-body -->
          </div>
        </div>

       
      </div>
    </section>
   <!-- section LISTE PRODUIT -->
    <section class="content">
        <div class="row">

          <div class="col-md-8">
            <!-- TABLE: LISTE PRODUIT -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Liste des produits en ligne</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
                            
              <div class="card-body p-0">
                <div class="table-responsive">
                
                  <table class="table m-0">

                    <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Sujet</th>
                      <th>Message</th>
                      <th>Date</th>
                      <th>Email</th>
                      <th>Efacez msg</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    <?php 
                                  $message= file_get_contents('../message.json');
                                  $message= json_decode($message,true);

                                  for( $i=0; $i<count($message);$i++) :

                                  ?>
                    <tr>
                      <td><a href="pages/examples/invoice.html"><?php  echo $message[$i]['nom'];?></a></td>
                      <td><?php  echo $message[$i]['subj'];?></td>
                      <td><p class="wrap"><?php  echo $message[$i]['msg'];?></p></td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20"><?php  echo $message[$i]['date'];?></div>
                      </td>
                      <td><?php  echo $message[$i]['email'];?></td>
                      <td><p class="badge badge-warning">Dlete</p></td>
                    </tr>
                    
                    </tbody>
                    <?php  endfor; ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              
                <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">Delet All Messages</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <!-- Form Element sizes -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Charger des produits en ligne</h3>
              </div>
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
          </div>
         </div>
    </section>

  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
</body>
</html>
