<?php 
class Node{
    private $value = NULL;
    private $next = NULL;
    public function __contruct() {}
    public function setValue($newValue){
        $this->value= $newValue;
    }
    public function getValue() {
        return $this->value;
    }
    public function setNext($newNext){
        $this->next = $newNext;
    }
    public function getNext() {
        return $this->next;
    }
}
class Linked_list 
{
    private $head = NULL;
    private $length = 0; 
    public function __construct(){}
    public function getLength() {
        return $this->length;
    }
    public function insert($value){
        $newHead = new Node();
        $newHead->setValue($value);
        if ($this->head === NULL) {
            $this->head = $newHead;
            $this->length += 1;
        }else{
            $newHead->setNext($this->head);
            $this->head = $newHead;
            $this->length += 1;
        }
    }
    public function peak(){
        return $this->head;
    }
}
$ll = new Linked_list();
$ll->insert(10);
echo $ll->peak()->getValue(),"\n";
$ll->insert(20);
echo $ll->peak()->getValue(),"\n";
?>