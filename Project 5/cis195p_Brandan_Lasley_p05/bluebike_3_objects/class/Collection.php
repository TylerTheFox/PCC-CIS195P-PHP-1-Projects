<!--	Project:	bluebike_3_objects	-->
<!--	Page name:	Collection.php	-->
<!--	Page purpose:	provides a temporal collection of elements with
			forward and reverse sequential access to the elements	-->
<!--	Author:		Dave Blizzard and friends	-->
<!--	Last modified:	09/20/10 by Taylor Hanna	-->

<?php
class Collection {
	private $elements;
	private $counter;
	private $pointer;

	//	creates an empty collection
	//
	public function Collection() {
		$this->elements = array();
		$this->counter = 0;
		$this->pointer = 0;
	}

	//	adds an element to the end of the collection
	//		side-effect: advances the collection access point
	//			to the next element
	//
	public function add($element) {
		$this->elements[$this->counter] = $element;
		$this->counter++;
		$this->pointer++;
	}

	//	removes an element from a collection if it is present
	//		side-effect: resets the collection access point
	//			to the prevoius element when an element is successfully removed
	//
	public function remove($element) {
		//	assume the element is missing from the collection
		//
		$found = null;

		//	look everywhere
		//
		for ($i = 0; $i < count($this->elements); $i++)
			if ($this->elements[$i] == $element)
				//	save the position of the element when found
				//
				$found = $i;

		//	test the assumption
		//
		if (!is_null($found)) {
			array_splice($this->elements, $found, 1);
			$this->counter--;
			$this->pointer--;
		}
	}

	//	returns whether a collection contains an element
	//
	public function contains($element) {
		//	look everywhere
		//
		for ($i = 0; $i < count($this->elements); $i++)
			if ($this->elements[$i] == $element)
				return true;

		return false;
	}

	//	returns whether a collection has a next element
	//
	public function hasNext() {
		return $this->pointer < $this->counter;
	}

	//	returns whether a collection has a previous element
	//
	public function hasPrevious() {
		return $this->pointer > 0;
	}

	//	returns the next element from a collection
	//		side-effect: advances the collection access point
	//			to the next element
	//	precondition: hasNext() must be true
	//
	public function next() {
		return $this->elements[$this->pointer++];
	}

	//	resets the collection access point to the first element
	//
	public function first() {
		$this->pointer = 0;
	}

	//	resets the collection access point to the last element
	//
	public function last() {
		$this->pointer = $this->counter;
	}

	//	returns the previous element from a collection
	//		side-effect: advances the collection access point
	//			to the prevoius element
	//	precondition: hasPrevious() must be true
	//
	public function previous() {
		return $this->elements[--$this->pointer];
	}

	//	returns the number of elements in a collection
	//
	public function count() {
		return count($this->elements);
	}
}
 ?>