<?php 
class Carrinho {
    private $itensCarrinho;

    public function __construct()
    {
        $this->itensCarrinho = [];
    }

    public function adicionarItem(ItemCarrinho $item)
    {
        $this->intensCarrinho[] = $item;
        // é o mesmo que: array_push($this->itensCarrinho, $item);
    }

    public function total()
    {
        $total = 0; //variavel local ou variavel auxiliar, só serve para esta situação.
        foreach($this->itensCarrinho as $item){
            $total = $total + $item->subtotal();
        }

        return $total;
    }
}

?>