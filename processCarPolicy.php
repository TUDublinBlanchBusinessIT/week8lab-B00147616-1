<?php
date_default_timezone_set('Europe/Dublin');
include("CarPolicy2.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $policyNumber = $_POST["policyNumber"];
    $yearlyPremium = $_POST["yearlyPremium"];
    $dateOfLastClaim = $_POST["dateOfLastClaim"];

    $carPolicy = new CarPolicy($policyNumber, $yearlyPremium);
    $carPolicy->setDateOfLastClaim($dateOfLastClaim);

    echo "Initial Premium: $" . $yearlyPremium . "\n";

    echo "Discounted Premium: $" . $carPolicy->getDiscountedPremium() . "\n";
} else {
    echo "Invalid request method.";
}
?>