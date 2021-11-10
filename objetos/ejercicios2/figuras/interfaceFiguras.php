<?php
interface Figura {
    public function perimetro() : float;
    public function area() : float;
    public function escalar($escala);
    public function imprimir();
}