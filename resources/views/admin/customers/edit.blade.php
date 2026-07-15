<x-admin-layout title="Clientes" :breadcrumbs="[
      [
         'name' => 'Dashboard',
         'href' => route('admin.dashboard')
      ],
      [
         'name' => 'Clientes',
         'href' => route('admin.customers.index'),
      ],
      [
         'name' => 'Editar Cliente',
      ]
   ]">

   <x-wire-card>

      <form action="{{ route('admin.customers.update', $customer) }}" method="POST" class="space-y-4">

         @csrf
         @method('PUT')
         <div class="grid grid-cols-2 gap-4">
            <x-wire-native-select label="Tipo de documento" name="identity_id">
               @foreach ($identities as $identity)
                  <option value="{{ $identity->id }}" @selected(old('identity_id', $customer->identity_id) == $identity->id)>
                     {{ $identity->name }}
                  </option>
               @endforeach
            </x-wire-native-select>
            <x-wire-input label="Numero de documento" name="document_number" placeholder="Numero de Documento"
               value="{{ old('document_number', $customer->document_number) }}" required />

         </div>

         <x-wire-input label="Nombre" name="name" placeholder="Nombre del Cliente" 
                        value="{{ old('name', $customer->name) }}" />
         <x-wire-input label="Direccion" name="address" placeholder="Direccion del Cliente"
                        value="{{ old('address', $customer->address) }}" />
         <x-wire-input label="Email" name="email" placeholder="Email del Cliente" type="email"
                        value="{{ old('email', $customer->email) }}" />
         <x-wire-input label="Telefono" name="phone" placeholder="Telefono del Cliente" value="{{ old('phone', $customer->phone  ) }}" />



         <div class="flex justify-end ">
            <x-button>
               Actualizar Cliente
            </x-button>

         </div>


      </form>

   </x-wire-card>


</x-admin-layout>