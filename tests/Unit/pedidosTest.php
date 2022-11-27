<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\pedidos;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class pedidosTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $pedidos= pedidos::find(1);
        $pedidos->Llegada=1;
        $pedidos->save();
        $P=pedidos::find(1);
        $this->assertTrue($P->Llegada==1);
    }
}
