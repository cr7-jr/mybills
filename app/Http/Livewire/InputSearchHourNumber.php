<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputSearchHourNumber extends Component
{
    public $hour_number;
    public $found;
    protected $listeners = ['clearTextInInput'];
    public  function clearTextInInput()
    {
        $this->hour_number=null;
        $this->found=0;
    }

    public function render()
    {
        if (strlen($this->hour_number)>2) {
            $data = file_get_contents('http://localhost:777/billingCorporation/public/api/newElectricityBill?searsh=' . $this->hour_number);
            $data = json_decode($data);
            $bills = $data->data;
            if ($bills == "هذا الرقم غير موجود") {
                $dataar = file_get_contents('http://localhost:777/billingCorporation/public/api/archivedElectricityBill?searsh=' . $this->hour_number);
                $dataar = json_decode($dataar);
                $billsar = $dataar->data;
                if ($billsar == "هذا الرقم غير موجود") {
                    $this->found = 0;
                } else {
                    $this->found = 1;
                }
            } else {
                $this->found = 1;
            }
        }
        else
        {
            // اخفاء الزر فيحال كان الرقم موجود وبعد الحذف لم يعد رقم حقيقي لكنه لن يخفي الزر مرة اخرى لانه لم يحقق شرط عدد الارقام
            $this->found=0;
        }
        return view('livewire.input-search-hour-number');
    }
}
