<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>
    
    <form method="POST" action="/session">
      @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <x-form-field>
                  <x-form-label for='email'> User Mail </x-form-label> 
                    <div class="mt-2">
                      <x-form-input type="email" name="email" id="email" placeholder="JaYU@test.com" :value="old('email')" required> </x-form-input>
                      <div class="mt-2">
                        <x-form-error name='email'/>
                      </div>
                    </div>
                  </x-form-field>
                  <x-form-field>
                    <x-form-label for='password'> Password </x-form-label> 
                     <div class="mt-2">
                       <x-form-input type="password" name="password" id="password" placeholder="******"  required> </x-form-input>
                       <div class="mt-2">
                         <x-form-error name='password'/>
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
          <a href="/">Cancel</a>
          <x-form-button>Login</x-form-button>
        </div>
      </form>
    </x-layout>    
    