<div class="page-footer">
    <p><?= date('Y'); ?> &copy; IMK <?= $version ?></p>
</div>

</div><!-- /Page Content -->
</div><!-- /Page Container -->


<!-- Javascripts -->
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/jquery/jquery-3.1.0.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/bootstrap/popper.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/switchery/switchery.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/plugins/sweetalert/js/sweetalert2.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/js/concept.min.js"></script>
<script src="<?= $hostToRoot ?>wp-content/assets/js/custom.js?v=<?= time() ?>"></script>
<script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<!-- Data Tables -->
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $(".table").DataTable({
            "language": {
                "url": "http://localhost/UNIKOM/IMK/wp-content/vendor/datatables/js/lang-id.json",
                "sEmptyTable": "Tidak ditemukan data di database"
            }
        });
    });
</script>
</body>

</html>