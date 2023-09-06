<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class SaleController extends Controller

{

    const insert_sale_statement = 'insert into sales(time,sale_number,product_name,price,currency) values 
        (CURRENT_TIMESTAMP,?,?, ?,?)';
    const payme_url = 'https://sandbox.payme.io/api/generate-sale';
    const seller_payme_id = 'MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N';

    public function index()
    {
       return view('sales',['sales' => DB::select('select * from sales')]);
    }


    public function create()
    {
        return view('form');
    }

     function insert_to_db($request,$response)
    { 
        DB::insert(self::insert_sale_statement, [$response->payme_sale_code,$request->name,$request->price,$request->currency]); 
    }
    public function store(Request $request)
    {
        

        
        $response = Http::withOptions([
            'verify' => false, //this is not for prod obviously
        ])->post(self::payme_url,[
            'seller_payme_id' => self::seller_payme_id, 
            'sale_price' => $request->price, 
            'currency' => $request->currency, 
            'product_name' => $request->name, 
            'installments' =>'1',
            'language' => 'en'  
    ])->object();
        if($response->status_code == 0){
            $this->insert_to_db($request,$response);
            return view('iframe',['sale_url' => $response->sale_url]);
        }
        else{
            return response($response->status_error_details, 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        return DB::select('select * from sales where product_name = ?',[ $request->input('product_name')]);
        
    }
    

    public function salesCreateTable()
    {
        $create_table_sale_statement = 'create table sales(time DATETIME, sale_number int NOT NULL Unique, product_name varchar(255) NOT NULL,
        price double NOT NULL,currency varchar(255) NOT NULL)';
        DB::statement($create_table_sale_statement);
    }

    public function saleDeleteTable()
    {
        DB::statement('drop table sales');
    }
}
