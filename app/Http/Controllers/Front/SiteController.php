<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\AddressStore;
use App\Models\Address;
use App\Models\Areas;
use App\Models\Cities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = Cities::pluck('title', 'id')->toArray();
        $areas = Areas::pluck('title', 'id')->toArray();
        $address = Address::with('city', 'area')->get();
        return view('layout.front.site', compact('cities', 'areas', 'address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Cities::pluck('title', 'id')->toArray();
        $areas = Areas::pluck('title', 'id')->toArray();
        return view('layout.front.site', compact('cities', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressStore $request)
    {
        $data = $request->all();
        $address = [
            'Name' => $data['name'],
            'city_id' => $data['city'],
            'area_id' => $data['area'],
            'Street' => ($data['street'] == '') ? '' : $data['street'],
            'House' => ($data['house'] == '') ? '' : $data['house'],
            'Additional' => ($data['additional'] == '') ? '' : $data['additional'] ,
        ];
        Session::flash('message', 'Успешно добавлено');
        Address::create($address);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deleteAddress($id)
    {
        $address = Address::find($id);
        $address->delete();
        return redirect()->back();
    }
}
