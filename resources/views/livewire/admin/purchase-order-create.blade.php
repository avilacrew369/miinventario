
<div x-data="{
    products: @entangle('products'),

    total: @entangle('total'),

    removeProduct(index) {
        this.products.splice(index, 1);
    },

    init() {
        this.$watch('products', (newProducts) => {
           let total = 0;
           newProducts.forEach(product => {
               total += product.quantity * product.price;
           });
           this.total = total;
        });
    },


}">
    <x-wire-card title="Crear Orden de Compra" class="mb-4 black:bg-gray-800 black:text-white">

        <form wire:submit="save" class="space-y-4" >

            <div class="grid lg:grid-cols-4 gap-4">
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
                    name="correlative"
                    wire:model="correlative" 
                    disabled/>
                <x-wire-input 
                    label="Fecha de emisión"
                    name="date"
                    wire:model="date" 
                    type="date"/>
            </div>
            <div class="flex space-x-4">
                <x-wire-select 
                label="Provedor"
                wire:model="supplier_id" 
                placeholder="Seleccione un proveedor"
                :async-data="[
                    'api' => route('api.suppliers.index'),
                    'method' => 'POST',
                    ]"
                option-label="name"
                option-value="id"
                class="flex-1"
                />

            </div>
                <div class="lg:flex lg:space-x-4">
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
                        spinner="addproduct"
                        class="mt-4 w-full lg:mt-6">
                        Agregar Producto
                    </x-wire-button>
                </div>
            </div>
            <div class="overflow-x-auto w-full">

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
                    <template x-for="(product, index) in products" :key="index">
                        <tr class="border-b">
                            <td class="py-2 px-4" x-text="product.name"></td>
                            <td class="py-2 px-4">
                               <x-wire-input 
                                    x-model="product.quantity"
                                    type="number"
                                    class="w-20"
                               />
                            </td>
                            <td class="py-2 px-4">
                                 <x-wire-input 
                                    x-model="product.price"
                                    type="number"
                                    class="w-20"
                               />
                            </td>
                            <td class="py-2 px-4" x-text="(product.quantity * product.price).toFixed(2)"></td>
                            <td class="py-2 px-4">
                                <x-wire-mini-button 
                                    x-on:click="removeProduct(index)"
                                    color="red"
                                    size="rounded"
                                    icon="trash"
                                    >
                                    Eliminar
                                </x-wire-mini-button>
                            </td>
                        </tr>
                    </template>
                    <template x-if="products.length === 0">
                        <tr>
                            <td colspan="5" class="text-red-500 text-lg py-5 bg-red-50  px-4 text-center">
                                No hay productos agregados
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
            </div>
            <div class="flex items-center space-x-4">
                <x-label>
                    Observaciones
                </x-label>
                <x-wire-input
                    wire:model="observation"
                    label="Observaciones"
                    placeholder="Observaciones"
                    class="flex-1"
                />
                <div class="items-center mt-6">
                    Total: $
                    <span x-text="total.toFixed(2)"></span>
                </div>
            </div>
            <div class="flex justify-center">
                <x-wire-button
                    class="mt-4"
                    wire:click="save"
                    spinner="save"
                    color="green">
                    Guardar Orden de Compra
                </x-wire-button>
            </div>

        </form>
    </x-wire-card>
