<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/custom.css">
</head>

<body>

    <div class="grid md:grid-cols-2 h-screen gap-4">



        <div class="flex min-h-full flex-col justify-center px-6 h-screen lg:px-8">


            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto w-20"
                    src="/img/logo.png" alt="">

            </div>
          
            <div class="" id="signUpDiv">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">
                        


                        @if (session('success'))
  
                                {{ sprintf("You successfully registerd !") }}
                        
                                @else
                                {{ sprintf("Sign up for patient account") }}

                        @endif

                        
                    </h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full       @if (session('success'))
  
                {{ sprintf("hidden") }}
  
                    @endif sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('store')}}" method="POST">
                        @csrf
                         
                        <div class="grid grid-cols-2 gap-3 ">

                            
      
                            <div>
                                <label for="name" class="block text-sm/6 font-medium text-gray-900">First Name</label>
                                <div class="mt-2">
                                    <input type="text" name="rfname" id="rfname" value="{{ old('rfname') }}"  
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                               
                               
                                    </div>
                            <label for="" class="block  font-medium text-red-600 hover:text-red-500 Cus-war-txt">@error('rfname'){{$message}} @enderror</label>

                            </div>
                            <div>
                                <label for="name" class="block text-sm/6 font-medium text-gray-900">Last Name</label>
                                <div class="mt-2">
                                    <input type="text" name="rlname" id="rlname"   value="{{ old('rlname') }}"
                                        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                </div>
                                <label for="" class="block  font-medium text-red-600 hover:text-red-500 Cus-war-txt">@error('rlname'){{$message}} @enderror</label>

                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input type="email" name="remail" id="remail" autocomplete="email"  value="{{ old('remail') }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            <label for="" class="block  font-medium text-red-600 hover:text-red-500 Cus-war-txt">@error('remail'){{$message}} @enderror</label>

                        </div>
                        <div>
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Mobile Number</label>
                            
                            
                            <div class="mt-2">
                                <input type="tel" name="rNum" id="rNum"  value="{{ old('rNum') }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            <label for="" class="block  font-medium text-red-600 hover:text-red-500 Cus-war-txt">@error('rNum'){{$message}} @enderror</label>


                        </div>

                        <div>
                            <div class="flex  justify-between">
                                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                               
                            </div>
                            <div class="mt-2">
                                <input type="password" name="rpassword" id="rpassword" autocomplete="current-password"
                                     
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                            <label for="" class="block  font-medium text-red-600 hover:text-red-500 Cus-war-txt">@error('rpassword'){{$message}} @enderror</label>

                        </div>

                        <div>
                            <button type="submit"
                                class="flex w-full justify-center rounded-md bg-red-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                                in</button>
                        </div>
                    </form>



                </div>

            </div>

            <p class="mt-10  text-center text-sm/6 text-gray-500">


                
                @if (session('success'))
  
                {{ sprintf("Click here to ") }}
        
                @else
                {{ sprintf("Not a member?") }}

             @endif


                
                <a href="{{route('index')}}" class="font-semibold text-red-600 hover:text-red-500" onclick="">
                    
                    
                    
                     
                @if (session('success'))
  
                {{ sprintf("Sign In") }}
        
                @else
                {{ sprintf("Click for Sign Up") }}

             @endif
                    
                    
                    </a>
            </p>

      

        </div>
        <div class=" grid grid-cols-7  ">
            <div class="h-100 hidden md:block col-span-6 col-start-2 w-full cus-log-img  ">

            </div>
        </div>

    </div>



    <SCRipt src="/js/custom.js"></SCRipt>
</body>

</html>