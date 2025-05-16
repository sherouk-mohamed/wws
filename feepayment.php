<?php 
 class feepayment extends payment
{
private float $feeAmount;
private string $dueDate;
private string $parentID;
 public function getFeeAmount(): float {
        return $this->feeAmount;
    }
    public function setFeeAmount(float $feeAmount): void {
        $this->feeAmount = $feeAmount;
    }

   
    public function getDueDate(): string {
        return $this->dueDate;
    }
    public function setDueDate(string $dueDate): void {
        $this->dueDate = $dueDate;
    }

  
    public function getParentID(): string {
        return $this->parentID;
    }
    public function setParentID(string $parentID): void {
        $this->parentID = $parentID;
    }
}

}
?>
