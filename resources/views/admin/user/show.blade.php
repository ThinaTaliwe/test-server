@extends('layouts.app2')

@section('row_content')


    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="px-6">
            <h1
                class="inline-block text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200 py-4 block sm:inline-block flex">
                {{ __('View user') }}</h1>
            <a href="{{ route('user.index') }}"
                class="no-underline hover:underline text-cyan-600 dark:text-cyan-400">{{ __('<< Back to all users') }}</a>
            @if ($errors->any())
                <ul class="mt-3 list-none list-inside text-sm text-red-400">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
        <div class="w-full px-6 py-4">
            <div class="min-w-full border-b border-gray-200 shadow">
                <table class="table-fixed w-full text-sm">
                    <tbody class="bg-white dark:bg-slate-800">
                        <tr>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ __('Name') }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ __('Email') }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ __('Roles') }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                <div class="py-2">
                                    <div class="grid grid-cols-4 gap-4">
                                        @forelse ($roles as $role)
                                            <div class="col-span-4 sm:col-span-2 md:col-span-2">

                                                <div class="form-check">
                                                    <input class="form-check-input" name="roles[]" type="checkbox"
                                                        value="{{ $role->name }}"
                                                        {{ in_array($role->id, $userHasRoles) ? 'checked' : '' }}
                                                        disabled="disabled">
                                                    <label class="custom-control-label"
                                                        for="customCheck1">{{ $role->name }}</label>
                                                </div>
                                            </div>
                                        @empty
                                            ----
                                        @endforelse
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">
                                {{ __('Created') }}</td>
                            <td
                                class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">
                                {{ $user->created_at }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
