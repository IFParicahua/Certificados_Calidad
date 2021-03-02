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
                    <label class="block text-sm font-medium text-gray-700 m-0">FY(MPa)</label>
                    <input step="any" type="number" name="Fy" id="Fy" autocomplete="given-name" wire:model="Fy" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('Fy'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('Fy') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">FX(MPa)</label>
                    <input step="any" type="number" name="Fx" id="Fx" autocomplete="given-name" wire:model="Fx" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('Fx'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('Fx') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">A%</label>
                    <input step="any" type="number" name="A" id="A" autocomplete="given-name" wire:model="A" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('A'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('A') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">RE (FX/FY)</label>
                    <input step="any" type="number" name="FyFx" id="FyFx" autocomplete="given-name" wire:model="FyFx" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('FyFx'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('FyFx') }}</p>
                    @endif
                </div>
                <div class="flex flex-col mt-3">
                    <label class="block text-sm font-medium text-gray-700 m-0">D (180°)</label>
                    <input type="text" name="D" id="D" autocomplete="given-name" wire:model="D" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    @if($errors->has('D'))
                        <p class="m-0 text-red-400 font-normal">{{ $errors->first('D') }}</p>
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
