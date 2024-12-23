<form method="POST" action="{{ route('payment_details.store') }}">
    @csrf
    <input type="text" name="bank_name" placeholder="Bank Name" required>
    <input type="text" name="account_number" placeholder="Account Number" required>
    <input type="text" name="account_title" placeholder="Account Title" required>
    <input type="text" name="iban" placeholder="IBAN">
    <input type="text" name="swift_code" placeholder="SWIFT Code">
    <input type="text" name="branch_address" placeholder="Branch Address">
    <button type="submit">Save</button>
</form>