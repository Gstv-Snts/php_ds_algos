<?php

namespace DataStructures;

class LinkedListNode
{
    private $value = Null;
    private Null|LinkedListNode $next = NULL;
    private Null|LinkedListNode $previous = NULL;
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
    private null|LinkedListNode $head = null;
    private null|LinkedListNode $tail = null;
    private int $length = 0;
    public function __construct()
    {
    }
    public function getLength(): int
    {
        return $this->length;
    }
    public function getHead(): null|LinkedListNode
    {
        return $this->head;
    }
    public function getTail(): null|LinkedListNode
    {
        return $this->tail;
    }
    public function insertAtHead($value): void
    {
        $newLinkedListNode = new LinkedListNode($value);
        if ($this->length === 0) {
            $this->head = $newLinkedListNode;
            $this->tail = $newLinkedListNode;
        } elseif ($this->length === 1) {
            $newLinkedListNode->setNext($this->tail);
            $this->tail->setPrevious($newLinkedListNode);
            $this->head = $newLinkedListNode;
        } else {
            $newLinkedListNode->setNext($this->head);
            $this->head->setPrevious($newLinkedListNode);
            $this->head = $newLinkedListNode;
        }
        $this->length += 1;
    }
    public function insertAtTail($value): void
    {
        $newLinkedListNode = new LinkedListNode($value);
        if ($this->length === 0) {
            $this->head = $newLinkedListNode;
            $this->tail = $newLinkedListNode;
        } elseif ($this->length === 1) {
            $newLinkedListNode->setPrevious($this->head);
            $this->head->setNext($newLinkedListNode);
            $this->tail = $newLinkedListNode;
        } else {
            $newLinkedListNode->setPrevious($this->tail);
            $this->tail->setNext($newLinkedListNode);
            $this->tail = $newLinkedListNode;
        }
        $this->length += 1;
    }
    public function deleteHead(): null|LinkedListNode
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
    public function deleteTail(): null|LinkedListNode
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
