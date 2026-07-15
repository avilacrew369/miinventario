<div class="flex item-center space-x-2">
    <x-wire-button href="{{ route('admin.suppliers.edit', $supplier) }}" blue xs >
        Editar
    </x-wire-button>

    <form action="{{ route('admin.suppliers.destroy', $supplier) }}"
           method="POST" 
           class="delete-form"
           id="delete-form"
           >
            
            @csrf
            @method('DELETE')

            <x-wire-button type="submit" red xs>
                Eliminar
            </x-wire-button>

    </form>
</div>