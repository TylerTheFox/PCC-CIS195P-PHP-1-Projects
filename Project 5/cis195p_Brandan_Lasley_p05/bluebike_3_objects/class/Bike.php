<?php

require_once('Collection.php');

class Bike
{
    private $id;
    private $make;
    private $model;
    private $year;
    private $size;
    private $type;
    private $rate;
    private $qty;
    
    
    // creates an instance of Bike from the parameter values
    //
    function __construct($id, $make, $model, $year, $size, $type, $rate, $qty)
    {
        
        // I feel as this IF Statement got longer than I thought it would honestly.
        // Well this way works... but i'm guessing its not how you wanted it to work... so ill redo it
        // Read the instructions twice. 
        /*
        if ( (($id == NULL) or (!($id > 0))) AND
        ($make != NULL) AND ($model != NULL) AND 
        ($size >48) AND ($size < 63) AND ($size != NULL) AND
        ($type == 'road' or $type == 'mountain' or $type == 'hybrid' or $type == 'motocross') 
        AND ($rate > 0) AND ($rate != NULL) and ($qty < 1000) AND ($qty > 0) and ($qty != NULL) ) {
        $this->id = $id;
        $this->model = $model;
        $this->make = $make;
        $this->year = $year;
        $this->size = $size;
        $this->type = $type;
        $this->rate = $rate;
        $this->qty = $qty;
        } else {
        die (" Invalid Parameters ");
        }
        */
		
		$this->setID($id);
		$this->setYear($year);
		$this->setModel($model);
		$this->setMake($make);
		$this->setSize($size);
		$this->setType($type);
		$this->setRate($rate);
		$this->setQty($qty);
    }
    
    private function setID($id)
    {
        //first check for non-null modem
        if (isset($id)) {
            // Check Range
            if ($id > 0) {
                $this->id = $id;
            }
        }
    }
    
    
    private function setYear($year)
    {
        //first check for non-null year
        if (isset($year)) {
            //check range
            if (1000 <= $year && $year <= 3000) {
                $this->year;
            }
        }
    }
    
    private function setModel($model)
    {
        //first check for non-null modem
        if (isset($model)) {
            if ($model != NULL) {
                $this->model = $model;
            }
        }
    }
    
    private function setMake($make)
    {
        //first check for non-null make
        if (isset($make)) {
            if ($make != NULL) {
                $this->make = $make;
            }
        }
    }
    
    private function setSize($size)
    {
        //first check for non-null size
        if (isset($size)) {
            if (($size > 48) AND ($size < 63)) {
                $this->size = $size;
            }
        }
    }
	
    private function setType($type)
    {
        //first check for non-null type
        if (isset($type)) {
            if ($type != NULL) {
                if (($type == 'road') OR ($type == 'mountain') OR ($type == 'hybrid') OR ($type == 'motocross')) {
                    $this->type = $type;
                }
            }
        }
    }
    
    private function setRate($rate)
    {
        //first check for non-null rate
        if (isset($rate)) {
            if ($rate != NULL) {
                if ($rate > 0) {
                    $this->rate = $rate;
                }
            }
        }
    }
    
    private function setQty($qty)
    {
        //first check for non-null qty
        if (isset($qty)) {
            if ($qty != NULL) {
                if (($qty > 0) AND ($qty < 1000)) {
                    $this->qty = $qty;
                }
            }
        }
    }
	
	public function getAll () {
		$collection = new Collection();
	
		//	add some fake media objects to the collection to be returned
		//
		
		$currentMediaItem = new Bike(1, "Blue Bike 1",
				"Yamahhs", 2005, 50, "mountain", 20, 100);
		$collection->add($currentMediaItem);

				$currentMediaItem = new Bike(1, "Blue Bike 2",
				"Yamahhs", 2005, 50, "mountain", 20, 100);
		$collection->add($currentMediaItem);
		
				$currentMediaItem = new Bike(1, "Blue Bike 3",
				"Yamahhs", 2005, 50, "mountain", 20, 100);
		$collection->add($currentMediaItem);
		
		return $collection;
	}

		public function toString() {
		return "<p><-----Bike {id=" . $this->id
				. ", make=" . $this->make
				. ", model=" . $this->model
				. ", year=" . $this->year
				. ", size=" . $this->size
				. ", type=" . $this->type
				. ", rate=" . $this->rate
				. ", qty=" . $this->qty
				. "}-----></p>";
	}
    
}