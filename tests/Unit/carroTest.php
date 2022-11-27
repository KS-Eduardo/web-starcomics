<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\carrito;
use App\Models\deseos;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class carroTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $carrito = new Carrito();
        $carrito->idu = 1;
        $carrito->idp = 22;
        $carrito->save();
        $sql = "SELECT * FROM carritos
            WHERE idu = 1 and idp=22;";
        $carritos = DB::select($sql);
        $this->assertTrue($carritos[0]->idp==22);

    }


    public function quitarTest($idp,$idu,$f)
    {
        $carrito = new Carrito();
        $carrito->idu = 1;
        $carrito->idp = 22;
        $carrito->save();
       DB::table('carritos')->where('idp',$idp)->where('idu',$idu)->where('created_at',$f)->delete();
       $sql = "SELECT * FROM carritos
            WHERE idu = 1 and idp=22;";
        $carritos = DB::select($sql);
        $this->assertTrue($carritos==null);

    }

    public function insertarDTest($idp)
    {

        $deseo = new deseos();
        $deseo->idu = 1;
        $deseo->idp = 22;
        $deseo->save();
        $sql = "SELECT * FROM deseos
            WHERE idu = 1 and idp=22;";
        $deseos = DB::select($sql);
        $this->assertTrue($deseo[0]->idp==22);
    }

    public function quitarDTest($idp,$idu,$f)
    {
        $deseo = new deseos();
        $deseo->idu = 1;
        $deseo->idp = 22;
        $deseo->save();
       DB::table('carritos')->where('idp',$idp)->where('idu',$idu)->where('created_at',$f)->delete();
       $sql = "SELECT * FROM deseos
            WHERE idu = 1 and idp=22;";
        $deseos = DB::select($sql);
        $this->assertTrue($deseos==null);

    }
}
