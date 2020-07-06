<?php

namespace App\Http\Livewire;

use Livewire\Component;

class InputSearchCounterNumber extends Component
{
    public $counter_number;
    public $found;
    public $text_not_found;

    protected $listeners = ['clearTextInInput'];

    public  function clearTextInInput()
    {
        $this->counter_number = null;
        $this->found = 0;
    }

    public function render()
    {
        if (strlen($this->counter_number) >= 1)
            $this->text_not_found='لا يوجد هذ الرقم';
        else $this->text_not_found='';

        if (strlen($this->counter_number) > 2) {
            $data = file_get_contents(Billing_CORPORATION_DOMAIN_NAME . 'api/newWaterBill?searsh=' . $this->counter_number);
            $data = json_decode($data);
            $bills = $data->data;
            if ($bills == "هذا الرقم غير موجود") {
                $dataar = file_get_contents(Billing_CORPORATION_DOMAIN_NAME . 'api/archivedWaterBill?searsh=' . $this->counter_number);
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
        } else {
            // اخفاء الزر فيحال كان الرقم موجود وبعد الحذف لم يعد رقم حقيقي لكنه لن يخفي الزر مرة اخرى لانه لم يحقق شرط عدد الارقام
            $this->found = 0;
        }
        return view('livewire.input-search-counter-number');
    }
}
