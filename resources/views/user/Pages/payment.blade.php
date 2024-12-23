<form method="POST" action="{{ route('savePaymentDetails') }}">
    @csrf
    <label>Bank Name:</label>
    <input type="text" name="bank_name" required value="{{ old('bank_name', $user->paymentDetails->bank_name ?? '') }}">
    
    <label>Account Number:</label>
    <input type="text" name="account_number" required value="{{ old('account_number', $user->paymentDetails->account_number ?? '') }}">
    
    <label>Account Title:</label>
    <input type="text" name="account_title" required value="{{ old('account_title', $user->paymentDetails->account_title ?? '') }}">
    
    <label>IBAN:</label>
    <input type="text" name="iban" value="{{ old('iban', $user->paymentDetails->iban ?? '') }}">

    <button type="submit">Save Payment Details</button>
</form>
