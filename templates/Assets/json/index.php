<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Investment> $investments
 */


// echo $transactions->toArray();
echo json_encode(compact('assets'), JSON_PRETTY_PRINT);