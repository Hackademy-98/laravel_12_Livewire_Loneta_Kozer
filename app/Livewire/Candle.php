<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;





class Candle extends Component
{
    use WithFileUploads; //fare click destro e importare classe

public $name;

public $description;

public $img;
public $products;
public $productToEdit;
public $editMode = false;

protected $rules = [
    "name" => "required|string|max:255",
    "description" => "required",
    "img" => "image"
];
protected $messages =[
    "name.required" => "Il campo  è obligatorio",
    "description.required" => "Il campo  è obligatorio",
    "img.required" => "Il campo  è obligatorio"
];
public function store() {
$this->validate();
// dd($this->name,$this->description,$this->img);
Product::create([
    "name" => $this->name,
    "description" => $this->description,
    "img" => $this->img ? $this->img->store('public/images') : "public/images/default.png"
]);
$this->reset();
session()->flash('success','Candel create!');

}
public function edit(Product $product){
    // setto i campi del form
    $this->name = $product->name;
    $this->description = $product->description;
    // memorizzo il gioco o candela da editare
    $this->productToEdit = $product;
    // memorizzo che sono in edit mode
    $this->editMode =true;
}
public function update() {
    $this->productToEdit->update([
        "name" => $this->name,
        "description" => $this->description,
        "img" => $this->img ? $this->img->store('public/images') : $this->productToEdit->img
    ]);
    $this->reset();
    $this->editMode = false;
    session()->flash('success','Candel updated!');
      
}
public function destroy(Product $product){
    $product->delete();
}
    public function render()
    {
        $this->products = Product::all();
        return view('livewire.candle');
    }
}
