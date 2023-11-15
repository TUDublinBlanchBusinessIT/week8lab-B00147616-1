<?php 

class CarPolicy 
{
    private $policyNumber = 0;
    private $yearlyPremuim = 0;
    private $dateOfLastClaim = "";
    
    public function __construct($policyNumber, $yearlyPremuim)
    {
        $this->policyNumber = $policyNumber;         
        $this->yearlyPremuim = $yearlyPremuim;
    }
    
    public function setDateOfLastClaim($dateOfTheLastClaim)
    
    public function getTotalYearsNoClaims()
{
     $currentDate = new DateTime();
     $lastDate= new DateTime($this->dateOfLastClaim);
     $interval = $currentDate->diff($lastDate);
     return $interval->format("%y");
}
    
    public function __toString()
    {
        return $this->policyNumber;
    }
}
?>