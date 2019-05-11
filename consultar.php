<?php

include __DIR__ . '/vendor/autoload.php';

$pagarme = new Pagarme\Client('ak_test_e8bQPvwpUH6osVDxny7FQt7BParFIH');

$transacao = $pagarme->transactions()->get([
    'id'=>'6337423'
])

echo $transacao->status;

?>