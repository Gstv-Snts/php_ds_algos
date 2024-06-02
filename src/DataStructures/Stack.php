<?php

namespace DataStructures;

class StackNode
{
    private $value = null;
    private null|StackNode $next = null;
    public function __construct($value)
    {
        $this->value = $value;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function setValue($value)
    {
        $this->value = $value;
    }
    public function getNext(): null|StackNode
    {
        return $this->next;
    }
    public function setNext($node)
    {
        $this->next = $node;
    }
}
class Stack
{
    private null|StackNode $head = null;
    private int $length = 0;
    public function getLength(): int
    {
        return $this->length;
    }
    public function push($value)
    {
        $newStackNode = new StackNode($value);
        if ($this->length === 0) {
            $this->head = $newStackNode;
        } else {
            $newStackNode->setNext($this->head);
            $this->head = $newStackNode;
        }
        $this->length += 1;
    }
    public function pop(): null|StackNode
    {
        if ($this->length === 0) {
            return null;
        } else {
            $tmp = $this->head;
            $this->head = $tmp->getNext();
            $this->length -= 1;
            return $tmp;
        }
    }
    public function updateHead($newValue)
    {
        if ($this->length > 0) {
            $this->head->setValue($newValue);
        }
    }
}
