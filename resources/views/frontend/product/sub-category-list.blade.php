@if(count($child_category->products))
<li>
    <a class="nav-link active" href="{{route('frontend.collections', ['category' => $child_category->slug])}}">
        {{ $child_category->name }}
    </a>
</li>
@endif
@if ($child_category->categories)
<ul>
    @foreach ($child_category->categories as $childCategory)
    @if(count($childCategory->products))
    @include('backend.category.child_category_show', ['child_category' => $childCategory])
    @endif
    @endforeach
</ul>
@endif
