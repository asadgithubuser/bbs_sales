<?php
namespace App\Models;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings{
    private $data;

    function __construct($data){
        $this->data = $data;
    }
    public function collection()
    {
        //return Order::select("id", "combined_order_id")->get();
        return $this->data;
    }

    public function headings(): array
    {

        return [
            'Invoice No',
             'Order Date',
             'Order Time',
             'Customer Name',
             'Customer Contact',
             'Customer Email Address',
             'Customer Address',
             'Vendor Name',
             'Shop Name',
             'Order Status',
             'Order Items',
             'Order Quantity',
             'Consumer Price',
             'Total Price',
             'Seller Price',
             'Unit Price(MRP)',
             'Payment Status',
             'Payment Method',
             'Paid Amount',
             'Due Amount',
             'Category',
             'Parent Category'
        ];
    }
}
