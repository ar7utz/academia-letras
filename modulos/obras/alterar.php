<!DOCTYPE html>
<html lang="pt-br">

<?php
include '../../config.php';

if (empty($_SESSION['usuario'])) {
    header('Location: ' . arquivo('index.php'));
    exit;
}

?>

<?php include_once path('template/head.php'); ?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include_once path('template/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include_once path('template/navbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <h1 class="display-4 text-center">Alterar Cadastro</h1>


                    <?php
                    if (!empty($_GET['idObra'])) {
                        $id = $_GET['idObra'];
                    }

                    $pdo = Banco::conectar();
                    $sql = 'SELECT * FROM obra where idObra =  ' . $id . '';

                    foreach ($pdo->query($sql) as $row) {
                        $id      = $row['idObra'];
                        $titulo  = $row['tituloObra'];
                        $autores = $row['autoresObra'];
                        $sinopse = $row['sinopseObra'];
                        $imagem  = $row['imagemObra'];
                        $isbn    = $row['isbnObra'];
                        $ano     = $row['anoObra'];
                        $paginas = $row['paginasObra'];
                        $pdf     = $row['pdfObra'];
                        $link    = $row['linkObra'];
                        $genero  = $row['generoObra'];
                    }
                    Banco::desconectar();
                    ?>

                    <form action="update.php" method="POST">
                        <div class="form-group">
                            <label for="titulo">Titulo</label>
                            <input class="form-control" type="text" id="titulo" name="tituloObra" value="<?php echo $titulo; ?>">
                        </div>

                        <div class="form-group ">
                            <label for="autores">Autores</label>
                            <input class="form-control" type="text" id="autores" name="autoresObra" value="<?php echo $autores; ?>">
                        </div>

                        <div class="form-group ">
                            <label for="genero">Gênero</label>
                            <input class="form-control" type="text" id="genero" name="generoObra" value="<?php echo $genero; ?>">
                        </div>

                        <div class="form-group ">
                            <label for="isbn">Isbn</label>
                            <input class="form-control" type="text" id="isbn" name="isbnObra" value="<?php echo $isbn; ?>">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="ano">Ano de publicação</label>
                                <input class="form-control " type="number" id="ano" name="anoObra" value="<?php echo $ano; ?>">
                            </div>

                            <div class="form-group col-md-6 ">
                                <label for="paginas">Quantidade de páginas</label>
                                <input class="form-control " type="number" id="paginas" name="paginasObra" value="<?php echo $paginas; ?>">
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-gorup col-md-6">
                                <label for="imagem">Capa do livro</label>
                                <input class="form-control-file" type="file" id="imagem" name="imagemObra" value="<?php echo $imagem; ?>">
                            </div>

                            <div class="form-gorup col-md-6">
                                <label for="pdf">Arquivo de leitura</label>
                                <input class="form-control-file" type="file" id="pdf" name="pdfObra" value="<?php echo $pdf; ?>">
                            </div>
                        </div>

                        <div class="form-gorup">
                            <label for="link">Link da obra</label>
                            <input class="form-control" type="text" id="link" name="linkObra" value="<?php echo $link; ?>">
                        </div>

                        <div class="form-gorup">
                            <label for="sinopse">Sinopse</label>
                            <textarea class="form-control" type="sinopse" id="sinopse" name="sinopseObra" value="<?php echo $obra; ?>"></textarea>
                        </div>

                        <input type="hidden" id="id" name="idObra" value="<?php echo $id; ?>">

                        <div class="text-right my-3">
                            <input class="btn btn-primary" type="submit" value="Alterar">
                            <a class="btn btn-info" href="obras.php">Voltar</a>
                        </div>
                    </form>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Academia Araçatubense De Letras &copy; 2022</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <?php include path('template/logout.php'); ?>

        <?php include path('template/importacoes-js.php'); ?>
</body>

</html>