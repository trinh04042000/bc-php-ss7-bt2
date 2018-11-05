<?php

include_once ('Node.php');
class MyLinkedList
{
    private $head;
    private $numNodes;
    private $tail;

    function __construct()
    {
        $this->head = NULL;
        $this->numNodes = 0;
        $this->tail = NULL;
    }

    function addIndex($index, $data)
    {
        if ($index == 0) {
            $this->addFirst($data);
        } else {
            $link = new Node($data);
            $previous = $this->head;
            $current = $this->head->next;
            for ($i = 1; $i < $index; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $previous->next = $link;
            $link->next = $current;
            $this->numNode++;
        }
    }

    public function addFirst($data)
    {
        $link = new Node($data);
        $link->next = $this->head;
        $this->head = $link;
        if ($this->tail == null) {
            $this->tail = $link;
        }
        $this->numNode++;
    }

    public function addLast($data)
    {
        if ($this->head != null) {
            $link = new Node($data);
            $this->tail->next = $link;
            $this->tail = $link;
            $this->numNode++;
        } else {
            $this->addFirst($data);
        }
    }

    public function removeIndex($index)
    {
        if ($index == 0) {
            $this->head = $this->head->next;
        } else {
            $previous = null;
            $current = $this->head;
            for ($i = 0; $i < $index; $i++) {
                $previous = $current;
                $current = $current->next;
            }
            $previous->next = $current->next;
            $this->numNode--;
        }
    }

    public function removeObject($data)
    {
        $current = $this->head;
        $previous = null;
        while ($current->data != $data) {
            if ($current->next == null)
                return null;
            else {
                $previous = $current;
                $current = $current->next;
            }
        }
        if ($current == $this->head) {
            if ($this->numNode == 1) {
                $this->tail = $this->head;
            }
            $this->head = $this->head->next;
        } else {
            if ($this->tail == $current) {
                $this->tail = $previous;
            }
            $previous->next = $current->next;
        }
        $this->numNode--;
    }

    public function getFirst()
    {
        return $this->head->data;
    }

    public function getLast()
    {
        return $this->tail->data;
    }

    public function getIndex($index)
    {
        if ($index == 0) {
            return $this->getFirst();
        } else {
            $current = $this->head;
            for ($i = 0; $i < $index; $i++) {
                $current = $current->next;
            }
            return $current->data;
        }
    }

    public function size()
    {
        return $this->numNode;
    }

    public function printList()
    {
        $listData = array();
        $current = $this->head;
        while ($current != null) {
            array_push($listData, $current->getData());
            $current = $current->next;
        }
        return $listData;
    }

    public function cloneList()
    {
        $cloneList = $this->printList();
        return $cloneList;
    }

    public function contains($data)
    {
        $current = $this->head;
        $flag = null;
        while ($current != null) {
            if ($current->data == $data) {
                $flag = 'true';
                break;
            } else {
                $current = $current->next;
                $flag = 'false';
            }
        }
        return $flag;
    }

    public function indexOf($data)
    {
        $current = $this->head;
        $flag = null;
        $index = 0;
        while ($current != null) {
            if ($current->data == $data) {
                $flag = 'true';
                break;
            } else {
                $current = $current->next;
                $flag = 'false';
                $index++;
            }
        }
        if ($flag == 'true') {
            return $index;
        } else {
            return $flag;
        }
    }

    public function clear()
    {
        $this->head = null;
    }

    public function reverse()
    {
        if ($this->head != null) {
            if ($this->head->next != null) {
                $current = $this->head;
                $new = null;
                while ($current != null) {
                    $temp = $current->next;
                    $current->next = $new;
                    $new = $current;
                    $current = $temp;
                }
                $this->head = $new;
            }
        }
    }
}

