<?php

require_once 'src/WeightedList.php';

class WeightedListTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @dataProvider bigListProvider
     */
    
    public function testGetItemFromBigList($rand, $expected) {
    	$criteria = [
    		['one', 10],
    		['two', 10],
    		['three', 10],
    		['four', 10],
    		['five', 10],
    		['six', 10],
    		['seven', 10]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\WeightedList($criteria, $randFunction);
        $item = $list->getItem();
        $this->assertEquals($item, $expected);
    }
    
    public function bigListProvider() {
        return [
        	[1, 'one'],
        	[10, 'one'],
        	[11, 'two'],
        	[20, 'two'],
        	[70, 'seven']
        ];
    }
    
    /**
     * @dataProvider listOfTwoProvider
     */
    
    public function testGetItemFromListofTwo($rand, $expected) {
    	$criteria = [
    		['one', 60],
    		['two', 40]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\WeightedList($criteria, $randFunction);
        $item = $list->getItem();
        $this->assertEquals($item, $expected);
    }
    
    public function listOfTwoProvider() {
        return [
        	[1, 'one'],
        	[10, 'one'],
        	[60, 'one'],
        	[61, 'two'],
        	[70, 'two'],
        	[100, 'two']
        ];
    }
    
    /**
     * @dataProvider singletonProvider
     */
    
    public function testGetItemFromSingleton($rand, $expected) {
    	$criteria = [
    		['one', 10]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\WeightedList($criteria, $randFunction);
        $item = $list->getItem();
        $this->assertEquals($item, $expected);
    }
    
    public function singletonProvider() {
        return [
        	[1, 'one'],
        	[2, 'one'],
        	[10, 'one']
        ];
    }
}