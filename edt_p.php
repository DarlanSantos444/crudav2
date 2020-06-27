<?php
                    
  include "conexao.php";
  $conn = connection();

  try {
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM produtos WHERE id=:id");
  $stmt->bindParam(':id', $id);
  $id           = $_GET['id'];
  $stmt->execute();

  // set the resulting array to associative
  foreach($stmt->fetchAll() as $k=>$v) {
    $id               = $v['id'];
    $nome_produto     = $v['nome_produto'];
    $marca            = $v['marca'];
    $valor            = $v['valor'];
    $quantidade       = $v['quantidade'];
  } 
  } catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
  }
  $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Loja Construção</title>
  <?php
    include "_includes/header.php";
  ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<?php
    include "_includes/leftnav.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Editar Produto</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item"><a href="index_p.php">Produto</a></li>
              <li class="breadcrumb-item active">Editar Produto</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Atualização de Produto</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" name="form_edtproduto" method="POST" action="editar.php?id=<?php echo $id; ?>" >
            <div class="card-body">
              <div class="form-group">
                <label for="id">ID</label>
                <input type="number" class="form-control" id="id" name="id" required disabled value="<?php echo $id; ?>" >
              </div>
              <div class="form-group">
                <label for="nome_produto">Nome</label>
                <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="<?php echo $nome_produto; ?>">
              </div>
              <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $marca; ?>">
              </div>
              <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor" value="<?php echo $valor; ?>">
              </div>
              <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?php echo $quantidade; ?>">
              </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
    include "_includes/footer.php";
  ?>

</body>
</html>


