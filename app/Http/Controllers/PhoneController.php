<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Crypt;
use App\Http\Resources\PhonesResource;
use App\Http\Requests\StorePhoneRequest;
use App\Http\Requests\UpdatePhoneRequest;


class PhoneController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new Phone;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::all();
        return $this->sendResponse(PhonesResource::collection($phones), 'Phones retrieved successfully.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhoneRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhoneRequest $request)
    {
        $request['user_id'] = \Auth::user()->id;
        $request['phone_no'] = Crypt::encryptString($request->phone_no);
        $phones = $this->model::create($request->except('_token'));
        return $this->sendResponse($phones, 'Berhasil Menambah Nomor Handphone');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phones = $this->model::find($id);
  
        if (is_null($phones)) {
            return $this->sendError('Product not found.');
        }
   
        return $this->sendResponse(new PhonesResource($phones), 'Product retrieved successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhoneRequest  $request
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhoneRequest $request, Phone $phone)
    {
   
        $phone->phone_no = $request['phone_no'];
        $phone->provider = $request['provider'];
        $phone->save();
   
        return $this->sendResponse(new PhonesResource($phone), 'Phone updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        $phone->delete();
        return $this->sendResponse([], 'Phone deleted successfully.');
    }

    public function generateNoHandphone()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 25; $i++){
            // $check_phone_no = Phone::checkPhoneNo($faker->phoneNumber());
            $phones[$i] = $this->model::create([
                'phone_no' => $faker->phoneNumber(),
                'user_id' => auth()->user()->id,
                'provider' => $faker->randomElement(['xl', 'simpati'])
            ]);
        }
        return $this->sendResponse($phones, 'Berhasil Menambah Nomor Handphone');
    }
}