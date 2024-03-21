<?php

namespace App\Console\Commands;
use App\Models\Product;
use Illuminate\Contracts\Console\PromptsForMissingInput;

use Illuminate\Console\Command;

class ToggleEvidence extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:evidence {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'toggle in_evidence for products';

    /**
     * Execute the console command.
     *
     * @return int
     */
    // public function handle()
    // {
    //     $product = Product::find($this->argument('id'));
      
    //     if($product){

    //         $product->in_evidence = $product->in_evidence == true ? false : true;
            
    //         $message = $product->in_evidence == false ? "è stato nascosto!" : "è stato messo in evidenza!";
            
    //         $this->info("Il product con id:$product->id $message");
    //         $product->save();
            
    //     }else{
    //         $this->error("Il product con id:{$this->argument('id')} non è stato trovato" );
            
    //     }
    // }

    protected function promptForMissingArgumentsUsing(): array
{
    return [
        'id' => 'Specifica un product ID',
    ];
}

    public function handle()
    {
        $product = Product::find($this->argument('id'));
      
        if($product){

            $product->in_evidence = $product->in_evidence == true ? false : true;
            
            $message = $product->in_evidence == false ? "è stato nascosto!" : "è stato messo in evidenza!";
            
            $this->info("Il product con id:$product->id $message");
            $product->save();
            
        }else{
            $this->error("Il product con id:{$this->argument('id')} non è stato trovato" );
            
        }
    }

}