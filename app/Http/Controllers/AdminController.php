<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Match;
use Validator;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function matchindex(Request $request)
    {
      $query = Match::all();
      $studentName = empty($request->$studentName) ? "" : $request->$studentName;
      $companyName = empty($request->$companyName) ? "" : $request->$companyName;
      if ($studentName != ""){
        $query = $query->where("studentName","=",$studentName);
      }
      if ($companyName != ""){
        $query = $query->where("companyName","=",$companyName);
      }
      $items = $query->get();
      return view('admin.matchindex',['items'=>$items]);
    }

    public function matchupdate(Request $qeruest)
    {
      if ($request->isMethod('get')){
        $item = Match::find($request->id);
        $students = DB::table('students')->all();
        $companies = DB::table('companies')->all();
        return view('admin.matchupdate',['item'=>$item,'students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin.update/'.$request->id)
          ->withErrors($validator)
          ->withInput();
        }
        $item = Match::find($request->id);
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return redirect('admin.matchview'.$request->id);
      }
    }

    public function matchadd(Request $request)
    {
      if ($request->isMethod('get')) {
        $students = DB::table('students')->all();
        $companies = DB::table('companies')->all();
        return('admin.matchadd',['students'=>$students,'companies'=>$companies]);
      }else {
        $validator = Validator::($request->all(),Match::$rules,Match::$messages);
        if ($validator->fails()) {
          return redirect('admin.matchadd')
          ->withErrors($validator)
          ->withInput();
        }
        $item = new Macth;
        $form = $request->all();
        unset($form['_token']);
        $item->fill($form)->save();
        return view('admin.matchindex');
      }
    }

    public function matchview(Request $request)
    {
      $item = Match::find($request->id);
      return view('admin.matchview',['item'=>$item]);
    }

    public function matchdelete(Request $request)
    {
      $item = Match::find($request->id)->delete();
      return view('admin.matchindex');
    }
}
