<div class="row">
    <div class="col-5">
        <form action="{{ url('cart/add') }}" method="post" class="formEliminar">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                style="margin: auto">
                <i class="fa fa-lg fa-fw fa-trash"></i> CARRITO
            </button>
        </form>
    </div>
</div>
