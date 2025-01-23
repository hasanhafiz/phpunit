<?php 

class QueueTest extends PHPUnit\Framework\TestCase {
    
    protected static $queue;
    public function setUp(): void {
        // echo "Each time called Before a test is executed!\n";
        // $this->queue = new Queue;
        static::$queue->clear();
    }
    
    public function tearDown(): void {
        // echo "Each time called after a test is executed!\n";
    }
    
    public static function setUpBeforeClass(): void
    {
        // echo "It will call once, before first test is done\n";
        static::$queue = new Queue;
    }
    
    public static function tearDownAfterClass(): void
    {
        // echo "It will call once, after last test is done\n";
        static::$queue = null;
    }
    
    public function testNewQueueIsEmpty() {
        $this->assertEquals( 0, static::$queue->getCount() );
    }
    
    
    public function testAnItemIsAddedToQueue()
    {
        static::$queue->push( 'Green' );
        $this->assertEquals( 1, static::$queue->getCount() );
    }
    
    public function testAnItemIsRemovedFromQueue() { 
        static::$queue->push( 'Green' );       
        $item = static::$queue->pop();
        $this->assertEquals(0, static::$queue->getCount() );
        $this->assertEquals("Green", $item);        
    }
    
    public function testAnItemIsRemovedFromTheTopOfTheQueue(): void
    {
        static::$queue->push('Red');
        static::$queue->push('Green');
        
        $this->assertEquals( 'Red', static::$queue->pop() );
    }
    
    public function testMaxNumberOfItemCanBeAdded() {
        for ($i=0; $i < Queue::MAX_ITEMS; $i++) { 
            static::$queue->push( $i );
        }
        
        $this->assertEquals( Queue::MAX_ITEMS, static::$queue->getCount() );
    }
    
    public function testExceptionThrownWhenAddingAnItemToFullQueue() {
        for ($i=0; $i < Queue::MAX_ITEMS; $i++) { 
            static::$queue->push( $i );
        }
        
        static::expectException( QueueException::class );        
        static::expectExceptionMessage( "Queue is full!" );        
        static::$queue->push('another item to push to throw exception');          
    }    
}
