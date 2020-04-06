<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;

class additionsController extends Controller
{
    public function pdfTelecome()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getNewTelecomeBill/' . \request()->phone_number . '/' . \request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $pdf = PDF::loadView('client.bill.pdfTelecome',compact('bill'));
        return $pdf->stream('document.pdf');

    }
    public function pdfElectricity()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getNewElectricityBill/' . \request()->hour_number . '/' . \request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $pdf = PDF::loadView('client.bill.pdfElectricity',compact('bill'));
        return $pdf->stream('document.pdf');
    }
    public  function  pdfWater()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getNewWaterBill/' . \request()->counter_number . '/' .\request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $pdf = PDF::loadView('client.bill.pdfWater',compact('bill'));
        return $pdf->stream('document.pdf');
    }
    public function pdfWaterArchived()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getArchivedWaterBill/' . \request()->counter_number . '/' . \request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $receipt = file_get_contents('http://localhost:777/bemoBank/public/api/getReceipt/' . $bill->receipt_id);
        $receipt = json_decode($receipt);
        $receipt = $receipt->data;
        $pdf = PDF::loadView('client.bill.pdfWater',compact('bill','receipt'));
        return $pdf->stream('document.pdf');
    }
    public function pdfTelecomeArchived()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getArchivedTelecomeBill/' . \request()->phone_number . '/' . \request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $receipt = file_get_contents('http://localhost:777/bemoBank/public/api/getReceipt/' . $bill->receipt_id);
        $receipt = json_decode($receipt);
        $receipt = $receipt->data;
        $pdf = PDF::loadView('client.bill.pdfTelecome',compact('bill','receipt'));
        return $pdf->stream('document.pdf');
    }
    public function pdfElectricityArchived()
    {
        $bill = file_get_contents('http://localhost:777/billingCorporation/public/api/getArchivedElectricityBill/' . \request()->hour_number . '/' . \request()->course_number);
        $bill = json_decode($bill);
        $bill = $bill->data;
        $receipt = file_get_contents('http://localhost:777/bemoBank/public/api/getReceipt/' . $bill->receipt_id);
        $receipt = json_decode($receipt);
        $receipt = $receipt->data;
        $pdf = PDF::loadView('client.bill.pdfElectricity',compact('bill','receipt'));
        return $pdf->stream('document.pdf');
    }
}
