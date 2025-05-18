<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class NewsletterController extends Controller
{
    public function index(Request $request)
    {
        $query = NewsletterSubscription::query();
        
        // Search functionality
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where('email', 'LIKE', "%{$searchTerm}%");
        }
        
        // Filter by status
        if ($request->has('status') && $request->status != 'all') {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('is_active', $status);
        }
        
        // Filter by date range
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Sort functionality
        $sortField = $request->sort ?? 'created_at';
        $sortDirection = $request->direction ?? 'desc';
        $query->orderBy($sortField, $sortDirection);
        
        $subscriptions = $query->paginate(20)->withQueryString();
        
        return view('admin.newsletter.index', compact('subscriptions'));
    }

    public function destroy(NewsletterSubscription $subscription)
    {
        $subscription->delete();
        return back()->with('success', 'Subscription removed successfully.');
    }
    
    public function export(Request $request)
    {
        $query = NewsletterSubscription::query();
        
        // Apply the same filters as in index
        if ($request->has('search')) {
            $query->where('email', 'LIKE', "%{$request->search}%");
        }
        
        if ($request->has('status') && $request->status != 'all') {
            $status = $request->status === 'active' ? 1 : 0;
            $query->where('is_active', $status);
        }
        
        if ($request->has('date_from') && $request->date_from) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->has('date_to') && $request->date_to) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        $subscriptions = $query->get();
        
        // Determine the export format
        $format = $request->format ?? 'csv';
        
        switch ($format) {
            case 'csv':
                return $this->exportCsv($subscriptions);
            case 'excel':
                return $this->exportExcel($subscriptions);
            default:
                return $this->exportCsv($subscriptions);
        }
    }
    
    private function exportCsv($subscriptions)
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="newsletter_subscriptions.csv"',
        ];
        
        $callback = function() use ($subscriptions) {
            $file = fopen('php://output', 'w');
            
            // Add headers
            fputcsv($file, ['Email', 'Status', 'Subscribed Date']);
            
            // Add data
            foreach ($subscriptions as $subscription) {
                fputcsv($file, [
                    $subscription->email,
                    $subscription->is_active ? 'Active' : 'Inactive',
                    $subscription->created_at->format('Y-m-d H:i:s'),
                ]);
            }
            
            fclose($file);
        };
        
        return Response::stream($callback, 200, $headers);
    }
    
    private function exportExcel($subscriptions)
    {
        // For Excel export, you'll need a package like maatwebsite/excel
        // This is a simple example assuming you have that package installed
        
        $export = new \App\Exports\NewsletterSubscriptionsExport($subscriptions);
        return \Maatwebsite\Excel\Facades\Excel::download($export, 'newsletter_subscriptions.xlsx');
        
        // Note: You'll need to create the export class and install the package
        // composer require maatwebsite/excel
    }
}