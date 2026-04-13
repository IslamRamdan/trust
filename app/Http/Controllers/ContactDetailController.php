<?php

namespace App\Http\Controllers;

use App\Models\ContactDetail;
use Illuminate\Http\Request;

class ContactDetailController extends Controller
{
    //
    public function index()
    {
        // جلب السجل الأول أو إنشاء سجل فارغ
        $contact = ContactDetail::firstOrCreate(['id' => 1]);
        return view('contacts.index', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = ContactDetail::findOrFail(1);
        $contact->update($request->all());

        return redirect()->back()->with('success', 'تم تحديث البيانات بنجاح');
    }
}
