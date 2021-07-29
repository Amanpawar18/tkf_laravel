<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ClientExperience;
use Illuminate\Http\Request;

class ClientExperienceController extends Controller
{
    public function index()
    {
        $experiences = ClientExperience::orderBy('id', 'DESC')->paginate(15);
        return view('backend.client-experience.index', compact('experiences'));
    }

    public function show(ClientExperience $clientExperience)
    {
        return view('backend.client-experience.show', compact('clientExperience'));
    }

    public function destroy(ClientExperience $clientExperience)
    {
        $clientExperience->delete();
        return redirect()->route('admin.client-experience.index')->with('status', 'Client Experience deleted successfully !!');
    }

    public function status(ClientExperience $clientExperience)
    {
        if ($clientExperience->status == 0) {
            $clientExperience->status = ClientExperience::ACTIVE;
            $message = 'Status changed to active';
        } else {
            $clientExperience->status = ClientExperience::INACTIVE;
            $message = 'Status changed to inactive';
        }
        $clientExperience->save();
        return [
            'message' => $message,
            'status' => $clientExperience->status,
            'type' => 'success'
        ];
    }
}
