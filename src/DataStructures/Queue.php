<?php
class QueueNode
{
    private $value = null;
    private null|QueueNode $next = null;
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
    public function getNext()
    {
        return $this->next;
    }
    public function setNext($next)
    {
        $this->next = $next;
    }
}
class Queue
{
    private null|QueueNode $head = null;
    private null|QueueNode $tail = null;
    private int $length = 0;
    public function getLength(): int
    {
        return $this->length;
    }
    public function enqueue($value)
    {
        $newQueueNode = new QueueNode($value);
        if ($this->length === 0) {
            $this->head = $newQueueNode;
            $this->tail = $newQueueNode;
        } elseif ($this->length === 1) {
            $this->head->setNext($newQueueNode);
            $this->tail = $newQueueNode;
        } else {
            $this->tail->setNext($newQueueNode);
            $this->tail = $newQueueNode;
        }
        $this->length += 1;
    }
    public function dequeue(): null|QueueNode
    {
        if ($this->length === 0) {
            return null;
        } elseif ($this->length === 1) {
            $tmp = $this->head;
            $this->head = null;
            $this->tail = null;
            $this->length -= 1;
            return $tmp;
        } else {
            $tmp = $this->head;
            $this->head = $tmp->getNext();
            $this->length -= 1;
            return $tmp;
        }
    }
    public function updateHead($newValue)
    {
        if ($this->length === 1) {
            $this->head->setValue($newValue);
            $this->tail->setValue($newValue);
        } elseif ($this->length > 1) {
            $this->head->setValue($newValue);
        }
    }
    public function updateTail($newValue)
    {
        if ($this->length === 1) {
            $this->head->setValue($newValue);
            $this->tail->setValue($newValue);
        } elseif ($this->length > 1) {
            $this->tail->setValue($newValue);
        }
    }
}
