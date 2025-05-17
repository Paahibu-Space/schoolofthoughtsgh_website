@extends('admin.layout')

@section('title', 'Website Settings')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">Website & Business Settings</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.settings.website-settings.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3">Business Information</h5>
                    
                    <div class="mb-3">
                        <label for="business_name" class="form-label">Business Name</label>
                        <input type="text" class="form-control" id="business_name" name="business_name" 
                               value="{{ old('business_name', $settings['business_name']) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="business_email" class="form-label">Business Email</label>
                        <input type="email" class="form-control" id="business_email" name="business_email" 
                               value="{{ old('business_email', $settings['business_email']) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="business_phone" class="form-label">Business Phone</label>
                        <input type="text" class="form-control" id="business_phone" name="business_phone" 
                               value="{{ old('business_phone', $settings['business_phone']) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                        <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" 
                               value="{{ old('whatsapp_number', $settings['whatsapp_number']) }}">
                        <small class="text-muted">Include country code (e.g., +2334567890)</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="business_address" class="form-label">Business Address</label>
                        <textarea class="form-control" id="business_address" name="business_address" 
                                  rows="3" required>{{ old('business_address', $settings['business_address']) }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="about_us" class="form-label">About Us</label>
                        <textarea class="form-control" id="about_us" name="about_us" 
                                  rows="5">{{ old('about_us', $settings['about_us']) }}</textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <h5 class="mb-3">Media & Social Links</h5>
                    
                    <div class="mb-3">
                        <label class="form-label">Logo</label>
                        <div class="image-upload-container mb-2">
                            @if($settings['logo'])
                                <img src="{{ asset('storage/'.$settings['logo']) }}" class="img-fluid mb-2" style="max-height: 100px;">
                            @endif
                            <input type="file" class="form-control" id="logo" name="logo">
                            <small class="text-muted">Recommended size: 300x100px (transparent PNG)</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Favicon</label>
                        <div class="image-upload-container mb-2">
                            @if($settings['favicon'])
                                <img src="{{ asset('storage/'.$settings['favicon']) }}" class="img-fluid mb-2" style="max-height: 50px;">
                            @endif
                            <input type="file" class="form-control" id="favicon" name="favicon">
                            <small class="text-muted">Must be .ico or .png (32x32px or 64x64px)</small>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="facebook_url" class="form-label">Facebook URL</label>
                        <input type="url" class="form-control" id="facebook_url" name="facebook_url" 
                               value="{{ old('facebook_url', $settings['facebook_url']) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="twitter_url" class="form-label">Twitter URL</label>
                        <input type="url" class="form-control" id="twitter_url" name="twitter_url" 
                               value="{{ old('twitter_url', $settings['twitter_url']) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="instagram_url" class="form-label">Instagram URL</label>
                        <input type="url" class="form-control" id="instagram_url" name="instagram_url" 
                               value="{{ old('instagram_url', $settings['instagram_url']) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="linkedin_url" class="form-label">LinkedIn URL</label>
                        <input type="url" class="form-control" id="linkedin_url" name="linkedin_url" 
                               value="{{ old('linkedin_url', $settings['linkedin_url']) }}">
                    </div>
                    
                    <div class="mb-3">
                        <label for="youtube_url" class="form-label">YouTube URL</label>
                        <input type="url" class="form-control" id="youtube_url" name="youtube_url" 
                               value="{{ old('youtube_url', $settings['youtube_url']) }}">
                    </div>
                    
                    <h5 class="mb-3 mt-4">Legal Pages</h5>
                    
                    <div class="mb-3">
                        <label for="privacy_policy" class="form-label">Privacy Policy</label>
                        <textarea class="form-control" id="privacy_policy" name="privacy_policy" 
                                  rows="5">{{ old('privacy_policy', $settings['privacy_policy']) }}</textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="terms_conditions" class="form-label">Terms & Conditions</label>
                        <textarea class="form-control" id="terms_conditions" name="terms_conditions" 
                                  rows="5">{{ old('terms_conditions', $settings['terms_conditions']) }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Save Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Initialize text editors if you're using them
    @if(config('app.text_editor')
        ClassicEditor
            .create(document.querySelector('#about_us'))
            .catch(error => {
                console.error(error);
            });
            
        ClassicEditor
            .create(document.querySelector('#privacy_policy'))
            .catch(error => {
                console.error(error);
            });
            
        ClassicEditor
            .create(document.querySelector('#terms_conditions'))
            .catch(error => {
                console.error(error);
            });
    @endif
</script>
@endsection