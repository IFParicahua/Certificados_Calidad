<div>
    <div class="grid grid-cols-12 gap-4 text-sm sm:text-base">
        <div class="col-span-3">
            <label>Fecha: </label>
            <label class="font-semibold">{{ $date_new }}</label>
        </div>
        <div class="col-span-3">
            <label>Turno: </label>
            <label class="font-semibold">{{ $turno }}</label>
        </div>
        <div class="col-span-6">
            <label>Responsable: </label>
            <label class="font-semibold uppercase">{{ Auth::user()->name }}</label>
        </div>
    </div>
    <form wire:submit.prevent="savelote">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-5">
                <label for="code" class="block font-medium text-gray-700">Lote</label>
                <input type="text" name="code" id="code"  wire:model="code" autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                @if($errors->has('code'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('code') }}</p>
                @endif
            </div>
            <div class="col-span-5">
                <label for="producto" class="block font-medium text-gray-700">Producto</label>
                <select wire:model="producto" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    <option value="">Seleccione una opción</option>
                    @forelse ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->description }}</option>
                    @empty
                        <option value="">---</option>
                    @endforelse
                </select>
                @if($errors->has('producto'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('producto') }}</p>
                @endif
            </div>
            <div  class="col-span-1 mt-7">
                <button type="submit" class="border border-green-500 w-18 bg-green-500 text-sm  text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline disabled:opacity-50" {{ $status }}>
                    Crear
                </button>
            </div>
        </div>
    </form>
</div>
