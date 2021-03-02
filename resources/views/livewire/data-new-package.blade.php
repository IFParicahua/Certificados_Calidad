<div class="py-3 justify-center sm:py-5">
    <div class="relative sm:max-w-4xl sm:mx-auto">
      <div class="relative px-4 py-5 bg-white mx-3  shadow rounded-md sm:p-10">
        <div class="mx-auto pb-1">
            @livewire('modal-create-print')
        </div>
        <hr>
        <div id="content-detail">
            @livewire('modal-create-package')
            <div class="flex flex-col mt-5 border">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th scope="col" class="px-3 py-3 text-left text-sm font-medium uppercase tracking-wider">
                            PAQUETE
                          </th>
                          <th scope="col" class="px-3 py-3 text-left text-sm font-medium uppercase tracking-wider">
                            PESO (Kg)
                          </th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($datos as $dato)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">{{ $dato->package }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                      <div class="text-sm text-gray-900">{{ $dato->peso }}</div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td class="px-3 py-2 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">----</div>
                                </td>
                                <td class="px-3 py-2 whitespace-nowrap">
                                  <div class="text-sm text-gray-900">---</div>
                                </td>
                            </tr>
                            @endforelse
                      </tbody>
                    </table>
                  </div>
                </div>
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
