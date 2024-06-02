<?php

use DataStructures\Linked_list;
use DataStructures\LinkedListNode;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../src/DataStructures/LinkedList.php';

class LinkedListTest extends TestCase
{
    public function testLinkedListNode()
    {
        //construct
        $n = new LinkedListNode(10);
        $this->assertSame(10, $n->getValue(), "LinkedListNode value is supposed to be 10.");
        //setNext
        $n->setNext(new LinkedListNode(20));
        //setPrevious
        $n->setPrevious(new LinkedListNode(30));
        $this->assertIsObject($n->getNext(), "LinkedListNode next is supposed to be an Object.");
        $this->assertIsObject($n->getPrevious(), "LinkedListNode previous is supposed to be an Object.");
        //setValue
        $n->setValue(5);
        $this->assertSame(5, $n->getValue(), "LinkedListNode value is supposed to be 5.");
    }
    public function testLinkedList()
    {
        //construct
        $ll = new Linked_list();
        $this->isNull($ll->getHead(), "Head is supposed to be null.");
        $this->isNull($ll->getTail(), "Tail is supposed to be null.");

        //insert at head
        $ll->insertAtHead(10);
        $this->assertSame(10, $ll->getHead()->getValue(), "Head value is supposed to be 10");
        $this->assertSame(10, $ll->getTail()->getValue(), "Tail value is supposed to be 10");
        $this->assertSame(1, $ll->getLength(), "Length is supposed to be 1");

        $ll->insertAtHead(20);
        $this->assertSame(20, $ll->getHead()->getValue(), "Head value is supposed to be 20");
        $this->assertSame(10, $ll->getTail()->getValue(), "Tail value is supposed to be 10");
        $this->assertSame(2, $ll->getLength(), "Length is supposed to be 2");

        $ll->insertAtHead(30);
        $this->assertSame(30, $ll->getHead()->getValue(), "Head value is supposed to be 30");
        $this->assertSame(10, $ll->getTail()->getValue(), "Tail value is supposed to be 10");
        $this->assertSame(3, $ll->getLength(), "Length is supposed to be 3");

        //delete head
        $this->assertSame(30, $ll->deleteHead()->getValue(), "Deleted Head value is supposed to be 10");
        $this->assertSame(20, $ll->deleteHead()->getValue(), "Deleted Head value is supposed to be 20");
        $this->assertSame(10, $ll->deleteHead()->getValue(), "Deleted Head value is supposed to be 20");
        $this->isNull($ll->deleteHead(), "Deleted Head value is supposed to be null");
        $this->assertSame(0, $ll->getLength(), "Length is supposed to be 0");

        //insert at tail
        $ll->insertAtTail(10);
        $this->assertSame(10, $ll->getHead()->getValue(), "Head value is supposed to be 10");
        $this->assertSame(10, $ll->getTail()->getValue(), "Tail value is supposed to be 10");
        $this->assertSame(1, $ll->getLength(), "Length is supposed to be 1");

        $ll->insertAtTail(20);
        $this->assertSame(10, $ll->getHead()->getValue(), "Head value is supposed to be 10");
        $this->assertSame(20, $ll->getTail()->getValue(), "Tail value is supposed to be 20");
        $this->assertSame(2, $ll->getLength(), "Length is supposed to be 2");

        $ll->insertAtTail(30);
        $this->assertSame(10, $ll->getHead()->getValue(), "Head value is supposed to be 10");
        $this->assertSame(30, $ll->getTail()->getValue(), "Tail value is supposed to be 30");
        $this->assertSame(3, $ll->getLength(), "Length is supposed to be 3");

        //delete tail
        $this->assertSame(30, $ll->deleteTail()->getValue(), "Deleted Tail value is supposed to be 30");
        $this->assertSame(20, $ll->deleteTail()->getValue(), "Deleted Tail value is supposed to be 20");
        $this->assertSame(10, $ll->deleteTail()->getValue(), "Deleted Tail value is supposed to be 10");
        $this->isNull($ll->deleteTail(), "Deleted Tail value is supposed to be null");
        $this->assertSame(0, $ll->getLength(), "Length is supposed to be 0");
    }
}
