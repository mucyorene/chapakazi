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
            $listedEmployee = ['amount'=>500, 'employee'=>$emp];
            if ($this->employeeLists) {
                if (array_key_exists($id, $this->employeeLists)) {
                   $listedEmployee = $this->employeeLists[$id];
                }
                $this->totalEmployee++;
            }
            
            $listedEmployee['amount'] = $listedEmployee['amount'] * $this->totalEmployee;
            $this->employeeLists[$id] = $listedEmployee;
            $this->totalAmount += $listedEmployee['amount'];
            
    }
}