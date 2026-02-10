@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    @push('styles')
        <style>
            .ck-editor__editable_inline {
                min-height: 200px;
            }

            /* Light mode styles for CKEditor */
            [data-theme="light"] .ck.ck-editor__main>.ck-editor__editable {
                background-color: #ffffff !important;
                color: #000000 !important;
            }

            [data-theme="light"] .ck.ck-toolbar {
                background-color: #f3f4f6 !important;
                border-color: #d1d5db !important;
            }

            [data-theme="light"] .ck.ck-button,
            [data-theme="light"] .ck.ck-button__label {
                color: #374151 !important;
            }

            [data-theme="light"] .ck.ck-button:hover {
                background-color: #e5e7eb !important;
            }

            /* Dark mode styles for CKEditor */
            [data-theme="dark"] .ck.ck-editor__main>.ck-editor__editable {
                background-color: #1d232a !important;
                color: #a6adba !important;
            }

            [data-theme="dark"] .ck.ck-toolbar {
                background-color: #191e24 !important;
                border-color: #2a323c !important;
            }

            [data-theme="dark"] .ck.ck-button,
            [data-theme="dark"] .ck.ck-button__label {
                color: #a6adba !important;
            }

            [data-theme="dark"] .ck.ck-button:hover {
                background-color: #2a323c !important;
            }
        </style>
    @endpush
    <div class="min-w-xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.products.index') }}" class="btn btn-ghost btn-circle">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h1 class="text-3xl font-bold">Edit Product</h1>
        </div>

        <div class="bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl p-8">
            <form action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-control w-full mb-4">
                    <label class="label"><span class="label-text font-semibold">Title</span></label>
                    <input type="text" name="title"
                        class="input input-bordered w-full @error('title') input-error @enderror"
                        value="{{ old('title', $product->title) }}" placeholder="Product Title" required>
                    @error('title')
                        <span class="text-error text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label"><span class="label-text font-semibold">Description</span></label>
                    <textarea id="description-editor" name="description"
                        class="textarea textarea-bordered h-32 @error('description') textarea-error @enderror"
                        placeholder="Product Description">{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="text-error text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text font-semibold">Price ($)</span></label>
                        <input type="number" step="0.01" name="price"
                            class="input input-bordered w-full @error('price') input-error @enderror"
                            value="{{ old('price', $product->price) }}" placeholder="0.00" required>
                        @error('price')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text font-semibold">Status</span></label>
                        <div class="flex items-center justify-between border border-base-300 rounded-lg p-4 bg-base-100">
                            <span class="label-text font-medium">Active Status</span>
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" class="toggle toggle-success" value="1"
                                {{ old('is_active', $product->is_active) ? 'checked' : '' }} />
                        </div>
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text font-semibold">Date Available</span></label>
                        <input type="date" name="date_available"
                            class="input input-bordered w-full @error('date_available') input-error @enderror"
                            value="{{ old('date_available', $product->date_available->format('Y-m-d')) }}" required>
                        @error('date_available')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-ghost">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i data-lucide="save" class="w-4 h-4 mr-2"></i> Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        let editorInstance;

        // Function to get current theme
        function getCurrentTheme() {
            return document.getElementById('html-root').getAttribute('data-theme') || 'dark';
        }

        // Function to apply theme to CKEditor
        function applyCKEditorTheme(editor, theme) {
            const editorElement = editor.ui.view.editable.element;

            if (theme === 'light') {
                editorElement.style.backgroundColor = '#ffffff';
                editorElement.style.color = '#000000';
            } else {
                editorElement.style.backgroundColor = '#1d232a';
                editorElement.style.color = '#a6adba';
            }
        }

        // Initialize CKEditor
        ClassicEditor
            .create(document.querySelector('#description-editor'))
            .then(editor => {
                editorInstance = editor;

                // Apply initial theme
                applyCKEditorTheme(editor, getCurrentTheme());

                // Listen for theme changes
                window.addEventListener('themeChanged', function(e) {
                    applyCKEditorTheme(editor, e.detail.theme);
                });
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
