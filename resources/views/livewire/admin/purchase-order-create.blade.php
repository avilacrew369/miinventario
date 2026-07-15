<div>
    <x-wire-card title="Crear Orden de Compra" class="mb-4 black:bg-gray-800 black:text-white">

        <form wire:submit="save" >

            <div class="grid grid-cols-4 gap-4">
                <x-wire-native-select 
                    label="Tipo de Comprobante"
                    id="voucher_type"
                    name="voucher_type"
                    wire:model="voucher_type" >
                    <option value="1">
                        Factura
                    </option>
                     <option value="2">
                        Nota
                    </option>
                </x-wire-native-select >

                <x-wire-input 
                    label="Número de serie"
                    id="serie"
                    name="serie"
                    wire:model="serie" 
                    disabled/>
                 <x-wire-input 
                    label="Correlativo"
                    id="correlative"
                    name="correlative"
                    wire:model="correlative" 
                    disabled/>
                <x-wire-input 
                    label="Fecha de emisión"
                    id="date"
                    name="date"
                    wire:model="date" 
                    type="date"/>
            </div>
            <div class="flex space-x-4">
                <x-wire-select 
                label="Provedor"
                id="supplier_id"
                name="supplier_id"
                wire:model="supplier_id" 
                placeholder="Seleccione un proveedor"
                :async-data="[
                    'api' => route('api.suppliers.index'),
                    'method' => 'POST',
                    ]"
                option-label="name"
                option-value="suplier_id"
                class="flex-1"
                />

            </div>
                <div class="flex space-x-4">
                <x-wire-select 
                label="Producto"
                id="product_id"
                wire:model="product_id"
                placeholder="Seleccione un producto" 
                :async-data="[
                    'api' => route('api.products.index'),
                    'method' => 'POST',
                    ]"
                option-label="name"
                option-value="id"
                class="flex-1"
                />
                <div class="shrink-0">

                    <x-wire-button 
                        wire:click="addProduct"
                        class="mt-6">
                        Agregar Producto
                    </x-wire-button>
                </div>
            </div>
            <table class="w-full text-sm text-left mt-4">
                <thead>
                    <tr class="border-y bg-blue-50 black:bg-gray-600 black:text-white">
                        <th class="py-2"
                        >Producto</th>
                        <th class="py-2"
                        >Cantidad</th>
                        <th class="py-2"
                        >Precio</th>
                        <th class="py-2"
                        >Subtotal</th>
                        <th class="py-2"
                        >Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $product['name'] }}</td>
                            <td class="py-2 px-4">{{ $product['quantity'] }}</td>
                            <td class="py-2 px-4">{{ $product['price'] }}</td>
                            <td class="py-2 px-4">{{ $product['subtotal'] }}</td>
                            <td class="py-2 px-4">
                                <x-wire-mini-button 
                                    wire:click="removeProduct({{ $loop->index }})"
                                    color="red"
                                    size="rounded"
                                    icon="trash"
                                    >
                                    Eliminar
                                </x-wire-mini-button>
                            </td>
                        </tr>
                        
                    @empty
                        
                    @endforelse


                </tbody>

            </table>
        </form>
    </x-wire-card>
