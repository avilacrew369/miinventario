<div class="flex item-center space-x-2">
    <x-wire-button href="{{ route('admin.categories.edit', $category) }}" blue  >
        Editar
    </x-wire-button>

    <form action="{{ route('admin.categories.destroy', $category) }}"
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