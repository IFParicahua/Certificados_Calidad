<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
    <div class="bg-gray-50">
    <form wire:submit.prevent="save">
        <div class="md:flex">
            <div class="w-full p-5">
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">LOTE</label>
                    <input type="text" name="lote" id="lote" autocomplete="given-name" wire:model="lote"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('lote'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('lote') }}</p>
                    @endif
                    @if ($mensajeLote)
                        <p class="m-0 text-red-400 font-normal">{{ $mensajeLote }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">%C</label>
                    <input step="any" type="number" name="C" id="C" autocomplete="given-name" wire:model="C" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('C'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('C') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">%MN</label>
                    <input step="any" type="number" name="MN" id="MN" autocomplete="given-name" wire:model="MN" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('MN'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('MN') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">%SI</label>
                    <input step="any" type="number" name="SI" id="SI" autocomplete="given-name" wire:model="SI" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('SI'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('SI') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">%P</label>
                    <input step="any" type="number" name="P" id="P" autocomplete="given-name" wire:model="P" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('P'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('P') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">%S</label>
                    <input step="any" type="number" name="S" id="S" autocomplete="given-name" wire:model="S" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('S'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('S') }}</p>
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
