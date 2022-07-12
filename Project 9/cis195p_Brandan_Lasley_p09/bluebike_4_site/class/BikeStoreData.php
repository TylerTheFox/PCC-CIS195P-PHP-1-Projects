<?php
require_once "Collection.php";
require_once "BikeSite.php";
class BikeSiteData  {
    private function connect(){
    	if(!mysql_connect("localhost","root",""))
		{
			echo "<h2>".$TEXT['rednote-error']."</h2>";
			die();
		}
		mysql_select_db("bikesite");
	}
	
	public function getAll(){
		connect();
		$this->collection = new Collection();
		$result=mysql_query("SELECT * FROM bike ORDER BY Bike;");

	  	$i=0;
		while( $row=mysql_fetch_array($result) )
		{
			//add to the test collection
			$b = new Bike($row['ID'], $row['Bike'], $row['bikemaker'], $row['model'], $row['model_year'], $row['size'], $row['type'], $row['rate'], $row['quanity']);
	    	$b->id = $row['id']; 
			$this->collection->add($b);
			$i++;
		}
        return $this->collection;
    }
 
    public function insert($b){
		mysql_query("INSERT INTO bike (Bike,interpret,jahr) VALUES('$b->id', '$b->make', $b->bike, $b->model, $b->year, $b->size, $b->type, $b->rate, $b->quainity);");
    }
       
    public function delete(){
		mysql_query("DELETE FROM bike WHERE ID={$_REQUEST['id']};");
    }
}
?>