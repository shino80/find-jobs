<x-layout>
    <div
    class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            新規登録
        </h2>
        <p class="mb-4">ギグを投稿するためにアカウントを作成してください</p>
    </header>

    <form method="POST" action="/users">
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">
                名前
            </label>
            <input
                type="text"
                class="border border-gray-200 rounded p-2 w-full"
                name="name"
                value="{{old('name')}}"
            />
    @error('name')
        <p class="text-red-500 text-xs mt-1">
            {{$message}}
        </p>
    @enderror
        </div>

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

        <div class="mb-6">
            <label
                for="password2"
                class="inline-block text-lg mb-2"
            >
            パスワードを確認
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full"
                name="password_confirmation"
                value="{{old('password_confirmation')}}"
            />
            @error('password_confirmation')
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
                登録
            </button>
        </div>

        <div class="mt-8">
            <p>
                すでにアカウントをお持ちですか？
                <a href="/login" class="text-laravel"
                    >ログイン</a
                >
            </p>
        </div>
    </form>
</div>
</div>
</x-layout>