<?php
abstract class BoletoDAO
{
    abstract function connect();
    abstract function inserir($objeto);
    abstract function alterar($objeto);
    abstract function excluir($id);
    abstract function listar();
    abstract function listar_filtro($filtro);
    abstract function obter($id);
}
?>
