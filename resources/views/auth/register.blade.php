<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>
    
    <form method="POST" action="/register">
      @csrf
        <div class="space-y-12">
          <div class="border-b border-gray-900/10 pb-12">
            <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
              <x-form-field>
                   <x-form-label for='first_name'> First Name </x-form-label> 
                    <div class="mt-2">
                      <x-form-input type="text" name="first_name" id="first_name" placeholder="JaY" required> </x-form-input>
                      <div class="mt-2">
                        <x-form-error name='first_name'/>
                      </div>
                    </div>
                  </x-form-field>
                  <x-form-field>
                  <x-form-label for='last_name'> Last Name </x-form-label> 
                    <div class="mt-2">
                      <x-form-input type="text" name="last_name" id="last_name" placeholder="PadhiYar" required> </x-form-input>
                      <div class="mt-2">
                        <x-form-error name='last_name'/>
                      </div>
                    </div>
                  </x-form-field>
                  <x-form-field>
                  <x-form-label for='email'> User Mail </x-form-label> 
                    <div class="mt-2">
                      <x-form-input type="email" name="email" id="email" placeholder="JaYU@test.com" required> </x-form-input>
                      <div class="mt-2">
                        <x-form-error name='email'/>
                      </div>
                    </div>
                  </x-form-field>
                  <x-form-field>
                    <x-form-label for='password'> Password </x-form-label> 
                     <div class="mt-2">
                       <x-form-input type="password" name="password" id="password" placeholder="******" required> </x-form-input>
                       <div class="mt-2">
                         <x-form-error name='password'/>
                       </div>
                     </div>
                   </x-form-field>
                   <x-form-field>
                    <x-form-label for='password_confirmation'> Confirm Password </x-form-label> 
                     <div class="mt-2">
                       <x-form-input type="password" name="password_confirmation" id="password_confirmation" placeholder="******" required> </x-form-input>
                       <div class="mt-2">
                         <x-form-error name='password_confirmation'/>
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
          <x-form-button>Register</x-form-button>
        </div>
      </form>
    </x-layout>    
    