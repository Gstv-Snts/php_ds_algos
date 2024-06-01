<?php

namespace DataStructures;

class Node
{
    private $value = Null;
    private Null|Node $next = NULL;
    private Null|Node $previous = NULL;
    public function __construct($value)
    {
        $this->value = $value;
    }
    public function setValue($newValue)
    {
        $this->value = $newValue;
    }
    public function getValue()
    {
        return $this->value;
    }
    public function setNext($newNext)
    {
        $this->next = $newNext;
    }
    public function getNext()
    {
        return $this->next;
    }
    public function setPrevious($newPrevious)
    {
        $this->previous = $newPrevious;
    }
    public function getPrevious()
    {
        return $this->previous;
    }
}
class Linked_list
{
    private null|Node $head = null;
    private null|Node $tail = null;
    private int $length = 0;
    public function __construct()
    {
    }
    public function getLength(): int
    {
        return $this->length;
    }
    public function getHead(): null|Node
    {
        return $this->head;
    }
    public function getTail(): null|Node
    {
        return $this->tail;
    }
    public function insertAtHead($value): void
    {
        $newNode = new Node($value);
        if ($this->length === 0) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } elseif ($this->length === 1) {
            $newNode->setNext($this->tail);
            $this->tail->setPrevious($newNode);
            $this->head = $newNode;
        } else {
            $newNode->setNext($this->head);
            $this->head->setPrevious($newNode);
            $this->head = $newNode;
        }
        $this->length += 1;
    }
    public function insertAtTail($value): void
    {
        $newNode = new Node($value);
        if ($this->length === 0) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } elseif ($this->length === 1) {
            $newNode->setPrevious($this->head);
            $this->head->setNext($newNode);
            $this->tail = $newNode;
        } else {
            $newNode->setPrevious($this->tail);
            $this->tail->setNext($newNode);
            $this->tail= $newNode;
        }
        $this->length += 1;
    }
    public function deleteHead(): null|Node
    {
        if ($this->length === 1) {
            $tmp = $this->head;
            $this->head = null;
            $this->length -= 1;
            return $tmp;
        } elseif ($this->length === 2) {
            $tmp = $this->head;
            $this->head = null;
            $this->head = $this->tail;
            $this->tail = null;
            $this->length -= 1;
            return $tmp;
        } elseif ($this->length === 3) {
            $tmp = $this->head;
            $this->head = $tmp->getNext();
            $this->length -= 1;
            return $tmp;
        }
        return null;
    }
    public function deleteTail(): null|Node
    {
        if ($this->length === 1) {
            $tmp = $this->head;
            $this->head = null;
            $this->length -= 1;
            return $tmp;
        } elseif ($this->length === 2) {
            $tmp = $this->tail;
            $this->tail = null;
            $this->length -= 1;
            return $tmp;
        } elseif ($this->length > 2) {
            $tmp = $this->tail;
            $this->tail = null;
            $this->tail = $tmp->getPrevious();
            $this->length -= 1;
            return $tmp;
        }
        return null;
    }
}
