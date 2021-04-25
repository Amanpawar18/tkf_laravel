<li>{{ $child_category->name }}</li>
@if ($child_category->categories)
<ul>
    @foreach ($child_category->categories as $childCategory)
    @include('backend.category.child_category_show', ['child_category' => $childCategory])
    @endforeach
</ul>
@endif
