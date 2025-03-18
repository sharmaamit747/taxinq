<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Auth;
use Session;
use File;
use App\Library\Permissions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Client;
use App\Education;

class ClientController extends Controller {

    public function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        echo json_encode($this->data);
    }

    function generateRandomString($length) {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function index(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 3) {
            return redirect()->route('login');
        }
        return View('client.index');
    }

    public function profile(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 3) {
            return redirect()->route('login');
        }
        $edu = Education::where('userid', Auth::user()->id)->get();
        return View('client.profile', compact('edu'));
    }

    public function client(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        return View('admin.client.client');
    }

    public function appointments(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 3) {
            return redirect()->route('login');
        }
        $res = DB::table('appointments')
                ->leftJoin('queries', 'appointments.query_id', '=', 'queries.id')
                ->leftJoin('laws', 'appointments.law_id', '=', 'laws.id')
                ->leftJoin('users', 'appointments.consultant_id', '=', 'users.id')
                ->select('appointments.*', 'queries.title as qtitle', 'laws.title as ltitle', 'users.name as cname', 'users.email as cemail')
                ->where('appointments.email', Auth::user()->email)
                ->get();
        foreach ($res as $key => &$value) {
            $value->dates = date('d M Y', strtotime($value->created_at));
        }
        return View('client.appointments', compact('res'));
    }

    public function appointment(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 3) {
            return redirect()->route('login');
        }
        $res = DB::table('appointments')
                ->leftJoin('queries', 'appointments.query_id', '=', 'queries.id')
                ->leftJoin('laws', 'appointments.law_id', '=', 'laws.id')
                ->leftJoin('users', 'appointments.consultant_id', '=', 'users.id')
                ->select('appointments.*', 'queries.title as qtitle', 'laws.title as ltitle', 'users.name as cname', 'users.email as cemail')
                ->where('appointments.slug', $request->id)
                ->first();
        $res->dates = date('d M Y', strtotime($res->created_at));
        $rid = $res->id;
        if ($res->consultant_id == null || $res->consultant_id == '') {
            $email = [
                'Admin' => 'admin@taxinq.com',
            ];
        } else {
            $email = [
                'Admin' => 'admin@taxinq.com',
                'Consultant' => $res->cemail
            ];
        }
        return View('client.appointment', compact('res', 'rid', 'email'));
    }
    
    public function chatemail_table(Request $request) {
        $res = DB::table('emailchats')
                ->leftJoin('users', 'emailchats.sender_id', '=', 'users.id')
                ->select('emailchats.*', 'users.name as sender')
                ->where('emailchats.appointment_id', $request->id)
                ->orderBy('emailchats.id', 'DESC')
                ->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            if (strlen($value->message) > 30) {
                $value->messages = substr($value->message, 0, 30) . "..";
            } else {
                $value->messages = $value->message;
            }
            $value->dates = date("d M Y h:i:sa", strtotime($value->created_at));
            $value->view = "<a tag_id='" . $value->extraid . "' data-toggle='modal' data-target='#view-chmessage' class='btn btn-sm btn-default view_appointment_email'><i class='fa fa-eye text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }
    
    public function email_chat(Request $request) {
        $files = $request->file('files');
        $file11 = [];
        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $image = $file;
                $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = 'images/appointment/';
                $photoPath = "images/appointment/" . $input['imagename'];
                $image->move($destinationPath, $input['imagename']);
                $filea = $image->getClientOriginalName();
                $filename = pathinfo($filea, PATHINFO_FILENAME);
                $data1 = [
                    'extraid' => $request->extraid,
                    'extra' => $filename,
                    'attachment' => $photoPath
                ];
                $res1 = Emailchatfile::create($data1);
                $file11[] = url($photoPath);
            }
        }
        $data = [
            'sender_id' => Auth::user()->id,
            'subject' => $request->subject,
            'appointment_id' => $request->appointment_id,
            'extraid' => $request->extraid,
            'message' => $request->message,
            'extra2' => implode(',', $request->email),
        ];
        $res = Emailchat::create($data);
        foreach ($request->email as $val) {
            $data23 = [
                'subject' => $request->subject,
                'email' => $val,
                'mess' => $request->message
            ];
            $ress = \Mail::send('mails/chat', compact('data23'), function ($message) use ($data23, $file11) {
                        $message->from('info@taxinq.com');
                        $message->to($data23['email'])->subject($data23['subject']);
                        if (count($file11) > 0) {
                            foreach ($file11 as $file) {
                                $message->attach($file);
                            }
                        }
                    });
        }
        if ($res) {
            $this->message('success', 'Sent Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function client_table() {
        $res = Client::orderBy('id', 'DESC')->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<button category_id='" . $value->id . "' class='btn btn-sm btn-default edit-client' data-bs-toggle='modal' data-bs-target='#edit-client'><i class='fa fa-edit'></i></button>"
                    . "<button category_id='" . $value->id . "' class='btn btn-sm btn-default delete_client'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function create_client(Request $request) {
        if ($request->file('file') == null) {
            $photoPath = null;
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/client/';
            $photoPath = "images/client/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
        }
        $data = [
            'title' => $request->title,
            'pic' => $photoPath,
        ];
        $res = Client::create($data);

        if ($res) {
            $this->message('success', 'client Create Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function edit_client(Request $request) {
        $old = $request->old;
        if ($request->file('file') == null || $request->file('file') == '') {
            if ($request->old == '') {
                $photoPath = null;
            } else {
                $photoPath = $request->old;
            }
        } else {
            $image = $request->file('file');
            $input['imagename'] = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = 'images/client/';
            $photoPath = "images/client/" . $input['imagename'];
            $image->move($destinationPath, $input['imagename']);
            File::delete($request->old);
        }
        $datas = [
            'title' => $request->title,
            'pic' => $photoPath,
        ];
        $data = Client::where(['id' => $request->id]);
        $res = $data->update($datas);
        if ($res) {
            $this->message('success', 'client Update Successfully', '');
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

}
