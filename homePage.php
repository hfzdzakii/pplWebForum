<?php
session_start();
include_once('yielder.php');
include_once('connectDb.php');

// handling session login
$state = "LoginPage";

$yielder = new Yielder($state);
$head = $yielder->getHead();
$tail = $yielder->getTail();
$header = $yielder->getHeader($state);
?>

<?php echo $head ?>
<?php echo $header ?>


<script>
    $(document).ready(function() {
        $('#dropdown-toggle').click(function() {
            $('#dropdown-menu').toggleClass('hidden');
        });

        $(document).click(function(e) {
            const target = e.target;
            if (!target.closest('#dropdown-toggle')) {
                $('#dropdown-menu').addClass('hidden');
            }
        });
    });
</script> 


<?php echo $tail ?>