<?php

include __DIR__ . '/vendor/autoload.php';
include 'classes/Produto.php';
include 'classes/Ebook.php';
include 'classes/LivroFisico.php';
include 'classes/ItemCarrinho.php';
include 'classes/Carrinho.php';

$ebook = new Ebook(10.90, 'PHP OO', 'Livro mto bom', 'http://xxx');
$livroFisico = new LivroFisico(12.90, 'PHP OO', 'Livro mto bom', 300);

$itemCarrinho1 = new ItemCarrinho(10, $ebook);
$itemCarrinho2 = new ItemCarrinho(3, $livroFisico);


$Carrinho = new Carrinho();
$Carrinho->adicionarItem($itemCarrinho1);
$Carrinho->adicionarItem($itemCarrinho2);

$totalTransacao = $Carrinho->total() * 100;

$pagarme = new PagarMe\Client('ak_test_e8bQPvwpUH6osVDxny7FQt7BParFIH');

        $transaction = $pagarme->transactions()->create([
            'amount' => (string) $totalTransacao,
            'payment_method' => 'credit_card',
            'card_holder_name' => 'Anakin Skywalker',
            'card_cvv' => '123',
            'card_number' => '4242424242424242',
            'card_expiration_date' => '1220',
            'customer' => [
                'external_id' => '1',
                'name' => 'Nome do cliente',
                'type' => 'individual',
                'country' => 'br',
                'documents' => [
                  [
                    'type' => 'cpf',
                    'number' => '00000000000'
                  ]
                ],
                'phone_numbers' => [ '+551199999999' ],
                'email' => 'cliente@email.com'
            ],
            'billing' => [
                'name' => 'Nome do pagador',
                'address' => [
                  'country' => 'br',
                  'street' => 'Avenida Brigadeiro Faria Lima',
                  'street_number' => '1811',
                  'state' => 'sp',
                  'city' => 'Sao Paulo',
                  'neighborhood' => 'Jardim Paulistano',
                  'zipcode' => '01451001'
                ]
            ],
            'shipping' => [
                'name' => 'Nome de quem receberá o produto',
                'fee' => 1020,
                'delivery_date' => '2018-09-22',
                'expedited' => false,
                'address' => [
                  'country' => 'br',
                  'street' => 'Avenida Brigadeiro Faria Lima',
                  'street_number' => '1811',
                  'state' => 'sp',
                  'city' => 'Sao Paulo',
                  'neighborhood' => 'Jardim Paulistano',
                  'zipcode' => '01451001'
                ]
            ],
            'items' => [
                [
                  'id' => '1',
                  'title' => 'R2D2',
                  'unit_price' => 300,
                  'quantity' => 1,
                  'tangible' => true
                ],
                [
                  'id' => '2',
                  'title' => 'C-3PO',
                  'unit_price' => 700,
                  'quantity' => 1,
                  'tangible' => true
                ]
            ]
        ]);

        


echo $transaction->status;