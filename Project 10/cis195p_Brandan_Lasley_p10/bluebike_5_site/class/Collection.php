<!--	Project:	bluebike_3_objects	-->
<!--	Page name:	Collection.php	-->
<!--	Page purpose:	provides a temporal collection of elements with
			forward and reverse sequential access to the elements	-->
<!--	Author:		Brandan Tyler Lasley & friends	-->
<!--	Last modified:	2/5/14 by Brandan Tyler Lasley	-->

<?php
class Collection
{
    private $elements;
    private $counter;
    private $pointer;
    
    public function Collection()
    {
        $this->elements = array();
        $this->counter  = 0;
        $this->pointer  = 0;
    }
    
    public function add($element)
    {
        $this->elements[$this->counter] = $element;
        $this->counter++;
        $this->pointer++;
    }
    
    public function remove($element)
    {
        $found = null;
        
        for ($i = 0; $i < count($this->elements); $i++)
            if ($this->elements[$i] == $element)
                $found = $i;
        
        if (!is_null($found)) {
            array_splice($this->elements, $found, 1);
            $this->counter--;
            $this->pointer--;
        }
    }
    
    public function contains($element)
    {
        for ($i = 0; $i < count($this->elements); $i++)
            if ($this->elements[$i] == $element)
                return true;
        
        return false;
    }
    
    public function hasNext()
    {
        return $this->pointer < $this->counter;
    }
    
    public function hasPrevious()
    {
        return $this->pointer > 0;
    }
    
    public function next()
    {
        return $this->elements[$this->pointer++];
    }
    
    public function first()
    {
        $this->pointer = 0;
    }
    
    public function last()
    {
        $this->pointer = $this->counter;
    }
    
    public function previous()
    {
        return $this->elements[--$this->pointer];
    }
    
    public function count()
    {
        return count($this->elements);
    }
}
?>