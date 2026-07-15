 <x-admin-layout 
   title="Categorias"
   :breadcrumbs="[
   [
      'name' => 'Dashboard',
      'href' => route('admin.dashboard')
   ],
   [
      'name' => 'Categorias',
      'href' => route('admin.categories.index'),
   ],
   [
        'name' => 'Editar'
   ]
 ]">

  <x-wire-card>

      <form action="{{ route('admin.categories.update', $category) }}"
            method="POST"
            class="space-y-4"
      >

         @csrf
         @method('PUT')

         <x-wire-input label="Nombre" name="name" placeholder="Nombre de la Categoria" 
                       value="{{ old('name', $category->name) }}"/>

         <x-wire-textarea label="Descripcion" name="description"
                           placeholder="Escriba una descripcion"
                         
                          
         >{{ old('description', $category->description )}}
         </x-wire-textarea>
         
         
         <div class="flex justify-end ">
            <x-button >
               Actualizar
            </x-button>

         </div>

        
      </form>

   </x-wire-card>
    
  
 </x-admin-layout>
