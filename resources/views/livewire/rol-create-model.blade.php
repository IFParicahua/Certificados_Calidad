<div>
    <form wire:submit.prevent="save_rol">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-6">
            <label for="rol">Rol</label>
            <input type="text" name="rol" id="rol" wire:model="rol"  autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        @foreach($operations as $index => $operacion)
        <div class="col-span-2 text-center">
            <div>
                <label class="capitalize">{{$operacion->name}}</label>
            </div>
            <div>
                <input wire:model="operation_list.{{ $index }}" value="{{ $operacion->id }}" type="checkbox" class="appearance-none checked:bg-blue-600 checked:border-transparent">
            </div>
        </div>
        @endforeach
    </div>
    <div class="grid justify-items-end">
        <button type="submit" class=" border border-green-500 bg-green-500 text-white rounded-md px-4 py-1 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
            Guardar
        </button>
    </div>
    </form>
</div>
