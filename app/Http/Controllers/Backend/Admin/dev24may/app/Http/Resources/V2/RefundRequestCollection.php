<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RefundRequestCollection extends ResourceCollection
{
	public function refund_status($str)
	{
		if($str=='1'){return 'Approved';}
		if($str=='0'){return 'PENDING';}
		if($str=='2'){return 'Rejected';}
	}
	
    public function toArray($request)
    {
        return [
            'data' => $this->collection->map(function ($data) {

                return [
                    'id' => (int)$data->id,
                    'user_id' => (int)$data->user_id,
                    'order_code' => $data->order == null ? "" : $data->order->code,
                    'product_name' => $data->orderDetail != null && $data->orderDetail->product != null ? $data->orderDetail->product->getTranslation('name', 'en') : "",
                    'product_price' => $data->orderDetail != null ? single_price($data->orderDetail->price) : "",
                    'refund_status' => (int) $data->refund_status,
					'reject_reason' =>  $data->reject_reason? $data->reject_reason : ' ',
                    'refund_label' => $this->refund_status($data->refund_status),
                    'date' => date('d-m-Y', strtotime($data->created_at)),
                ];
            })
        ];
    }

    public function with($request)
    {
        return [
            'success' => true,
            'status' => 200
        ];
    }
}
