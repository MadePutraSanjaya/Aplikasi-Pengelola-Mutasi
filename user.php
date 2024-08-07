<?php
     session_start();
    include "koneksi.php";
    
      if($_SESSION['status']!="login"){
        header("location: index.php");
      }

      $level = $_SESSION['level'];

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI Mutasi Command Center</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/korps.jpeg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="#" class="d-block"><strong>SICATAT</strong> | MUTASI</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <?php
          if ($level == "admin") {
            ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="personil.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Personil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pj.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penanggung Jawab</p>
                </a>
              </li>
            </ul>
          </li>
           
          <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="trx_mutasijaga.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Mutasi Piket
              </p>
            </a>
          </li>
            
          <?php
            } else {
              ?>
               <li class="nav-header">TRANSAKSI</li>
          <li class="nav-item">
            <a href="trx_mutasijaga.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Mutasi Piket
              </p>
            </a>
          </li>
              <?php 
            }

            ?>  

          <li class="nav-header">LAPORAN</li>
          <li class="nav-item">
            <a href="laporan.php" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Laporan Mutasi Jaga</p>
            </a>
          </li>

          <li class="nav-header">KELUAR</li>
          <li class="nav-item">
            <a href="./action/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
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
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Data Master</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Kelola Data User</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="button-table">
                <a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">Tambah User</a>
              </div>
            </div>
            <div class="card-body">  
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID User</th>
                  <th>Nama User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
          <?php 
          $query = mysqli_query($conn,"SELECT id_user,tb_personil.nama_personil,username,password,level,status_user 
                    FROM tb_user,tb_personil
                    WHERE tb_user.id_personil=tb_personil.id_personil");
          while ($data = mysqli_fetch_assoc($query)) 
          {
          ?>
            <tr>
              <td><?php echo $data['id_user']; ?></td>
              <td><?php echo $data['nama_personil']; ?></td>
              <td><?php echo $data['username']; ?></td>
              <td><?php echo $data['password']; ?></td>
              <td><?php echo $data['level']; ?></td>
              
                <?php 
                  if ($data['status_user']==1){
                    echo "<td>Aktif</td>";
                  }else{
                    echo "<td>Tidak Aktif</td>";
                  }
                ?>
              
              <td>
               <a href="#" type="button" class="btn btn-md <?php echo ($data['status_user'] == '0') ? 'btn-warning disabled' : 'btn-success'; ?>" data-toggle="modal" data-target="#myModal<?php echo $data['id_user']; ?>">Edit</a>

              <!-- <a href="#" type="button" class="btn btn-md btn-danger" data-toggle="modal" data-target="#myModal<?php echo $data['id_user']; ?>Delete">Delete</a> -->
              </td>
            </tr>
            <!-- Modal Edit User-->
            <div class="modal fade" id="myModal<?php echo $data['id_user']; ?>" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Update Data User</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/ubah.php" method="post">

                        <?php
                          $id = $data['id_user']; 
                          $query_edit = mysqli_query($conn,"SELECT tb_user.*, tb_personil.nama_personil FROM tb_user, tb_personil WHERE tb_user.id_personil=tb_personil.id_personil AND tb_user.id_user='$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        <input type="hidden" name="action" value="updateUser">

                        <div class="form-group">
                          <label>Nama Personil</label>
                          <input type="text" name="nama_personil" class="form-control" value="<?php echo $row['nama_personil']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">      
                        </div>

                        <div class="form-group">
                          <label>Role</label>
                          <?php 
                            if ($row['status_user']=='1'){
                              echo "<select name=\"level\" class=\"form-control\">
                                      <option value=\"admin\">admin</option>
                                      <option value=\"petugas\">petugas</option>      
                              </select>";
                            }else{
                              echo "<input type=\"text\" name=\"level\" class=\"form-control\" value=".$row['level']." disabled>";
                            } ?>      
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                          <?php 
                            if ($row['status_user']=='1'){
                              echo "<select name=\"status\" class=\"form-control\">
                                      <option value=\"1\">Aktif</option>
                                      <option value=\"0\">Tidak Aktif</option>      
                              </select>";
                            }else{
                              echo "<input type=\"text\" name=\"status\" class=\"form-control\" value=\"Tidak Aktif\" disabled>";
                            } ?>     
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Simpan Perubahan Data</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>

                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>

            <!-- Modal Delete -->
             <div class="modal fade" id="myModal<?php echo $data['id_user']; ?>Delete" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Anda Yakin Ingin Menghapus Data User?</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/hapus.php" method="post">

                        <?php
                          $id = $data['id_user']; 
                          $query_edit = mysqli_query($conn,"SELECT tb_user.*, tb_personil.nama_personil FROM tb_user, tb_personil WHERE tb_user.id_personil=tb_personil.id_personil AND tb_user.id_user='$id'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>

                        <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                        <input type="hidden" name="action" value="deleteUser">

                        <div class="form-group">
                          <label>Nama Personil</label>
                          <input type="text" name="nama_personil" class="form-control" value="<?php echo $row['nama_personil']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $row['username']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="password" class="form-control" value="<?php echo $row['password']; ?>" disabled>      
                        </div>

                        <div class="form-group">
                          <label>Role</label>
                            <input type="text" name="level" class="form-control" value="<?php echo $row['level']; ?>" disabled>
                        </div>

                        <div class="form-group">
                          <label>Status</label>
                          <?php 
                            if ($row['status_user']=='1'){
                              echo "<select name=\"status\" class=\"form-control\" disabled>
                                      <option value=\"1\">Aktif</option>
                                      <option value=\"0\">Tidak Aktif</option>      
                              </select>";
                            }else{
                              echo "<input type=\"text\" name=\"status\" class=\"form-control\" value=\"Tidak Aktif\" disabled>";
                            } ?>     
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-danger">Hapus Data User</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>

                        <?php 
                        }
                        ?>        
                      </form>
                  </div>
                </div>
                
              </div>
            </div>
          <?php               
          } 
          ?>
        </tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
          <!-- Modal Tambah -->
          <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">
              
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Tambah data user</h4>
                  </div>
                  <div class="modal-body">
                    <form role="form" action="action/tambah.php" method="post">
                    <input type="hidden" name="action" value="createUser">

                        <div class="form-group">   
                          <label>Personil</label>
                          <select name="personil" id="personil" class="form-control">
                              <option disabled selected> Pilih Personil </option>
                              <?php 
                                $sql=mysqli_query($conn,"SELECT * FROM tb_personil where id_personil NOT IN (SELECT id_personil FROM tb_user WHERE status_user='1') and status_personil <> '0'");
                                while ($data=mysqli_fetch_array($sql)) {
                              ?>
                                <option value="<?=$data['id_personil']?>"><?=$data['nama_personil']?></option> 
                              <?php
                                }
                              ?>
                          </select> 
                          
                          <label>Username</label>
                          <input type="text" name="username" class="form-control" value="">  
                          
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" value="">
                          
                          <label>Role</label>
                          <select name="level" id="level"  class="form-control">
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                          </select>        
                        </div>
                        
                        <div class="modal-footer">  
                          <button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>       
                      </form>
                  </div>
                </div>
                
              </div>
        </div>
        <!-- End of Modal Tambah -->
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>&copy; 2024</strong> UAS PEMROGAMMAN WEB
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
