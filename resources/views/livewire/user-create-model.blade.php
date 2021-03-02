<div class="md:mt-0 md:col-span-2">
    {{--  Item Seleccionado: {{ $colada }}  --}}
    <form wire:submit.prevent="save_user">
        <div class=" overflow-hidden sm:rounded-md">
            <div class="px-4 py-0 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <label for="name">Nombre y Apellido</label>
                        <input type="text" name="name" id="name" wire:model="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @if($errors->has('name'))
                        <span class="block text-red-400 font-normal">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col-span-6">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" wire:model="email" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @if($errors->has('email'))
                        <span class="block text-red-400 font-normal">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="col-span-6">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" wire:model="password" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @if($errors->has('password'))
                        <span class="block text-red-400 font-normal">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="col-span-6">
                        <label for="rol">Rol</label>
                        <select wire:model="rol" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="">Seleccione una opción</option>
                            @forelse ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                            @empty
                                <option value="">---</option>
                            @endforelse
                        </select>
                        @if($errors->has('rol'))
                        <span class="block text-red-400 font-normal">{{ $errors->first('rol') }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="grid justify-items-end mt-2">
            <button type="submit" class=" border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                Guardar
            </button>
        </div>
    </form>
</div>
<script>
    window.addEventListener('closeModaluser', event =>{
        document.getElementById('modal-create-user').close()
    })
</script>
