
<div class="sm:mx-auto mt-5">
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-3">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              @livewire('model-importar-quimico')
            </div>
        </div>
        <div class="col-span-6">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <div class="py-4 px-5 bg-gray-50">
                    <div class="grid grid-cols-10 gap-4 px-3">
                        <div class=" col-start-3 col-span-6">
                            <input type="text" class="text-sm block w-full shadow-sm border-gray-300 rounded-md" wire:model="search" placeholder="Buscar...">
                        </div>
                    </div>
                </div>
                <div class="py-0 px-5 bg-gray-50">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                              LOTE
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                % C
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                % Mn
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                % Si
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                % P
                            </th>
                            <th scope="col" class="px-3 py-3 text-left text-sm font-bold uppercase tracking-wider">
                                % S
                            </th>
                            <th scope="col" class="px-3 py-5 text-left text-sm font-medium  uppercase tracking-wider"></th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($datos as $dato)
                              <tr>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $dato->lote->code }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $dato->c }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{ $dato->mn }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">{{ $dato->si }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $dato->p }}</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $dato->s }}</div>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium w-2/12">
                                    <a wire:click="selectItem({{ $dato->id }})" class="text-blue-600 hover:text-blue-900 text-lg px-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a wire:click="deleteId({{ $dato->id }})" class="text-blue-600 hover:text-blue-900 text-lg px-3">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                              </tr>
                            @empty
                              <tr>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">---</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">---</div>
                                  </td>
                                  <td class="px-3 py-2 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">----</div>
                                  </td>
                                  <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium w-2/12">
                                    ----
                                  </td>
                              </tr>
                            @endforelse
                      </tbody>
                    </table>
                </div>
                <div class="bg-gray-100 px-6 py-4 border-t border-gray-200">
                    {{ $datos->links() }}
                </div>
              </div>
            </div>
        </div>
        <div class="col-span-3">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
              @livewire('model-create-quimico')
            </div>
        </div>

        <!-- Modal -->
        <dialog id="modal-delete" class="p-0 shadow w-11/12 md:w-3/12 overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <div class="mx-5 my-3">
                <div class="bg-gray-50 text-center">
                    <h3>Estas seguro?</h3>
                </div>
                <div class="bg-gray-50 text-center">
                    <p class="text-xl">¡No podrás revertir esto!</p>
                </div>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-3">
                        <button onclick="document.getElementById('modal-delete').close();" class="border border-gray-500 bg-white text-gray-500 rounded-md px-4 py-2 mx-2 transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none focus:shadow-outline">
                            Cancelar
                        </button>
                    </div>
                    <div class=" col-start-8 col-span-5">
                        <button wire:click="eliminar" class="border border-red-500 bg-red-500 w-30 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline ">
                            Si, eliminar
                        </button>
                    </div>
                </div>
            </div>
        </dialog>
    </div>
</div>

<script>
    window.addEventListener('closeModal', event =>{
        document.getElementById('modal-delete').close()
    })

    window.addEventListener('openModal', event =>{
        document.getElementById('modal-delete').showModal()
    })
</script>
