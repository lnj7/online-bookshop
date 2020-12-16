<?php
spl_autoload_register(
function ($class){
    $arr=['goods','interfaces','orders','reviews','serve'];
    foreach ($arr as $val) {
        $path=__DIR__."/../$val/$class.php";
        if (file_exists($path))
            require_once $path;
    }
});


class Orders
{
    
    private $customer;
    
    private $buyingDate;
    
    private $isDeliver;
    
    private static $orders=[];
    
    private $orderDetails=[];
    
    private $is_deliver=False;

    
    private $unavailableOrderDetails=[];

    
    public function getUnavailableOrderDetails (): array
    {
        return $this->unavailableOrderDetails;
    }

    
    public function __construct(Customers  $customer=null, $buyingDate=null, $isDeliver=False)
    {
        $this->customer = $customer;
        $this->buyingDate = $buyingDate;
        $this->isDeliver = $isDeliver;
        Orders::$orders=$this;
    }

    
    public function setCustomer (Customers $customer): void
    {
        $this->customer = $customer;
    }

    
    public function addOrderDetails(Book $b, int $quantity):bool {
        if ( $b->buy($quantity)) {
            if (isset($this->orderDetails[$b->getId()]))
                $this->orderDetails[$b->getId()]->addQuantity($quantity);
            else
                $this->orderDetails[$b->getId()] = new OrderDetails($b, $quantity);
            return true;
        }
        return false;
    }

    
    public function getTotalPrice():float {
        $total=0.0;
        foreach ($this->orderDetails as  $detail) {
            $total += ($detail->getBook()->getSellprice() * $detail->getQuantity());
        }
        return $total;
    }

    
    public function deleteOrderDetails (int $id)
    {
        if (!$this->is_deliver) {
              $detail=$this->orderDetails[$id];
              $detail->getBook()->backBook($detail->getQuantity());
              Delete::remove($this->orderDetails[$id]);
              unset($this->orderDetails[$id]);
          }
    }

    
    public function deliver(){
       try{
           if ($this->is_deliver)
               throw new Exception('Order had already been delivered');
           else{
               $this->is_deliver=TRUE;
               foreach ($this->orderDetails as $key=>$val) {
                   $val->getBook()->delivering_done($val->getQuantity());
               }
           }
       }catch (Exception $exception){  $exception->getMessage();}
    }

    
    public function modifyOrderDetails(int $id, int $newAmount){
        if ($newAmount)
            $this->deleteOrderDetails($id);
        else
            $this->orderDetails[$id]->setQuantity($newAmount);
    }

    
    public function getTotalitems():int{
        $total=0;
        foreach ($this->getOrderDetails() as $val)
            $total+=$val->getQuantity();
        return $total;
    }

    
    public function getCustomer(): Customers
    {
        return $this->customer;
    }

    
    public function getBuyingDate()
    {
        return $this->buyingDate;
    }


    
    public function getIsDeliver()
    {
        return $this->isDeliver;
    }

    
    public static function getOrders(): array
    {
        return self::$orders;
    }

    
    public function getOrderDetails(): array
    {
        return $this->orderDetails;
    }

    public function addUnAvailableOrderDetails(Book $b,int $quantity){
        $this->unavailableOrderDetails[$b->getId()]=new UnAvailableOrderDetails($b,$quantity);
    }

    public function getAllDetails():array {
        return array_merge($this->orderDetails,$this->unavailableOrderDetails);
    }



}