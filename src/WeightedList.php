<?php

namespace Alea;

require_once 'BinarySearch.php';

class WeightedList {

	use BinarySearch;

	private $limits, $max, $itemNum, $criteria, $randFunction;

	public function __construct($criteria, $randFunction = '\rand') {
		$this->criteria = $criteria;
		$this->randFunction = $randFunction;
		$this->itemNum = count($criteria);
		$this->limits = $this->calculateLimits();
		$this->max = $this->limits[$this->itemNum - 1];
	}

	public function getItem() {
		$randFunction = $this->randFunction;
		$rand = $randFunction(1, $this->max);
		$index = $this->findNextIndex($rand);
		return $this->criteria[$index][0];
	}

	private function calculateLimits() {
		$limits = array();
		$currLimit = 0;
		foreach($this->criteria as $crit) {
			$weight = $crit[1];
			$limits[] = $weight + $currLimit;
			$currLimit += $weight;
		}
		return $limits;
	}
}