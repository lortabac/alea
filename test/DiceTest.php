<?php

require_once 'src/Dice.php';

class DiceTest extends PHPUnit_Framework_TestCase {
    
    /**
     * @dataProvider bigListProvider
     */
    
    public function testGetItemFromBigList($rand, $expected) {
    	$criteria = [
    		['one', 10],
    		['two', 20],
    		['three', 30],
    		['four', 40],
    		['five', 50],
    		['six', 60],
    		['seven', 70]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\Dice($criteria, $randFunction);
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
    		['two', 100]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\Dice($criteria, $randFunction);
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
    	
    	$list = new Alea\Dice($criteria, $randFunction);
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
    
    /**
     * @dataProvider rollAndItemProvider
     */
    
    public function testGetRollAndItem($rand, $expected) {
    	$criteria = [
    		['one', 10],
    		['two', 20],
    		['three', 30],
    		['four', 40],
    		['five', 50],
    		['six', 60],
    		['seven', 70]
    	];
    	
    	$randFunction = function() use($rand) {
    	    return $rand;
    	};
    	
    	$list = new Alea\Dice($criteria, $randFunction);
        $data = $list->getItem(Alea\Dice::INCLUDE_ROLL);
        $this->assertEquals($data['roll'], $rand);
        $this->assertEquals($data['item'], $expected);
    }
    
    public function rollAndItemProvider() {
        return [
        	[1, 'one'],
        	[10, 'one'],
        	[11, 'two'],
        	[20, 'two'],
        	[70, 'seven']
        ];
    }
}