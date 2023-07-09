

            <form action="{{ route('products.filter') }}" method="GET">
                <label for="category">Choose a category:</label>
                <select name="category" id="category">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <button type="submit">Filter</button>
            </form>

@yield('filter')
