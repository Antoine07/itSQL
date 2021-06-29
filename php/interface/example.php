<?php

interface IeCar
{
    // signature des fonctions
    public function motor(int $pw): void;
    public function wheel(int $nb): void;
    public function autonomy(int $int): int;
}

class TeslaS implements IeCar
{

    public function __construct()
    {
        return "Telsa S";
    }

    public function motor(int $pw): void
    {
        $this->pw = $pw;
    }
    public function wheel(int $nb): void
    {
        $this->nb = $nb;
    }
    public function autonomy(int $duration): int
    {
        $this->duration = $duration;

        return $this->duration;
    }
}

class Tesla3 implements IeCar
{
    public function __construct()
    {
        return "Telsa 3";
    }

    public function motor(int $pw): void
    {
        $this->pw = $pw;
    }
    public function wheel(int $nb): void
    {
        $this->nb = $nb;
    }
    public function autonomy(int $duration): int
    {
        $this->duration = 2 * $duration;

        return $this->duration;
    }
}

class TeslaX implements IeCar
{
    public function __construct()
    {
        return "Telsa X";
    }

    public function motor(int $pw): void
    {
        $this->pw = $pw;
    }
    public function wheel(int $nb): void
    {
        $this->nb = $nb;
    }
    public function autonomy(int $duration): int
    {
        $this->duration = 4 * $duration;

        return $this->duration;
    }
}

class ParkingElectricCar {
    private $cars = [];

    public function set(IeCar $car):void{
        $this->cars[] = $car;
    }
}

// 

interface IStockage{
    public function set($product): void;
}

class SessionStockage implements IStockage{
    public function set($product): void{

    }
}

class DBStockage implements IStockage{
     public function set($product): void{
        
    }
}

class FileStockage implements IStockage{
    public function set($product): void{
       
   }
}

class RAMStockage implements IStockage{
    public function set($product): void{
       
   }
}

class Cart{

    private $stockage ;

    public function __construct( IStockage $stockage)
    {
        $this->stockage = $stockage;
    }

    public function add($product){
        $this->stockage->set($product);
    }
}