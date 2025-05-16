<?php 
require_once ("cart.php");
require_once ("implementation.php");

 class payment implements implementation 
{
private string $paymentID;
private  float $amount;
private string $transactionID;
private string $paymentStatus;
private string $paymentMethod;

    public function processPayment() {

    }

}
?>
