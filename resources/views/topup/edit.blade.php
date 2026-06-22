<form action="{{ route('topup.update', $user) }}" method="POST">
    @csrf
    @method('PUT')

    <input
        type="number"
        name="amount"
        min="1"
        step="0.01"
        required>

    <button type="submit">
        Add Credits
    </button>
</form>