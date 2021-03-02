<div class="mx-auto mb-4 mt-2 pt-1">
    <div class="divide-y divide-gray-200">
        <div class="grid grid-cols-6 gap-3 text-base">
            <form wire:submit.prevent="saveLot" class="col-span-5 grid grid-cols-12 gap-3">
                <div class="col-span-6">
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
                    @if($errors->has('certificado'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('certificado') }}</p>
                    @endif
                </div>
                <div class="col-span-4">
                    <label for="lote" class="block font-medium text-gray-700">Lote</label>
                    <select wire:model="lote" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="">Seleccione una opción</option>
                        @forelse ($lotes as $lot)
                            <option value="{{ $lot->id }}">{{ $lot->code }}</option>
                        @empty
                            <option value="">---</option>
                        @endforelse
                    </select>
                    @if($errors->has('lote'))
                            <p class="m-0 text-red-400 font-normal">{{ $errors->first('lote') }}</p>
                    @endif
                </div>
                <div  class="col-span-1 mt-8">
                    <button type="submit" class="border border-green-500 w-18 bg-green-500 text-sm  text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline disabled:opacity-50">
                        Agregar
                    </button>
                </div>
            </form>
            <div class="col-span-1 mt-9">
                <a href="certificado_pdf/{{ $certificado }}" target="_blank" class="border border-red-500 bg-red-500 text-xl w-12 text-white rounded-md px-4 py-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline ">
                    <i class="fas fa-file-pdf"></i>
                </a>
            </div>
        </div>
    </div>
</div>
