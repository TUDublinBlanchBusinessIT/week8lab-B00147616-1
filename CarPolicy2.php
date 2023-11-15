<?php

class CarPolicy
{
    private $policyNumber = 0;
    private $yearlyPremium = 0;
    private $dateOfLastClaim = "";

    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }

    public function setDateOfLastClaim($dateOfLastClaim)
    {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }

    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate = new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }

    public function getDiscount()
    {
        $yearsNoClaims = $this->getTotalYearsNoClaims();

        if ($yearsNoClaims >= 3 && $yearsNoClaims <= 5) {
            return 0.10; // 10% Discount
        } elseif ($yearsNoClaims > 5) {
            return 0.15; // 15% Discount
        } else {
            return 0; // No discount
        }
    }

    public function getDiscountedPremium()
    {
        $discount = $this->getDiscount();
        $discountedPremium = $this->yearlyPremium * (1 - $discount);
        return $discountedPremium;
    }

    public function __toString()
    {
        return $this->yearlyPremium;
}
}
?>