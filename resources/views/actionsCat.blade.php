<div class="row">
    <div class="col-5">
        <form action="{{ url('categorias/eliminar', $categoria_id) }}" method="get" class="formEliminar">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"
                style="margin: auto">
                <i class="fa fa-lg fa-fw fa-trash"></i> Eliminar
            </button>
        </form>
    </div>
</div>

<script>
    $('.formEliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Esta seguro?",
            text: "Vas a eliminar un registro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, Eliminalo!"
        }).then((result) => {
            if (result.value) {
                this.submit();
            }
        });
    })
</script>
