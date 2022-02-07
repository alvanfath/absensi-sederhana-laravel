<?php

namespace App\Http\Controllers;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use App\Models\absen;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function masuk()
    {
        return view('student.masuk');
    }

    public function pulang()
    {
        return view('student.pulang');
    }
    public function gahadir()
    {
        return view('student.gahadir');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');
        $localtime = $date->format('H:i:s');
        $tidakhadir = '1';

        $absen = absen::where([
            ['student_id', '=', auth()->user()->id],
            ['tgl' ,'=',$tanggal],
        ])->first();

        // $tidak = absen::where([
        //     ['student_id', '=', auth()->user()->id],
        //     ['tidakhadir' ,'=', $tidakhadir],
        // ])->first();

        if($absen){
            return redirect('pulang')
            ->with('udah',"you've present before");

        // }else if ($tidak){ 
        //     return redirect('masuk')
        //     ->with('tidak',"you've fill the attendance if you not present");

        }else{
            absen::create([
                'student_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
            ]);
            return redirect('pulang')
            ->with('succes',"welcome to Alvan school and hopefully you're enjoy at here");
        }

        
    }
    
    public function absenpulang(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');
        $localtime = $date->format('H:i:s');
        $tidakhadir = '1';

        $absen = absen::where([
            ['student_id', '=', auth()->user()->id],
            ['tgl' ,'=',$tanggal],
        ])->first();

        $dt=[
            'jampulang' => $localtime,
            'jamsekolah' => date('H:i:s', strtotime($localtime) - strtotime($absen->jammasuk)),
        ];

        if ($absen->jampulang == "") {
            $absen->update($dt);
            return redirect('pulang')->with('succes','see you, be careful on the way :D');
        }else{
            return redirect('pulang')
            ->with('udah',"you've left");
        }

    }
    public function gadatang(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now',new DateTimeZone($timezone));
        $tanggal = $date->format('y-m-d');
        $localtime = $date->format('H:i:s');
        $tidakhadir = '1';

        $absen = absen::where([
            ['student_id', '=', auth()->user()->id],
            ['tgl' ,'=',$tanggal],
        ])->first();

         
        if ($absen){
            return redirect('gahadir')
            ->with('udah',"you've give your confirmation");
        }else{
           $request->validate([
            $alasan ='alasan' => 'required',
           ]);
           absen::create([
                'student_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'tidakhadir'=>$tidakhadir,
                'alasan'=> $request->alasan,
                
            ]);
     
        return redirect('gahadir')
                        ->with('succes','thanks for your confirmation !');
        }
    }
    public function tampilanabsen()
    {
        //
        $absen = absen::all();
        return view('admin.absen.index',compact('absen'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        ;
    }
    public function destroy(absen $absen){
        $absen->delete();

        return redirect()->route('')
        ->with('delete','Berhasil Hapus !');
    }
    

}