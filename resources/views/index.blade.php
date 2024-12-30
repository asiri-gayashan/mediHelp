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
            <div class="block" id="signInDiv">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-5 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to patient
                        account
                        
                    </h2>

                    @if(session('error'))
                <div class="text-red-500 text-center text-sm mt-2">
                    {{ session('error') }}  
                </div>
                @endif

                </div>
               
                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6" action="{{ route('login')}}" method="POST">
                        @csrf
                        <div>
                            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
                            <div class="mt-2">
                                <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email') }}"
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
                        </div>

                        <div>
                            <div class="flex  justify-between">
                                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                                <div class="text-sm">
                                    <a href="#" class="font-semibold text-red-600 hover:text-red-500">Forgot
                                        password?</a>
                                </div>
                            </div>
                            <div class="mt-2">
                                <input type="password" name="password" id="password" autocomplete="current-password" value="{{ old('title') }}" 
                                     
                                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                            </div>
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
                Not a member?
                <a href="{{route('register')}}" class="font-semibold text-red-600 hover:text-red-500" onclick="">Click for Sign
                    Up</a>
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