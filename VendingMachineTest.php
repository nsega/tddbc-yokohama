<?
require_once "VendingMachine.php";
require_once "Money.php";
 
class VendingMachineTest extends PHPUnit_Framework_TestCase
{
    private $vm;

    public function setUp(){
        $this->vm = new VendingMachine();
    }

    public function test合計金額を算出する(){
        $this->assertSame(0, $this->vm->getTotalAmount());
    }

    public function test100円を投入できる(){
        $money = new Money("coin", 100);
        $this->vm->receiveMoney($money);
        $this->assertEquals(100, $this->vm->getTotalAmount());
    }

    public function test500円投入後1000円を投入する(){
        $money = new Money("coin", 500);
        $this->vm->receiveMoney($money);
        $money = new Money("bill", 1000);
        $this->vm->receiveMoney($money);
        $this->assertSame(1500, $this->vm->getTotalAmount());
    }

    public function test100円を投入して100円を払い戻し(){
        $money = new Money("coin", 100);
        $this->vm->receiveMoney($money);
        $this->assertEquals(array($money),$this->vm->refund());
    }

    public function test10円と1000円を投入して10円と1000円を払い出し(){
        $coin_10 = new Money("coin", 10);
        $this->vm->receiveMoney($coin_10);
        $bill_1000 = new Money("bill", 1000);
        $this->vm->receiveMoney($bill_1000);
        $this->assertEquals(array($coin_10,$bill_1000),$this->vm->refund());
    }

    
}
