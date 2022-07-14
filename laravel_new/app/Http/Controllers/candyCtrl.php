<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use DB;
use App\Http\Controllers\Controller;

use App\Models\TestModel;
use File;
use Session;
use App\Models\PhotoUploadModel;


class candyCtrl extends Controller
{
    public function candyview(){
        return view('candy'); //blade page name
    }
    public function registration(){
        return view('registration');
    }
    public function login(){
        return view('login');
    }
    public function dashboard(){
        $data = TestModel::get()->toArray();
        //return view('dashboard')->withData($data);
        return view('dashboard', ['data' => $data]);
    }
    public function valueInsert(Request $request){
        // print_r($request->all());die;
        // print_r($request->allFiles());
        if($request->allFiles()==Array()){
            $fileName = '';
        }else{
            $request->validate([
                'profile_picture' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            //print_r($validate->errors);die;
            $fileName = time().'.'.$request->profile_picture->extension();  

            $path = public_path().'/uploads';
            if(!File::isDirectory($path)){
                File::makeDirectory($path);
                $request->profile_picture->move(public_path('uploads'), $fileName);
            }else{
                $request->profile_picture->move(public_path('uploads'), $fileName);
            }
        }
        $first_name = $request->fname;
        $middle_name = $request->mname;
        $last_name = $request->lname;
        $gender = $request->gender;
        $dob = $request->dob;
        $address = $request->address;
        $pin_code = $request->pcode;
        $picture_name = $fileName;
        $email = $request->email;
        $mobile = $request->mobile;
        $password = $request->psw;
        $data=array(
            'first_name'=>$first_name,
            'middle_name'=>$middle_name,
            'last_name'=>$last_name,
            'gender'=>$gender,
            'dob'=>$dob,
            'address'=>$address,
            'pin_code'=>$pin_code,
            'picture_name'=>$picture_name,
            'email'=>$email,
            'mobile'=>$mobile,
            'password'=>$password
        );
        $reg = TestModel::insert($data);
        if($reg){
            $return['key'] = 'S';
            $return['msg'] = 'Insert Successfully.';
        }else{
            $return['key'] = 'E';
            $return['msg'] = 'Insert Un-Successfully.';
        }
        return $return;
        
        //print_r($data);
        // DB::table('registration')->insert($data);
        // echo "Record inserted successfully.<br/>";
        // echo '<a href = "registration">Click Here</a> to go back.';
    }
    public function valueDelete(Request $request){
        // print($request->u_id);die;
        $id = $request->u_id;
        $photo = TestModel::where('id',$id)->pluck('picture_name');
        $del = TestModel::where('id',$id)->delete();
        if($del){
            $return['key'] = 'S';
            $return['msg'] = 'Delete Successfully.';
            unlink('public/uploads/'.$photo[0]);
        }else{
            $return['key'] = 'E';
            $return['msg'] = 'Delete Un-Successfully.';
        }
        return $return;
    }
    public function valueSelect(Request $request){
        $data = TestModel::where('id', $request->u_id)->get()->toArray();
        return $data;
    }
    public function valueUpdate(Request $request){
        $old_photo = $request->h_photo;
        if($request->allFiles()==Array()){
            $fileName = $old_photo;
        }else{
            $request->validate([
                'profile_picture' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
    
            $fileName = time().'.'.$request->profile_picture->extension();  
    
            $request->profile_picture->move(public_path('uploads'), $fileName);
        }
        // print($fileName);die;
        $id = $request->h_id;
        $first_name = $request->fname;
        $middle_name = $request->mname;
        $last_name = $request->lname;
        $gender = $request->gender;
        $dob = $request->dob;
        $address = $request->address;
        $pin_code = $request->pcode;
        $picture_name = $fileName;
        $email = $request->email;
        $mobile = $request->mobile;
        $password = $request->psw;
        $data=array(
            'first_name'=>$first_name,
            'middle_name'=>$middle_name,
            'last_name'=>$last_name,
            'gender'=>$gender,
            'dob'=>$dob,
            'address'=>$address,
            'pin_code'=>$pin_code,
            'picture_name'=>$picture_name,
            'email'=>$email,
            'mobile'=>$mobile,
            'password'=>$password
        );
        $update = TestModel::where('id', $id)->update($data);
        if($update){
            unlink('public/uploads/'.$old_photo);
            $return['key'] = 'S';
            $return['msg'] = 'Update Successfully.';
        }else{
            $return['key'] = 'E';
            $return['msg'] = 'Not Updated.';
        }
        return $return;
    }
    public function userLogin(Request $request){
        // print_r($request->all());die;
        $data = TestModel::select('id','first_name','middle_name','last_name')
                            //->where('password', $request->psw)
                            ->whereRaw("(mobile = '".$request->u_name."' OR email = '".$request->u_name."') AND password = '".$request->psw."'")
                            ->get()->toArray();
        // print_r($data[0]['id']);die;
        Session::put('u_id',$data[0]['id']);
        Session::put('name',$data[0]['first_name'].' '.$data[0]['middle_name'].' '.$data[0]['last_name']);
        return $data;
    }
    public function userDashboard(){
        return view('userdashboard');
    }
    public function logOut(){
        Session::forget('u_id');
        Session::forget('name');
        return view('login');
    }
    public function photoUpload(Request $request){
        // print_r($request->all());die;
        // print_r($request->allFiles());
        $user_id = Session::get('u_id');
        foreach($request->photo('filenames') as $key=>$val){
            $request->validate([
                'photo[$key]' => 'required|mimes:jpg,jpeg,png|max:2048',
            ]);
            $fileName = time().'.'.$request->photo[$key]->extension();  

            $path = storage_path().'/uploads/'.$user_id;
            if(!File::isDirectory($path)){
                File::makeDirectory($path);
                $request->photo[$key]->move(storage_path('uploads/'.$user_id), $fileName);
            }else{
                $request->photo[$key]->move(storage_path('uploads'.$user_id), $fileName);
            }
            $data=array(
                'fk_user_id'=> $user_id,
                'photo_name'=>$fileName
            );
            $reg = PhotoUploadModel::insert($data);
            if($reg){
                $return['key'] = 'S';
                $return['msg'] = 'Upload Successfully.';
            }else{
                $return['key'] = 'E';
                $return['msg'] = 'Un Uploaded Successfully.';
            }
            return $return;
        }
    }
}