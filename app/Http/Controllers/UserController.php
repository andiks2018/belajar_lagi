<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //menampilkan data disini, user index
        $data = [
            'user'=>User::get(), //ambil hasil inputan database ke variable user
            'content'=> 'user.index' //masing masing content nanti beda, tampilannya
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Show the form for creating a new resource.
     */

    //tampilan create form
    public function create()
    {
        $data = [
            'content'=> 'user.create'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Store a newly created resource in storage.
     */

    //menampilkan data ke database local
    public function store(Request $request)
    {
        //validasi di simpan ke data
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
            're_password'=>'required|same:password',
        ]);

        //agar password tidak kelihatan aslinya
        $data['password']= Hash::make($data['password']);

        //kalau berhasil melewati validasi, selanjutnya create data simpan ke page /user : index
        User::create($data);
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //menampilkan form create, copy dari create function
        $data = [
            'user'=> User::find($id),
            'content'=> 'user.create'
        ];
        return view('layouts.wrapper', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //copy dari store untuk melakukan update data, berdasarkan idnya
        $user =User::find($id);
            //validasi di simpan ke data
            $data = $request->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users,email,' . $user->id, //tambahkan user id
                //'password'=>'required', //ini boleh kosong
                're_password'=>'same:password',
            ]);

        //jika request password ada maka buat hash, kalau tidak maka tampilkan password
        if ($request->password != ''){
            //agar password tidak kelihatan aslinya
            $data['password']= Hash::make($request->password);
        } else{
            $data['password'] = $user->password;
        }


            //kalau berhasil melewati validasi, selanjutnya create data simpan ke page /user : index
            //User::create($data); //ini tidak perlu create datalagi
        //update data berdasarkan data user
        $user->update($data);
            return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
