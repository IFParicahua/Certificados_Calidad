<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <div class="bg-gray-50">
    <form wire:submit.prevent="save">
        <div class="md:flex">
            <div class="w-full p-5">
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">Lote</label>
                    <input type="text" name="lote" id="lote" autocomplete="given-name" wire:model="lote"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('lote'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('lote') }}</p>
                    @endif
                    @if ($mensajeLote)
                        <p class="m-0 text-red-400 font-normal">{{ $mensajeLote }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">Altura</label>
                    <input step="any" type="number" name="altura" id="altura" autocomplete="given-name" wire:model="altura" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('altura'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('altura') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">Espaciamiento</label>
                    <input step="any" type="number" name="espaciamiento" id="espaciamiento" autocomplete="given-name" wire:model="espaciamiento" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('espaciamiento'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('espaciamiento') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">GAP</label>
                    <input step="any" type="number" name="gap" id="gap" autocomplete="given-name" wire:model="gap" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('gap'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('gap') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">Angulo</label>
                    <input step="any" type="number" name="angulo" id="angulo" autocomplete="given-name" wire:model="angulo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('angulo'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('angulo') }}</p>
                    @endif
                </div>
                <div class="mt-3">
                    <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        Guardar
                    </button>
                </div>
            </div>

        </div>
    </form>
    </div>
</div>
