<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Investment> $investments
 */


// echo $transactions->toArray();
echo json_encode(compact('dividends'), JSON_PRETTY_PRINT);