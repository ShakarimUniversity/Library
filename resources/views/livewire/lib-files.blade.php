<div>
    <div class="">
        <label for="inputType" class="text-sm font-medium text-gray-900 block mb-2">Категория</label>
        <select wire:model="category_id"
                id="inputType"
                wire:change="selectCategory($event.target.value)"
                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" name="parent_id">
            @foreach($categories as $category)
                <option value={{ $category->cat_id }}>{{ $category->cat_title }}</option>
                @if($category->children->count() > 0)
                    @include('partials.subcategories_select', ['categories' => $category->children,'prefix' => '--'])
                @endif
            @endforeach
        </select>
    </div>
    <div wire:loading class="mx-auto w-full">
        <div class="flex justify-center items-center text-center text-base font-semibold my-4">
            <svg width="20" height="20" fill="currentColor" class="mr-2 animate-spin" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M526 1394q0 53-37.5 90.5t-90.5 37.5q-52 0-90-38t-38-90q0-53 37.5-90.5t90.5-37.5 90.5 37.5 37.5 90.5zm498 206q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-704-704q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm1202 498q0 52-38 90t-90 38q-53 0-90.5-37.5t-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-964-996q0 66-47 113t-113 47-113-47-47-113 47-113 113-47 113 47 47 113zm1170 498q0 53-37.5 90.5t-90.5 37.5-90.5-37.5-37.5-90.5 37.5-90.5 90.5-37.5 90.5 37.5 37.5 90.5zm-640-704q0 80-56 136t-136 56-136-56-56-136 56-136 136-56 136 56 56 136zm530 206q0 93-66 158.5t-158 65.5q-93 0-158.5-65.5t-65.5-158.5q0-92 65.5-158t158.5-66q92 0 158 66t66 158z">
                </path>
            </svg>
            {{ __('interface.load') }}
        </div>
    </div>

    <p>Подкатегории</p>
    <ul>
        @foreach()
        @endforeach
        <li></li>
    </ul>

    <div class="w-full overflow-hidden rounded-lg shadow-lg border-t my-6">
        @if($files)
        <div class="w-full overflow-x-auto">
            <table id="teachersTable" class="w-full whitespace-no-wrap shadow-lg">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Имя файла</th>
                    <th class="px-4 py-3">Размер</th>
                    <th class="px-4 py-3">Создан</th>
                    <th class="px-4 py-3"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach($files as $file)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">{{ $file->file_title }}</td>
                        <td class="px-4 py-3">{{ $file->size }}</td>
                        <td class="px-4 py-3"> {{ $file->date_added }} </td>
                        <td class="flex items-center">
                            <a href="{{ $file->getFile() }}"
                               class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                               aria-label="Edit"
                               title="{{ __('button.edit') }}"
                            >
                                <svg
                                    class="w-5 h-5"
                                    aria-hidden="true"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                    fill-rule="evenodd" clip-rule="evenodd">
                                    <path d="M6 16h-5v6h22v-6h-5v-1h6v8h-24v-8h6v1zm14 2c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm-7.5-17v14.884l4.736-5.724.764.645-5.979 7.195-6.021-7.205.765-.644 4.735 5.732v-14.883h1z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</div>
