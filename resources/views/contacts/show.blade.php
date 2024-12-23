<div class="container">
    <h1>Contact Details</h1>
    <p><strong>Heading:</strong> {{ $contact->contact_heading }}</p>
    <p><strong>Number:</strong> {{ $contact->contact_number }}</p>
    <p><strong>Email:</strong> {{ $contact->contact_email }}</p>
    <p><strong>Paragraph:</strong> {{ $contact->contact_paragraph }}</p>
    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Back</a>
</div>
@endsection
