<?php
echo "Payment Success";
$id = $_GET['id'];
echo $id;
?>
<?php
$pay = 5;
?>
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST" id="buyCredits" name="buyCredits">

    <input type="hidden" name="business" value="sb-mdwby15947507@business.example.com" />

    <input type="hidden" name="cmd" value="_xclick" />

    <input type="hidden" name="amount" value="<?php echo $pay ?> " />

    <input type="hidden" name="currency_code" value="USD" />

    <input type="hidden" name="return" value="https://localhost/paymentscuccess.php?id='<?php echo $id; ?>'" />
</form>

<script>
    document.getElementById("buyCredits").submit();
</script>