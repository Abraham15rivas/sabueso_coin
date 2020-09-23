<?php

namespace App\Http\Controllers\admin;

use App\{Company,PaymentAddress,Category,Payment};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Storage, DB};
use File;

class CompanyController extends Controller
{
    public function index()
    {
        return view('data.companies.index');
    }

    public function getCompanies()
    {
        return Company::orderBy('name', 'asc')->get()->toJson();
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            $request['glufco'] = $request['glufco'] == 'si' ? 1 : 0;
            $company = Company::create($request->all());

            $payments_address = array();
            for($i=0;$i<count($request['payments_type']); $i++){

                if(!is_numeric($request['payments_type'][$i]))
                {
                    $payment_type = Payment::create([
                        'name' => ucwords($request['payments_type'][$i])
                    ]);

                    $company->payments()->attach($payment_type->id);

                } else {

                    $company->payments()->attach($request['payments_type'][$i]);
                }
                
                $payments_address[$i] = PaymentAddress::create([
                    'company_id'=>$company->id,
                    'payment_id'=>!empty($payment_type) ? $payment_type->id : $request['payments_type'][$i],
                    'address'=>$request['payment_address'.$i]
                ]);
            }
            if(count($request['categories']) > 0){
                for($i=0;$i<count($request['categories']); $i++){

                    if(!is_numeric($request['categories'][$i]))
                    {
                        $category = Category::create([
                            'name' => ucwords($request['categories'][$i]),
                            'description' => $request['categories'][$i]
                        ]);

                        $company->categories()->attach($category->id);
                    } else {
                    
                        $company->categories()->attach($request['categories'][$i]);
                    }
                }
            }
            if($request->hasFile('logo')) {
                //registrar un logo de la empresa en el servidor
                $file = $request->file('logo');
                $path = public_path().'/img/companies';
                $fileName = uniqid().$file->getClientOriginalName();
                //esto es para guardar la ruta en la BD, donde se encuentra guardada la imagen en el servidor
                $nameUrl = '/img/companies/'. $fileName;
                $moved = $file->move($path, $fileName);
                if ($moved)
                {
                    $company->logo = $nameUrl;
                    $company->save();
                }

            }
            DB::commit();
        }catch(Exception $e){
            DB::rollback();
            throw $e;
        }

        return $company;
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, Company $company)
    {
        $company->update($request->all());
    }

    public function destroy($id)
    {
        //elimina de la carpeta del servidor
        $company = Company::find($id);
        $fullPath = public_path().$company->logo;
        $deleted = File::delete($fullPath);

        //elimina el registro de la bd
        if ($deleted) {
            $company->delete();
        }
    }
}
