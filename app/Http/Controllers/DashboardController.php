<?php

namespace App\Http\Controllers;

use App\Models\packets_reels;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
$packet=DB::table('users')->orderBy('id','desc')->paginate(5);
//if ($request->ajax()){
//
//}

        return view('pages\dashboard\dashboard',compact($packet));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create(Request $request)
//    {
//        $packet=packets_reels::create($request->all());
//        return Response::json($packet);
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'names_packets' => 'required',
            'word_count' => 'required',
            'websites_count' => 'required',
            'rank_fosllow' => 'required',
            'description' => 'required',
            'price' => 'required',
        ]);

        $packet = new packets_reels();
        $packet->names_packets = $request->input('names_packets');
        $packet->word_count = $request->input('word_count');
        $packet->websites_count = $request->input('websites_count');
        $packet->rank_fosllow = $request->input('rank_fosllow');
        $packet->description = $request->input('description');
        $packet->price = $request->input('price');
        $packet->save();
      //  return Response::json($packet);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//       // $packet = packets_reels::find($id)->update($request,$id);
//       if ($request()->ajax()){
//           $data=packets_reels::find($id);
//        return response()->json(['data'=>$data]);
//       }
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'names_packets' => 'required',
            'word_count' => 'required',
            'websites_count' => 'required',
            'rank_fosllow' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $packet=packets_reels::find($id);

        $packet->names_packets = $request->input('names_packets');
        $packet->word_count = $request->input('word_count');
        $packet->websites_count = $request->input('websites_count');
        $packet->rank_fosllow = $request->input('rank_fosllow');
        $packet->description = $request->input('description');
        $packet->price = $request->input('price');


        $packet->save();

        return Response::json($packet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        packets_reels::find($id)->delete();

        return response()->json(['success' => 'Packet deleted successfully.']);
    }
}
