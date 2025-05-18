<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class EmailSettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.email-config');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'mail_mailer' => 'required|string',
            'mail_host' => 'required|string',
            'mail_port' => 'required|numeric',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'required|email',
            'mail_from_name' => 'required|string',
        ]);

        // Update .env file or database settings
        $this->setEnvironmentValue('MAIL_MAILER', $validated['mail_mailer']);
        $this->setEnvironmentValue('MAIL_HOST', $validated['mail_host']);
        $this->setEnvironmentValue('MAIL_PORT', $validated['mail_port']);
        $this->setEnvironmentValue('MAIL_USERNAME', $validated['mail_username']);
        
        // Only update password if provided
        if (!empty($validated['mail_password'])) {
            $this->setEnvironmentValue('MAIL_PASSWORD', $validated['mail_password']);
        }
        
        $this->setEnvironmentValue('MAIL_ENCRYPTION', $validated['mail_encryption']);
        $this->setEnvironmentValue('MAIL_FROM_ADDRESS', $validated['mail_from_address']);
        $this->setEnvironmentValue('MAIL_FROM_NAME', $validated['mail_from_name']);

        // Clear config cache
        Artisan::call('config:clear');

        return back()->with('success', 'Email settings updated successfully!');
    }

    public function sendTestEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        try {
            Mail::to($request->email)->send(new TestEmail());
            return response()->json(['message' => 'Test email sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    protected function setEnvironmentValue($key, $value)
    {
        $path = app()->environmentFilePath();
        $env = file_get_contents($path);

        // For new values or existing values
        if (strpos($env, "{$key}=") !== false) {
            $env = preg_replace("/^{$key}=.*/m", "{$key}=\"{$value}\"", $env);
        } else {
            $env .= "\n{$key}=\"{$value}\"";
        }

        file_put_contents($path, $env);
    }
}