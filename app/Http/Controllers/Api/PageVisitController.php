<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PageVisit;
use Illuminate\Http\Request;

class PageVisitController extends Controller
{
    public function trackEvent(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'label' => 'nullable|string',
        ]);

        $visit = PageVisit::create([
    'page'        => $request->path(),   // matches migration
    'ip'          => $request->ip(),
    'user_agent'  => $request->userAgent(),
    'referrer'    => $request->headers->get('referer'),
    'session_id'  => session()->getId(),
    'event_type'  => $request->type,
    'event_label' => $request->label,
]);

        return response()->json([
            'success' => true,
            'visit_id' => $visit->id,
        ]);
    }
}
