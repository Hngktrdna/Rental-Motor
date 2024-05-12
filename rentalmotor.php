<?php 
class Rental {
    public
    $member,
    $jenis,
    $waktu,
    $diskon;
    protected 
    $pajak = 10000,
    $scooter = 50000, $sport = 40000, $cross = 60000, $sportTouring = 80000;
    private $listMember = ['Jake', 'Jay', 'Kevin', 'Karen', 'Winter'];

    public function getMember() {
        if (in_array($this->member, $this->listMember)) {
            return "Member";
        } else {
            return "Non Member";
        }
    }
}

class Process extends Rental {
    public function harga() {
        $listHarga = [
            "scooter" => $this->scooter, "sport" => $this->sport, "cross" => $this->cross, "sportTouring" => $this->sportTouring
        ];
        $harga = $listHarga[$this->jenis];
        if($this->getMember() == "Member") {
            $diskon = .5;
        } else {
            $diskon = 0;
        }
        $bayar = (($harga * $this->waktu) - ($harga * $diskon) + ($this->pajak));
        return [$bayar, $diskon, $harga];
    }
    public function getReceipt() {
        $receipt = $this->member . " as a " .$this->getMember() . " gets a " . $this->harga()[1] . "% discount.".  "\n";
        $receipt .= "Type of motorcycle rented is " . $this->jenis . " for " . $this->waktu . " day." . "\n";
        $receipt .= "Rental price per day: Rp" . $this->harga()[2] . " \n";
        $receipt .= "Total Price to be paid: Rp" . number_format($this->harga()[0]) . "\n";
        return $receipt;
    }
}


?>