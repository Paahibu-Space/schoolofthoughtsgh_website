<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Illuminate\Support\Collection;

class NewsletterSubscriptionsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $subscriptions;

    public function __construct($subscriptions)
    {
        $this->subscriptions = $subscriptions;
    }

    public function collection()
    {
        return $this->subscriptions;
    }

    public function headings(): array
    {
        return [
            'Email',
            'Status',
            'Subscribed Date',
        ];
    }

    public function map($subscription): array
    {
        return [
            $subscription->email,
            $subscription->is_active ? 'Active' : 'Inactive',
            $subscription->created_at->format('Y-m-d H:i:s'),
        ];
    }
}