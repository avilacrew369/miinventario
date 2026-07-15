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
        'name' => 'Nuevo'
   ]
 ]">

   <x-wire-card>

      <form action="{{ route('admin.warehouses.store') }}"
            method="POST"
            class="space-y-4"
      >

         @csrf

         <x-wire-input label="Nombre" name="name" placeholder="Nombre del Almacen" 
                       value="{{ old('name') }}"/>

         <x-wire-input label="Ubicacion" name="location" 
                          placeholder="Escriba la ubicacion del Almacen"
                          value="{{ old('location') }}"/>
         
         <div class="flex justify-end ">
            <x-button >
               Guardar
            </x-button>

         </div>

        
      </form>

   </x-wire-card>
    
  
 </x-admin-layout>
