
<?php
require_once('./class/Collection.php');
require_once('./class/BikeData.php');
class Bike
{
    private $id;
	private $bike;
    private $make;
    private $model;
    private $year;
    private $size;
    private $type;
    private $rate;
    private $qty;
    function __construct($id, $bike, $make, $model, $year, $size, $type, $rate, $qty)
    {
        $this->setID($id);
		$this->setBike($bike);
        $this->setYear($year);
        $this->setModel($model);
        $this->setMake($make);
        $this->setSize($size);
        $this->setType($type);
        $this->setRate($rate);
        $this->setQty($qty);
    }
    public function getID()
    {
        return $this->id;
    }
    public function getMake()
    {
        return $this->make;
    }
    public function getYear()
    {
        return $this->year;
    }
    public function getSize()
    {
        return $this->size;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getModel()
    {
        return $this->model;
    }
    public function getRate()
    {
        return $this->rate;
    }
    public function getQty()
    {
        return $this->qty;
    }
    private function setID($id)
    {
        if (isset($id)) {
            //if ($id > 0) {
                $this->id = $id;
            //}
        }
    }
    private function setYear($year)
    {
        if (isset($year)) {
                $this->year = $year;
        }
    }
    private function setBike($bike)
    {
        if (isset($bike)) {
                $this->bike = $bike;
        }
    }
    private function setModel($model)
    {
        if (isset($model)) {
            if ($model != NULL) {
                $this->model = $model;
            }
        }
    }
    private function setMake($make)
    {
        if (isset($make)) {
            if ($make != NULL) {
                $this->make = $make;
            }
        }
    }
    private function setSize($size)
    {
        if (isset($size)) {
                $this->size = $size;
        }
    }
    private function setType($type)
    {
        if (isset($type)) {
            if ($type != NULL) {
                //if (($type == 'road') OR ($type == 'mountain') OR ($type == 'hybrid') OR ($type == 'motocross')) {
                    $this->type = $type;
                //}
            }
        }
    }
    private function setRate($rate)
    {
        if (isset($rate)) {
            if ($rate != NULL) {
                //if ($rate > 0) {
                    $this->rate = $rate;
               // }
            }
        }
    }
    private function setQty($qty)
    {
        if (isset($qty)) {
            if ($qty != NULL) {
                //if (($qty > 0) AND ($qty < 1000)) {
                    $this->qty = $qty;
                //}
            }
        }
    }
    public function getAll()
    {
        return BikeData::getAll();
    }
    public function toString()
    {
        return "<p><-----Bike {id=" . $this->id . ", name=" . $this->bike . ", make=" . $this->make . ", model=" . $this->model . ", year=" . $this->year . ", size=" . $this->size . ", type=" . $this->type . ", rate=" . $this->rate . ", qty=" . $this->qty . "}-----></p>";
    }
}