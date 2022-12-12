<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2021</span>
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
<div class="modal modal-default fade" id="logoutModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="alert alert-success alert-dismissible ">Agregar nuevo usuario</h4>
            </div>
            <form method="post" enctype="multipart/form-data" style="padding: 12px;">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_usuarios" placeholder="Usuario">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="text" class="form-control" name="nom_user" placeholder="Nombre">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input type="password" class="form-control" name="pass_user" placeholder="Contraseña">
                    <span class="glyphicon glyphicon-eye-close form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de perfil
                        <input type="file" name="subirImgusuarios">
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <select name="rol_user" id="" class="form-control" required>
                        <option value="1">admin</option>
                        <option value="2">Usuario comun</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary" name="insertar">guardar</button>
                </div>




            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Quieres cerrar sesion?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Selecciona cancelar para permanecer.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="seccion/logout.php">Salir</a>
            </div>
        </div>
    </div>
</div>




<!-- Bootstrap core JavaScript-->
<script src="<?= SERVERURL?>vendor/jquery/jquery.min.js"></script>
<script src="<?= SERVERURL?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?= SERVERURL?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= SERVERURL?>vendor/js/sb-admin-2.min.js"></script>



<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="<?= SERVERURL?>vendor/popper/popper.min.js"></script>
<script src="<?= SERVERURL?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- datatables JS -->
<script type="text/javascript" src="<?= SERVERURL  ?>vendor/datatables/datatables.min.js"></script>

<!-- para usar botones en datatables JS -->
<script src="<?= SERVERURL  ?>vendor/datatables/Buttons-1.5.6/js/dataTables.buttons.min.js"></script>
<script src="<?= SERVERURL  ?>vendor/datatables/JSZip-2.5.0/jszip.min.js"></script>
<script src="<?= SERVERURL  ?>vendor/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
<script src="<?= SERVERURL  ?>vendor/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
<script src="<?= SERVERURL  ?>vendor/datatables/Buttons-1.5.6/js/buttons.html5.min.js"></script>

<!-- código JS propìo-->
<script type="text/javascript" src="<?= SERVERURL  ?>vendor/main.js"></script>

</body>

</html>