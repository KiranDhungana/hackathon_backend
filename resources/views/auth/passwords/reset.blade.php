
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
    
    <div>
        <label for="password">New Password</label>
        <input id="password" type="password" name="password" required>
    </div>
    
    <div>
        <label for="password-confirm">Confirm New Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Reset Password</button>
</form>
