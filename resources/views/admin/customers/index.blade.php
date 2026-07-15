<x-admin-layout title="Clientes" :breadcrumbs="[
      [
         'name' => 'Dashboard',
         'href' => route('admin.dashboard')
      ],
      [
         'name' => 'Clientes'
      ]
   ]">

   <x-slot name="action">
      <x-wire-button href="{{ route('admin.customers.create') }}" blue>
         Nuevo
      </x-wire-button>

   </x-slot>

   @livewire('admin.datatables.customer-table')

   @push('js')
      <script>
         forms = document.querySelectorAll('.delete-form');

         forms.forEach(form => {
            form.addEventListener('submit', function (e) {
               e.preventDefault();

               Swal.fire({
                  title: "Are you sure?",
                  text: "You won't be able to revert this!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "CancelaR"
               }).then((result) => {
                  if (result.isConfirmed) {
                     form.submit();
                  };
               });
            });
         });
      </script>

   @endpush


</x-admin-layout>