<div class="mx-auto pt-1">
    <div class="divide-y divide-gray-200">
        <div class="grid grid-cols-12 gap-3 text-base">
            <form wire:submit.prevent="savePackage" class="col-span-11 grid grid-cols-7 gap-3">
                <div class="col-span-3">
                        <label for="paquete" class="block font-medium text-gray-700">Paquete</label>
                        <input type="number" name="paquete" id="paquete"  wire:model="paquete" autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                        @error('paquete') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                        @error('lote') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="col-span-3">
                      <label for="peso" class="block font-medium text-gray-700">Peso</label>
                      <input step="any" type="number" name="peso" id="peso"  wire:model="peso"  autocomplete="given-name" class="text-sm mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md">
                      @error('peso') <span class="error text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
                <div  class="col-span-1 mt-7 ">
                      <button type="submit" class="border border-green-500 bg-green-500 text-sm w-12 text-white rounded-md py-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline ">
                          <i class="fas fa-plus"></i>
                      </button>
                </div>
            </form>
            <div class="col-span-1 mt-8">
                <a href="paquete_pdf/{{$id_imp_pdf}}" target="_blank" class="border border-red-500 bg-red-500 text-xl w-12 text-white rounded-md px-4 py-1 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline ">
                    <i class="fas fa-file-pdf"></i>
                </a>
                {{--  imprimir con java script  --}}
                <iframe src="{{ asset('paquete_pdf/'.$id_imp_pdf)}}" id="PDFtoPrint" style="display: none"> </iframe>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('imprimirbtn', event =>{
        document.getElementById('PDFtoPrint').focus();
        document.getElementById('PDFtoPrint').contentWindow.print();
    })
</script>
