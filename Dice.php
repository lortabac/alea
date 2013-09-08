<?php

namespace Alea;

require_once 'BinarySearch.php';

class Dice {

	use BinarySearch;
	
	const INCLUDE_ROLL = true;

	private $criteria, $max, $itemNum, $randFunction;

	public function __construct($criteria, $randFunction = '\rand') {
		$this->criteria = $criteria;
		$this->randFunction = $randFunction;
		$this->itemNum = count($criteria);
		$this->limits = $this->calculateLimits();
		$this->max = $this->limits[$this->itemNum - 1];
	}

	public function getItem($includeRoll = false) {
		$randFunction = $this->randFunction;
		$rand = $randFunction(1, $this->max);
		$index = $this->findNextIndex($rand);
		if($includeRoll) {
		    return array(
				'roll' => $rand,
				'item' => $this->criteria[$index][0]
			);
		} else {
		    return $this->criteria[$index][0];
		}
	}

	private function calculateLimits() {
		return array_map(function($crit) {
		   return $crit[1];
		}, $this->criteria);
	}
}