<?php
    namespace app;
    class Cart{
        public $employeeLists = null;
        public $totalAmount = 0;
        public $totalEmployee = 0;

        public function __construct($oldList)
        {
            if ($oldList) {
                $this->employeeLists = $oldList->employeeLists;
                $this->totalEmployee = $oldList->totalEmployee;
                $this->totalAmount = $oldList->totalEmployee;
            }
        }

        public function add($emp, $id){
            $listedEmployee = ['amount'=>500, 'employee'=>$emp];
            if ($this->employeeLists) {
                if (array_key_exists($id, $this->employeeLists)) {
                   $listedEmployee = $this->employeeLists[$id];
                }
            }
            $this->totalAmount++;
            $listedEmployee['amount'] = 500 * $this->totalAmount;
            // $listedEmployee['amount'] = $emp->amount * $this->totalAmount;
            $this->employeeLists[$id] = $listedEmployee;
            
            $this->totalEmployee += $emp->amount;
        }
    }
?>

<?php

namespace App\Models;

class Bookings
{
    public $employeeLists = null;
        public $totalAmount = 500;
        public $totalEmployee = 0;

        public function __construct($oldList)
        {
            if ($oldList) {
                $this->employeeLists = $oldList->employeeLists;
                $this->totalEmployee = $oldList->totalEmployee;
                $this->totalAmount = $oldList->totalEmployee;
            }
        }

        public function add($emp, $id){
            $listedEmployee = ['qty'=>0, 'amount'=>500, 'employee'=>$emp];
            if ($this->employeeLists) {
                if (array_key_exists($id, $this->employeeLists)) {
                   $listedEmployee = $this->employeeLists[$id];
                }
            }
            $listedEmployee['qty']++;
            $listedEmployee['amount'] = $emp->amount * $listedEmployee['qty'];
            $this->employeeLists[$id] = $listedEmployee;
            $this->totalAmount += $emp->amount;
            $this->totalEmployee++;
    }
}