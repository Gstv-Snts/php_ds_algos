<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '../../../src/DataStructures/Queue.php';

class QueueTest extends TestCase
{
    public function testQueue()
    {
        $q = new Queue();
        $this->assertSame(0, $q->getLength(), "The queue length is supposed to be 0.");
        $this->isNull($q->dequeue(), "The dequeue return is supposed tobe null.");

        $q->enqueue(10);
        $this->assertSame(1, $q->getLength(), "The queue length is supposed to be 1.");
        $q->enqueue(20);
        $this->assertSame(2, $q->getLength(), "The queue length is supposed to be 2.");
        $q->enqueue(30);
        $this->assertSame(3, $q->getLength(), "The queue length is supposed to be 3.");

        $this->assertSame(10, $q->dequeue()->getValue(), "The dequeue value is supposed to be 10.");
        $this->assertSame(2, $q->getLength(), "The queue length is supposed to be 2.");
        $this->assertSame(20, $q->dequeue()->getValue(), "The dequeue value is supposed to be 20.");
        $this->assertSame(1, $q->getLength(), "The queue length is supposed to be 1.");
        $this->assertSame(30, $q->dequeue()->getValue(), "The dequeue value is supposed to be 30.");
        $this->assertSame(0, $q->getLength(), "The queue length is supposed to be 0.");

        $q->enqueue(10);
        $q->enqueue(20);
        $q->updateHead(50);
        $q->updateTail(80);
        $this->assertSame(50, $q->dequeue()->getValue(), "The dequeue value is supposed to be 50.");
        $this->assertSame(80, $q->dequeue()->getValue(), "The dequeue value is supposed to be 80.");
        $q->enqueue(10);
        $q->updateHead(50);
        $this->assertSame(50, $q->dequeue()->getValue(), "The dequeue value is supposed to be 50.");
        $q->enqueue(10);
        $q->updateTail(80);
        $this->assertSame(80, $q->dequeue()->getValue(), "The dequeue value is supposed to be 80.");
    }
}
