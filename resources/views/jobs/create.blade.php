<x-layout>
<x-slot:heading>
    Create Job
</x-slot:heading>

<form method="POST" action="/jobs">
  @csrf
    <div class="space-y-12">
      <div class="border-b border-gray-900/10 pb-12">
        <h2 class="text-base/7 font-semibold text-gray-900">Create New Job</h2>
        <p class="mt-1 text-sm/6 text-gray-600">We just need a handful of details from you.</p>
  
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
          <x-form-field>
               <x-form-label for='title'> Job Title </x-form-label> 
                <div class="mt-2">
                  <x-form-input type="text" name="title" id="title" placeholder="Farmer" required> </x-form-input>
                  <div class="mt-2">
                    <x-form-error name='title'/>
                  </div>
                </div>
              </x-form-field>
  
              <x-form-field>
                <x-form-label for='title'> Salary </x-form-label> 
                 <div class="mt-2">
                   <x-form-input type="text" name="salary" id="salary" placeholder="$40000 per year" required> </x-form-input>
                   <div class="mt-2">
                     <x-form-error name='salary'/>
                   </div>
                 </div>
               </x-form-field>
   
            </div>
            {{--<div class="mt-10">
            @if($errors->any())
            <ul>
              @foreach($errors->all() as $error)
                <li class='text-red-500 italic'> *{{ $error }}</li>
              @endforeach
            </ul>
            @endif
            </div> --}}
        </div>
      </div>
  
    <div class="mt-6 flex items-center justify-end gap-x-6">
      <x-button href="/jobs">Cancel</x-button>
      <x-form-button>Save</x-form-button>
    </div>
  </form>
  </x-layout>    
