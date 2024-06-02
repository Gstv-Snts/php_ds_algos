<?php

use DataStructures\Stack;
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../src/DataStructures/Stack.php';

class StackTest extends TestCase
{
    public function testStack()
    {
        $s = new Stack();
        $this->assertSame(0, $s->getLength(), "The stack length is supposed to be 0.");
        $this->isNull($s->pop(),"The pop return is supposed to be null.");
        $s->push(10);
        $s->push(20);
        $s->push(30);
        $this->assertSame(3, $s->getLength(), "The stack length is supposed to be 3.");
        $this->assertSame(30,$s->pop()->getValue(),"The pop return is supposed to be 30.");
        $this->assertSame(2, $s->getLength(), "The stack length is supposed to be 2.");
        $this->assertSame(20,$s->pop()->getValue(),"The pop return is supposed to be 20.");
        $this->assertSame(1, $s->getLength(), "The stack length is supposed to be 1.");
        $this->assertSame(10,$s->pop()->getValue(),"The pop return is supposed to be 10.");
        $this->assertSame(0, $s->getLength(), "The stack length is supposed to be 0.");
        $s->push(10);
        $s->push(20);
        $this->assertSame(20,$s->pop()->getValue(),"The pop return is supposed to be 20.");
        $s->updateHead(40);
        $this->assertSame(40,$s->pop()->getValue(),"The pop return is supposed to be 40.");
    }
}
