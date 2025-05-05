@extends('admin.layout')

@section('title', 'Newsletter Subscriptions')

@section('content')
<div class="card">
    <div class="card-body p-0">
        @if($subscriptions->count() > 0)
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Subscribed</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->email }}</td>
                            <td>
                                @if($subscription->is_active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $subscription->created_at->format('M j, Y') }}</td>
                            <td class="text-end">
                                <form action="{{ route('admin.newsletter.destroy', $subscription) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 border-top">
                {{ $subscriptions->links() }}
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-envelope fa-4x text-muted mb-3"></i>
                <h5>No newsletter subscribers yet</h5>
            </div>
        @endif
    </div>
</div>
@endsection