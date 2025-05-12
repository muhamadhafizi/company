@extends('layout.app2')

@section('content')

    <div class="space-y-5 sm:space-y-6">
        <div class="rounded-2xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col gap-2 px-5 py-4 sm:px-6 sm:py-5 sm:flex-row sm:items-center sm:justify-between">
                <h3 class="text-base font-medium text-gray-800 dark:text-white/90">
                    Company List
                </h3>
                <div class="flex items-center gap-3">
                    <a href="{{ route('companies.create') }}" class="text-theme-sm shadow-theme-xs inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2.5 font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200">
                        Create New
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-100 p-5 dark:border-gray-800 sm:p-6">
                <!-- ====== Table Six Start -->
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
                    <div class="max-w-full overflow-x-auto custom-scrollbar">
                        <table class="w-full min-w-[1102px]">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Website
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Logo</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $company->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $company->email }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <a href="{{ $company->website }}" class="text-indigo-600 hover:text-indigo-900"
                                                target="_blank"> {{ $company->website }}</a>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($company->logo)
                                                <img src="{{ Storage::url($company->logo) }}"
                                                    alt="{{ $company->name }} logo" class="h-10 w-10 object-contain">
                                            @else
                                                No logo
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 space-y-1 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('companies.edit', $company) }}"
                                                class="inline-flex items-center gap-2 px-2.5 py-0.5 text-sm font-medium text-white transition rounded-lg bg-blue-light-500 shadow-theme-xs hover:bg-error-600 hover:text-blue-light-900">Edit</a>
                                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-2 px-2.5 py-0.5 text-sm font-medium text-white transition rounded-lg bg-error-500 shadow-theme-xs hover:bg-error-600 hover:text-red-900"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ====== Table Six End -->
            </div>
        </div>
    </div>
@endsection

