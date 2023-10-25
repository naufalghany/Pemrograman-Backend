<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // property animals
    public $animals =["Beruang", "Bebek"];

    public function index() {
        // method untuk menampilkan data animals
        echo "Menampilkan data animals <br>";

        // loop property animals
        foreach($this->animals as $animal){
            echo "_ $animal <br>";
        }
    }

    public function store(request $request) {
        // method untuk menambahkan data baru
        echo "Menambahkan hewan baru <br>";

        // menambahkan data ke property animals
        array_push($this->animals, $request->animal);

        // panggil method index
        $this->index();



    }

    public function update($id, Request $request) {
       // method untuk mengedit data hewan
        echo "Mengupdate data hewan id $id <br>";
        
        // update data di property animals
        $this->animals[$id] = $request->animal;

        // panggil method index
        $this->index();

    }

    public function destroy($id){
        // Method untuk menghapus data hewan

        echo "Menghapus data hewan id $id <br>";
        
        unset ($this->animals[$id]);
        
        // panggil method index
        $this->index();        
    }

    
}