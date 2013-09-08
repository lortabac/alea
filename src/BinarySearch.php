<?php

namespace Alea;

trait BinarySearch {
	
	function findNextIndex($rand) {
	    $fromIndex = 0;
		$toIndex = $this->itemNum;
	
		while(true) {
			$relativeMax = $toIndex - $fromIndex;
			if($relativeMax < 2) {
				return $rand <= $this->limits[$fromIndex]
				  ? $fromIndex
				  : $toIndex;
			}
	
			$currIndex = floor($relativeMax / 2) + $fromIndex;
			$currLimit = $this->limits[$currIndex];
	
			if($rand <= $currLimit) {
				$toIndex = $currIndex;
			} else {
				$fromIndex = $currIndex;
			}
		}
	}
}