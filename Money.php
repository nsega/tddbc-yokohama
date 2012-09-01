<?
require_once "MoneyInterface.php";

class Money implements MoneyInterface
{
    private $type;
    private $amount;
    private $type_amount;

    public function __construct($type, $amount){
        $this->type = $type;
        $this->amount = $amount;
    }

    public function getType(){
        return $this->type;    
    }

    public function getAmount(){
        return $this->amount;
    }
}
