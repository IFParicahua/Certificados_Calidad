<div class="py-3 justify-center sm:py-5">
    <div class="relative sm:mx-auto">
      <div class="relative px-4 pb-5 pt-3 bg-white mx-3  shadow rounded-md sm:p-10">
          <div class="grid grid-cols-12 gap-4">
            <div class="mx-auto pb-1 col-span-7">
                @livewire('modal-create-certificado')
            </div>
            <div class="mx-auto pb-1 col-span-5">
                @livewire('modal-add-lote-certificado')
            </div>
          </div>
        <div id="content-detail">
            <div class="flex flex-col border">
              <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                  <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                        <tr>
                          <th rowspan="2" class="text-center">LOTE</th>
                          <th rowspan="2" class="text-center">MASA LINEAL kg/m</th>
                          <th colspan="5" class="text-center border-l">PROPIEDADES MECÁNICAS</th>
                          <th colspan="4" class="text-center border-l">GEOMETRIA DE CORRUGA</th>
                          <th colspan="5" class="text-center border-l">ANÁLISIS QUÍMICO</th>
                          <th rowspan="2"></th>
                        </tr>
                        <tr>
                            <th class="text-center">
                                <div>Fy</div>
                                <div>(MPa)</div>
                            </th>
                            <th class="text-center">
                                <div>Fx</div>
                                <div>(MPa)</div>
                            </th>
                            <th class="text-center">
                                <div>A</div>
                                <div>%</div>
                            </th>
                            <th class="text-center">
                                <div>RE</div>
                                <div>(Fx/Fy)</div>
                            </th>
                            <th class="text-center">
                                <div>D</div>
                                <div>180º</div>
                            </th>
                            <th class="text-center border-l">
                                <div>ALTURA</div>
                                <div>mm</div>
                            </th>
                            <th class="text-center">
                                <div>ESPAC.</div>
                                <div>mm</div>
                            </th>
                            <th class="text-center">
                                <div>GAP</div>
                                <div>mm</div>
                            </th>
                            <th class="text-center">
                                <div>ANGULO</div>
                                <div>º</div>
                            </th>
                            <th class="text-center border-l">%c</th>
                            <th class="text-center">%Mn</th>
                            <th class="text-center">%SI</th>
                            <th class="text-center">%P</th>
                            <th class="text-center">%S</th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($items as $item)
                                <tr>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->code }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->masa_lineal }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->mechanics->avg->fy }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->mechanics->avg->fx }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->mechanics->avg->a }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->mechanics->avg->re  }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->mechanics[0]->d }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->geometries->avg->altura }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->geometries->avg->espaciamiento }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->geometries->avg->gap }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->geometries->avg->angulo }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->chemicals->avg->c }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->chemicals->avg->mn }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->chemicals->avg->si }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->chemicals->avg->p }}</div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-center">
                                        <div class="text-sm text-gray-900">{{ $item->chemicals->avg->s }}</div>
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
           {{--  <dialog id="modal-delete" class="p-0 shadow w-11/12 md:w-3/12 overflow-hidden border-b border-gray-200 sm:rounded-lg">
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
           </dialog>  --}}
        </div>
    </div>
  </div>
</div>
{{--  <script>
    window.addEventListener('closeModal', event =>{
        document.getElementById('modal-delete').close()
    })

    window.addEventListener('openModal', event =>{
        document.getElementById('modal-delete').showModal()
    })
</script>  --}}
