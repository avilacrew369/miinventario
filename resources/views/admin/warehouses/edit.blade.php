 <x-admin-layout 
   title="Almacenes"
   :breadcrumbs="[
   [
      'name' => 'Dashboard',
      'href' => route('admin.dashboard')
   ],
   [
      'name' => 'Almacenes',
      'href' => route('admin.warehouses.index'),
   ],
   [
        'name' => 'Editar'
   ]
 ]">

   <x-wire-card>

      <form action="{{ route('admin.warehouses.update', $warehouse) }}"
            method="POST"
            class="space-y-4"
      >

         @csrf
         @method('PUT')

         <x-wire-input label="Nombre" name="name" placeholder="Nombre del Almacen" 
                       value="{{ old('name', $warehouse->name) }}"/>

         <x-wire-input label="Ubicacion" name="location" 
                          placeholder="Escriba la ubicacion del Almacen"
                          value="{{ old('location', $warehouse->location) }}"/>
         
         <div class="flex justify-end ">
            <x-button >
               Actualizar
            </x-button>

         </div>

        
      </form>

   </x-wire-card>
    
  
 </x-admin-layout>
