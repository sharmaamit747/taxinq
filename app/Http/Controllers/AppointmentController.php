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
use App\Slider;
use App\Blog;
use App\User;
use App\Contact;
use App\Query;
use App\Laws;
use App\Emailchat;
use App\Emailchatfile;
use App\Appointment;
use App\Comment;
use App\BlogCategory;
use App\BlogTag;
use App\Mail\AppointmentMail;
use App\Mail\ChatMail;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller {

    public function message($type, $msg, $data = null) {
        $this->data['type'] = $type;
        $this->data['message'] = $msg;
        $this->data['data'] = $data;
        echo json_encode($this->data);
    }

    function str_limit($value, $limit = 100, $end = '...') {
        $limit = $limit - mb_strlen($end); // Take into account $end string into the limit
        $valuelen = mb_strlen($value);
        return $limit < $valuelen ? mb_substr($value, 0, mb_strrpos($value, ' ', $limit - $valuelen)) . $end : $value;
    }

    public function appointments(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $query = Query::get();
        $laws = Laws::get();
        return View('admin.appointment.appointments', compact('query', 'laws'));
    }

    public function appointment_table() {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $res = DB::table('appointments')
                ->leftJoin('queries', 'appointments.query_id', '=', 'queries.id')
                ->leftJoin('laws', 'appointments.law_id', '=', 'laws.id')
                ->select('appointments.*', 'queries.title as qtitle', 'laws.title as ltitle')
                ->orderBy('appointments.id', 'DESC')
                ->get();
        $i = 1;
        foreach ($res as $key => &$value) {
            $value->sr_no = $i;
            $value->action = "<a href='edit_appointment/" . $value->id . "' class='btn btn-sm btn-default'><i class='fa fa-edit'></i></button>"
                    . "<a tag_id='" . $value->id . "' class='btn btn-sm btn-default delete_appointment'><i class='fa fa-trash text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function edit_appointment(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $query = Query::get();
        $laws = Laws::get();
        $res = DB::table('appointments')
                ->leftJoin('queries', 'appointments.query_id', '=', 'queries.id')
                ->leftJoin('laws', 'appointments.law_id', '=', 'laws.id')
                ->leftJoin('users', 'appointments.consultant_id', '=', 'users.id')
                ->select('appointments.*', 'queries.title as qtitle', 'laws.title as ltitle', 'users.name as cname', 'users.email as cemail')
                ->where('appointments.id', $request->id)
                ->first();
        $consultant = User::where('userType', 2)->get();
        $rid = $request->id;
        if ($res->consultant_id == null || $res->consultant_id == '') {
            $email = [
                'Client' => $res->email,
            ];
        } else {
            $email = [
                'Client' => $res->email,
                'Consultant' => $res->cemail
            ];
        }
        return View('admin.appointment.edit_appointment', compact('query', 'laws', 'res', 'consultant', 'rid', 'email'));
    }

    public function allote_consultant(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
        $datas = [
            'consultant_id' => $request->consultant_id,
            'status' => 2,
        ];
        $data = Appointment::where(['id' => $request->id]);
        $res = $data->update($datas);
        $user = User::where(['id' => $request->consultant_id])->first();
        if ($res) {
            $this->message('success', 'Consultant Alloted Successfully', $user);
        } else {
            $this->message('error', 'Some Problem!', '');
        }
    }

    public function view_appointment_email(Request $request) {
        $res = DB::table('emailchats')
                ->leftJoin('users', 'emailchats.sender_id', '=', 'users.id')
                ->select('emailchats.*', 'users.name as sender')
                ->where('emailchats.extraid', $request->id)
                ->first();
        $res->file = Emailchatfile::where(['extraid' => $request->id])->get();
        $this->message('success', '', $res);
    }

    public function chatemail_table(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
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
            $value->view = "<a tag_id='" . $value->extraid . "' data-bs-toggle='modal' data-bs-target='#view-chmessage' class='btn btn-sm btn-default view_appointment_email'><i class='fa fa-eye text-danger'></i></button>";
            $i++;
        }
        $this->message('success', '', $res);
    }

    public function email_chat(Request $request) {
        if (Auth::user() == null || Auth::user()->userType != 1) {
            return redirect()->route('login');
        }
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

}

?>
