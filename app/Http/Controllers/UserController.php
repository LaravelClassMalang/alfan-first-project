<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Writer\WriterFactory;
use Box\Spout\Common\Type;
use App\User;
use PDF;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $pagination = 5;

        // filtering
        $users = User::query();
        // Jika parameter nama di isi, maka lakukan pencarian berdasarkan nama
        if(isset($request->name) AND $request->name != '') {
            // equals
            // $users->where('name', '=', '%'.$request.'%');
            // LIKE
            $users->where('name', 'LIKE', '%'.$request->name.'%');
        }

        if(isset($request->email) AND $request->email != '') {
            $users->where('email', 'LIKE', '%'.$request->email.'%');
        }

        $data['users'] = $users->paginate($pagination);
        // $users = User::all();

        // Support Pagination
        // $users = User::paginate($pagination);

        // numbering
        $number = 1;

        if( request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }

        return view('users.index', compact('data', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'confirmed'
        ]);

        // Cara Pertama (Query Builder)
        // User::create($request->only('name', 'email', 'password'));
        
        // Cara Kedua (Eloquent)
        $user = New User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $data['user'] = User::find($user_id);
        // Debug
        // dd($data['user']->products);

        return view('users.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET data by id
        $user = User::find($id);

        // return to view
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$user_id,
            'password' => 'confirmed'
        ]);

        // GET data by id
        $user = User::find($user_id);

        // Update data
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->update();

        // return to view
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // GET data by id
        User::destroy($id);

        // return to view
        return redirect()->route('users.index');
    }

    public function exportXLS() {
        $title = ['Name', 'Email'];
        $fileName = 'Export User.xlsx';
        $writer = WriterFactory::create(Type::XLSX); // for XLSX files
        $customers = User::select('*'); // dapatkan seluruh data customer
        
        $writer->openToBrowser($fileName); // stream data directly to the browser
        $writer->addRow($title); // tambahkan judul dibaris pertama
        $customers->chunk(500, function($datas) use ( $writer ) {
            foreach ($datas as $data) {
                $writer->addRow([
                    $data->name,
                    $data->email
                ]); // tambakan data data per baris
            }
        });
        $writer->close();
    }

    public function exportPDF($user_id) {
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML('
        //     <style>
        //     .page-break {
        //         page-break-after: always;
        //     }
        //     </style>
        //     <h1>Page 1</h1>
        //     <div class="page-break"></div>
        //     <h1>Page 2</h1>
        //     <div class="page-break"></div>
        //     <h1>Page 3</h1>
        // ');
        // return $pdf->stream();
        $data['user'] = User::find($user_id);
        // dd($data['user']);
        $pdf = PDF::loadView('users.tespdf', compact('data'));
        return $pdf->stream('invoice.pdf');
    }

    public function testCache() {
        $value = Cache::remember('users', 2, function () { // 2 adalah menit
            return User::first();
        });

        dd($value);
    }
}
