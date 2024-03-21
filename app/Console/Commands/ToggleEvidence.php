<?php

namespace App\Console\Commands;
use App\Models\Product;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use Illuminate\Console\Command;

class ToggleEvidence extends Command implements PromptsForMissingInput
{

    protected $signature = 'product:evidence {id?*} {--ask}';
    
    protected $description = 'toggle in_evidence for products';

    protected function changeState($product){
        $productChange = Product::select('id','in_evidence')->where('id', $product['id'])->first();
        $productChange['in_evidence'] = $product['in_evidence'] == true ? false : true;
        $this->info("la visibilità del product con id:{$product['id']} è stata cambiata");
        $productChange->save();
    }

    protected function messageGenerated($product){
        $partial = "Il Product con id:{$product['id']} ";
        return $product['in_evidence'] === true ? $partial . "è in evidenza, nascondere?" : $partial . "è nascosto, mettere in evidenza?";
     
    }


    public function handle()
    {
        if(!$this->argument('id')) return $this->error('Non sono stati selezionati id'); 
        
        $products_list = Product::select('id', 'in_evidence')->whereIn('id',$this->argument('id'))->get()->toArray();
      
        foreach($products_list as $product){

            if($this->option('ask')){
               $response =  $this->choice($this->messageGenerated($product), ['SI', 'NO']);
            
               if($response === 'SI' ){
                $this->changeState($product);
                
               }else{
                   $this->info("la visibilità del product con id:{$product['id']} non è stata cambiata");
                }
            }else{
                $this->changeState($product);
            }
        } 

        // gestisco gli eventuali id non trovati
        $paramNumber = $this->argument('id');
        $idFound = array_column($products_list, 'id');
        $productNotFound = array_diff($paramNumber,$idFound);
        
        if(count($productNotFound) > 0) $this->error("I seguenti product Id non sono stati trovati: " . implode(', ',$productNotFound));
    }
}