<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class payController extends Controller
{
    /*public function payEle($hour_number, $course_number, $id_bank, $send_email = true)
    {

        $bill = file_get_contents("http://localhost:777/billingCorporation/public/api/getNewElectricityBill/$hour_number/$course_number");
        $bill = json_decode($bill);
        $bill = $bill->data;

        $amount_due_of_payment = $bill->amount_due_of_payment;
        $result_check = file_get_contents('http://localhost:777/bemoBank/public/api/checkInformation/' . $id_bank . '/value/' . $amount_due_of_payment . '?number=' . $hour_number . '&course_number=' . $course_number . '&' . 'bill_type=electricity');

        $result_check = json_decode($result_check);

        if ($result_check[0] == true) {
            file_get_contents('http://localhost:777/billingCorporation/public/api/complatePayElectricity/' . $hour_number . '/' . $course_number . '/' . $result_check[1] . '/' . auth()->id());
            session()->flash('msg', 'تم الدفع');
            $details = [
                'body' => "تم دفع الفاتورة بنجاح ",
            ];
            if ($send_email) {
                \Mail::to(Auth::user()->email)->send(new \App\Mail\send_msg_pay_successfully($details));
                return \redirect('http://127.0.0.1:8000/en/myBills/new/electricity?hour_number=' . $hour_number);
            }
        } else {
            session()->flash('msg', 'الرصيد غير كافي لاتمام عملية الدفع');
            return \redirect('http://127.0.0.1:8000/en/myBills/new/electricity?hour_number=' . $hour_number);
        }
    }*/ //end pay
    /* public function payWat($counter_number, $course_number, $id_bank, $send_email = true)
    {
        $bill = file_get_contents("http://localhost:777/billingCorporation/public/api/getNewWaterBill/$counter_number/$course_number");
        $bill = json_decode($bill);
        $bill = $bill->data;
        $amount_due_of_payment = $bill->amount_due_of_payment;
        $result_check = file_get_contents('http://localhost:777/bemoBank/public/api/checkInformation/' . $id_bank . '/value/' . $amount_due_of_payment . '?number=' . $counter_number . '&course_number=' . $course_number . '&' . 'bill_type=water');
        $result_check = json_decode($result_check);
        if ($result_check[0] == true) {
            file_get_contents('http://localhost:777/billingCorporation/public/api/complatePayWater/' . $counter_number . '/' . $course_number . '/' . $result_check[1] . '/' . auth()->id());
            session()->flash('msg', 'تم الدفع');

            $details = [
                'body' => "تم دفع الفاتورة بنجاح ",
            ];
            if ($send_email) {
                \Mail::to(Auth::user()->email)->send(new \App\Mail\send_msg_pay_successfully($details));
                return \redirect('http://127.0.0.1:8000/en/myBills/new/water?counter_number=' . $counter_number);
            }
        } else {
            session()->flash('msg', 'الرصيد غير كافي لاتمام عملية الدفع');
            return \redirect('http://127.0.0.1:8000/en/myBills/new/water?counter_number=' . $counter_number);
        }
    }*/ //end pay
    /*  public function payTel($phone_number, $course_number, $id_bank, $send_email = true)
    {

        $bill = file_get_contents("http://localhost:777/billingCorporation/public/api/getNewTelecomeBill/$phone_number/$course_number");
        $bill = json_decode($bill);
        $bill = $bill->data;
        $amount_due_of_payment = $bill->amount_due_of_payment;
        $result_check = file_get_contents('http://localhost:777/bemoBank/public/api/checkInformation/' . $id_bank . '/value/' . $amount_due_of_payment . '?number=' . $phone_number . '&course_number=' . $course_number . '&' . 'bill_type=telecome');

        $result_check = json_decode($result_check);

        if ($result_check[0] == true) {
            file_get_contents('http://localhost:777/billingCorporation/public/api/complatePayTelecome/' . $phone_number . '/' . $course_number . '/' . $result_check[1] . '/' . auth()->id());
            session()->flash('msg', 'تم الدفع');
            $details = [
                'body' => "تم دفع الفاتورة بنجاح ",
            ];
            if ($send_email) {
                \Mail::to(Auth::user()->email)->send(new \App\Mail\send_msg_pay_successfully($details));
                return \redirect('http://127.0.0.1:8000/en/myBills/new/telecome?phone_number=' . $phone_number);
            }
        } else {
            session()->flash('msg', 'الرصيد غير كافي لاتمام عملية الدفع');
            return \redirect('http://127.0.0.1:8000/en/myBills/new/telecome?phone_number=' . $phone_number);
        }
    }*/ //end pay
    public  function payAll(Request $request)
    {
        //create  controllers objects to access the methods in them
        $tel=new billTelecomeController();
        $ele=new billElecticityController();
        $wat=new billWaterController();

        $phones = $request->number;
        $courses = $request->course_number;
        $bank_id = Auth::user()->bank_id;
        $types = $request->type;
        $arr = [];
        $send_mail=false;
        for ($i = 0; $i < count($phones); $i++) {
            if ($types[$i] == 'electricity') {
                $ele->pay($phones[$i], $courses[$i], $bank_id, false);
                $arr[$i] = ' الدورة رقم ' . $courses[$i] . " التابعة لرقم الساعة " . $phones[$i]. ' '. session()->get('msg');
            } else if ($types[$i] == 'water') {
                $wat->pay($phones[$i], $courses[$i], $bank_id, false);
                $arr[$i] = ' الدورة رقم ' . $courses[$i] . " التابعة لرقم العداد " . $phones[$i]. ' '. session()->get('msg');
            } else {
                $tel->pay($phones[$i], $courses[$i], $bank_id, false);
                $arr[$i] = ' الدورة رقم ' . $courses[$i] . " التابعة لرقم الهاتف " . $phones[$i]. ' '. session()->get('msg');
            }

        }
        foreach ($arr as $index) {
           if(strpos($index,'تم الدفع'))
           {
              $send_mail=true;
           }
        }
        if($send_mail)
        {
            $details = [
                'body' => "تم دفع الفاتورة بنجاح ",
            ];
        }
        session()->flash('all_msg_results_pay', $arr);
        return redirect(url()->previous());
    } //end payAll
}
