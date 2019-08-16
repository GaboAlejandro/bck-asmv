<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Resources\AppointmentResource;
use Illuminate\Support\Facades\Auth;
use Validator;



class AppointmentController extends Controller
{
    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('jwt');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AppointmentResource::collection(Appointment::with('User')->paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $val = Appointment::where('user_id',$request->user_id)->first();
        $vals = Appointment::all();
        $h = substr(explode(' ',$request->appointment)[1], 0, 2);
        if (preg_match('/:/i',$h)){
            $h = str_replace(':','',$h);
        }
        $h = (int)$h;
        if($h < 9 || $h > 6){
            return response()->json(['error' => 'Its Closed.'], 401);
        }
        if($val !== null){
            return response()->json(['error' => 'User with appointment.'], 401);
        }
        foreach ($vals as $val){
            if($val->appointment == $request->appointment){
                return response()->json(['error' => 'Time not available'], 401);
            }
        }

        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'appointment' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $appointment = Appointment::create([
            'user_id' => $request->user_id,
            'appointment' => $request->appointment]);
        $success['appointment'] = $appointment->appointment;
        return response()->json(['success' => $success], $this->successStatus);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $val = Appointment::where('user_id', id)->first();
        if ($val == null){
            return response()->json(['error' => 'User Not Found'], 401);
        }
        return response()->json(['success' => $val], $this->successStatus);
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
        //
    }
}
