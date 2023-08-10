
<x-layout>

<div
                    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
                >
                    <header class="text-center">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            ログイン
                        </h2>
                        <p class="mb-4">ギグを投稿するためにログインしてください</p>
                    </header>

                    <form method="POST" action="/users/auth">
                       @csrf
                        <div class="mb-6">
                            <label for="email" class="inline-block text-lg mb-2"
                                >メール</label
                            >
                            <input
                                type="email"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="email"
                                value="{{old('email')}}"
                            />
                            @error('email')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label
                                for="password"
                                class="inline-block text-lg mb-2"
                            >
                            パスワード
                            </label>
                            <input
                                type="password"
                                class="border border-gray-200 rounded p-2 w-full"
                                name="password"
                                value="{{old('password')}}"
                            />
                            @error('password')
                            <p class="text-red-500 text-xs mt-1">
                                {{$message}}
                            </p>
                            @enderror
                        </div>

                        <div class="mb-6 text-center">
                            <button
                                type="submit"
                                class="bg-laravel text-white rounded py-3 px-6 hover:bg-black mx-auto"
                            >
                            ログイン
                            </button>
                        </div>
                
                        <div class="mt-8">
                            <p>
                                アカウントをお持ちでない方は？
                                <a href="/register" class="text-laravel"
                                    >新規登録</a
                                >
                            </p>
                        </div>
                    </form>
                </div>

</x-layout>