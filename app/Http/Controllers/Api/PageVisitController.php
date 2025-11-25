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
            'page'        => $request->path(),
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

    /**
     * General list with optional filters
     */
    public function index(Request $request)
    {
        $visits = PageVisit::query()
            ->when($request->page, fn($q) => $q->where('page', $request->page))
            ->when($request->event_type, fn($q) => $q->where('event_type', $request->event_type))
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($visits);
    }

    /**
     * GROUP visits by IP address with counts and last visit timestamp
     */
    public function visitsByIp()
    {
        $data = PageVisit::selectRaw('ip, COUNT(*) as total, MAX(created_at) as last_seen')
            ->groupBy('ip')
            ->orderByDesc('last_seen')
            ->get();

        return response()->json($data);
    }

    /**
     * GROUP visits by page
     */
    public function visitsByPage()
    {
        $data = PageVisit::selectRaw('page, COUNT(*) as total')
            ->groupBy('page')
            ->orderByDesc('total')
            ->get();

        return response()->json($data);
    }

    /**
     * Activity feed for a single IP
     */
    public function activityForIp($ip)
    {
        $visits = PageVisit::where('ip', $ip)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($visits);
    }

    /**
     * Summary dashboard
     */
    public function stats()
    {
        return response()->json([
            'total_visits'   => PageVisit::count(),
            'unique_ips'     => PageVisit::distinct('ip')->count('ip'),
            'unique_pages'   => PageVisit::distinct('page')->count('page'),
            'events_today'   => PageVisit::whereDate('created_at', now()->toDateString())->count(),
        ]);
    }
}


