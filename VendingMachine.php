<?
class VendingMachine
{
    private $received_money_list = array();

    public function getTotalAmount(){
        $total_amount = 0;
        foreach($this->received_money_list as $money){
            $total_amount += $money->getAmount();
        }
        return $total_amount;
    }

    public function receiveMoney($money) {
        array_push($this->received_money_list, $money);
        return true;
    }

    public function refund() {
        return $this->received_money_list;
    }

}
