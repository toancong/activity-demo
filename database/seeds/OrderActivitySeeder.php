<?php

use Illuminate\Database\Seeder;

class OrderActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = 'order_track';

        $order = (object) [
            'id'   => '1',
            'code' => 'ECD4123'
        ];

        $buyer = (object) [
            'id'   => '1',
            'name' => 'Toan Pham',
        ];
        $system = (object) [
            'id'   => '0',
            'name' => '',
        ];
        $shipper = (object) [
            'id'   => '2',
            'name' => 'GHN',
        ];
        $seller = (object) [
            'id' => '3',
            'name' => 'Mẹ & Bé',
        ];

        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Đã tạo Đơn hàng {{object.code}}',
        ]);
        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Thông tin Đơn hàng đã gởi tới người bán {{meta.seller.name}}',
            'meta'    => [
                'seller'=> $seller,
            ]
        ]);
        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Chờ lấy hàng',
        ]);
        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Hàng đã về kho. mã {{meta.ma_van_don}}',
            'meta' => [
                'ma_van_don' => 'GHN-SC123A',
            ]
        ]);
        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Đang giao hàng',
        ]);
        app('activity')->create([
            'actor'   => $system,
            'type'    => $type,
            'object'  => $order,
            'target'  => $buyer,
            'summary' => 'Hàng đã giao đến tay người nhận',
        ]);
    }
}
