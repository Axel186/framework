<?php
/**
 * Default Footer.
 */

use Helpers\Profiler;
?>
</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework</b></a></p>
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">
                    <?php if(ENVIRONMENT == 'development') { ?>
                    <small><?= Profiler::getReport(); ?></small>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
Assets::js([
	'https://code.jquery.com/jquery-1.12.4.min.js',
    'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
]);

echo $js; // Place to pass data / plugable hook zone
echo $footer; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
