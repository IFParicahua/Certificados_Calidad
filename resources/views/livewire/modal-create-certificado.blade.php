<div class="mx-auto mb-4 mt-2 pt-1">
    <div class="divide-y divide-gray-200">
            <form wire:submit.prevent="save" class="grid grid-cols-12 gap-3">
                <div class="col-span-3">
                    <label for="cliente" class="block font-medium text-gray-700">Cliente</label>
                    <input type="text" name="cliente" id="cliente"  wire:model="cliente" autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                    @if($errors->has('cliente'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('cliente') }}</p>
                    @endif
                </div>
                <div class="col-span-2">
                    <label for="pedido_de_venta" class="block font-medium text-gray-700">Nº Pedido de venta</label>
                    <input type="text" name="pedido_de_venta" id="pedido_de_venta"  wire:model="pedido_de_venta" autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                    @if($errors->has('pedido_de_venta'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('pedido_de_venta') }}</p>
                    @endif
                </div>
                <div class="col-span-2">
                    <label for="orden_de_salida" class="block font-medium text-gray-700">Nº Orden de salida</label>
                    <input type="text" name="orden_de_salida" id="orden_de_salida"  wire:model="orden_de_salida" autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                    @if($errors->has('orden_de_salida'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('orden_de_salida') }}</p>
                    @endif
                </div>
                <div class="col-span-3">
                    <label for="aprobado" class="block font-medium text-gray-700">Aprobado por:</label>
                    <select wire:model="aprobado" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="">Seleccione una opción</option>
                        @forelse ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @empty
                            <option value="">---</option>
                        @endforelse
                    </select>
                    @if($errors->has('aprobado'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('aprobado') }}</p>
                    @endif
                </div>

                <div  class="col-span-1 mt-8">
                    <button type="submit" class="border border-green-500 w-18 bg-green-500 text-sm  text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline disabled:opacity-50" {{ $status }}>
                        Crear
                    </button>
                </div>
            </form>
    </div>
</div>
