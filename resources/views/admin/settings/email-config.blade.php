@extends('admin.layout')

@section('title', 'Email Configuration')

@section('content')
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h5 class="mb-0">Email Configuration</h5>
                    <p class="text-muted mb-0">Manage your email server settings</p>
                </div>
            </div>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.settings.email.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="mb-3">SMTP Settings</h6>
                        
                        <div class="mb-3">
                            <label for="mail_mailer" class="form-label">Mail Driver</label>
                            <select class="form-select" id="mail_mailer" name="mail_mailer">
                                <option value="smtp" {{ config('mail.mailer') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                <option value="sendmail" {{ config('mail.mailer') == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                <option value="mailgun" {{ config('mail.mailer') == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                <option value="ses" {{ config('mail.mailer') == 'ses' ? 'selected' : '' }}>Amazon SES</option>
                                <option value="postmark" {{ config('mail.mailer') == 'postmark' ? 'selected' : '' }}>Postmark</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="mail_host" class="form-label">SMTP Host</label>
                            <input type="text" class="form-control" id="mail_host" name="mail_host" value="{{ config('mail.mailers.smtp.host') }}">
                        </div>

                        <div class="mb-3">
                            <label for="mail_port" class="form-label">SMTP Port</label>
                            <input type="number" class="form-control" id="mail_port" name="mail_port" value="{{ config('mail.mailers.smtp.port') }}">
                        </div>

                        <div class="mb-3">
                            <label for="mail_username" class="form-label">SMTP Username</label>
                            <input type="text" class="form-control" id="mail_username" name="mail_username" value="{{ config('mail.mailers.smtp.username') }}">
                        </div>

                        <div class="mb-3">
                            <label for="mail_password" class="form-label">SMTP Password</label>
                            <input type="password" class="form-control" id="mail_password" name="mail_password" placeholder="Leave blank to keep current password">
                        </div>

                        <div class="mb-3">
                            <label for="mail_encryption" class="form-label">Encryption</label>
                            <select class="form-select" id="mail_encryption" name="mail_encryption">
                                <option value="tls" {{ config('mail.mailers.smtp.encryption') == 'tls' ? 'selected' : '' }}>TLS</option>
                                <option value="ssl" {{ config('mail.mailers.smtp.encryption') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                <option value="" {{ config('mail.mailers.smtp.encryption') == null ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h6 class="mb-3">Email Settings</h6>
                        
                        <div class="mb-3">
                            <label for="mail_from_address" class="form-label">From Address</label>
                            <input type="email" class="form-control" id="mail_from_address" name="mail_from_address" value="{{ config('mail.from.address') }}">
                        </div>

                        <div class="mb-3">
                            <label for="mail_from_name" class="form-label">From Name</label>
                            <input type="text" class="form-control" id="mail_from_name" name="mail_from_name" value="{{ config('mail.from.name') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Test Email</label>
                            <div class="input-group">
                                <input type="email" class="form-control" id="test_email" placeholder="Enter email to test">
                                <button type="button" class="btn btn-outline-secondary" id="send_test_email">Send Test</button>
                            </div>
                        </div>

                        <div class="alert alert-info mt-4">
                            <i class="fas fa-info-circle me-2"></i>
                            <strong>Note:</strong> After saving changes, you may need to restart your queue workers if you're using them for email delivery.
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Save Email Settings</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            // Send test email
            $('#send_test_email').click(function() {
                const email = $('#test_email').val();
                
                if (!email) {
                    alert('Please enter an email address to test');
                    return;
                }

                if (!validateEmail(email)) {
                    alert('Please enter a valid email address');
                    return;
                }

                $(this).html('<i class="fas fa-spinner fa-spin me-1"></i> Sending...');
                $(this).prop('disabled', true);

                $.ajax({
                    url: '{{ route("admin.settings.email.test") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email
                    },
                    success: function(response) {
                        alert('Test email sent successfully!');
                    },
                    error: function(xhr) {
                        alert('Error: ' + xhr.responseJSON.message);
                    },
                    complete: function() {
                        $('#send_test_email').html('Send Test');
                        $('#send_test_email').prop('disabled', false);
                    }
                });
            });

            function validateEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });
    </script>
@endsection