<?php

/**
  * Kata 2011-04: Bowling. PhpUnit test file.
  *
  * Kata trying to resolve the Bowling problem using TDD.
  *
  * LICENSE: MIT license
  *
  * @category   Kata
  * @author     Rober Martín H "rmhdev"
  * @license    MIT License
  * @version    0.1
  * @link       http://github.com/12meses12katas/Abril-Bowling
 */

include __DIR__ . "/../Bowling.php";

class BowlingTest extends PHPUnit_Framework_TestCase {

    public function testProviderScoreOfFrame(){
        $testCases = array();
        $testCases['with -- should return 0']   = array('--', 0);
        $testCases['with 1- should return 1']   = array('1-', 1);
        $testCases['with -1 should return 1']   = array('-1', 1);
        $testCases['with 11 should return 2']   = array('11', 2);
        $testCases['with 12 should return 3']   = array('12', 3);
        $testCases['with 5/- should return 10'] = array('5/-', 10);
        $testCases['with -/- should return 10'] = array('-/-', 10);
        $testCases['with 5/1 should return 11'] = array('5/1', 11);
        $testCases['with X-- should return 10'] = array('X--', 10);
        $testCases['with X1- should return 11'] = array('X1-', 11);
        $testCases['with X11 should return 12'] = array('X11', 12);
        $testCases['with X5/ should return 20'] = array('X5/', 20);
        $testCases['with 5/X should return 20'] = array('5/X', 20);
        $testCases['with X-X should return 20'] = array('X-X', 20);
        $testCases['with XXX should return 30'] = array('XXX', 30);

        return $testCases;
    }

    /**
     * @dataProvider testProviderScoreOfFrame
     */
    public function testScoreOfFrame($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getScoreOfFrame($frame));
    }


    public function testProviderFirstFrameForSequence(){
        $testCases = array();
        $testCases['with ---- should return --']    = array('----', '--');
        $testCases['with -- should return --']      = array('--', '--');
        $testCases['with 1--- should return 1-']    = array('1---', '1-');
        $testCases['with 22-- should return 22']    = array('22--', '22');
        $testCases['with 22X- should return 22']    = array('22X-', '22');
        $testCases['with 5/-- should return 5/-']   = array('5/--', '5/-');
        $testCases['with -/-- should return -/-']   = array('-/--', '-/-');
        $testCases['with X--- should return X--']   = array('X---', 'X--');
        $testCases['with X11- should return X11']   = array('X11-', 'X11');
        $testCases['with X5/- should return X5/']   = array('X5/-', 'X5/');
        $testCases['with 5/X- should return 5/X']   = array('5/X-', '5/X');
        
        return $testCases;
    }

    /**
     * @dataProvider testProviderFirstFrameForSequence
     */
    public function testFirstFrameForSequence($sequence, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getFirstFrameForSequence($sequence));
    }
    

    public function testProviderIsStrike(){
        $testCases = array();
        $testCases['with XXX should return true']   = array('XXX', true);
        $testCases['with 1- should return false']   = array('1-', false);
        $testCases['with 5/1 should return false']  = array('5/-', false);
        $testCases['with X5/- should return true']  = array('X5/-', true);
        $testCases['with 5/X should return false']  = array('5/X', false);

        return $testCases;
    }

    /**
     * @dataProvider testProviderIsStrike
     */
    public function testIsStrike($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->isStrike($frame));
    }
    

    public function testProviderIsSpare(){
        $testCases = array();
        $testCases['with XXX should return false']  = array('XXX', false);
        $testCases['with 1- should return false']   = array('1-', false);
        $testCases['with 5/1 should return true']   = array('5/-', true);
        $testCases['with X5/- should return false'] = array('X5/-', false);
        $testCases['with 5/X should return true']   = array('5/X', true);

        return $testCases;
    }

    /**
     * @dataProvider testProviderIsSpare
     */
    public function testIsSpare($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->isSpare($frame));
    }
    

    public function testProviderIsZeroPin(){
        $testCases = array();
        $testCases['with empty should return true'] = array(''      , true);
        $testCases['with - should return true']     = array('-'     , true);
        $testCases['with -- should return true']    = array('--'    , true);
        $testCases['with 1- should return false']   = array('1-'    , false);
        $testCases['with 5/- should return false']  = array('5/-'   , false);
        $testCases['with X- should return false']   = array('X-'    , false);

        return $testCases;
    }

    /**
     * @dataProvider testProviderIsZeroPin
     */
    public function testIsZeroPin($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->isZeroPin($frame));
    }
    

    public function testProviderNextPartOfFrame(){
        $testCases = array();
        $testCases['with -- should return -']       = array('--'    , '-');
        $testCases['with 1- should return -']       = array('1-'    , '-');
        $testCases['with 5/- should return -']      = array('5/-'   , '-');
        $testCases['with 5/X should return X']      = array('5/X'   , 'X');
        $testCases['with X-- should return --']     = array('X--'   , '--');
        $testCases['with X5/ should return 5/']     = array('X5/'   , '5/');

        return $testCases;
    }

    /**
     * @dataProvider testProviderNextPartOfFrame
     */
    public function testNextPartOfFrame($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getNextPartOfFrame($frame));
    }
    

    public function testProviderValueOfFirstPartOfFrame(){
        $testCases = array();
        $testCases['with empty should return 0']    = array(''      , 0);
        $testCases['with - should return 0']        = array('-'     , 0);
        $testCases['with --- should return 0']      = array('---'   , 0);
        $testCases['with 1- should return 1']       = array('1-'    , 1);
        $testCases['with 5/- should return 10']     = array('5/-'   , 10);
        $testCases['with X- should return 10']      = array('X-'    , 10);

        return $testCases;
    }

    /**
     * @dataProvider testProviderValueOfFirstPartOfFrame
     */
    public function testValueOfFirstPartOfFrame($frame, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getValueOfFirstPartOfFrame($frame));
    }
    

    public function testProviderNextSequence(){
        $testCases = array();
        $testCases['with ---- should return --']    = array('----', '--');
        $testCases['with 1--- should return --']    = array('1---', '--');
        $testCases['with X--- should return ---']   = array('X---', '---');
        $testCases['with 1111 should return 11']    = array('1111', '11');
        $testCases['with 5/11 should return 11']    = array('5/11', '11');
        $testCases['with X5/1 should return 5/1']   = array('X5/1', '5/1');
        $testCases['with XXX- should return XX-']   = array('XXX-', 'XX-');

        return $testCases;
    }

    /**
     * @dataProvider testProviderNextSequence
     */
    public function testNextSequence($sequence, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getNextSequence($sequence));
    }
    

    public function testProviderGetGameScore(){
        $testCases = array();
        $testCases['with perfect game should return 300'] = array('XXXXXXXXXXXX', 300);
        $testCases['with all miss should return 0'] = array('--------------------', 0);
        $testCases['with 10 pairs of 9 and miss should return 90'] = array('9-9-9-9-9-9-9-9-9-9-', 90);
        $testCases['with 10 pairs of 5 and spare, with a final 5 should return 150'] = array('5/5/5/5/5/5/5/5/5/5/5', 150);
        $testCases['with real example A should return 137'] = array('729-9-9-9/9/XX8-71'    , 137);
        $testCases['with real example B should return 135'] = array('-69/X63719-5/X7/7-'    , 135);
        $testCases['with real example C should return 100'] = array('1/-99-6-157-8/7-9-XX-' , 100);
        $testCases['with real example D should return 92']  = array('9/9-8--/72-481-63-8-'  , 92);
        $testCases['with real example E should return 112'] = array('357-3/-333X9/8/629/6'  , 112);
        $testCases['with real example F should return 157'] = array('8/X71718-9-XX9/X7-'    , 157);
        $testCases['with real example G should return 133'] = array('9/8/X7/53348/-78/-/8'  , 133);
        $testCases['with real example H should return 146'] = array('XX6-XX-97-7-9/9/7'     , 146);
        $testCases['with real example I should return 179'] = array('9/XX7/639/X9/9/9-'     , 179);
        $testCases['with real example J should return 89']  = array('349-3--95/X3--1X-7'    , 89);
        $testCases['with real example K should return 113'] = array('9/449-9-9/9-9-9-9-X8-' , 113);

        return $testCases;
    }

    /**
     * @dataProvider testProvidergetGameScore
     */
    public function testGameScore($sequence, $expected){
        $b = new Bowling();
        $this->assertEquals($expected, $b->getGameScore($sequence));
    }
}
