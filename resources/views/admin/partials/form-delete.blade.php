<form action="{{ $route }}" method="POST"
    onsubmit="return confirm('Are you sure you want to delete {{ $name }}?')">
    @csrf
    @method('DELETE')
    <button type="sumbit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
</form>
