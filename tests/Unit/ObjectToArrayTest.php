<?php

namespace Tests\Unit;

use App\Domain\Boliche;
use App\Domain\Item;
use Tests\TestCase;
use App\Traits\Conversion;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ObjectToArrayTest extends TestCase
{
    use Conversion;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $id = 1;
        $nombre = 'Morgan';
        $facebook = 'Morgan';
        $instagram = 'Morgan';
        $twitter = 'Morgan';
        $puntuacion = 3;
        $domicilio = 'Belgrano';
        $descripcion = 'boliche peola';
        $telefono = 46727473;
        $horario = '12:15';

        $boliche = new Boliche($id, $nombre, $facebook, $instagram, $twitter, $puntuacion, $domicilio, $descripcion, $telefono, $horario);
        $item1 = new Item(1, 'champagne', 350, '', 1);
        $item2 = new Item(2, 'vodka', 200, '', 3);
        $items = collect();
        $items->push($item1);
        $items->push($item2);
        $boliche->setItems($items);

        $a = $boliche->toArray($boliche);
        return $a;
    }
}
